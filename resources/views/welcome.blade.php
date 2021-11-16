<html>
    <head>
        <title>CoffeeSC- @yield('title')</title>
        <!--<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}" type="text/css">-->
        <script src="{{ asset('/js/jquery-3.3.1.min.js') }} "></script>
         
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css" >
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}" type="text/css" >
        
        <script src="{{ asset('/js/popper.min.js') }} "></script>
        <script src="{{ asset('/js/bootstrap.min.js') }} "></script>

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
         <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
         <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    </head>
    <body>
        <div class="container-fluid nopadding" style="float:left;  width:100%;">
            <!-- HEADER CONTENTS STARTS HERE -->
            <div class="topHeaderMenu">
                @include('header/topheader')
            </div>
            <div class="topHeaderMenusticky">
                @include('header/skicky-header')
            </div>
            <!-- HEADER CONTENTS ENDS HERE -->
            
              

            <!-- MIDDLE CONTENT STARTS HERE -->
            <div class="wrapper-container">
                <div class="container top-bottom-content-margin">
                    <!-- CART START MESSAGE -->
                    <!--<div class="container">
                        @if(session('success'))
                            <div class="alert alert-success">
                            {{ session('success') }}
                            </div> 
                        @endif
                    </div>-->
                    <!-- END CART -->
                    <div class="contert-wrapper" style="float:left;">
                        @yield('content')
                        <div style="clear:both"></div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="clr"></div>
            </div>
            <!-- MIDDLE CONTENT ENDS HERE -->

            <!-- FOOTER SECTION STARTS HERE  -->
            <div class="footerSection">
                @include('footer/footer')
            </div>
    </div>  
    @yield('scripts')
</body>
</html>
 