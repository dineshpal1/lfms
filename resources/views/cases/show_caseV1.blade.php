@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
	<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Case</h2>
                <hr>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url('showAllCases') }}"> Back</a>
            </div>
        </div>
    </div>
   

    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
         <img  src="{{asset('uploads/documents/'.$showCase->documents)}}"  style="height: 150px; width: 150px" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Case Title:</strong>
                {{ $showCase->casetitle }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judge Name:</strong>
                {{ $showCase->judgename }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Court Name:</strong>
                {{ $showCase->courtname }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hearing Date:</strong>
                {{ $showCase->hearing_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Associate Name:</strong>
                {{ $showCase->emp_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Associate Email:</strong>
                {{ $showCase->emp_email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Associate Phone:</strong>
                {{ $showCase->emp_phone }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Client Name:</strong>
                {{ $showCase->client_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Client Phone:</strong>
                {{ $showCase->client_phone  }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Client Email:</strong>
                {{ $showCase->client_email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Notes:</strong>
                {{ $showCase->notes }}
            </div>
        </div>


          
    </div>
 </div>
 @endsection
 