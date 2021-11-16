<div class="container">
     <div class="header-menu-wrapper row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 admin-header">
            <div class="top-menu-green">
                <ul class="header-menu nav">
                        <li class="nav-item welcomeadmin">
                        @if(session()->get('adminLoggedUserId'))
                           <span> WELCOME ADMIN </span>
                        @endif
                        </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 logout-section">
            <div class="top-menu-right">
                <ul class="header-menu nav">
                @if(session()->get('adminLoggedUserId'))
                    <li class="nopadding"><span><i  class="fa-adj  fa fa-sign-in" aria-hidden="true"></i></span></li>
                    <li class="nav-item logout"><a class="nav-link top-nav-list" href="{{ url('/admin/adminlogout') }}">Logout</a></li>
                    <li class="nav-item welcomeadmin">|</li>
                    <li class="nopadding"><span><i class="fa-adj  fa fa-user" aria-hidden="true"></i></span></li>
                    <li class="nav-item welcomeadmin">{{session()->get('adminLoggedUserName')}}</li>
                @endif
                </ul>
            </div>
        </div>
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