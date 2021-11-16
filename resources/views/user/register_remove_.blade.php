@extends('welcome')
@section('title') {{$title}} @endsection

@section('content')
<div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 ">
                        <h4>Register123</h4>
                    </div>
                </div>
                @if(Session::get('success'))
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3  alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 col-md-offset-3 alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                </div>
                @endif 
                

                
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 offset-lg-3">
                        <form method="post" action="{{route('create')}}"  id="regform">
                        @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{old('name')}}" />
                            <span style="color:red"> @error("name") {{ $message }} @enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}" />
                            <span style="color:red"> @error("email") {{ $message }} @enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{old('mobile')}}" />
                                <span style="color:red"> @error("mobile") {{ $message }} @enderror</span>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{old('password')}}" />
                                <span style="color:red"> @error("password") {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter Confirm Password" value="{{old('password_confirmation')}}" />
                                <span style="color:red"> @error("password_confirmation") {{ $message }} @enderror</span>
                            </div>
                            
                            <div class='clr'></div>
                            <button type="submit" class='btn'>Register</button>
                            </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 offset-lg-3">
                        Already ! Have account  <a  href="login" class="create-new-acc"> Login </a>
                    </div>
                </div>
                <div class='clr'></div>
                
                
            </div>
            <script>
                
    jQuery(document).ready(function () {
        
    jQuery('#regform').validate({ // initialize the plugin
         
        rules: 
        {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true
            },
            password : {
                required : true
            },
            password_confirmation : {
                required : true,
                equalTo : "#password"
            }
        }
    });
});
</script>
@endsection