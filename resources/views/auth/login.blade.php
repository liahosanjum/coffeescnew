@extends('welcome')

@section('title') {{$title}} @endsection

@section('content')
<div class="login-page-wrapper page-wrapper">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">
            <h4>Login</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">
                @if(Session::get('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success')}}
                    </div>
                    @endif

                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail')}}
                    </div>
                    @endif 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">
            <form id="form" method="post" action="{{route('store')}}">
            @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}" />
                <span style="color:red"> @error("email") {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{old('password')}}" />
                    <span style="color:red"> @error("password") {{ $message }} @enderror</span>
                </div>
                <input type='hidden' name="status" id="status" value="1">
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
            Dont have account ! <a  href="register" class="create-new-acc">Create new Account</a>
        </div>
    </div>
    <div class="clr"></div>
</div>




   <script>
    jQuery(document).ready(function () {
       
    jQuery('#form').validate({ // initialize the plugin
         
        rules: 
        {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        }
    });
});
</script>
@endsection