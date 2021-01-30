@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">

 	 <form name='form1' method="POST" action="{{ url('save_client_step2') }}"  id="create_form" enctype="multipart/form-data">
              @csrf
         <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">ADD CLIENT STEP-2 </a>
                </li>
                 </ul>
            </div>
   			<div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('name',$client->name)}}" readonly>
                          @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        
                        </div>
                        </div>
			<!--</div>-->
			<!--<div class="row">-->
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Company</label>
                        <input type="text" id="company" name="company" class="form-control  error" style="text-transform: uppercase" value="{{old('company')}}">
                         @if ($errors->has('company'))
                          <span class="text-danger">{{ $errors->first('company') }}</span>
                          @endif
                        
                        </div>
                        </div>
                    </div>
                    <div class="row">
                          <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Address 1</label>
                        <input type="text" id="Address1" name="Address1" class="form-control  error" aria-required="true" value="{{old('Address1')}}" style="text-transform: uppercase">
                          @if ($errors->has('Address1'))
                          <span class="text-danger">{{ $errors->first('Address1') }}</span>
                          @endif
                    </div>
                        </div>
                    <!--</div>-->
                    <!--<div class="row">-->
                         <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Address 2</label>
                        <input type="text" id="Address2" name="Address2" class="form-control  error" aria-required="true" value="{{old('Address1')}}" style="text-transform: uppercase">
                          @if ($errors->has('Address2'))
                          <span class="text-danger">{{ $errors->first('Address2') }}</span>
                          @endif
                    </div>
                        </div>
			</div>
			<div class="row">
			 <div class="col-3">
                       <div class="form-group">
                        <label for="name">Country</label>
                        <select id="country" name="country" class="form-control error" aria-required="true" style="text-transform: uppercase">
                   	 <option value="" selected disabled>Select Country</option>
                   	  @foreach($countries as $key => $country)

                      
                   	  <option value="{{$key }}"> {{$country}}</option>
                   	   @endforeach
					  </select>
                          @if ($errors->has('country'))
                          <span class="text-danger">{{ $errors->first('country') }}</span>
                          @endif
                      </div>
                        </div>
                         <div class="col-3">
                       <div class="form-group">
                        <label for="name">State</label>
                        <select id="state" name="state" class="form-control error" aria-required="true" style="text-transform: uppercase">
                   	
						
                        </select>
                         @if ($errors->has('state'))
                          <span class="text-danger">{{ $errors->first('state') }}</span>
                          @endif
                      </div>
                        </div>
                   <!-- </div>-->
                      <!--<div class="row">-->
                          <div class="col-3">
                       <div class="form-group">
                        <label for="name">City</label>
                        <select id="city" name="city" class="form-control error" aria-required="true" style="text-transform: uppercase">
                   	 
						
                        </select>
                          @if ($errors->has('city'))
                          <span class="text-danger">{{ $errors->first('city') }}</span>
                          @endif
                      </div>
                        </div>
                          <div class="col-3">
                       <div class="form-group">
                        <label for="name">Pin Code</label>
                        <input type="text" id="pincode" name="pincode" class="form-control  error" aria-required="true" value="{{old('pincode')}}">
                          @if ($errors->has('pincode'))
                          <span class="text-danger">{{ $errors->first('pincode') }}</span>
                          @endif

                      </div>
                        </div>
			</div>
			<div class="row">
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Email</label>
                        <input type="text" id="email" name="email" class="form-control  error" aria-required="true" value="{{old('email',$client->email)}}" style="text-transform: uppercase">
                     
                    </div>
                        </div>
		<!--	</div>	-->	
			 <!--<div class="row">-->
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Mobile No</label>
                        <input type="text" id="mobile" name="mobile" class="form-control  error" aria-required="true" value="{{old('mobile',$client->mobile1)}}" readonly>
                         @if ($errors->has('mobile'))
                          <span class="text-danger">{{ $errors->first('mobile') }}</span>
                          @endif
                    </div>
                        </div>
			</div>	
			<div class="row">
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Second Mobile No</label>
                        <input type="text" id="mobile2" name="mobile2" class="form-control  error" aria-required="true" value="{{old('mobile2',$client->mobile2)}}" >
                     
                    </div>
                        </div>
		 <!--	</div>	-->
		<!--	<div class="row">-->
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Alternative Contact name</label>
                        <input type="text" id="alternate_name" name="alternate_name" class="form-control  error" aria-required="true" value="{{old('alternate_name')}}" style="text-transform: uppercase">
                     
                    </div>
                        </div>
			</div>	
			<div class="row">
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Alternative Contact Relation</label>
                        <input type="text" id="alternate_relation" name="alternate_relation" class="form-control  error" aria-required="true" value="{{old('alternate_relation')}}" style="text-transform: uppercase">
                     
                    </div>
                        </div>
			 <!--</div>-->		
			 <!--<div class="row">--> 
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Alternative Email</label>
                        <input type="text" id="alternate_email" name="alternate_email" class="form-control  error" aria-required="true" value="{{old('alternate_email')}}" style="text-transform: uppercase">
                     
                    </div>
                        </div>
			</div>		
				<div class="row">
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Alternative Contact Number</label>
                        <input type="text" id="alternate_number" name="alternate_number" class="form-control  error" aria-required="true" value="{{old('alternate_number')}}">
                     
                    </div>
                        </div>
			 <!--</div>	--> 
			 <!-- <div class="row">-->
                       <div class="col-6">
                     <div class="form-group">
                        <label for="name">Profile Photo</label>
                  
                      <input type="file" class="form-control" name="profile_photo" />
                     
                      </div>
                        </div>
                       
                       
                    </div> 	
					  <button type="button" class="btn btn-danger" onClick="window.location='{{url("showAllClient")}}'">Cancel</button>	
                      <!--<button type="button" class="btn btn-danger" onClick="window.location='{{url("showAllClient")}}'">Cancel</button>	-->					 
                      <input type="submit" class="btn btn-success" value="Add Client">
                     													
	</div>

             
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
</script>
@endsection
