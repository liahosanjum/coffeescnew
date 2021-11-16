


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row profile_inner">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 profile_inner_wrapper">
            <?php echo $__env->make('user.profilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-12 profile_inner_wrapper_content"> 
            <div class="register-page-wrapper page-wrapper">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                            <h4>Placed Orders</h4>
                        </div>
                    </div>
                    

                    <?php if(Session::get('failMyorder')): ?>
                    <div class="row myorder-error">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12  alert alert-danger">
                            <div class="row">
                                <div class="col-lg-12"><?php echo e(Session::get('failMyorder')); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?> 

                    <?php if(count($placedOrders) > 0): ?>
                        <div class="row order-list">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="row order-wrapper">
                                        <div class="col-lg-2">Order ID</div>
                                        <div class="col-lg-4">Number of Items in Order </div>
                                        <div class="col-lg-2">Grand Total </div>
                                        <div class="col-lg-2">Order Status </div>
                                        <div class="col-lg-2">View Orders </div>
                                        <div class='clr'></div>
                                    </div>
                            </div> 
                            
                        </div>
                        
                        <?php $__currentLoopData = $placedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row" >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 " >
                                    <div class="row order-wrapper-list">
                                        <div class="col-lg-2"><?php echo e($order->id); ?> </div>
                                        <div class="col-lg-4"><?php echo e($order->total); ?> </div>
                                        <div class="col-lg-2"><?php echo e($order->total_amount); ?> </div>
                                        <div class="col-lg-2">
                                            <?php
                                                if($order->order_status == 1){
                                                    $or_status = 'Processing';
                                                }
                                                elseif($order->order_status == 2)
                                                {
                                                    $or_status = 'Shipping';
                                                }
                                                elseif($order->order_status == 3)
                                                {
                                                    $or_status = 'Delivered';
                                                }
                                                elseif($order->order_status == 0)
                                                {
                                                    $or_status = 'Cancelled';
                                                }
                                                else
                                                {
                                                    $or_status = '------';
                                                }
                                                
                                            ?>
                                            <?php echo e($or_status); ?>

                                        </div>
                                        
                                        <div class="col-lg-2"><a href="<?php echo e(route('orderdetails', $order->id)); ?>">View Orders</a></div>
                                    <div class='clr'></div>
                                    </div>
                            </div>
                            
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                
                    <div class='clr'></div>
                </div>
        </div>
        <div class="clr"></div>
    </div> 
</div>       
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/user/myorder.blade.php ENDPATH**/ ?>