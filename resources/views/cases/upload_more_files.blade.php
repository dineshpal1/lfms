 @extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">



 	 <form name='form1' method="POST" action="{{ url('saveMoreUploaded',$moreFiles->id) }}"  id="create_form" enctype="multipart/form-data">
              @csrf
         <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">Upload Files </a>
                </li>

                 </ul>

            </div>
  
   			
			<div class="row">
<div class="col-6">
<div class="form-group">
<label for="name">Upload Files:</label>

<input type="file" id="multiple_document" class="form-control" name="multiple_document[]" multiple />
@if ($errors->has('multiple_document'))
<span class="text-danger">{{ $errors->first('multiple_document') }}</span>
@endif
</div>
</div>


</div>  

                   
			
			
			

			

       

      
			
			
				
						 <!--<button class="btn btn-danger" onClick="window.location.reload();">Cancel</button>	-->	
						 <button type="button" class="btn btn-danger" onClick="window.location='{{url("showAllCases")}}'">Cancel</button>
                      <!--<input type="submit" class="btn btn-success" value="Save">-->
              <button type="submit" class="btn btn-primary">Upload</button>

                     													
	</div>

             

@endsection




