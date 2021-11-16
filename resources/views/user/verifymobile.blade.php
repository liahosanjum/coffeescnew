@extends('welcome')
@section('title') {{$title}} @endsection
@section('content')
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">-->

 <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3">
        <div class="alert alert-danger" id="error" style="display: none;"></div>

        <h3>Phone Number Verification</h3>

        <div class="alert alert-success " id="successAuth" style="display: none;"></div>

        <form>
            <label>Phone Number:</label>

            <input readonly="readonly" value="{{ $mobile }}" type="text" id="number" class="form-control" placeholder="+91 ********">

            <div id="recaptcha-container"></div>

            <button type="button" class="btn btn-primary mt-3" onclick="sendOTP();">Send OTP </button>
        </form>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-12 offset-lg-3">
        <div class="mb-5 mt-5">
            <h3>Add verification code</h3>

            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

            <form>
                <input type="text" id="verification" class="form-control" placeholder="Verification code">
                <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code</button>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>


    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyCuHaj9T-iZtUkuTo-PdLNY4G58Tdb9Rcg",
            authDomain: "laravel-phone-otp-auth-ed653.firebaseapp.com",
            databaseURL: "https://laravel-phone-otp-auth-ed653.firebaseio.com",
            projectId: "laravel-phone-otp-auth-ed653",
            storageBucket: "laravel-phone-otp-auth-ed653.appspot.com",
            messagingSenderId: "laravel-phone-otp-auth-ed653.appspot.com",
            appId: "1:147770019437:web:5ab9cf770c28f7dc447964"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendOTP() {
            var number = jQuery("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                jQuery("#successAuth").text("OTP has been sent to mobile number: " + jQuery("#number").val() );
                jQuery("#successAuth").show();
            }).catch(function (error) {
                jQuery("#successAuth").hide();
                jQuery("#error").text(error.message);
                jQuery("#error").show();
            });
        }

        function verify() {
            var code = jQuery("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                jQuery("#successOtpAuth").text("Mobile verification is successfull.");
                jQuery("#successOtpAuth").show();
                var url = "http://localhost/coffeesc/verifyMobileSuccess";
                jQuery(location).attr('href',url);

            }).catch(function (error) {
                // alert('asdfad');
                // var url = "http://localhost/coffeesc/verifyMobileFail";
                // jQuery(location).attr('href',url);
                jQuery("#successAuth").hide();
                jQuery("#error").text(error.message);
                jQuery("#error").show();
            });
        }
    </script>

@endsection