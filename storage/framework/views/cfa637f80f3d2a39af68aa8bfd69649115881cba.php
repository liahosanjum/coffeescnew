


<?php $__env->startSection('content'); ?>

<div class="row profile_inner_co">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 checkout_title">
        Checkout
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-12 profile_inner_wrapper_co">
        <?php echo $__env->make('checkout.checkoutlink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-12 profile_inner_wrapper_content_co"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12  ">
                        <h4>Personal Information</h4>
                    </div>
                </div>
                
                <div class="row co_info_wrapper">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12   ">
                        <div class="title_cartinfo">Name:</div>
                        <div class="cartinfo_detail"> <?php echo e($loggedUserInfo->name); ?></div>
                        <div class="clr"></div>
                    </div>
                </div>

                <div class="row co_info_wrapper">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12   ">
                        <div class="title_cartinfo">Email:</div>
                        <div class="cartinfo_detail"> <?php echo e($loggedUserInfo->email); ?></div>
                        <div class="clr"></div>
                    </div>
                </div>

                <div class="row co_info_wrapper">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12   ">
                        <div class="cartinfo_detail"> 
                            <a href="profile" 
                                 class="btn btn-warning btn-block text-center" role="button">Edit</a>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>


            
                
                
                
                
            
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/checkout/index.blade.php ENDPATH**/ ?>