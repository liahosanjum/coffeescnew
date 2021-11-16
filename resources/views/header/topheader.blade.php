<div class="container">
     <div class="header-menu-wrapper row">
        
        <!-- CART START -->
          
                        <div class="col-lg-12 col-sm-12 col-12 main-section">
                           <div class="top-menu-green">
                                <ul class="header-menu nav">
                               
                                @if( ! session()->has('loggedUserId'))
                                    <li class="nopadding"><span><i  class="fa-adj fa fa-user" aria-hidden="true"></i>
</span></li>
                                    <li class="nav-item top-nav-list"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#">|</a></li>
                                     
                                    <li class="nopadding"><span><i  class="fa-adj fa fa-sign-in" aria-hidden="true"></i></span></li>
                                    <li class="nav-item top-nav-list">
                                    
                                    <a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                                    
                                    @else 
                                    <li class="nopadding"><span><i  class="fa-adj  fa fa-sign-in" aria-hidden="true"></i></span></li>
                                     
                                    <li class="nav-item"><a class="nav-link top-nav-list" href="{{ url('/logout') }}">Logout</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">|</a></li>
                                    <li class="nopadding"><span><i class="fa-adj  fa fa-user" aria-hidden="true"></i></span></li>
                                    <li class="nav-item"><a class="nav-link top-nav-list" href="{{ url('/profile') }}">Profile</a></li>
                                    
                                    @endif
                                </ul>
                            </div>

                            <div class="dd_currency_wrapper">
                                <div class="dropdown_1">
                                    @php
                                        $bl_cooke_val = Cookie::get('currency');
                                        if(!isset($bl_cooke_val) && ($bl_cooke_val) == "")
                                        {
                                           $current_currency = AppConstants::COOKIE_DEFAULT_CURRENCY_VALUE;
                                        }
                                        else
                                        {
                                            $current_currency = Cookie::get('currency');
                                        }
                                    @endphp
                                    <div>CUR : {{ $current_currency }}</div>
                                    <div class="dropdown-content_1">
                                        @if( Cookie::get('currency') =='USD')
                                        <div class="currency_val"><a href="{{ route('setcurrency' , 'CR=QAR') }}">QAR</a></div>
                                        @else
                                        <div class="currency_val"><a href="{{ route('setcurrency' , 'CR=USD') }}">USD</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                             

                            <div class="dropdown">
                                <button type="button" class="btn btn-info" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                        </div>
                                        @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                        @endforeach
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: <span class="text-info"> {{ $total }}  {{  $current_currency }}</span></p>
                                        </div>
                                    </div>
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            <div class="row cart-detail">
                                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img-cart">
                                                     
                                                    <img class="front-thumbnail img-responsive" src="{{ URL::to('/') .'/'. AppConstants::IMAGE_THUMB_PATH . $details['thumbnail'] }}"  height="100" />
                                                </div>
                                                
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                    <p>{{ $details['name'] }}</p>
                                                    <span class="price text-info"> {{ $details['price'] }}  {{  $current_currency }} </span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="{{ route('cart') }}" class="btn btn-warning btn-block">View all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    
                     
                    <!-- END CART -->
    </div>
    <div class="clearfix"></div>
</div>

<style>
.dd_currency_wrapper{
    float: left;
    margin-top: 18px;
}
.dropdown_1 {
  position: relative;
  display: inline-block;
}

.dropdown-content_1 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 87px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 4px 16px;
  z-index: 1;
  color: #000000;
}
.dropdown-content_1 a:hover {
    text-decoration: none;
    color: #792c35;
}
.dropdown-content_1 a {
    text-decoration: none;
    color: #792c35;
}
.dropdown_1:hover .dropdown-content_1 {
  display: block;
  border: 1px solid #792c35;
}
</style>