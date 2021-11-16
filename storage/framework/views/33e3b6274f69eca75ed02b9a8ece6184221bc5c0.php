


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 admin-profile">
                        <h4>Personal Information</h4>
                    </div>
                </div>
                <?php if(Session::get('successPMsg')): ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12   alert alert-success">
                        <?php echo e(Session::get('successPMsg')); ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if(Session::get('failPMsg')): ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 alert alert-danger">
                        <?php echo e(Session::get('failPMsg')); ?>

                    </div>
                </div>
                <?php endif; ?> 
                

                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="pers-title">Name :</div>
                                <div class="pers-info"><?php echo e($loggedUserInfo['name']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="pers-title">Email :</div>
                                <div class="pers-info"><?php echo e($loggedUserInfo['email']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                             
                    
                <div class='clr'></div>
            </div>
            <div class='clr'></div>
        </div>
    </div>
<div class="clr"></div>
</div>        
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/adminprofile.blade.php ENDPATH**/ ?>