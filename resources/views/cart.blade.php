@extends('welcome')

@section('content')
<div class="row heading-cart-listing">
    <div class="col-lg-2 col-md-2 col-sm-2 col-2 ">
        Product
    </div>
    <div class="col-lg-3 col-md-3 col-sm-2 col-2 ">
        Description
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-2 ">
        Price
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-2 ">
        Quantity
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-2 ">
        Subtotal
    </div>
    <div class="col-lg-1 col-md-1 col-sm-2 col-2 ">
        Action
    </div>
</div>
@php $total = 0 @endphp

@if(session('cart'))

    @foreach(session('cart') as $id => $details)
    @php $total += $details['price'] * $details['quantity'] @endphp
    <div data-id="{{ $id }}" class="row heading-cart-listingvalues">
        <div class="col-lg-2 col-md-2 col-sm-2 col-4 prod-img">
        <img class="front-thumbnail" src="{{ URL::to('/') .'/'. AppConstants::IMAGE_THUMB_PATH . $details['thumbnail'] }}"  height="100" class="img-responsive"/>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-2 col-4 text-vcenter prod-title">
        {{ $details['name'] }} 
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-4 text-vcenter ">
        ${{ $details['price'] }}
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-4 text-vcenter ">
        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />

        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-4 text-vcenter ">
        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>

        </div>
        <div class="col-lg-1 col-md-1 col-sm-2 col-4 text-vcenter ">
            <button class="btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
        </div>
    </div>
    @endforeach
    @endif
    <div class="row total-cart">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-right shipping-cost">
        @php
            $ship_cost_val= '';
            $bl_cook_val = Cookie::get('currency');
            if(!isset($bl_cook_val) && ($bl_cook_val) == "")
            {
                $ship_cost = AppConstants::SHIPPING_COST_QAR;
                $ship_currency_type = 'QAR';
            }
            else
            {
                $ship_cost_val = Cookie::get('currency');
                if($ship_cost_val == 'QAR'){
                    $ship_cost = AppConstants::SHIPPING_COST_QAR;
                    $ship_currency_type = 'QAR';
                    
                }else{
                    $ship_cost = AppConstants::SHIPPING_COST_USD;
                    $ship_currency_type = 'USD';
                }
            }
        @endphp
        Shipping Cost : {{ $ship_cost . " " . $ship_currency_type }}
        </div>
    </div>
    <div class="row total-cart">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-right shipping-cost">
            Total ( Including shipping cost) : {{ $total + $ship_cost ." ".$ship_cost_val }}
        </div>
    </div>
    <div class="row total-cart">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-right ">
        <P colspan="5" class="text-right">
            <a href="{{ url('/') }}" class="btn btn-warning1">Continue Shopping</a>
            <a href="{{ url('checkout') }}" class="btn btn-warning1"> Edit Check out Information</a>
            
            <a href="{{ url('placeorder') }}" class="btn btn-warning1"> Checkout</a>
            
        </P>
        </div>
    </div>
 

@endsection

  

@section('scripts')

<script type="text/javascript">
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(ele.parents(".row").find(".quantity").val() < 1){
            alert("Quantity cannot be less than one");
            ele.parents(".row").find(".quantity").val("1")
            return;
        }
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".row").attr("data-id"), 
                quantity: ele.parents(".row").find(".quantity").val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

  

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
        $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents(".row").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection