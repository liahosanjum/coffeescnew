@extends('welcome')
@section('content')
<div class="register-page-wrapper page-wrapper">
                
                
                @if(Session::get('successMsg'))
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 mob-regis-success">
                        <h4>Registration Successfull</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center col-12 offset-lg-3  alert alert-success-reg">
                        {{ Session::get('successMsg')}}
                    </div>
                </div>
                @endif

                @if(Session::get('failMsg'))
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3 mob-regis-success">
                        <h4>Registration UnSuccessfull</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-center col-sm-12 col-12 offset-lg-3 offset-md-3 alert alert-danger">
                        {{ Session::get('failMsg')}}
                    </div>
                </div>
                @endif 
                <div class='clr'></div>
</div>
     
@endsection