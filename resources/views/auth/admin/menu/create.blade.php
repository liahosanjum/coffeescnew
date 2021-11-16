
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
                        <h4>Add Menu Information</h4>
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
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <form method="post" action="{{route('menu.store')}}"   id="menuForm" name="menuForm" >
                                @csrf
                                    
                                    <div class="form-group">
                                        <label for="">Menu Type</label>
                                        <select class="form-control"  id="menu_id" name="menu_id">
                                             
                                            @foreach($baseMenuItem as $base_item)
                                            <option value="{{$base_item->id}}">{{$base_item->name}}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red"> @error("status") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Parent Menu</label>
                                        <select class="form-control"  id="status" name="status">
                                            <option value="0">Root</option>
                                            @foreach($menuitem_pid as $menu_parent_id)
                                            <option value="{{$menu_parent_id->id}}">{{$menu_parent_id->title}}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red"> @error("status") {{ $message }} @enderror</span>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" value="{{old('title')}}" />
                                        <span style="color:red"> @error("title") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Url</label>
                                        <input type="text" name="url" id="url" class="form-control" placeholder="Enter url" value="{{old('url')}}" />
                                        <span style="color:red"> @error("url") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Target</label>
                                        <select class="form-control"  id="target" name="target">
                                            <option value="_blank">_blank</option>
                                            <option value="_self">_self</option>
                                        </select>
                                        <span style="color:red"> @error("target") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Order</label>
                                        <input type="text" name="order" id="order" class="form-control" placeholder="Enter order" value="{{old('order')}}" />
                                        <span style="color:red"> @error("order") {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Route</label>
                                        <input type="text" name="route" id="route" class="form-control" placeholder="Enter route" value="{{old('route')}}" />
                                        <span style="color:red"> @error("route") {{ $message }} @enderror</span>
                                    </div>







                                    <div class='clr'></div>
                                    <button type="submit" class='btn'>Add Menu</button>
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
    jQuery('#menuForm_').validate({ 
        rules: 
        {
            title: {
                required: true
            },
            url: {
                required: true
            },
            target: {
                required: true
            },
            order: {
                required: true
            },
            route: {
                required: true
            }
        }
    });
});
</script>

 
@endsection