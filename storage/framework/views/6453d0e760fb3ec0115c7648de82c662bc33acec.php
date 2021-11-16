


<?php $__env->startSection('content'); ?>

<div class="page_inner">
     

    <div class="profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper-static">
                
                <?php if(Session::get('successPageMsg')): ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-success admin-alert">
                                <?php echo e(Session::get('successPageMsg')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(Session::get('failPageMsg')): ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger admin-alert">
                                <?php echo e(Session::get('failPageMsg')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
                
                <?php if($info_pages != '' && $info_pages != null): ?>
                
                        <div class="row page-image-info">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 page-image">
                                <img class="front-image"  src="<?php echo e(URL::to('/') .'/'. AppConstants::IMAGE_PATH_PAGE . $info_pages[0]->image); ?>" >
                            </div>
                        </div> 

                        <div class="row page-title-info">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12 page-title">
                                <h4><?php echo e($info_pages[0]->title); ?></h4>
                            </div>
                        </div>
                        <div class="row page-body-info">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 page-body">
                               <?php echo $info_pages[0]->body  ?>
                            </div>
                        </div> 
                <?php endif; ?>
                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>        

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/pages/index.blade.php ENDPATH**/ ?>