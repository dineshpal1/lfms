@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">

 	 <form name='form2' method="POST" action="{{ url('saveEmp') }}"  id="add-emp" enctype="multipart/form-data">
              @csrf
         <div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">ADD EMPLOYEE </a>
                </li>
                 </ul>
            </div>

            <div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Employee Name:</label>
                        <input type="text" id="emp_name" name="emp_name" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('emp_name')}}">
                          @if ($errors->has('emp_name'))
                          <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                          @endif
                        
                        </div>
                        </div>
      </div>
   			<div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Employee Address</label>
                        <input type="text" id="emp-address" name="emp_address" maxlength="10" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('emp_address')}}">
                          @if ($errors->has('emp_address'))
                          <span class="text-danger">{{ $errors->first('emp_address') }}</span>
                          @endif
                        
                        </div>
                        </div>
			</div>
			<div class="row">
                     <div class="col-6">
                       <div class="form-group">
                        <label for="name">Employee Email:</label>
                        <input type="text" id="emp_email" name="emp_email" class="form-control  error" style="text-transform: uppercase" value="{{old('emp_email')}}" onBlur="checkEmail()">
						 <div class='validation' style='color:red;margin-bottom: 20px;display:none'>Please enter valid email address
                        </div>
                         @if ($errors->has('emp_email'))
                          <span class="text-danger">{{ $errors->first('emp_email') }}</span>
                          @endif
                        
                        </div>
                        </div>
                    </div>
                    <div class="row">
                          <div class="col-6">
                        <div class="form-group">
                        <label for="Address1">Employee Phone</label>
                        <input type="text" id="emp_phone" name="emp_phone" maxlength="10" pattern="[1-9]{1}[0-9]{9}" class="form-control  error" aria-required="true" value="{{old('emp_phone')}}" onBlur="checkPhone()" >
						 <div class='phone-validation' style='color:red;margin-bottom: 20px;display:none'>Please enter valid mobile number without country code
                        </div>
                          @if ($errors->has('emp_phone'))
                          <span class="text-danger">{{ $errors->first('emp_phone') }}</span>
                          @endif
                    </div>
                        </div>
                    </div>
                   
			<div class="row">
			 <div class="col-6">
                       <div class="form-group">
                        <label for="name">Employee Type</label>
                        <select id="emp_type" name="emp_type" class="form-control error" aria-required="true">
                   	 <option value="" selected disabled>Select Employee Type</option>
                   	 
                      
                   	  <option value="Advovate" >Advocate</option>
                      <option value="Accountant">Accountant</option>
                      
                       <option value="Other" selected>Other</option>
                   	  
					  </select>
                          @if ($errors->has('emp_type'))
                          <span class="text-danger">{{ $errors->first('emp_type') }}</span>
                          @endif
                      </div>
                        </div>
                    </div>
                        
                         <div class="row">
                       <div class="col-6">
                     <div class="form-group">
                        <label for="name">Employee Photo:</label>
                  
                      <input type="file" class="form-control" name="emp_photo" />
                     
                      </div>
                        </div>
                       
                       
                    </div>  
                   
                     
			
			
			
			
		
			
				 
			
						 <button class="btn btn-danger" onClick="window.location='{{url("showAllEmp")}}'">Cancel</button>		
                      <input type="submit" class="btn btn-success" value="Add Employee">
                     													
	</div>

             

@endsection
<script type="text/javascript">
  
function checkEmail()
{
  //alert("ABCD");
  var email=$('#emp_email').val();

  var valid_email=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(email.match(valid_email))
  {
    $('.validation').css("display","none");
    return true;
  }
  else
  {
     $('.validation').css("display","block");
     $('#email').val('');
     $('#email').focus();
     return false;
  }
}
  
  function checkPhone()
{
  //alert("IJH");//validation for phone
  var phone=$('#emp_phone').val();
  var valid_phone=/^[6789]\d{9}$/;
  if(phone.match(valid_phone))
  {
    $('.phone-validation').css("display","none");
    return true;
  }
  else
  {
    $('.phone-validation').css("display","block");
    $('#emp_phone').val('');
    $('#emp_phone').focus();
    return false;
  }
}             
</script>