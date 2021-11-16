

   
     
<?php $__env->startSection('content'); ?>

    

<div class="row">

    <?php $__currentLoopData = $products_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  

    <?php
    //print_r($product);
    //exit;
    ?>

        <div class="col-lg-3 col-md-3 col-sm-6 col-12 ">

            <div class="thumbnail">

                <div class="product-image"><a href="<?php echo e(route('product.detail',$product->id)); ?>"><img width="200" height="300"  src="<?php echo e(URL::to('/')); ?>/<?php echo e(AppConstants::IMAGE_PATH); ?><?php echo e($product->image); ?>" ></a></div>

                <div class="caption">

                    <h4 class="product-title"><a href="<?php echo e(route('product.detail',$product->id)); ?>"><?php echo e($product->name); ?></a></h4>

                    <!--<p class="product-description"><?php echo e($product->description); ?></p>-->

                    <p class="product-price"><strong>Price: </strong> <?php echo e($product->item_price); ?> <?php echo e($product->code); ?> </p>

                    <p class="btn-holder"><a href="<?php echo e(route('add.to.cart', $product->id)); ?>" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>

                </div>
                <div class="clr"></div>

            </div>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/products.blade.php ENDPATH**/ ?>