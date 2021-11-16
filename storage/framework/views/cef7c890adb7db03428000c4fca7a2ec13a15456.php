<html>
    <head>
        <title>CoffeeSC- <?php echo $__env->yieldContent('title'); ?></title>
        <!--<link rel="stylesheet" href="<?php echo e(asset('/css/font-awesome.min.css')); ?>" type="text/css">-->
        <script src="<?php echo e(asset('/js/jquery-3.3.1.min.js')); ?> "></script>
         
        <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.css')); ?>" type="text/css" >
        <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>" type="text/css" >
        
        <script src="<?php echo e(asset('/js/popper.min.js')); ?> "></script>
        <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?> "></script>

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
         <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
         <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    </head>
    <body>
        <div class="container-fluid nopadding" style="float:left;  width:100%;">
            <!-- HEADER CONTENTS STARTS HERE -->
            <div class="topHeaderMenu">
                <?php echo $__env->make('header/topheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="topHeaderMenusticky">
                <?php echo $__env->make('header/skicky-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- HEADER CONTENTS ENDS HERE -->
            
              

            <!-- MIDDLE CONTENT STARTS HERE -->
            <div class="wrapper-container">
                <div class="container top-bottom-content-margin">
                    <!-- CART START MESSAGE -->
                    <!--<div class="container">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                            </div> 
                        <?php endif; ?>
                    </div>-->
                    <!-- END CART -->
                    <div class="contert-wrapper" style="float:left;">
                        <?php echo $__env->yieldContent('content'); ?>
                        <div style="clear:both"></div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="clr"></div>
            </div>
            <!-- MIDDLE CONTENT ENDS HERE -->

            <!-- FOOTER SECTION STARTS HERE  -->
            <div class="footerSection">
                <?php echo $__env->make('footer/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
    </div>  
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
 <?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/welcome.blade.php ENDPATH**/ ?>