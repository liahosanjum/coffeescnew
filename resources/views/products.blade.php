@extends('welcome')

   
     
@section('content')

    

<div class="row">

    @foreach($products_all as $product)
  

    @php
    //print_r($product);
    //exit;
    @endphp

        <div class="col-lg-3 col-md-3 col-sm-6 col-12 ">

            <div class="thumbnail">

                <div class="product-image"><a href="{{ route('product.detail',$product->id) }}"><img width="200" height="300"  src="{{ URL::to('/') }}/{{ AppConstants::IMAGE_PATH }}{{ $product->image }}" ></a></div>

                <div class="caption">

                    <h4 class="product-title"><a href="{{ route('product.detail',$product->id) }}">{{ $product->name }}</a></h4>

                    <!--<p class="product-description">{{ $product->description }}</p>-->

                    <p class="product-price"><strong>Price: </strong> {{ $product->item_price }} {{ $product->code }} </p>

                    <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>

                </div>
                <div class="clr"></div>

            </div>

        </div>

    @endforeach

</div>

    

@endsection