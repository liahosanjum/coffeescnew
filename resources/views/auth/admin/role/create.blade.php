
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
                        <h4>Add Role Information</h4>
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
                                <form method="post" action="{{route('roles.store')}}"   id="roleForm" name="roleForm" >
                                @csrf
                                    <div class="form-group">
                                        <label for="">Role Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{old('name')}}" />
                                    <span style="color:red"> @error("name") {{ $message }} @enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Display Name</label>
                                        <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Enter display name" value="{{old('display_name')}}" />
                                        <span style="color:red"> @error("display_name") {{ $message }} @enderror</span>
                                    </div>
                                    <div class='clr'></div>
                                    <button type="submit" class='btn'>Add Role</button>
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
                    
                jQuery('#roleForm').validate({ // initialize the plugin
                     
                    rules: 
                    {
                        name: {
                            required: true
                        },
                        display_name: {
                            required: true
                        }
                    }
                });
            });
            </script>

 
@endsection