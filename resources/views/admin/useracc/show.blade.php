<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')


</head>
<body>

<!-- partial -->
@include('admin.sidebar')

<div class="container-fluid page-body-wrapper">

    @include('admin.navbar')
    <!-- partial -->

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="page-header">
                <h3 class="page-title">View Users</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Navigation</li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item">View Users</li>
                    </ol>
                </nav>
            </div>


            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div style="padding: 20px 50px 20px 50px">
                                @if(session()->has('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif

                                @if(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session()->get('error') }}
                                    </div>
                                @endif


                                <table class="table table-striped">
                                    <thead>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th style="text-align: center">Update</th>
                                    <th style="text-align: center">Delete</th>
                                    </thead>
                                    @foreach($users as $user)
                                        <tbody>
                                        <td style="color: white">{{ $user->name }}</td>
                                        <td style="color: white">{{ $user->email }}</td>
                                        <td style="color: white">{{ $user->phone }}</td>
                                        <td style="color: white">{{ $user->address }}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-inverse-primary" href="{{ url('updateuser', $user->id) }}">Update</a>
                                        </td>
                                        <td style="text-align: center">
                                            <a
                                                class="btn btn-inverse-danger"
                                                onclick="return confirm('Are you sure you want to delete user account?')"
                                                href="{{url('userdelete', $user->id)}}">
                                                Delete
                                            </a>
                                        </td>
                                        </tbody>
                                    @endforeach
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



@include('admin.script')

</body>
</html>
