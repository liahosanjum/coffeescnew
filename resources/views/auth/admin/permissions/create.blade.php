
@extends('auth.admin.adminlayout')

@section('content')

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        @include('auth.admin.adminprofilelink')
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 admin-title">
                        <h4>Add Permission On Resources</h4>
                    </div>
                </div>
                @if(Session::get('successMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-success admin-alert">
                           
                        {{ Session::get('successMsg')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(Session::get('failMsg'))
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger admin-alert">
                           
                        {{ Session::get('failMsg')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif 
                

                
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <form method="post" action="{{route('permissions.store')}}"   id="permissionsForm" name="permissionsForm" >
                                @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="key" id="key" class="form-control" placeholder="Enter resource name" value="{{old('key')}}" />
                                    <span style="color:red"> @error("key") {{ $message }} @enderror</span>
                                    </div>

                                    

                                    
                                    
                                    
                                  

                                      
                                     
                                    
                                    
                                    
                                        
                                    
                                    
                                    <div class='clr'></div>
                                        <button type="submit" class='btn'>Add Permission</button>
                                </form>
                            </div>
                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>        
<style>
 
</style>



<script>
jQuery(document).ready(function () {
    jQuery('#permissionsForm').validate({ // initialize the plugin
        rules: 
        {
            key: {
                required: true
            }
        }
    });
});
</script>

 
@endsection