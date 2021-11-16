


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row profile_inner">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 profile_inner_wrapper">
            <?php echo $__env->make('user.profilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-12 profile_inner_wrapper_content"> 
            <div class="register-page-wrapper page-wrapper">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
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
                            <form method="post" action="<?php echo e(route('updateAccount')); ?>">
                            <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="<?php echo e($loggedUserInfo->name); ?>" />
                                <span style="color:red"> <?php $__errorArgs = ["name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo e($loggedUserInfo->email); ?>" />
                                <span style="color:red"> <?php $__errorArgs = ["email"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile" value="<?php echo e($loggedUserInfo->mobile); ?>" />
                                    <span style="color:red"> <?php $__errorArgs = ["mobile"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>

                                
                                
                                
                                
                                
                                <button type="submit" class='btn'>Update</button>
                                </form>
                                <div class='clr'></div>
                        </div>
                        <div class='clr'></div>
                    </div>
                    <div class='clr'></div>
                </div>
        </div>
        <div class="clr"></div>
    </div> 
</div>       
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/user/profile.blade.php ENDPATH**/ ?>