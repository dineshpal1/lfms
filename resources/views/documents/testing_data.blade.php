@extends("Admin.adminLayout.admin_design")
@section("contents")
<div class="right_col" role="main">

<form name='form2' method="POST" action="{{ url('saveDocument') }}"  id="upload" enctype="multipart/form-data">
@csrf
<div class="col-md-12">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
aria-controls="home" aria-selected="true">UPLOAD TEMPLATE </a>
</li>
</ul>
</div>

<div class="row">
<div class="col-6">
<div class="form-group">
<label for="name">Template Type:</label>
<input type="text" id="doc_name" name="doc_name" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('doc_name')}}">
@if ($errors->has('doc_name'))
<span class="text-danger">{{ $errors->first('doc_name') }}</span>
@endif

</div>
</div>
</div>


<div class="row">
<div class="col-6">
<div class="form-group">
<label for="name">Template:</label>

<input type="file" class="form-control" name="template" />
@if ($errors->has('template'))
<span class="text-danger">{{ $errors->first('template') }}</span>
@endif
</div>
</div>


</div>  

<!--<button class="btn btn-danger" onClick="window.location.reload();">Cancel</button>--> 
<button type="button" class="btn btn-danger" onClick="window.location='{{url("showAlldoc")}}'" >Cancel</button> 
<input type="submit" class="btn btn-success" value="Upload Template">


</div>



@endsection
