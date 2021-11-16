
@extends('welcome')

@section('content')
<div class="row profile_inner_co">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 checkout_title">
        Checkout
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-12 profile_inner_wrapper_co">
        @include('checkout.checkoutlink')
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-12 profile_inner_wrapper_content_co"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <h4>Shipping Information</h4>
                    </div>
                </div>
                @if(Session::get('fail'))
                <div class="row failMsg">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12  alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                </div>
                @endif 
               @if(isset($loggedUseraddressInfo)) 
                <div class="row co_info_wrapper">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12   ">
                        <div class="title_cartinfo">Name:</div>
                        <div class="cartinfo_detail"> {{ $loggedUseraddressInfo[0]->name }}</div>
                        <div class="clr"></div>
                    </div>
                </div>

                <div class="row co_info_wrapper">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="title_cartinfo">Address:</div>
                        <div class="cartinfo_detail"> {{ $loggedUseraddressInfo[0]->address }}</div>
                        <div class="cartinfo_detail"> {{ $loggedUseraddressInfo[0]->country_name }}</div>
                        <div class="cartinfo_detail"> {{ $loggedUseraddressInfo[0]->city_name }}</div>
                        <div class="cartinfo_detail"> {{ $loggedUseraddressInfo[0]->shipping_address }}</div>
                        <div class="clr"></div>
                    </div>
                </div>
                <div class="row co_info_wrapper">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12  ">
                    <div class="title_cartinfo">Mobile:</div>
                    <div class="cartinfo_detail"> {{ $loggedUseraddressInfo[0]->mobile }}</div>
                         
                    </div>
                </div>

                <div class="row co_info_wrapper">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12   ">
                         
                        <div class="cartinfo_detail"> 
                            <a href="getupdshipaddress" 
                            class="btn btn-warning btn-block text-center" role="button">Edit</a>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
                @else
               
                <div class="row co_info_wrapper">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12   ">
                         
                        <div class="cartinfo_detail"> 
                            <a href="getupdshipaddress" 
                            class="btn btn-warning btn-block text-center" role="button">Edit</a>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>

                @endif

                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>

<style>

.failMsg{
    margin-top: 30px;
    margin-left:18px !important;
}


</style>


<script type='text/javascript'>
var myLatlng = new google.maps.LatLng(34.20,72.18);
 
var myOptions = { zoom: 13, center: myLatlng}
var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
google.maps.event.addListener(map, 'click', function(event) {
alert(event.latLng);
var geocoder = new google.maps.Geocoder();
 geocoder.geocode({ 'latLng': event.latLng },  (results, status) => {
	      
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
		 document.getElementById("current_address_location").value = results[0].formatted_address ;
		 document.getElementById("google-map-address").style.display  = "none";
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
    document.getElementById("map-canvas").style.display  = "block";
    document.getElementById("google-map-address").style.display  = "block";
    document.getElementById("current_address_location").value  = "";
    document.getElementById("input-google-address").style.display  = "block";
}



</script>


@endsection