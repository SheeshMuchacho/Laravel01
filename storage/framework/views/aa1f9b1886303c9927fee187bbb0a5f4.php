<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

      <!-- End layout styles -->
      <link rel="shortcut icon" href="assets/images/icon.png" />

      <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>


      <title>Bubble Tea</title>



    <?php echo $__env->make("user.css", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->



    <?php echo $__env->make("user.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Flavors On Menu</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Tasty Deals</h4>
            <h2>Get your Favourite Drinks</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab Drinks on the Go</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->





    

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="<?php echo e(url('ourproduct')); ?>">view all products <i class="fa fa-angle-right"></i></a>

              
              <form action="<?php echo e(url('search')); ?>" method="get" class="form-inline" style="padding: 20px 0;">

                <?php echo csrf_field(); ?>
                      <input class="form-control" type="search" name="search" placeholder="Search products"
                              style="width: 30%; font-size: 14px;">
                      <input type="submit" value="Search" class="btn btn-success"
                              style="font-size: 11px; padding: 10px 15px; margin: 0 10px; background-color: #0a0a0a">

              </form>

            </div>
          </div>


            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="image-container">
                            <?php if($Product->quantity > 0): ?>
                                <a href="#"><img src="/productimage/<?php echo e($Product->image); ?>"></a>
                            <?php else: ?>
                                <div style="position: relative; display: inline-block;">
                                    <img src="/productimage/<?php echo e($Product->image); ?>" style="filter: grayscale(100%);">
                                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: gray; color: white; padding: 10px;">Out of Stock</div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="down-content">
                            <a href="#"><h4><?php echo e($Product->title); ?></h4></a>
                            <h6>LKR <?php echo e($Product->price); ?></h6>
                            <p><?php echo e($Product->description); ?></p>
                            <?php if($Product->quantity > 0): ?>
                                <p>Available: <?php echo e($Product->quantity); ?></p>
                                <form action="<?php echo e(url('addcart', ['id' => $Product->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <label>
                                        <input class="form-input w-16 px-3 py-2 border rounded-md mr-2" type="number" value="1" min="1" name="quantity">
                                    </label>
                                    <input class="custombtn bg-red-500 hover:bg-red-600 text-whitesmoke hover:text-whitesmoke px-3 py-2 rounded-md cursor-pointer transition duration-200" type="submit" value="Add to Cart">
                                </form>
                            <?php else: ?>
                                <p>Out of Stock</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <!-- Pagination Links Container -->
          <div class="container">
            <div class="pagination-links">
            <?php if(method_exists($data, 'links')): ?>
                    <?php echo $data->links(); ?>

            <?php endif; ?>
            </div>
          </div>


        </div>
      </div>
    </div>



    

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Bubble Me Bubble Tea</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for a refreshing drink?</h4>
              <p>Bubble tea, also known as boba tea, is a popular and refreshing beverage that originated in Taiwan in the 1980s. This unique drink has gained widespread popularity
                globally, offering a delightful combination of tea, milk, or fruit flavors, and chewy tapioca pearls known as "boba."</p>
              <ul class="featured-list">
                <li><a href="#">Tea Base: Black, green, fruit, or milk teas</a></li>
                <li><a href="#">Flavors: Jasmine, taro, matcha, and various fruit options</a></li>
                <li><a href="#">Toppings: Fruit jellies, aloe vera, flavored syrups, tapioca pearls</a></li>
                <li><a href="#">Customization: Adjustable sweetness, ice level, and toppings</a></li>
                <li><a href="#">Texture Experience: Smooth liquid combined with chewiness</a></li>
              </ul>
              <a href="" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Tea</em> Flavors</h4>
                  <p>Sip into Bliss: Indulge in the delightful fusion of flavors and textures with our signature bubble tea. Your taste buds deserve this sweet escape! 🍵✨ #BubbleTeaBliss</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>





    <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <?php echo $__env->make('user.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





  </body>

</html>
<?php /**PATH C:\xampp\htdocs\cb009892\resources\views/user/home.blade.php ENDPATH**/ ?>