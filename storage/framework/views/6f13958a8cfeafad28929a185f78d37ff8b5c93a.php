


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Add Role Information</h4>
                    </div>
                </div>
                <?php if(Session::get('successMsg')): ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-success admin-alert">
                           
                        <?php echo e(Session::get('successMsg')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(Session::get('failMsg')): ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger admin-alert">
                           
                        <?php echo e(Session::get('failMsg')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
                

                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="post" action="<?php echo e(route('roles.store')); ?>"   id="roleForm" name="roleForm" >
                                <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="">Role Name</label>
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
                                        <label for="">Display Name</label>
                                        <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Enter display name" value="<?php echo e(old('display_name')); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["display_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                    <div class='clr'></div>
                                    <button type="submit" class='btn'>Add Role</button>
                                </form>
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
<style>
 
</style>



<script>
                
                jQuery(document).ready(function () {
                    
                jQuery('#roleForm').validate({ // initialize the plugin
                     
                    rules: 
                    {
                        name: {
                            required: true
                        },
                        display_name: {
                            required: true
                        }
                    }
                });
            });
            </script>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/role/create.blade.php ENDPATH**/ ?>