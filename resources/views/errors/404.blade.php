@extends('welcome')

   
     
@section('content')

    

<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-12 nf-wrapper">
        <div  class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="errorpagenfound"> 404 Error </div>
            </div>
        </div>
        <div  class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="errorpagenmsg"> Page Not Found </div>
            </div>
        </div>
    </div>

</div>
<style>
.errorpagenfound {
    font-size: 30px;
    font-weight: bold;

} 
.errorpagenmsg{
    font-size: 30px;
}
.nf-wrapper{
    margin-top: 40px;
margin-bottom: 130px;
}
</style>
    

@endsection