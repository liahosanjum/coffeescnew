


<?php $__env->startSection('content'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdwwh3iMja7sBIe1Q-fOJSVvZiof3adRw&language=en&region=SA"></script>

<div class="container">
    <div class="row profile_inner">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 profile_inner_wrapper">
            <?php echo $__env->make('user.profilelink', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-12 profile_inner_wrapper_content"> 
            <div class="register-page-wrapper page-wrapper">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                            <h4>Shipping Information</h4>
                        </div>
                    </div>
                    <?php if(Session::get('successPMsg')): ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12  alert alert-success">
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
                    

                    
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                             
                            <form method="post" id="form" name="form" action="<?php echo e(route('updateShippingAddress')); ?>">
                            <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <?php 
                                        if(!isset($loggedUserdetailInfo->address)) {
                                            $loggedUserAddress = "";
                                        }
                                        else
                                        {
                                            $loggedUserAddress = $loggedUserdetailInfo->address;
                                        }
                                    
                                    ?>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="<?php echo e($loggedUserAddress); ?>" />
                                <span style="color:red"> <?php $__errorArgs = ["address"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>

                                <div class="form-group">Country</label>
                                    <?php 
                                        if(!isset($loggedUserdetailInfo->country_id)) {
                                            $loggedUserCountry = "";
                                        }
                                        else
                                        {
                                            $loggedUserCountry = $loggedUserdetailInfo->country_id;
                                        }
                                    
                                    ?>
                                    <select class="form-control" name="country" id="country">
                                        <option value="">Select Country</option>
                                        <?php $__currentLoopData = $country_list_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($loggedUserCountry == $country->id){ echo "selected=selected"; }?> value="<?php echo e($country->id); ?>"><?php echo e($country->country_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color:red"> <?php $__errorArgs = ["country"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    
                                </div>

                                    <div class="form-group">City</label>
                                        <select class="form-control" name="city" id="city">
                                            <option value="">Select City</option>
                                        </select>
                                        <span style="color:red"> <?php $__errorArgs = ["city"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                



                                <div class=" co_info_wrapper">
                                    <div class="location_wrapper">
                                        <div class="cartinfo_detail"> 
                                            <span  onclick="showMap()"
                                            class="btn btn-warning btn-block text-center" role="button">Add Location Address</span>
                                        </div>
                                        <div class="clr"></div>
                                    </div>
                                </div>

                                <div class="google_mp_wrapper">
                                    <div class="row co_info_wrapper" style="display: none;" id="input-google-address">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12" >
                                            Shipping Address 
                                            <input class="inp-g-adress"   readonly="readonly" 
                                            type="text" id="current_address_location" name="current_address_location"  value="">
                                        </div>
                                    </div>

                                    <div class="row co_info_wrapper" id="google-map-address" style="display: none;">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12   ">
                                            <div class="cartinfo_detail"> 
                                                <div id="map-canvas" style="display: none;"  name="map-canvas" width="200" height="400"></div>
                                                <div class="get-location">
                                                    <span  onclick="confirm()"
                                                    class="btn btn-warning btn-block inp-g-adress-btn text-center " 
                                                    role="button">Confirm Location</span>
                                                    <span  onclick="cancel()"
                                                    class="btn btn-warning btn-block inp-g-adress-btn text-center " 
                                                    role="button">Cancel</span>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                            
                                            <div class="clr"></div>
                                        </div>
                                    </div>
                                </div>














                                <button type="submit" class='btn'>Update</button>
                                </form>
                                <div class='clr'></div>
                        </div>
                        <div class='clr'></div>
                    </div>
                    <div class='clr'></div>
                </div>
        </div>
        <div class="clr"></div>
    </div>
</div>


            
                 
            

 <style>
    /* .profile_inner{
         border: 1px solid #4e4e4e;
     }
     .profile_links {
         float: left;
         height: 30px;
         width: 100%;
         border-bottom: 1px solid #4e4e4e;
     }
     .profile_links_details{
         float:left;
     }
     .profile_inner_wrapper{
         float: left;
     }
     .profile_inner_wrapper {
         border-right: 1px solid #4e4e4e;
         margin-top:30px;
         margin-bottom: 30px;
     }*/
.google_mp_wrapper{
    border: 1px solid ;
    float: left;
}
 </style>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            
        jQuery('select[name="country"]').on('change',function(){
               var countryID = jQuery(this).val();
                
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'http://localhost/coffeesc/getcities/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="city"]').empty();
                        jQuery.each(data, function(key,value){
                           jQuery('select[name="city"]').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  jQuery('select[name="city"]').empty();
               }
            });

            ////////////////////////////

            jQuery(function(){

               var countryID = jQuery('select[name="country"]').val();
               
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'http://localhost/coffeesc/getcities/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="city"]').empty();
                        jQuery.each(data, function(key,value){
                           jQuery('select[name="city"]').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  jQuery('select[name="city"]').empty();
               }
            });
    });
    </script>



<script type='text/javascript'>
var myLatlng = new google.maps.LatLng(34.20,72.18);
var myOptions = { zoom: 13, center: myLatlng}
var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
google.maps.event.addListener(map, 'click', function(event) {
var geocoder = new google.maps.Geocoder();
 geocoder.geocode({ 'latLng': event.latLng },  (results, status) => {
	      
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        if (status == google.maps.GeocoderStatus.OK) {
		 document.getElementById("current_address_location").value = results[0].formatted_address ;
		 console.log(results);
            var address = (results[0].formatted_address);
        }
    });
 
    });
	
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
  
}


function showPosition(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  map.setCenter(new google.maps.LatLng(lat, lng));
}



function showMap(){

    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
    document.getElementById("map-canvas").style.display  = "block";
    document.getElementById("google-map-address").style.display  = "block";
    document.getElementById("current_address_location").value  = "";
    document.getElementById("input-google-address").style.display  = "block";
}

function confirm(){
    document.getElementById("google-map-address").style.display  = "none";
}

function cancel(){
    document.getElementById("current_address_location").value  = "";
    document.getElementById("input-google-address").style.display  = "none";
    document.getElementById("google-map-address").style.display  = "none";
}

jQuery(document).ready(function () {
        
        jQuery('#form').validate({ // initialize the plugin
             
            rules: 
            {
                address: {
                    required: true
                    
                },
                country: {
                    required: true
                },
                city: {
                    required: true
                    
                }

            }
        });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\coffeesc\resources\views/user/address.blade.php ENDPATH**/ ?>