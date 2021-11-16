

<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="login-page-wrapper page-wrapper">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-lg-offset-3 col-md-offset-3">
            <h4>Login</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-lg-offset-3 col-md-offset-3">
                <?php if(Session::get('success')): ?>
                    <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                    </div>
                    <?php endif; ?>

                    <?php if(Session::get('fail')): ?>
                    <div class="alert alert-danger">
                    <?php echo e(Session::get('fail')); ?>

                    </div>
                    <?php endif; ?> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-md-offset-3">
            <form id="form" method="post" action="<?php echo e(route('getuserinfo')); ?>">
            <?php echo csrf_field(); ?>
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
                <input type='hidden' name="status" id="status" value="1">
                

                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 col-md-offset-4">
            Dont have account ! <a  href="register" class="create-new-acc">Create new Account</a>
        </div>
    </div>
    <div class="clr"></div>
</div>




   <script>
    jQuery(document).ready(function () {
        
    jQuery('#form').validate({ // initialize the plugin
         
        rules: 
        {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/user/login.blade.php ENDPATH**/ ?>