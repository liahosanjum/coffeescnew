


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Assign Role To Admin Users</h4>
                    </div>
                </div>
                <?php if(Session::get('successMsg')): ?>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
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
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
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
                                <form method="POST" action="<?php echo e(route('assignrole.store')); ?>"   id="roleassignForm" name="roleassignForm" >
                                    <?php echo csrf_field(); ?>
                                     
                                    <div class="form-group">
                                        <label for="">Admin User</label>
                                        <select class="form-control"  id="admin_id" name="admin_id">
                                          <?php $__currentLoopData = $admin_users_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                 <option   value="<?php echo e($admin_user->id); ?>"><?php echo e($admin_user->name); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span style="color:red"> <?php $__errorArgs = ["admin_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="">Assign Role </label>
                                        <select class="form-control"  id="role_id" name="role_id">
                                          <?php $__currentLoopData = $info_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inforoles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                            <option   value="<?php echo e($inforoles->id); ?>"><?php echo e($inforoles->name); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span style="color:red"> <?php $__errorArgs = ["role_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                     <div class='clr'></div>
                                        <button type="submit" class='btn'>Update</button>
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
 



<script>
                
                jQuery(document).ready(function () {
                    
                jQuery('#roleassignForm').validate({ // initialize the plugin
                     
                    rules: 
                    {
                        admin_id: {
                            required: true
                        },
                        role_id: {
                            required: true
                        },                       
                       
                    }
                });
            });
            </script>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/assignroles/create.blade.php ENDPATH**/ ?>