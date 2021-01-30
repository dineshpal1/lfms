@extends("Admin.adminLayout.admin_design")
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

@section("contents")
 <div class="right_col" role="main">

 	 <form name='form2' method="post" action="{{ url('saveCase') }}"  id="create_case" enctype="multipart/form-data">
              @csrf
         <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">ADD CASE </a>
                </li>
                 </ul>
            </div>

            <div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Case Title:</label>
                        <input type="text" id="casetitle" name="casetitle" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('casetitle')}}">
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
                        <input type="text" id="judgename" name="judgename" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('judgename')}}">
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
                        <input type="text" id="courtname" name="courtname" class="form-control  error" style="text-transform: uppercase" value="{{old('courtname')}}">
                         @if ($errors->has('courtname'))
                          <span class="text-danger">{{ $errors->first('courtname') }}</span>
                          @endif
                        
                        </div>
                        </div>
                    </div>
                    <div class="row">
                          <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Date Of Hearing</label>
                        <input type="date" id="hearing_date" name="hearing_date" class="form-control  error" aria-required="true" value="{{old('hearing_date')}}">
                          @if ($errors->has('hearing_date'))
                          <span class="text-danger">{{ $errors->first('hearing_date') }}</span>
                          @endif
                    </div>
                        </div>
                    </div>
                   
			<div class="row">
			 <div class="col-3">
                       <div class="form-group">
                        <label for="name">Associates Name</label>
                        <select id="emp_name" name="emp_name" class="form-control error" aria-required="true">
                   	 <option value="" selected disabled>Select Associates</option>
                   	 
                      @foreach($emp as $employee)
                   	  <option value="{{$employee->name}}">{{$employee->name}}</option>
                     
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
                        <input type="email" id="emp_email" name="emp_email" class="form-control error" aria-required="true">
                   	
						
                       
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
                        <input type="text" id="emp_phone" name="emp_phone" class="form-control error" aria-required="true">
                   	 
						
                   
                          @if ($errors->has('emp_phone'))
                          <span class="text-danger">{{ $errors->first('emp_phone') }}</span>
                          @endif
                      </div>
                        </div>
                        {{--<?php echo"<pre>";print_r($clients);exit;?>--}}
                         <div class="col-3">
                        <div class="form-group">
                        <label for="name">Client Name</label>
                        <select id="client_name" name="client_name" class="form-control error" aria-required="true">
                     <option value="" selected disabled>Select Client Name</option>
                     @foreach($clients as $client)

                     <option value="{{$client->name}}">{{$client->name}}</option>
                     @endforeach
                      
            </select>
                          
                      </div>
                    </div>
                         
			</div>

 <div class="row">
                          <div class="col-3">
                       <div class="form-group">
                        <label for="name">Client Phone </label>
                        <input type="text" id="client_phone" name="client_phone" class="form-control error" aria-required="true">
                     
            
                   
                          @if ($errors->has('client_phone'))
                          <span class="text-danger">{{ $errors->first('client_phone') }}</span>
                          @endif
                      </div>
                        </div>

                         <div class="col-3">
                        <div class="form-group">
                        <label for="name">Client Email</label>
                        <input type="email" id="client_email" name="client_email" class="form-control error" aria-required="true">
                                                                   
                      </div>
                    </div>
                         
      </div>






			<div class="row">
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Notes</label>
                        <textarea id="notes" name="notes" class="form-control" aria-required="true"> </textarea>      
                     
                    </div>
                        </div>
			</div>		
			
			
			
		
			
				
			 <div class="row">
                       <div class="col-6">
                     <div class="form-group">
                        <label for="name">Upload Documents</label>
                  
                      <input type="file" class="form-control" name="documents" />
                     
                      </div>
                        </div>
                       
                       
                    </div> 	
						 <button class="btn btn-danger" onClick="window.location.reload();">Cancel</button>		
                      <input type="submit" class="btn btn-success" value="Add Case">
                     													
	</div>

             
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
  
 $("select[name='client_name']").change(function(){
  var client_name=$(this).val();
 
  var token = $("input[name='_token']").val();
   //alert(client_name);
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
</script>

@endsection
