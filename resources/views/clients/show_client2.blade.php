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



<style>




.img{
border-radius:50%;
}
.field_align{
margin-left: 110px;
}

</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="well well-sm">
<div class="row">
<div class="col-sm-6 col-md-4">

<img  src="{{asset('uploads/client_photo/'.$showClient->profile_photo)}}"  style="height: 250px; width: 300px" alt="" class="img-rounded img-responsive img" />

</div>


<div class="col-sm-12 col-md-8">
<div class="field_align">
<h3><b>
{{ ucfirst($showClient->name) }}</b></h3>

<p>
 <strong>Company:</strong>
{{ ucfirst($showClient->company )}}
</p>
<p><strong>Address:</strong>
{{ ucfirst($showClient->address1)}},
{{ ucfirst($showClient->address2)}}
</p>

<p>
<strong>City:</strong>
{{ ucfirst($showClient->city_name) }}
</p>
<p> 
<strong>State:</strong>
{{ ucfirst($showClient->state_name) }}
</p>
<p>         
<strong>Country:</strong>
{{ ucfirst($showClient->country_name) }}
</p>


<p>
<strong>Pincode:</strong>
{{ $showClient->pincode }}
</p>
<p> <strong>Email :</strong>
{{ucfirst($showClient->email)}}</p>

<p>

<strong>Mobile No1   :</strong>
{{ $showClient->mobile1  }}
</p>
<p>
<strong>Mobile No2   :</strong>
{{ $showClient->mobile2  }}
</p>
<p>
<strong>Alternate Contact Person:</strong>
{{ucfirst( $showClient->alternate_name) }}
</p>
<p>
<strong>Relation:</strong>
{{ucfirst( $showClient->alternate_relation)  }}
</p>
<p>
<strong>Alternate Email:</strong>
{{ ucfirst($showClient->alternate_email)  }}
</p>
<p>
<strong>Alternate Phone:</strong>
{{ $showClient->alternate_phone  }}
</p>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection