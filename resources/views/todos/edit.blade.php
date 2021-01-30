@extends("Admin.adminLayout.admin_design")
@section("contents")
<div class="right_col" role="main">
@if(session()->has('msg'))
<div class="btn btn-block btn-success">
 
  {{session('msg')}}
  
  </div>

@endif

@if(session()->has('errormsg'))
<div class="btn btn-block btn-danger">
 
  {{session('errormsg')}}
  
  </div>

@endif
<form name='form2' method="POST" action="{{ url('updateTodos',$todo->id) }}"  id="todos" >
@csrf
<div class="col-md-12">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
aria-controls="home" aria-selected="true">Update Task </a>
</li>
</ul>
</div>

<div class="row">
<div class="col-6">
<div class="form-group">
<label for="name">Task Name:</label>
<input type="text" id="title" name="title" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('title',$todo->title)}}" placeholder="Title">
@if ($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif

</div>
</div>
</div>


<div class="row">
<div class="col-6">
<div class="form-group">
<label for="name">Task Start At:</label>
<input type="datetime-local" id="task_start" name="task_start" class="form-control  error" aria-required="true"  value="{{old('task_start')}}" placeholder="Task Start Date">
@if ($errors->has('task_start'))
<span class="text-danger">{{ $errors->first('task_start') }}</span>
@endif

</div>
</div>
</div>

<div class="row">
<div class="col-6">
<div class="form-group">
<label for="name">Task End At:</label>
<input type="datetime-local" id="task_end" name="task_end" class="form-control  error" aria-required="true"  value="{{old('task_end')}}" placeholder="Task End Date">
@if ($errors->has('task_end'))
<span class="text-danger">{{ $errors->first('task_end') }}</span>
@endif

</div>
</div>
</div>





<input type="submit" class="btn btn-success" value="Update">

</div>



@endsection
