


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Edit Pages Information</h4>
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
                
                <?php if($info_pages != '' && $info_pages != null): ?>
                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('pages.update',$info_pages->id)); ?>"   id="pageEditForm" name="pageEditForm" >
                                <?php echo csrf_field(); ?>
                                 <?php echo e(method_field('PUT')); ?>

                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter name" value="<?php echo e($info_pages->title); ?>" />
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
                                        <label for="">Excerpt</label>
                                        
                                        <textarea  type="text" name="excerpt" id="excerpt" class="form-control" placeholder="Enter Excerpt"   >
                                        <?php echo e($info_pages->excerpt); ?>

                                        </textarea>
                                        <span style="color:red"> <?php $__errorArgs = ["excerpt"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Body</label>
                                        
                                        <textarea  type="text" name="body" id="body" class="ckeditor form-control" placeholder="Enter Body Text"   >
                                        <?php echo e($info_pages->body); ?>

                                        </textarea>
                                        <span style="color:red"> <?php $__errorArgs = ["body"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    
 

                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Enter Image" value="<?php echo e($info_pages->image); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["image"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug" value="<?php echo e($info_pages->slug); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["slug"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Meta Description</label>
                                        <input type="text" name="meta_description" id="meta_description" class="form-control" placeholder="Enter Meta Description" value="<?php echo e($info_pages->meta_description); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["meta_description"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Enter Meta Description" value="<?php echo e($info_pages->meta_keywords); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["meta_keywords"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select id="status" name="status">
                                            <option value="">Select Status</option>
                                            <option <?php if($info_pages->status == 'ACTIVE') {  echo 'selected="selected"'; } ?>  value="ACTIVE">Active</option>
                                            <option  <?php if($info_pages->status == 'INACTIVE') {  echo 'selected="selected"'; } ?> value="INACTIVE">IN-Active</option>
                                        </select>
                                        
                                         <span style="color:red"> <?php $__errorArgs = ["status"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    
                                     <div class='clr'></div>
                                        <button  type="submit" class='btn'>Update</button>
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
    

    jQuery('#pageEditForm').validate({ 
        ignore: [],
        rules: 
        {
            title: {
                required: true
            },
            excerpt: {
                required: true
            },
            body: {
                ckrequired: true
            },
            slug: {
                required: true
            },
           
            meta_description: {
                required: true
            },
            meta_keywords: {
                required: true 
            },
            status: {
                required: true
            },
        }
    });
     
    jQuery.validator.addMethod('ckrequired', function (value, element, params) {
    var idname = jQuery(element).attr('id');
    var messageLength =  jQuery.trim ( CKEDITOR.instances[idname].getData() );
    return !params  || messageLength.length !== 0;
}, "This field is required.");
    


    jQuery('.ckeditor').ckeditor();
});
</script>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/pages/edit.blade.php ENDPATH**/ ?>