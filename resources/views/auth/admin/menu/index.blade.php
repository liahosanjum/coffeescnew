
@extends('auth.admin.adminlayout')

@section('content')

<div class="row profile_inner">
    <div class="col-lg-2 col-md-2 col-sm-12 col-12 profile_inner_wrapper">
        @include('auth.admin.adminprofilelink')
    </div>

    <div class="col-lg-10 col-md-10 col-sm-12 col-12 profile_inner_wrapper_content"> 
        <div class="register-page-wrapper page-wrapper">
                <div class="row prod-heading">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 listing-title">
                        <h4>Menu Listing</h4>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 add-listing">
                        <div class="btn-wrapper"><a class="btn-admin" href="{{ route('menu.create') }}">Add Menu</a></div>
                    </div>
                </div>
                @if(Session::get('successPMsg'))
                <div class="row prod-heading">
                    <div class="col-lg-11 col-md-12 col-sm-12 col-12   alert alert-success">
                        {{ Session::get('successPMsg')}}
                    </div>
                </div>
                @endif

                @if(Session::get('failPMsg'))
                <div class="row prod-heading">
                    <div class="col-lg-11 col-md-11 col-sm-12 col-12 alert alert-danger">
                        {{ Session::get('failPMsg')}}
                    </div>
                </div>
                @endif 
                
                 

                
                @if($menuitems_all != null || $menuitems_all != "")  

                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list  pr-det-wrapper-inner">
                        <div class="row prod-admin-title-info">
                            <div class="col-lg-2 col-md-3 col-sm-6 col-12">Role ID</div>
                            <div class="col-lg-4 col-md-3 col-sm-6 col-12">Display Name</div>
                            <div class="col-lg-3 col-md-1 col-sm-6 col-12">Name</div>
                            
                            <div class="col-lg-3 col-md-2 col-sm-6 col-12">Action</div>
                            <div class='clr'></div>
                        </div>
                        <div class='clr'></div>
                    </div>
                </div>

           
                @foreach($menuitems_all as $menuitems)
                <div class="row pr-det-wrapper">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 prod-admin-list-roles">
                       <div class="row prod-admin-info_role">
                           <div class="col-lg-2 col-md-3 col-sm-6 col-12">{{ $menuitems->id }}</div>
                           <div class="col-lg-4 col-md-3 col-sm-6 col-12">{{ $menuitems->title }}</div>
                           <div class="col-lg-3 col-md-1 col-sm-6 col-12">{{ $menuitems->route }}</div>
                           
                           <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="row prod-detal-link">
                                    <div class="col-lg-4 col-md-2 col-sm-2 col-3">
                                        <a href="{{ route('menu.edit',$menuitems->id)}}"><i class="fa fa-edit" ></i></a>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                                        <span></span>
                                    </div>
                                    <div data-id="{{ $menuitems->id }}" class="admin-del col-lg-4 col-md-2 col-sm-2 col-3">
                                        <a class="remove-from-menu" href="{{ route('menu.delete',$menuitems->id) }}"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    
                                    <div class='clr'></div>
                                </div>
                           </div>
                           <div class='clr'></div>

                        </div>  
                    </div>
                    <div class='clr'></div>
                </div>
                @endforeach
            @endif
        

                <div class='clr'></div>
            </div>
    </div>
    <div class="clr"></div>
</div>        
 
<script>
jQuery(document).ready(function(){
    jQuery(".remove-from-menu").click(function (e) 
    {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            jQuery.ajax({
                url: '{{ route("menu.delete") }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents(".admin-del").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
});
</script>


@endsection