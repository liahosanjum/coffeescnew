

   
   
<?php $__env->startSection('content'); ?>

    

<div class="row">

    

        <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="product-detail-image">
                        <div class="product-image"><img id="cart-detail-image" src="<?php echo e(URL::to('/')); ?>/<?php echo e(AppConstants::IMAGE_PATH); ?><?php echo e($product['image']); ?>" alt=""></div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        
                        
                            <?php $__currentLoopData = $imagesDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12 ">
                                <div class="product-image">
                                        <img onmouseover=changeImage("<?php echo e(URL::to('/') .'/'. AppConstants::IMAGE_DETAIL_PATH . $additionalImage['detail_image']); ?>") class="front-thumbnail" src="<?php echo e(URL::to('/') .'/'. AppConstants::IMAGE_THUMB_DETAIL_PATH . $additionalImage['detail_thumbnail']); ?>" alt="">
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        
                         
                        <div class="clr"></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">

            <div class="product-detail">
                <div class="caption-detail">
                    <h4 class="product-title-detail"><?php echo e($product['name']); ?></h4>
                    <p class="product-description">
                      <strong>Description:</strong> <br>  
                        <?php echo e($product['description']); ?>

                    </p>
                    
                    <p class="product-price"><strong>Price: </strong> <?php echo e($product['price']); ?> <?php echo e($product['price_code']); ?></p>
                    <p class="btn-holder"><a href="<?php echo e(route('add.to.cart', $product['id'])); ?>" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
                <div class="clr"></div>

            </div>

        </div>

     

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>


<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
 
  

    $(".update-cart-productdetails").change(function (e) {

        e.preventDefault();

        alert("testing")

        var ele = $(this);

  

        $.ajax({

            url: '<?php echo e(route('update.cart')); ?>',

            method: "patch",

            data: {

                _token: '<?php echo e(csrf_token()); ?>', 

                id: ele.parents("tr").attr("data-id"), 

                quantity: ele.parents("tr").find(".quantity").val()

            },

            success: function (response) {

               window.location.reload();

            }

        });

    });

  
 
function changeImage(id){
    //alert(id);
    document.getElementById("cart-detail-image").src=id;
}

  

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/productdetail.blade.php ENDPATH**/ ?>