<!-- STICKY HEADER DISABLED-->
<!--<header class="main-header clearfix" data-sticky_header="true">-->
<header class="main-header clearfix"data-sticky_header="false">
    <div class="sticky-wrapper">
        <section class="header-wrapper navgiation-wrapper">
                <div class="container">
                    <div class="headerSection">
                        <?php echo $__env->make('header/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php
                            $menuHelper = createMenuItemHelper();
                            ///print_r($menuHelper);
                        
                        ?>
                         
                        <div style="clear:both"></div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="fluid-container nopadding bgcolor">
                    <div class="container">
                        <div class="header-mainmenu-wrapper row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="topnav" id="myTopnav">
                                
                              <?php $__currentLoopData = $menuHelper; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $child_Menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php if(count($child_Menu)>1): ?>
                                        <div class="dropdown-menu-resp">
                                            <button class="dropbtn"> <?php echo e($child_Menu[0]->title); ?>

                                              <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-menu-resp-content">
                                                <?php $__currentLoopData = $child_Menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_ChildMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                    <?php if($key > 0): ?> 
                                                      <a href="<?php echo e(url($sub_ChildMenu['url'])); ?>"><?php echo e($sub_ChildMenu['title']); ?></a>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                     <a href='<?php echo e(url($child_Menu[0]->url)); ?>'>   <?php echo e($child_Menu[0]->title); ?> </a>
                                    <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
        </section>
    </div>
</header> <!-- end main-header  -->
 
<style>
 

 
 
 
 
 
 
 </style>
   
 
  
  
 <script>
 function myFunction() {
   var x = document.getElementById("myTopnav");
   if (x.className === "topnav") {
     x.className += " responsive";
   } else {
     x.className = "topnav";
   }
 }
 </script>
  <?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/header/skicky-header.blade.php ENDPATH**/ ?>