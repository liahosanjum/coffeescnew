
@extends('welcome')

@section('content')
<div class="container">
    <div class="row profile_inner">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 profile_inner_wrapper">
            @include('user.profilelink')
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-12 profile_inner_wrapper_content"> 
            <div class="register-page-wrapper page-wrapper">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
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
                            <form method="post" action="{{route('updateAccount')}}">
                            @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ $loggedUserInfo->name }}" />
                                <span style="color:red"> @error("name") {{ $message }} @enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{$loggedUserInfo->email}}" />
                                <span style="color:red"> @error("email") {{ $message }} @enderror</span>
                                </div>

                                <div class="form-group">
                                    <label for="">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile" value="{{$loggedUserInfo->mobile}}" />
                                    <span style="color:red"> @error("mobile") {{ $message }} @enderror</span>
                                </div>

                                
                                
                                
                                
                                
                                <button type="submit" class='btn'>Update</button>
                                </form>
                                <div class='clr'></div>
                        </div>
                        <div class='clr'></div>
                    </div>
                    <div class='clr'></div>
                </div>
        </div>
        <div class="clr"></div>
    </div> 
</div>       
 @endsection
