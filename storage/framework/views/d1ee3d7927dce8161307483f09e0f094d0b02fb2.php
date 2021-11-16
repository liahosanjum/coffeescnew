


<?php $__env->startSection('content'); ?>

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        <?php echo $__env->make('auth.admin.adminprofilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Product Information</h4>
                       
                    </div>
                </div>
                <?php if(Session::get('successPMsg')): ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-success admin-alert">
                           
                        <?php echo e(Session::get('successPMsg')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(Session::get('failPMsg')): ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger admin-alert">
                           
                        <?php echo e(Session::get('failPMsg')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
                

                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="post" action="<?php echo e(route('saveproduct')); ?>" enctype="multipart/form-data"  id="productForm" name="productForm" >
                                <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="">Product Name<span class="red">*</span></label>
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
                                        <label for="">SKU<span class="red">*</span></label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="Enter SKU" value="<?php echo e(old('sku')); ?>" />
                                    <span style="color:red"> <?php $__errorArgs = ["sku"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Description<span class="red">*</span></label>
                                        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description" value="<?php echo e(old('description')); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = ["description"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Product Image<span class="red">*</span></label>
                                        <input type="file" class="form-control" name="base_image" id="base_image" value="<?php echo e(old('base_image')); ?>"  >
                                        <span style="color:red"> <?php $__errorArgs = ["base_image"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                    <?php $i=0;?>
                                    <?php $__currentLoopData = $currencyListAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currencyData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                        <label for=""><?php echo e($currencyData->code); ?> Price <span class="red">*</span> </label>
                                        <?php      $val = "priceList.".$i; ?>
                                        <input type="text" name="priceList[<?php echo e($i); ?>]" id="price_<?php echo e($currencyData->code); ?>" class="form-control" placeholder="Enter Price" value="<?php echo e(old('price_'.$currencyData->code)); ?>" />
                                        <span style="color:red"> <?php $__errorArgs = [$val];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        <input type="hidden"  name="currency[]" id="currency_<?php echo e($currencyData->code); ?>" value="<?php echo e($currencyData->id); ?>"  >
                                    </div>
                                    <?php $i++;?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-group">
                                        <label for="">Status <span class="red">*</span></label>
                                        <select id="status" name="status">
                                            <option value="Active">Active</option>
                                            <option value="InActive">In-Active</option>
                                        </select>
                                        
                                    </div>
                                     
                                    <div class="form-group">
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Additional Images</label>
                                    </div>

                                    <div class="form-group">
                                        <hr>
                                    </div>
                                    <div id="product_wrapper_inner" >
                                        <div class="product_details" id="product_details_rows_1">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 1</label>
                                                    <input type="file" name="additional_image[]" id="image_1" value="<?php echo e(old('image_1')); ?>"  >
                                                    <span style="color:red"><?php $__errorArgs = ["image_1"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_details" id="product_details_rows_2">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 2</label>
                                                    <input type="file" name="additional_image[]" id="image_2" value="<?php echo e(old('image_2')); ?>"  >
                                                    <span style="color:red"><?php $__errorArgs = ["image_2"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_details" id="product_details_rows_3">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 3</label>
                                                    <input type="file" name="additional_image[]" id="image_3" value="<?php echo e(old('image_3')); ?>"  >
                                                    <span style="color:red"><?php $__errorArgs = ["image_3"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_details" id="product_details_rows_3">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 4</label>
                                                    <input type="file" name="additional_image[]" id="image_4" value="<?php echo e(old('image_4')); ?>"  >
                                                    <span style="color:red"><?php $__errorArgs = ["image_4"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='clr'></div>
                                    </div>
                                    
                                    
                                    <div class='clr'></div>
                                        <button type="submit" class='btn'>Add Product</button>
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
                    
                jQuery('#productForm').validate({ // initialize the plugin
                     
                    rules: 
                    {
                        name: {
                            required: true
                        },
                        sku: {
                            required: true
                        },
                        description: {
                            required: true
                        },
                        base_image: {
                            required: true
                        },
                        'priceList[0]': {
                            required: true
                        }, 
                        'priceList[1]': {
                            required: true
                        },
                        status: {
                            required: true
                        }
                        
                    }
                });
            });
            </script>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.admin.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/addproduct.blade.php ENDPATH**/ ?>