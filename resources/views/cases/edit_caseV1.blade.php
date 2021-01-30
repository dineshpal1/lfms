@extends("Admin.adminLayout.admin_design")
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

@section("contents")
 <div class="right_col" role="main">

 	 <form name='form2' method="post" action="{{ url('updateCase',$editCase->id) }}"  id="edit_case" enctype="multipart/form-data">
              @csrf
         <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="display: inline-block;">EDIT CASE</a>
               
                  @if(auth()->user()->id==1  )
                      <i class="fa fa-unlock" aria-hidden="true" style="font-size:36px;float:right; display: inline-block;margin-left: 1000px;" ></i>
                       
                      @else
                      <i class="fa fa-lock" aria-hidden="true" style="font-size:36px;float:right; display: inline-block;margin-left: 1000px;" ></i>
                       
                    @endif
                
                   

                </li>
                 </ul>
            </div>

            <div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Case Title:</label>
                        <input type="text" id="casetitle" name="casetitle" class="form-control  error noEditable" aria-required="true" style="text-transform: uppercase" value="{{old('casetitle',$editCase->casetitle)}}">
                          @if ($errors->has('casetitle'))
                          <span class="text-danger">{{ $errors->first('casetitle') }}</span>
                          @endif
                        
                        </div>
                        </div>
      </div>
   			<div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Judge Name</label>
                        <input type="text" id="judgename" name="judgename" class="form-control  error noEditable" aria-required="true" style="text-transform: uppercase" value="{{old('judgename',$editCase->judgename)}}">
                          @if ($errors->has('judgename'))
                          <span class="text-danger">{{ $errors->first('judgename') }}</span>
                          @endif
                        
                        </div>
                        </div>
			</div>
			<div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Court Name:</label>
                        <input type="text" id="courtname" name="courtname" class="form-control  error noEditable" style="text-transform: uppercase" value="{{old('courtname',$editCase->courtname)}}">
                         @if ($errors->has('courtname'))
                          <span class="text-danger">{{ $errors->first('courtname') }}</span>
                          @endif
                        
                        </div>
                        </div>
                    </div>
                    <div class="row">
                          <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">First Date Of Hearing</label>
                        <input type="date" id="first_hearing_date" name="first_hearing_date" class="form-control  error noEditable" aria-required="true" value="{{old('first_hearing_date',$editCase->first_hearing_date)}}">
                          @if ($errors->has('first_hearing_date'))
                          <span class="text-danger">{{ $errors->first('first_hearing_date') }}</span>
                          @endif
                    </div>
                        </div>
                    </div>
                   
			<div class="row">
			 <div class="col-3">
                       <div class="form-group">
                        <label for="name">Associates Name</label>
                        <select id="emp_name" name="emp_name" class="form-control error noEditable" aria-required="true">
                   	 <option value="" selected disabled>Select Associates</option>
                   	

                      @foreach($emp as $employee)
                   	  <option value="{{$employee->name}}" @if($editCase->emp_name==$employee->name) @endif {{"selected"}}>{{$employee->name}}</option>
                     
                   	  @endforeach
					  </select>
                          @if ($errors->has('emp_name'))
                          <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                          @endif
                      </div>
                        </div>
                         <div class="col-3">
                       <div class="form-group">
                        <label for="name">Associates Email</label>
                        <input type="email" id="emp_email" name="emp_email" class="form-control error noEditable" aria-required="true" value="{{$editCase->emp_email}}">
                   	
						
                       
                         @if ($errors->has('emp_email'))
                          <span class="text-danger">{{ $errors->first('emp_email') }}</span>
                          @endif
                      </div>
                        </div>
                    </div>
                      <div class="row">
                          <div class="col-3">
                       <div class="form-group">
                        <label for="name">Associates Phone </label>
                        <input type="text" id="emp_phone" name="emp_phone" class="form-control error noEditable" aria-required="true" value="{{$editCase->emp_phone}}">
                   	 
						
                   
                          @if ($errors->has('emp_phone'))
                          <span class="text-danger">{{ $errors->first('emp_phone') }}</span>
                          @endif
                      </div>
                        </div>
                        {{--<?php echo"<pre>";print_r($clients);exit;?>--}}
                         <div class="col-3">
                        <div class="form-group">
                        <label for="name">Client Name</label>
                        <select id="client_name" name="client_name" class="form-control error noEditable" aria-required="true">
                     <option value="" selected disabled>Select Client Name</option>
                     @foreach($clients as $client)
                      @if($editCase->emp_name==$employee->name) @endif {{"selected"}}
                     <option value="{{$client->name}}" <?php if($editCase->client_name==$client->name) echo "selected";?>>{{$client->name}}</option>
                     @endforeach
                      
            </select>
                          
                      </div>
                    </div>
                         
			</div>

 <div class="row">
                          <div class="col-3">
                       <div class="form-group">
                        <label for="name">Client Phone </label>
                        <input type="text" id="client_phone" name="client_phone" class="form-control error noEditable" aria-required="true" value="{{$editCase->client_phone }}">
                     
            
                   
                          @if ($errors->has('client_phone'))
                          <span class="text-danger">{{ $errors->first('client_phone') }}</span>
                          @endif
                      </div>
                        </div>

                         <div class="col-3">
                        <div class="form-group">
                        <label for="name">Client Email</label>
                        <input type="email" id="client_email" name="client_email" class="form-control error noEditable" aria-required="true" value="{{$editCase->client_email }}">
                                                                   
                      </div>
                    </div>
                         
      </div>


 <div class="row">
                       <div class="col-6">
                     <div class="form-group">
                        <label for="Address1">Upload Documents</label>
                     <!-- <img  src="{{asset('uploads/documents/'.$editCase->documents)}}"  style="height: 50px; width: 50px" alt="">-->
                      <input type="file" class="form-control noEditable" name="documents" />
                     
                      </div>
                        </div>
                       
                       
                    </div>  



			<div class="row">
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Notes</label>
                        <textarea id="notes" name="notes" class="form-control noEditable" aria-required="true" > {{$editCase->notes}}</textarea>      
                     
                    </div>
                        </div>
			</div>		
			
			
			
		
			
				
			

           <div class="row">
                          <div class="col-6">
                        <div class="form-group">
                        <label for="Address1"> Date Of Hearing</label>
                        <input type="date" id="date_of_hearing" name="date_of_hearing" class="form-control  error" aria-required="true" value="{{old('date_of_hearing')}}">
                          @if ($errors->has('date_of_hearing'))
                          <span class="text-danger">{{ $errors->first('date_of_hearing') }}</span>
                          @endif
                    </div>
                        </div>
                    </div>


                      <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Update/Notes</label>
                        <textarea id="update_notes" name="update_notes" class="form-control" aria-required="true" > </textarea>      
                     
                    </div>
                        </div>
      </div>    

                     <div class="row">
                          <div class="col-6">
                        <div class="form-group">
                        <label for="Address1"> Next Date</label>
                        <input type="date" id="next_date" name="next_date" class="form-control  error" aria-required="true" value="{{old('next_date')}}">
                          @if ($errors->has('next_date'))
                          <span class="text-danger">{{ $errors->first('next_date') }}</span>
                          @endif
                    </div>
                        </div>
                    </div>

 <div class="row">
                       <div class="col-6">
                     <div class="form-group">
                        <label for="Address1">Upload Order/Judgement</label>
                    
                      <input type="file" class="form-control" name="order" />
                     
                      </div>
                        </div>
                       
                       
                    </div>  







						 <button class="btn btn-danger" onClick="window.location.reload();">Cancel</button>		
                      <input type="submit" class="btn btn-success" value="Update Case">
                     													
	</div>

             
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
  
 $("select[name='client_name']").change(function(){
  var client_name=$(this).val();
  var token = $("input[name='_token']").val();
 $.ajax({
//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
  url:"{{url('/clientDetails')}}",
  method:'POST',
  data: {client_name:client_name, _token:token},
  // data: {client_name:client_name},
 success: function(data) {
  console.log(data);
 var arraydata = JSON.parse(data);
   var client_phone = arraydata[0]["mobile1"];
    var client_email = arraydata[0]["email"];
    $("input[name='client_phone'").val(client_phone);
    $("input[name='client_email'").val(client_email);
}

 })


});
 



 $("select[name='emp_name']").change(function(){
  var emp_name=$(this).val();
  //alert(emp_name);
  var token = $("input[name='_token']").val();
 $.ajax({
//headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
  url:"{{url('/empDetails')}}",
  method:'POST',
  data: {emp_name:emp_name, _token:token},
  // data: {client_name:client_name},
 success: function(data) {
  console.log(data);
 var arraydata = JSON.parse(data);
   var emp_phone = arraydata[0]["phone"];
    var emp_email = arraydata[0]["email"];
    $("input[name='emp_phone'").val(emp_phone);
    $("input[name='emp_email'").val(emp_email);
}

 })


});
 $(document).ready(function() {
 var id = "{{ Auth::user()->id }}";
   //alert(id);
   if(id !=1)
   {
   $(".noEditable").prop("disabled", true);
   }
 });
</script>

@endsection
