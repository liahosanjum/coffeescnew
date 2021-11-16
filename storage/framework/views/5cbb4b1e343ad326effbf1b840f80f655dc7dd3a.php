


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row prod-heading">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 listing-title">
                        <h4>Permissions Assigned To Roles</h4>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 add-listing">
                        <div class="btn-wrapper"><a class="btn-admin" href="<?php echo e(route('assignpermrole.create')); ?>">Add Permission to Role</a></div>
                    </div>
                </div>
                <?php if(Session::get('successPMsg')): ?>
                <div class="row prod-heading">
                    <div class="col-lg-11 col-md-12 col-sm-12 col-12   alert alert-success">
                        <?php echo e(Session::get('successPMsg')); ?>

                    </div>
                </div>
                <?php endif; ?>

                <?php if(Session::get('failPMsg')): ?>
                <div class="row prod-heading">
                    <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger">
                        <?php echo e(Session::get('failPMsg')); ?>

                    </div>
                </div>
                <?php endif; ?> 
                
                 

                
                <?php if($permission_assigned_roles_all != null || $permission_assigned_roles_all != ""): ?>  

                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list  pr-det-wrapper-inner">
                        <div class="row prod-admin-title-info">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">Permission ID</div>
                            <div class="col-lg-4 col-md-3 col-sm-6 col-12">Permission Name</div>
                            <div class="col-lg-3 col-md-1 col-sm-6 col-12">Assigned To Role</div>
                            
                            <div class="col-lg-3 col-md-2 col-sm-6 col-12">Action</div>
                            <div class='clr'></div>
                        </div>
                        <div class='clr'></div>
                    </div>
                </div>

           
                <?php $__currentLoopData = $permission_assigned_roles_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_assignedto_roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list-roles">
                       <div class="row prod-admin-info_role">
                           <div class="col-lg-2 col-md-3 col-sm-6 col-12"><?php echo e($permission_assignedto_roles->id); ?></div>
                           
                           <div class="col-lg-4 col-md-1 col-sm-6 col-12"><?php echo e($permission_assignedto_roles->key); ?></div>
                           <div class="col-lg-3 col-md-1 col-sm-6 col-12"><?php echo e($permission_assignedto_roles->role_name); ?></div>
                           <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="row prod-detal-link">
                                    <div class="col-lg-4 col-md-2 col-sm-2 col-3">
                                        <a href="<?php echo e(route('assignpermrole.edit',$permission_assignedto_roles->permrole_permission_id)); ?>"><i class="fa fa-edit" ></i></a>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                                        <span></span>
                                    </div>
                                    <div data-id="<?php echo e($permission_assignedto_roles->id); ?>" class="adminn-del col-lg-4 col-md-2 col-sm-2 col-3">
                                        <!--<a class="remove-from-role" href="<?php echo e(route('roles.delete',$permission_assignedto_roles->key)); ?>"><i class="fa fa-trash-o"></i></a>-->
                                    </div>
                                    
                                    <div class='clr'></div>
                                </div>
                           </div>
                           <div class='clr'></div>
                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        

                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>        
 
<script>
jQuery(document).ready(function(){
    jQuery(".remove-from-role").click(function (e) 
    {
        return;
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            jQuery.ajax({
                url: '<?php echo e(route('roles.delete')); ?>',
                method: "DELETE",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>', 
                    id: ele.parents(".adminn-del").attr("data-id")
                },
                success: function (response) {
                    alert(response);
                    window.location.reload();
                }
            });
        }
    });
});
    
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/assignpermrole/index.blade.php ENDPATH**/ ?>