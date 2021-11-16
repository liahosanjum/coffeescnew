
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
                        <h4>Edit Pages Information</h4>
                    </div>
                </div>
                @if(Session::get('successMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
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
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger admin-alert">
                           
                        {{ Session::get('failMsg')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif 
                
                @if($info_pages != '' && $info_pages != null)
                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="POST" enctype="multipart/form-data" action="{{route('pages.update',$info_pages->id)}}"   id="pageEditForm" name="pageEditForm" >
                                @csrf
                                 {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter name" value="{{$info_pages->title}}" />
                                        <span style="color:red"> @error("title") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Excerpt</label>
                                        
                                        <textarea  type="text" name="excerpt" id="excerpt" class="form-control" placeholder="Enter Excerpt"   >
                                        {{$info_pages->excerpt}}
                                        </textarea>
                                        <span style="color:red"> @error("excerpt") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Body</label>
                                        
                                        <textarea  type="text" name="body" id="body" class="ckeditor form-control" placeholder="Enter Body Text"   >
                                        {{$info_pages->body}}
                                        </textarea>
                                        <span style="color:red"> @error("body") {{ $message }} @enderror</span>
                                    </div>

                                    
 

                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Enter Image" value="{{$info_pages->image}}" />
                                        <span style="color:red"> @error("image") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug" value="{{$info_pages->slug}}" />
                                        <span style="color:red"> @error("slug") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Meta Description</label>
                                        <input type="text" name="meta_description" id="meta_description" class="form-control" placeholder="Enter Meta Description" value="{{$info_pages->meta_description}}" />
                                        <span style="color:red"> @error("meta_description") {{ $message }} @enderror</span>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Enter Meta Description" value="{{$info_pages->meta_keywords}}" />
                                        <span style="color:red"> @error("meta_keywords") {{ $message }} @enderror</span>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select id="status" name="status">
                                            <option value="">Select Status</option>
                                            <option @php if($info_pages->status == 'ACTIVE') {  echo 'selected="selected"'; } @endphp  value="ACTIVE">Active</option>
                                            <option  @php if($info_pages->status == 'INACTIVE') {  echo 'selected="selected"'; } @endphp value="INACTIVE">IN-Active</option>
                                        </select>
                                        
                                         <span style="color:red"> @error("status") {{ $message }} @enderror</span>
                                    </div>

                                    
                                     <div class='clr'></div>
                                        <button  type="submit" class='btn'>Update</button>
                                </form>
                            </div>
                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                @endif
                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>        
 



<script>


jQuery(document).ready(function () {
    

    jQuery('#pageEditForm').validate({ 
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
                ckrequired: true
            },
            slug: {
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