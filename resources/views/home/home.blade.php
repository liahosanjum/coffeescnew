@extends('welcome')
@section('title', 'Page Title')

 



@section('content')

<script type="text/javascript">
jQuery(document).ready(function()
{
    jQuery('.js-example-basic-single').select2();
});
</script>
 
    
 <div class="home-page-wrapper page-wrapper">
     
        <div class="row">
            <div class="top-search-wrapper">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="title-select-search"><label>Select City :</label></div>
                    <div class="city-wrapper"> 
                        <select class="js-example-basic-single select-formator" name="state">
                            <option value="">Select City</option>
                        </select>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="title-select-search"><label>Select City :</label></div>
                    <div class="city-wrapper"> 
                        <select class="js-example-basic-single select-formator" name="state">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="title-select-search"><label>Select City :</label></div>
                    <div class="city-wrapper"> 
                        <select class="js-example-basic-single  select-formator" name="state">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="title-select-search"><label></label></div>
                    <div class="search-wrapper"> 
                        <button class="button" id="btnSearchDonar">Search Donar</button>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </div>   
        </div>
</div>
@endsection
