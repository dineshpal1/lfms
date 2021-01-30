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
   

    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
               <img  src="{{asset('uploads/emp_photo/'.$showEmp->emp_photo)}}"  style="height: 150px; width: 150px" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $showEmp->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                {{ $showEmp->address }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $showEmp->email }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $showEmp->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Emp Type:</strong>
                {{ $showEmp->emp_type }}
            </div>
        </div>
          
    </div>
 </div>
 @endsection
 