 @extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">

<!-------------Place holder style----------------->
 <style type="text/css">
#mobile1::-webkit-input-placeholder { font-size:small; font-style: italic;text-align:center;color:pink;}
#mobile1::-ms-input-placeholder {font-size:small; font-style: italic;text-align:center;color:pink; }
#mobile1::-moz-placeholder {font-size:small; font-style: italic;text-align:center;color:pink; }

#name::-webkit-input-placeholder { font-size:small; font-style: italic;text-align:center;color:pink;}
#name::-ms-input-placeholder {font-size:small; font-style: italic;text-align:center;color:pink; }
#name::-moz-placeholder {font-size:small; font-style: italic;text-align:center;color:pink; }



    </style>
<!------------------------------------------------>

 	 <form name='form1' method="POST" action="{{ url('save_client_step1') }}"  id="create_form">
              @csrf
         <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">ADD CLIENT </a>
                </li>

                 </ul>

            </div>
  
   			<div class="row">

                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('name')}}" required placeholder="Please enter client name" />
                          @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        
                        </div>
                        </div>
			</div>
			
                   
			
			
			 <div class="row">
			  <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Mobile No1</label>
                        <input type="text" id="mobile1" name="mobile1" class="form-control  error" aria-required="true" value="{{old('mobile1')}}" maxlength="10" pattern="[6-9]{1}[0-9]{9}" onBlur="checkPhone()" placeholder="Mobile number without +91 or 0" />
                      <div class='phone-validation' style='color:red;margin-bottom: 20px;display:none'>Please enter valid mobile number without country code
                        </div>
                         @if ($errors->has('mobile1'))
                          <span class="text-danger">{{ $errors->first('mobile1') }}</span>
                          @endif
                    </div>
                        </div>
			</div>	

			{{--  <div class="row">
        <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Mobile No2</label>
                        <input type="text" id="mobile2" name="mobile2" class="form-control  error" aria-required="true" value="{{old('mobile2')}}">
                         @if ($errors->has('mobile2'))
                          <span class="text-danger">{{ $errors->first('mobile2') }}</span>
                          @endif
                    </div>
                        </div>
      </div>  --}}

       <div class="row">
        <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Email</label>
                        <input type="text" id="email" name="email" class="form-control  error" aria-required="true" style="text-transform:uppercase" value="{{old('email')}}" />
                         @if ($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                    </div>
                        </div>
      </div>  

      
			
			
				
						 <!--<button class="btn btn-danger" onClick="window.location.reload();">Cancel</button>	-->	
						 <button type="button" class="btn btn-danger" onClick="window.location='{{url("showAllClient")}}'">Cancel</button>
                      <!--<input type="submit" class="btn btn-success" value="Save">-->
              <button type="submit" class="btn btn-primary">Next</button>

                     													
	</div>

             

@endsection
<script type="text/javascript">
   function checkPhone()
{
  //alert("IJH");//validation for phone
  var phone=$('#mobile1').val();
  var valid_phone=/^[6789]\d{9}$/;
  if(phone.match(valid_phone))
  {
    $('.phone-validation').css("display","none");
    return true;
  }
  else
  {
    $('.phone-validation').css("display","block");
    $('#mobile1').val('');
    $('#mobile1').focus();
    return false;
  }
}             


</script>





