
@extends('auth.admin.adminlayout')

@section('content')

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        @include('auth.admin.adminprofilelink')
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <h4>Product Information</h4>
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

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 pr-det-wrapper-inner">
                        <div class="row prod-admin-title-info">
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">Name</div>
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">Sku</div>
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">Image</div>
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">Action</div>
                           <div class='clr'></div>
                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                

                @foreach($dataProductDetailInfo as $prodDetInfo)
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list">
                        <div class="row prod-admin-info">
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">{{ $prodDetInfo->name }}</div>
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12">{{ $prodDetInfo->sku }}</div>
                           <div class="col-lg-3 col-md-3 col-sm-6 col-12"><img class="front-thumbnail"  src="{{ URL::to('/') .'/'. AppConstants::IMAGE_THUMB_PATH . $prodDetInfo->thumbnail }}" ></div>
                           <div class="col-lg-1 col-md-3 col-sm-6 col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 action-list">
                                        <a href="{{ route('productdetail', $prodDetInfo->id )}}"><i class="fa fa-edit" ></i></a>
                                    </div>
                                </div>
                           </div>
                           <div class="col-lg-1 col-md-3 col-sm-6 col-12 action-list">
                                <div class="row">
                                    <div data-id="{{ $prodDetInfo->id }}" class="admin-prod-del col-lg-6 col-md-6 col-sm-6 col-12">
                                        <a class="remove-from-prod-list" href="{{ route('product.delete', $prodDetInfo->id )}}"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>
                           </div>
                           <div class='clr'></div>
                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                @endforeach
                @if(count($dataProductDetailInfo) == 0)
                <div class="row pr-det-wrapper prod-list">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                            <div class="row">
                                <div class="col-lg-12 col-md-8 col-sm-12 col-12   alert alert-danger">
                                    No Products  found.
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

<script>
jQuery(document).ready(function(){

jQuery(".remove-from-prod-list").click(function (e) 
{
    e.preventDefault();
    var ele = $(this);
    if(confirm("Are you sure want to remove?")) {
        jQuery.ajax({
            url: '{{ route('product.delete') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents(".admin-prod-del").attr("data-id")
            },
            success: function (response) {
                alert(response);
                window.location.reload();
            }
        });
    }
});
});
    
    </script>

@endsection