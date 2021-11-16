@extends('welcome')

   
   
@section('content')

    

<div class="row">

    

        <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="product-detail-image">
                        <div class="product-image"><img id="cart-detail-image" src="{{ URL::to('/') }}/{{ AppConstants::IMAGE_PATH }}{{ $product['image'] }}" alt=""></div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        
                        
                            @foreach($imagesDetails as $additionalImage)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12 ">
                                <div class="product-image">
                                        <img onmouseover=changeImage("{{ URL::to('/') .'/'. AppConstants::IMAGE_DETAIL_PATH . $additionalImage['detail_image'] }}") class="front-thumbnail" src="{{ URL::to('/') .'/'. AppConstants::IMAGE_THUMB_DETAIL_PATH . $additionalImage['detail_thumbnail'] }}" alt="">
                                </div>
                            </div>
                            @endforeach
                       
                        
                         
                        <div class="clr"></div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">

            <div class="product-detail">
                <div class="caption-detail">
                    <h4 class="product-title-detail">{{ $product['name'] }}</h4>
                    <p class="product-description">
                      <strong>Description:</strong> <br>  
                        {{ $product['description'] }}
                    </p>
                    
                    <p class="product-price"><strong>Price: </strong> {{ $product['price'] }} {{ $product['price_code'] }}</p>
                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product['id']) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
                <div class="clr"></div>

            </div>

        </div>

     

</div>
@endsection


@section('scripts')


@section('scripts')

<script type="text/javascript">
 
  

    $(".update-cart-productdetails").change(function (e) {

        e.preventDefault();

        alert("testing")

        var ele = $(this);

  

        $.ajax({

            url: '{{ route('update.cart') }}',

            method: "patch",

            data: {

                _token: '{{ csrf_token() }}', 

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

@endsection
