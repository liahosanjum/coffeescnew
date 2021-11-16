
@extends('auth.admin.adminlayout')

@section('content')

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        @include('auth.admin.adminprofilelink')
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Product Information</h4>
                       
                    </div>
                </div>
                @if(Session::get('successPMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-success admin-alert">
                           
                        {{ Session::get('successPMsg')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(Session::get('failPMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger admin-alert">
                           
                        {{ Session::get('failPMsg')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif 
                

                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="post" action="{{route('saveproduct')}}" enctype="multipart/form-data"  id="productForm" name="productForm" >
                                @csrf
                                    <div class="form-group">
                                        <label for="">Product Name<span class="red">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{old('name')}}" />
                                    <span style="color:red"> @error("name") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">SKU<span class="red">*</span></label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="Enter SKU" value="{{old('sku')}}" />
                                    <span style="color:red"> @error("sku") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Description<span class="red">*</span></label>
                                        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description" value="{{old('description')}}" />
                                        <span style="color:red"> @error("description") {{ $message }} @enderror</span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Product Image<span class="red">*</span></label>
                                        <input type="file" class="form-control" name="base_image" id="base_image" value="{{old('base_image')}}"  >
                                        <span style="color:red"> @error("base_image") {{ $message }} @enderror</span>
                                    </div>
                                    <?php $i=0;?>
                                    @foreach($currencyListAll as $currencyData)
                                    <div class="form-group">
                                        <label for="">{{$currencyData->code}} Price <span class="red">*</span> </label>
                                        <?php      $val = "priceList.".$i; ?>
                                        <input type="text" name="priceList[{{$i}}]" id="price_{{$currencyData->code}}" class="form-control" placeholder="Enter Price" value="{{ old('price_'.$currencyData->code) }}" />
                                        <span style="color:red"> @error($val) {{ $message }} @enderror</span>
                                        <input type="hidden"  name="currency[]" id="currency_{{$currencyData->code}}" value="{{$currencyData->id}}"  >
                                    </div>
                                    <?php $i++;?>
                                    @endforeach()

                                    <div class="form-group">
                                        <label for="">Status <span class="red">*</span></label>
                                        <select id="status" name="status">
                                            <option value="Active">Active</option>
                                            <option value="InActive">In-Active</option>
                                        </select>
                                        
                                    </div>
                                     
                                    <div class="form-group">
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Additional Images</label>
                                    </div>

                                    <div class="form-group">
                                        <hr>
                                    </div>
                                    <div id="product_wrapper_inner" >
                                        <div class="product_details" id="product_details_rows_1">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 1</label>
                                                    <input type="file" name="additional_image[]" id="image_1" value="{{old('image_1')}}"  >
                                                    <span style="color:red">@error("image_1"){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_details" id="product_details_rows_2">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 2</label>
                                                    <input type="file" name="additional_image[]" id="image_2" value="{{old('image_2')}}"  >
                                                    <span style="color:red">@error("image_2"){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_details" id="product_details_rows_3">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 3</label>
                                                    <input type="file" name="additional_image[]" id="image_3" value="{{old('image_3')}}"  >
                                                    <span style="color:red">@error("image_3"){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product_details" id="product_details_rows_3">
                                            <div class="inner-del-wrapper">
                                                <div class="form-group form-image">
                                                    <label for="">Image 4</label>
                                                    <input type="file" name="additional_image[]" id="image_4" value="{{old('image_4')}}"  >
                                                    <span style="color:red">@error("image_4"){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='clr'></div>
                                    </div>
                                    
                                    
                                    <div class='clr'></div>
                                        <button type="submit" class='btn'>Add Product</button>
                                </form>
                            </div>
                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>        
<style>

</style>



<script>
                
                jQuery(document).ready(function () {
                    
                jQuery('#productForm').validate({ // initialize the plugin
                     
                    rules: 
                    {
                        name: {
                            required: true
                        },
                        sku: {
                            required: true
                        },
                        description: {
                            required: true
                        },
                        base_image: {
                            required: true
                        },
                        'priceList[0]': {
                            required: true
                        }, 
                        'priceList[1]': {
                            required: true
                        },
                        status: {
                            required: true
                        }
                        
                    }
                });
            });
            </script>

 
@endsection