
@extends('auth.admin.adminlayout')

@section('content')

<div class="row profile_inner">
    <div class="col-lg-3 col-md-3 col-sm-12 col-12 profile_inner_wrapper">
    @include('auth.admin.adminprofilelink')
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <h4>Orders Details</h4>
                    </div>
                </div>
                @if(Session::get('successPMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12   alert alert-success">
                        {{ Session::get('successPMsg')}}
                    </div>
                </div>
                @endif

                @if(Session::get('failPMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12  alert alert-danger">
                        {{ Session::get('failPMsg')}}
                    </div>
                </div>
                @endif 
                
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
                @foreach($placedOrdersDetails as $order)
                <div class="row"> 
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="row  row-wrapper-ifno" >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 " >
                                    <div class="row order-detail-wrapper-list">
                                        <div class="col-lg-2">{{$order->id}} </div>
                                        <div class="col-lg-2">{{$order->name}} </div>
                                        <div class="col-lg-2">{{$order->amount}} </div>
                                        <div class="col-lg-2">{{$order->quantity}} </div>
                                        <div class="col-lg-2"><img  src="{{ URL::to('/') }}/{{ AppConstants::IMAGE_THUMB_PATH }}{{ $order->thumbnail }}" > </div>
                                        <div class="col-lg-2">
                                            @php
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
                                                
                                            @endphp
                                            {{ $or_status }}
                                        </div>
                                        
                                        
                                    <div class='clr'></div>
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @php 
                        $grand_total = $order->total_amount;  
                        $curr_currency = $order->code;
                        $shipping_cost = $order->shipping_cost;
                    @endphp
                    @endforeach
                    <div  class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row ">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12 offset-lg-7 offset-md-7 grand-totla">Included Shipping Cost :{{ $shipping_cost }} {{ $curr_currency }}</div>
                            </div>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row ">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-12 offset-lg-7 offset-md-7 grand-totla">Grand Total: {{ $grand_total .' '. $curr_currency }}</div>
                            </div>
                        </div>
                    </div>
                    <div class='clr'></div>
                    
                </div>
        </div>
        <div class="clr"></div>
    </div>
</div>       
 @endsection


