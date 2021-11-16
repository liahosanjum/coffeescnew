
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
                        <h4>Assign Role To Admin Users</h4>
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
                
                 
                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="POST" action="{{route('assignrole.store')}}"   id="roleassignForm" name="roleassignForm" >
                                    @csrf
                                     
                                    <div class="form-group">
                                        <label for="">Admin User</label>
                                        <select class="form-control"  id="admin_id" name="admin_id">
                                          @foreach($admin_users_all as $admin_user)  
                 <option   value="{{$admin_user->id}}">{{$admin_user->name}}</option>
                                             @endforeach
                                        </select>
                                        <span style="color:red"> @error("admin_id") {{ $message }} @enderror</span>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="">Assign Role </label>
                                        <select class="form-control"  id="role_id" name="role_id">
                                          @foreach($info_roles as $inforoles)  
                                            <option   value="{{$inforoles->id}}">{{$inforoles->name}}</option>
                                             @endforeach
                                        </select>
                                        <span style="color:red"> @error("role_id") {{ $message }} @enderror</span>
                                    </div>
                                     <div class='clr'></div>
                                        <button type="submit" class='btn'>Update</button>
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
 



<script>
                
                jQuery(document).ready(function () {
                    
                jQuery('#roleassignForm').validate({ // initialize the plugin
                     
                    rules: 
                    {
                        admin_id: {
                            required: true
                        },
                        role_id: {
                            required: true
                        },                       
                       
                    }
                });
            });
            </script>

 
@endsection