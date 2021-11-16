<!-- STICKY HEADER DISABLED-->
<!--<header class="main-header clearfix" data-sticky_header="true">-->
<header class="main-header clearfix"data-sticky_header="false">
    <div class="sticky-wrapper">
        <section class="header-wrapper navgiation-wrapper">
                <div class="container">
                    <div class="headerSection">
                        @include('header/header')
                        @php
                            $menuHelper = createMenuItemHelper();
                            ///print_r($menuHelper);
                        
                        @endphp
                         
                        <div style="clear:both"></div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="fluid-container nopadding bgcolor">
                    <div class="container">
                        <div class="header-mainmenu-wrapper row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="topnav" id="myTopnav">
                                
                              @foreach($menuHelper as $pkey => $child_Menu)
                                   @if(count($child_Menu)>1)
                                        <div class="dropdown-menu-resp">
                                            <button class="dropbtn"> {{$child_Menu[0]->title}}
                                              <i class="fa fa-caret-down"></i>
                                            </button>
                                            <div class="dropdown-menu-resp-content">
                                                @foreach($child_Menu as $key => $sub_ChildMenu) 
                                                    @if ($key > 0) 
                                                      <a href="{{ url($sub_ChildMenu['url'])}}">{{ $sub_ChildMenu['title']}}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                     <a href='{{ url($child_Menu[0]->url) }}'>   {{$child_Menu[0]->title}} </a>
                                    @endif
                                  @endforeach
                                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
        </section>
    </div>
</header> <!-- end main-header  -->
 
<style>
 

 
 
 
 
 
 
 </style>
   
 
  
  
 <script>
 function myFunction() {
   var x = document.getElementById("myTopnav");
   if (x.className === "topnav") {
     x.className += " responsive";
   } else {
     x.className = "topnav";
   }
 }
 </script>
  