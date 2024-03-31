<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;



class HomeController extends Controller
{

    public function redirect()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return view('admin.admindash');
            }
        }

        // If the user is not an admin or not authenticated,
        // show the user.home view with product data
        $data = Product::paginate(3);
        return view('user.home', compact('data'));
    }

    public function index()
    {
        // Redirect to the redirect() method
        return $this->redirect();
    }

    // public function redirect(){
    //     $usertype=Auth::user()->usertype;

    //     if($usertype=='1'){
    //         return view('admin.admindash');
    //     }
    //     else{
    //         $data = Product::paginate(6);
    //         return view('user.home',compact('data'));
    //     }
    // }

    // public function index(){

    //     if(Auth::id()){
    //         return redirect('redirect');
    //     }

    //     else{
    //         $data = Product::paginate(6);
    //         return view('user.home', compact('data'));
    //     }
    // }

    public function search(Request $request)
    {
        $search=$request->search;

        if($search=='')
        {
            $data = Product::paginate(3);
            return view('user.home', compact('data'));
        }

        $data=product::where('title', 'Like', '%'.$search.'%')->get();
        return view('user.home', compact('data'));
    }

    public function ourproduct(Request $request)
    {
        $search = $request->search;

        if ($search) {
            $data = Product::where('title', 'like', '%' . $search . '%')->paginate(9);
        } else {
            $data = Product::paginate(9);
        }

        return view('user.ourproduct', compact('data'));
    }
    
}
