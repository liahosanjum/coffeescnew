<html>
    <head>
        <title>CoffeeSC- <?php echo $__env->yieldContent('title'); ?></title>
        <!--<link rel="stylesheet" href="<?php echo e(asset('/css/font-awesome.min.css')); ?>" type="text/css">-->
        <script src="<?php echo e(asset('/js/jquery-3.3.1.min.js')); ?> "></script>
        <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.css')); ?>" type="text/css" >
         
        
        <script src="<?php echo e(asset('/js/popper.min.js')); ?> "></script>
        <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?> "></script>

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
         <script src="<?php echo e(asset('/js/jquery.validate.min.js')); ?>"></script>
         <script src="<?php echo e(asset('/js/additional-methods.min.js')); ?>"></script>
         <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
         
    </head>
    <body>
        <div class="container-fluid nopadding">
            <!-- HEADER CONTENTS STARTS HERE -->
            <div class="topHeaderMenu">
                <?php echo $__env->make('auth/admin/header/admintopheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
             
            <!-- HEADER CONTENTS ENDS HERE -->
            
              

            <!-- MIDDLE CONTENT STARTS HERE -->
            <div class="wrapper-container">
                <div class="container top-bottom-content-margin">
                     
                    <div class="contert-wrapper">
                        <?php echo $__env->yieldContent('content'); ?>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </div>
            <!-- MIDDLE CONTENT ENDS HERE -->

            <!-- FOOTER SECTION STARTS HERE  -->
            <div class="footerSection">
                <?php echo $__env->make('auth/admin/footer/adminfooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
    </div>  
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
 <?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/auth/admin/adminlayout.blade.php ENDPATH**/ ?>