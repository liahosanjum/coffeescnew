


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Edit Menu Information</h4>
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
                
                <?php if($info_menuitems != '' && $info_menuitems != null): ?>
                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="post" action="<?php echo e(route('menu.update',$info_menuitems->id)); ?>"   id="menuEditForm" name="menuEditForm" >
                                <?php echo csrf_field(); ?>
                                 
                                     

                                    

                                    <div class="form-group">
                                        <label for="">Menu Type</label>
                                        <select class="form-control"  id="menu_id" name="menu_id">
                                             
                                            <?php $__currentLoopData = $baseMenuItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $base_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option    value="<?php echo e($base_item->id); ?>"><?php echo e($base_item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span style="color:red"> <?php $__errorArgs = ["menu_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Parent Menu</label>
                                        <select class="form-control"  id="parent_id" name="parent_id">
                                            <option value="0">Root</option>
                                            <?php $__currentLoopData = $menuitem_pid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_parent_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($info_menuitems->parent_id == $menu_parent_id->id){ echo 'selected=selected'; }   ?>  value="<?php echo e($menu_parent_id->id); ?>"><?php echo e($menu_parent_id->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span style="color:red"> <?php $__errorArgs = ["parent_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" value="<?php echo e($info_menuitems->title); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["title"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Url</label>
                                        <input type="text" name="url" id="url" class="form-control" placeholder="Enter url" value="<?php echo e($info_menuitems->url); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["url"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Target</label>
                                        <select class="form-control"  id="target" name="target">
                                            <option value="_blank">_blank</option>
                                            <option value="_self">_self</option>
                                        </select>
                                        <span style="color:red"> <?php $__errorArgs = ["target"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Order</label>
                                        <input type="text" name="order" id="order" class="form-control" placeholder="Enter order" value="<?php echo e($info_menuitems->order); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["order"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Route</label>
                                        <input type="text" name="route" id="route" class="form-control" placeholder="Enter route" value="<?php echo e($info_menuitems->route); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["route"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                     <div class='clr'></div>
                                     <button type="submit" class='btn'>Update Menu</button>
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
    
        jQuery('#menuEditForm').validate({  
                
            rules: 
            {
                name: {
                    required: true
                },
                display_name: {
                    required: true
                },                       
                
            }
        });
});
</script>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/menu/edit.blade.php ENDPATH**/ ?>