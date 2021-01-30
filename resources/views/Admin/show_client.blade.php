@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Client</h2>
                <hr>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('showAllClient') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
		 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <!--<strong>Profile Photo:</strong>-->
               <img  src="{{asset('uploads/client_photo/'.$showClient->profile_photo)}}"  style="height: 100px; width: 100px" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $showClient->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company:</strong>
                {{ $showClient->company }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address1:</strong>
                {{ $showClient->address1 }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $showClient->address2 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country:</strong>
                {{ $showClient->country }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State:</strong>
                {{ $showClient->state }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City:</strong>
                {{ $showClient->city }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pincode:</strong>
                {{ $showClient->pincode }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                {{ $showClient->email  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile No1   :</strong>
                {{ $showClient->mobile1  }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile No2   :</strong>
                {{ $showClient->mobile2  }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternate Contact Person:</strong>
                {{ $showClient->alternate_name  }}
            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Relation:</strong>
                {{ $showClient->alternate_relation  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternate Email:</strong>
                {{ $showClient->alternate_email  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alternate Phone:</strong>
                {{ $showClient->alternate_phone  }}
            </div>
        </div>
       
    </div>
 </div>
 @endsection
 