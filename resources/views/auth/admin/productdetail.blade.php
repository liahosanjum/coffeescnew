
@extends('auth.admin.adminlayout')

@section('content')

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        @include('auth.admin.adminprofilelink')
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row prod-heading">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <h4>Product Price Information</h4>
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
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 alert alert-danger">
                        {{ Session::get('failPMsg')}}
                    </div>
                </div>
                @endif 
                
                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 pr-det-wrapper-inner" >
                         <div class="row prod-admin-title-info">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">Name</div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">Description</div>
                            <div class="col-lg-2 col-md-1 col-sm-6 col-12">Price</div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-12">Currency Type</div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-12">Action</div>
                            <div class='clr'></div>
                        </div>
                    </div>
                </div>

                @foreach($priceProductDetailInfo as $prodPriceInfo)
                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list">
                        
                        <div class="row prod-admin-detail-info">
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">{{ $prodPriceInfo->name }}</div>
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">{{ $prodPriceInfo->description }}</div>
                           <div class="col-lg-2 col-md-1 col-sm-6 col-12">{{ $prodPriceInfo->item_price }}</div>
                           <div class="col-lg-2 col-md-2 col-sm-6 col-12">{{ $prodPriceInfo->code }}</div>
                           
                           <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <a href="">----</a>
                                    </div>
                                    <div class='clr'></div>
                                </div>
                           </div>
                           <div class='clr'></div>

                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                @endforeach
                <div class="row prod-heading-images">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <h4>Product Additonal Image Information</h4>
                    </div>
                </div>

                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list  pr-det-wrapper-inner">
                        <div class="row prod-admin-title-info">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">Name</div>
                             
                            <div class="col-lg-2 col-md-1 col-sm-6 col-12">SKU</div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-12">Image</div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-12">Action</div>
                            <div class='clr'></div>
                        </div>
                        <div class='clr'></div>
                    </div>
                </div>


                @foreach($imageProductDetailInfo as $prodImageInfo)
                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list">
                       <div class="row prod-admin-info">
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">{{ $prodImageInfo->name }}</div>
                           <div class="col-lg-2 col-md-1 col-sm-6 col-12">{{ $prodImageInfo->sku }}</div>
                           <div class="col-lg-2 col-md-2 col-sm-6 col-12"><img class="front-thumbnail"  src="{{ URL::to('/').'/'. AppConstants::IMAGE_THUMB_DETAIL_PATH . $prodImageInfo->detail_thumbnail }}" ></div>
                           
                           <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                                <div class="row prod-detal-link">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                       ----
                                    </div>
                                    <div class='clr'></div>
                                </div>
                           </div>
                           <div class='clr'></div>

                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                @endforeach

                @if(count($imageProductDetailInfo) == 0)
                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                            <div class="row">
                                <div class="col-lg-12 col-md-8 col-sm-12 col-12   alert alert-danger">
                                    No additional image found.
                                </div>
                            </div>
                      
                    </div>
                </div>
                @endif

                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>     


<style>

</style>



@endsection