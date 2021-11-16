<html>
    <head>
        <title>CoffeeSC- @yield('title')</title>
        <!--<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}" type="text/css">-->
        <script src="{{ asset('/js/jquery-3.3.1.min.js') }} "></script>
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css" >
         
        
        <script src="{{ asset('/js/popper.min.js') }} "></script>
        <script src="{{ asset('/js/bootstrap.min.js') }} "></script>

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
         <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>
         <script src="{{ asset('/js/additional-methods.min.js') }}"></script>
         <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
         
    </head>
    <body>
        <div class="container-fluid nopadding">
            <!-- HEADER CONTENTS STARTS HERE -->
            <div class="topHeaderMenu">
                @include('auth/admin/header/admintopheader')
            </div>
             
            <!-- HEADER CONTENTS ENDS HERE -->
            
              

            <!-- MIDDLE CONTENT STARTS HERE -->
            <div class="wrapper-container">
                <div class="container top-bottom-content-margin">
                     
                    <div class="contert-wrapper">
                        @yield('content')
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </div>
            <!-- MIDDLE CONTENT ENDS HERE -->

            <!-- FOOTER SECTION STARTS HERE  -->
            <div class="footerSection">
                @include('auth/admin/footer/adminfooter')
            </div>
    </div>  
    @yield('scripts')
</body>
</html>
 