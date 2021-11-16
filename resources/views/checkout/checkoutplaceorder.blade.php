
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
                    <h4>Place Order</h4>
                </div>
            </div>
            <div class='clr'></div>
        </div>
    </div>
    <div class="clr"></div>
</div>
@endsection