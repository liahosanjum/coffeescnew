
@extends('auth.admin.adminlayout')

@section('content')

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        @include('auth.admin.adminprofilelink')
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 admin-profile">
                        <h4>Personal Information</h4>
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
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="pers-title">Name :</div>
                                <div class="pers-info">{{  $loggedUserInfo['name']; }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="pers-title">Email :</div>
                                <div class="pers-info">{{  $loggedUserInfo['email']; }}</div>
                            </div>
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
 @endsection
