<div class="container">
     <div class="header-menu-wrapper row">
        
        <!-- CART START -->
          
                        <div class="col-lg-12 col-sm-12 col-12 main-section">
                           <div class="top-menu-green">
                                <ul class="header-menu nav">
                               
                                <?php if( ! session()->has('loggedUserId')): ?>
                                    <li class="nopadding"><span><i  class="fa-adj fa fa-user" aria-hidden="true"></i>
</span></li>
                                    <li class="nav-item top-nav-list"><a class="nav-link" href="<?php echo e(url('/register')); ?>">Register</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#">|</a></li>
                                     
                                    <li class="nopadding"><span><i  class="fa-adj fa fa-sign-in" aria-hidden="true"></i></span></li>
                                    <li class="nav-item top-nav-list">
                                    
                                    <a class="nav-link" href="<?php echo e(url('/login')); ?>">Login</a></li>
                                    
                                    <?php else: ?> 
                                    <li class="nopadding"><span><i  class="fa-adj  fa fa-sign-in" aria-hidden="true"></i></span></li>
                                     
                                    <li class="nav-item"><a class="nav-link top-nav-list" href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">|</a></li>
                                    <li class="nopadding"><span><i class="fa-adj  fa fa-user" aria-hidden="true"></i></span></li>
                                    <li class="nav-item"><a class="nav-link top-nav-list" href="<?php echo e(url('/profile')); ?>">Profile</a></li>
                                    
                                    <?php endif; ?>
                                </ul>
                            </div>

                            <div class="dd_currency_wrapper">
                                <div class="dropdown_1">
                                    <?php
                                        $bl_cooke_val = Cookie::get('currency');
                                        if(!isset($bl_cooke_val) && ($bl_cooke_val) == "")
                                        {
                                           $current_currency = AppConstants::COOKIE_DEFAULT_CURRENCY_VALUE;
                                        }
                                        else
                                        {
                                            $current_currency = Cookie::get('currency');
                                        }
                                    ?>
                                    <div>CUR : <?php echo e($current_currency); ?></div>
                                    <div class="dropdown-content_1">
                                        <?php if( Cookie::get('currency') =='USD'): ?>
                                        <div class="currency_val"><a href="<?php echo e(route('setcurrency' , 'CR=QAR')); ?>">QAR</a></div>
                                        <?php else: ?>
                                        <div class="currency_val"><a href="<?php echo e(route('setcurrency' , 'CR=USD')); ?>">USD</a></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                             

                            <div class="dropdown">
                                <button type="button" class="btn btn-info" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger"><?php echo e(count((array) session('cart'))); ?></span>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger"><?php echo e(count((array) session('cart'))); ?></span>
                                        </div>
                                        <?php $total = 0 ?>
                                        <?php $__currentLoopData = (array) session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $total += $details['price'] * $details['quantity'] ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: <span class="text-info"> <?php echo e($total); ?>  <?php echo e($current_currency); ?></span></p>
                                        </div>
                                    </div>
                                    <?php if(session('cart')): ?>
                                        <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row cart-detail">
                                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img-cart">
                                                     
                                                    <img class="front-thumbnail img-responsive" src="<?php echo e(URL::to('/') .'/'. AppConstants::IMAGE_THUMB_PATH . $details['thumbnail']); ?>"  height="100" />
                                                </div>
                                                
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                    <p><?php echo e($details['name']); ?></p>
                                                    <span class="price text-info"> <?php echo e($details['price']); ?>  <?php echo e($current_currency); ?> </span> <span class="count"> Quantity:<?php echo e($details['quantity']); ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="<?php echo e(route('cart')); ?>" class="btn btn-warning btn-block">View all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    
                     
                    <!-- END CART -->
    </div>
    <div class="clearfix"></div>
</div>

<style>
.dd_currency_wrapper{
    float: left;
    margin-top: 18px;
}
.dropdown_1 {
  position: relative;
  display: inline-block;
}

.dropdown-content_1 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 87px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 4px 16px;
  z-index: 1;
  color: #000000;
}
.dropdown-content_1 a:hover {
    text-decoration: none;
    color: #792c35;
}
.dropdown-content_1 a {
    text-decoration: none;
    color: #792c35;
}
.dropdown_1:hover .dropdown-content_1 {
  display: block;
  border: 1px solid #792c35;
}
</style><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/header/topheader.blade.php ENDPATH**/ ?>