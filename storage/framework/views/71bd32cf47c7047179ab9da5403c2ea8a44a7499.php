<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 ">
                        <h4>Register</h4>
                    </div>
                </div>
                <?php if(Session::get('success')): ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3  alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if(Session::get('fail')): ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 col-md-offset-3 alert alert-danger">
                        <?php echo e(Session::get('fail')); ?>

                    </div>
                </div>
                <?php endif; ?> 
                

                
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 offset-lg-3">
                        <form method="post" action="<?php echo e(route('create')); ?>"  id="regform">
                        <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="<?php echo e(old('name')); ?>" />
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
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo e(old('email')); ?>" />
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
                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number i.e +923209082777" value="<?php echo e(old('mobile')); ?>" />
                                <span style="color:red"> <?php $__errorArgs = ["mobile"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="<?php echo e(old('password')); ?>" />
                                <span style="color:red"> <?php $__errorArgs = ["password"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter Confirm Password" value="<?php echo e(old('password_confirmation')); ?>" />
                                <span style="color:red"> <?php $__errorArgs = ["password_confirmation"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            
                            <div class='clr'></div>
                            <button type="submit" class='btn'>Register</button>
                            </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 offset-lg-3">
                        Already ! Have account  <a  href="login" class="create-new-acc"> Login </a>
                    </div>
                </div>
                <div class='clr'></div>
                
                
            </div>
            <script>
                
    jQuery(document).ready(function () {
        
    jQuery('#regform').validate({ // initialize the plugin
         
        rules: 
        {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true
            },
            password : {
                required : true
            },
            password_confirmation : {
                required : true,
                equalTo : "#password"
            }
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/register.blade.php ENDPATH**/ ?>