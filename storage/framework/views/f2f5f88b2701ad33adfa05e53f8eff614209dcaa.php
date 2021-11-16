


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Edit Permissions Information</h4>
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
                
                <?php if($info_assignedperm_roles != '' && $info_assignedperm_roles != null): ?>
                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="POST" action="<?php echo e(route('assignpermrole.update',$info_assignedperm_roles[0]->permrole_id)); ?>"   id="permroleassignEditForm" name="permroleassignEditForm" >
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('PUT')); ?>

                                    <div class="form-group">
                                        <label for="">Permission Name </label>
                                        <select class="form-control"  id="permission_id" name="permission_id">
                                          <?php $__currentLoopData = $perm_users_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                 <option <?php if( $info_assignedperm_roles[0]->id == $perm_user->id ) { echo 'selected=selected'; } ?>  value="<?php echo e($perm_user->id); ?>"><?php echo e($perm_user->key); ?> </option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span style="color:red"> <?php $__errorArgs = ["permission_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="">Assign To Role </label>
                                        <select class="form-control"  id="role_id" name="role_id">
                                          <?php $__currentLoopData = $info_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inforoles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                 <option <?php if( $info_assignedperm_roles[0]->role_id == $inforoles->id ) { echo 'selected=selected'; } ?>  value="<?php echo e($inforoles->id); ?>"><?php echo e($inforoles->name); ?> </option>
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
                <?php endif; ?>
                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>        
 



<script>
                
                jQuery(document).ready(function () {
                    
                jQuery('#permroleassignEditForm').validate({ // initialize the plugin
                     
                    rules: 
                    {
                        permission_id: {
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
<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/assignpermrole/edit.blade.php ENDPATH**/ ?>