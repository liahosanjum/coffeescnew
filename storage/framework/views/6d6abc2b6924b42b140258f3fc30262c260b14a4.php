
<?php $__env->startSection('content'); ?>
<div class="register-page-wrapper page-wrapper">
                
                
                <?php if(Session::get('successMsg')): ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 mob-regis-success">
                        <h4>Registration Successfull</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center col-12 offset-lg-3  alert alert-success-reg">
                        <?php echo e(Session::get('successMsg')); ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if(Session::get('failMsg')): ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 mob-regis-success">
                        <h4>Registration UnSuccessfull</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-center col-sm-12 col-12 offset-lg-3 offset-md-3 alert alert-danger">
                        <?php echo e(Session::get('failMsg')); ?>

                    </div>
                </div>
                <?php endif; ?> 
                <div class='clr'></div>
</div>
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/user/registrationsuccess.blade.php ENDPATH**/ ?>