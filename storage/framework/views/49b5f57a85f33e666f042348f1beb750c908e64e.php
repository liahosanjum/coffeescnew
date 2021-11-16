


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
                            <h4>Orders Details</h4>
                        </div>
                    </div>
                    <?php if(Session::get('successPMsg')): ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12   alert alert-success">
                            <?php echo e(Session::get('successPMsg')); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if(Session::get('failPMsg')): ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12  alert alert-danger">
                            <?php echo e(Session::get('failPMsg')); ?>

                        </div>
                    </div>
                    <?php endif; ?> 
                    
                    <div class="row order-list">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="row order-detail-wrapper">
                                    <div class="col-lg-2">Order ID</div>
                                    <div class="col-lg-2">Name </div>
                                    <div class="col-lg-2">Price </div>
                                    <div class="col-lg-2">Quantity </div>
                                    
                                    <div class="col-lg-2">Thumbnail </div>
                                    <div class="col-lg-2">Order Status </div>
                                <div class='clr'></div>
                                </div>
                        </div> 
                        
                    </div>
                    <?php $__currentLoopData = $placedOrdersDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row" >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 " >
                                <div class="row order-detail-wrapper-list">
                                    <div class="col-lg-2"><?php echo e($order->id); ?> </div>
                                    <div class="col-lg-2"><?php echo e($order->name); ?> </div>
                                    <div class="col-lg-2"><?php echo e($order->amount); ?> </div>
                                    <div class="col-lg-2"><?php echo e($order->quantity); ?> </div>
                                    <div class="col-lg-2"><img  src="<?php echo e(URL::to('/')); ?>/<?php echo e(AppConstants::IMAGE_THUMB_PATH); ?><?php echo e($order->thumbnail); ?>" > </div>
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
                                    
                                    
                                <div class='clr'></div>
                                </div>
                        </div>
                        
                    </div>
                    <?php 
                        $grand_total = $order->total_amount;  
                        $curr_currency = $order->code;
                        $shipping_cost = $order->shipping_cost;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div  class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row ">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12 offset-lg-7 offset-md-7 grand-totla">Included Shipping Cost :<?php echo e($shipping_cost); ?> <?php echo e($curr_currency); ?></div>
                            </div>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row ">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12 offset-lg-7 offset-md-7 grand-totla">Grand Total: <?php echo e($grand_total .' '. $curr_currency); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class='clr'></div>
                    
                </div>
        </div>
        <div class="clr"></div>
    </div>
</div>       
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/orders/orderdetails.blade.php ENDPATH**/ ?>