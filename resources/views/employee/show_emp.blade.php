@extends("Admin.adminLayout.admin_design")
@section("contents")
<div class="right_col" role="main">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> Show Employee</h2>
<hr>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{url('showAllEmp') }}"> Back</a>
</div>
</div>
</div>



<style>




.img{
border-radius:50%;
}
.field_align{
margin-left: 120px;
}

</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="well well-sm">
<div class="row">
<div class="col-sm-6 col-md-4">
<img  src="{{asset('uploads/emp_photo/'.$showEmp->emp_photo)}}"  style="height: 250px; width: 300px" alt="" class="img-rounded img-responsive img" />

</div>


<div class="col-sm-12 col-md-8">
<div class="field_align">
<h3><b>
{{ strtoupper($showEmp->name) }}</b></h3>


<p><strong>Address:</strong>
{{ strtoupper( $showEmp->address)}},

</p>


<p> <strong>Email :</strong>
{{strtoupper( $showEmp->email)}}</p>

<p>

<strong>Phone:</strong>
{{ $showEmp->phone }}
</p>
<p>
<strong>EmpType:</strong>
{{ strtoupper($showEmp->emp_type)  }}
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