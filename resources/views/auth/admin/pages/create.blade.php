
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
                        <h4>Add Pages</h4>
                    </div>
                </div>
                @if(Session::get('successMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-success admin-alert">
                           
                        {{ Session::get('successMsg')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(Session::get('failMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger admin-alert">
                           
                        {{ Session::get('failMsg')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif 
                

                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="post" action="{{route('pages.store')}}" enctype="multipart/form-data"   id="pagesForm" name="pagesForm" >
                                @csrf
                                    

                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter name" value="{{old('title')}}" />
                                        <span style="color:red"> @error("title") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Excerpt</label>
                                        <textarea  type="text" name="excerpt" id="excerpt" class="form-control" placeholder="Enter Excerpt Text" >{{old('excerpt')}}</textarea>
                                         <span style="color:red"> @error("excerpt") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Body</label>
                                        <textarea  type="text" name="body" id="body" class="ckeditor form-control" placeholder="Enter body Text" >
                                        {{old('body')}}
                                        </textarea>
                                         <span style="color:red"> @error("body") {{ $message }} @enderror</span>
                                    </div>

                                     

                                     
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input class="inp-image form-control" type="file" name="image" id="image" value="{{old('image')}}"  >
                                        <span style="color:red"> @error("image") {{ $message }} @enderror</span>
                                    </div>

                                    
                                        
                                      

                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug" value="{{old('slug')}}" />
                                        <span style="color:red"> @error("slug") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Meta Description</label>
                                        <input type="text" name="meta_description" id="meta_description" class="form-control" placeholder="Enter Meta Description" value="{{old('meta_description')}}" />
                                        <span style="color:red"> @error("meta_description") {{ $message }} @enderror</span>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Enter Meta Description" value="{{old('meta_keywords')}}" />
                                        <span style="color:red"> @error("meta_keywords") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select class="form-control"  id="status" name="status">
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="In-Acctive">IN-Active</option>
                                        </select>
                                        <span style="color:red"> @error("status") {{ $message }} @enderror</span>
                                    </div>
 
                                    
                                    <div class='clr'></div>
                                        <button type="submit" class='btn'>Add Page</button>
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
 



<script type="text/javascript">
jQuery(document).ready(function () {
     

       jQuery('#pagesForm').validate({ 
        ignore: [],
        rules: 
        {
            title: {
                required: true
            },
            excerpt: {
                required: true
            },
            body: {
                ckrequired:true
            },
            slug: {
                required: true
            },
            image: {
                required: true
            },
            meta_description: {
                required: true
            },
            meta_keywords: {
                required: true 
            },
            status: {
                required: true
            },
        }
    });

    jQuery.validator.addMethod('ckrequired', function (value, element, params) {
    var idname = jQuery(element).attr('id');
    var messageLength =  jQuery.trim ( CKEDITOR.instances[idname].getData() );
    return !params  || messageLength.length !== 0;
}, "This field is required.");




    jQuery('.ckeditor').ckeditor();
    
});
</script>

 
@endsection