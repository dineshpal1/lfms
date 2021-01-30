@extends("Admin.adminLayout.admin_design")
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

@section("contents")
 <div class="right_col" role="main">
<div class="col-md-12">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                    aria-controls="home" aria-selected="true">ADD CASE </a>
                </li>
                 </ul>
            </div>





    <!-- Bootstrap -->
   


 
    <div class="container body">
      <div class="main_container">
        <!--<div class="col-md-3 left_col">-->
          <!--<div class="left_col scroll-view">-->
           

           

            <!-- menu profile quick info -->
            
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
       <!--   </div>-->
        <!--</div>-->

        <!-- top navigation -->
       
        <!-- /top navigation -->

        <!-- page content -->



                    <!-- Smart Wizard -->
  
			
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">Step 1<br />
                                              <small>Step 1 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Step 2 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Step 3 description</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Step 4 description</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <form class="form-horizontal form-label-left">


<!-------------------------------------------------->
                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="casetitle">Case Title: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                            	<input type="text" id="casetitle" name="casetitle" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('casetitle')}}">
                          @if ($errors->has('casetitle'))
                          <span class="text-danger">{{ $errors->first('casetitle') }}</span>
                          @endif
                             
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="judgename">Judge Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
							 <input type="text" id="judgename" name="judgename" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('judgename')}}">
                          @if ($errors->has('judgename'))
                          <span class="text-danger">{{ $errors->first('judgename') }}</span>
                          @endif
                             
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="courtname" class="col-form-label col-md-3 col-sm-3 label-align">Court Name:</label>
                            <div class="col-md-6 col-sm-6 ">

                              <input type="text" id="courtname" name="courtname" class="form-control  error" style="text-transform: uppercase" value="{{old('courtname')}}">
                         @if ($errors->has('courtname'))
                          <span class="text-danger">{{ $errors->first('courtname') }}</span>
                          @endif
                            </div>
                          </div>




                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Hearing <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
							<input type="date" id="hearing_date" name="hearing_date" class="form-control  error" aria-required="true" value="{{old('hearing_date')}}">
                          @if ($errors->has('hearing_date'))
                          <span class="text-danger">{{ $errors->first('hearing_date') }}</span>
                          @endif
                             
                            </div>
                          </div>

                        </form>

                      </div>
    <!-------------------------------------------------------------------------------->                  
                      <div id="step-2">
                        <h2 class="StepTitle"><u>Advovate Details</u></h2>
                        <div class="form-group row">
                            <label for="emp_name" class="col-form-label col-md-3 col-sm-3 label-align">Associates Name</label>
                            <div class="col-md-6 col-sm-6 ">
							  <select id="emp_name" name="emp_name" class="form-control error" aria-required="true">
                              <option value="" selected disabled>Select Associates</option>
                              <option value="Dinesh">Dinesh</option>
                              <option value="Ramesh">Ramesh</option>
                              <option value="Suresh">Suresh</option>
                              </select>
                         @if ($errors->has('emp_name'))
                          <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                          @endif
                            </div>
                          </div>


						 <div class="form-group row">
                            <label for="emp_email" class="col-form-label col-md-3 col-sm-3 label-align">Associates Email</label>
                            <div class="col-md-6 col-sm-6 ">

                              <input type="email" id="emp_email" name="emp_email" class="form-control  error" style="text-transform: uppercase" value="{{old('emp_email')}}">
                         @if ($errors->has('emp_email'))
                          <span class="text-danger">{{ $errors->first('emp_email') }}</span>
                          @endif
                            </div>
                          </div>

                           <div class="form-group row">
                            <label for="emp_phone" class="col-form-label col-md-3 col-sm-3 label-align">Associates Phone</label>
                            <div class="col-md-6 col-sm-6 ">

                              <input type="text" id="emp_phone" name="emp_phone"  class="form-control  error"  value="{{old('emp_phone')}}">
                         @if ($errors->has('emp_phone'))
                          <span class="text-danger">{{ $errors->first('emp_phone') }}</span>
                          @endif
                            </div>
                          </div>

                      </div>

<!-------------------------------------------------------------------->

                      <div id="step-3">
                        <h2 class="StepTitle"><u>Client Details</u></h2>
                       
 							 <div class="form-group row">
                            <label for="client_name" class="col-form-label col-md-3 col-sm-3 label-align">Client Name</label>
                            <div class="col-md-6 col-sm-6 ">
							   <select id="client_name" name="client_name" class="form-control error" aria-required="true">
                              <option value="" selected disabled>Select Client Name</option>
                              <option value="Dinesh1">Dinesh1</option>
                              <option value="Ramesh1">Ramesh1</option>
                              <option value="Suresh1">Suresh1</option>
                              </select>
                         @if ($errors->has('client_name'))
                          <span class="text-danger">{{ $errors->first('client_name') }}</span>
                          @endif
                            </div>
                          </div>

						
						 <div class="form-group row">
                            <label for="client_email" class="col-form-label col-md-3 col-sm-3 label-align">Client Email</label>
                            <div class="col-md-6 col-sm-6 ">

                              <input type="email" id="client_email" name="client_email" class="form-control  error" style="text-transform: uppercase" value="{{old('client_email')}}">
                         @if ($errors->has('client_email'))
                          <span class="text-danger">{{ $errors->first('client_email') }}</span>
                          @endif
                            </div>
                          </div>

					  <div class="form-group row">
                            <label for="client_phone" class="col-form-label col-md-3 col-sm-3 label-align">Client Phone</label>
                            <div class="col-md-6 col-sm-6 ">

                              <input type="text" id="client_phone" name="client_phone"  class="form-control  error"  value="{{old('client_phone')}}">
                         @if ($errors->has('client_phone'))
                          <span class="text-danger">{{ $errors->first('client_phone') }}</span>
                          @endif
                            </div>
                          </div>


                      </div>

    <!------------------------------------------------------------------------->                  
                      <div id="step-4">
                        <h2 class="StepTitle"><u>Upload Documents & Notes</u></h2>
                      
                         <div class="form-group row">
                            <label for="notes" class="col-form-label col-md-3 col-sm-3 label-align">Notes:</label>
                            <div class="col-md-6 col-sm-6 ">
							<textarea id="notes" name="notes" class="form-control" aria-required="true">{{old('notes')}} </textarea>      
                     
                                                  
                            </div>
                          </div>

						 <div class="form-group row">
                            <label for="documents" class="col-form-label col-md-3 col-sm-3 label-align">Upload Document:</label>
                            <div class="col-md-6 col-sm-6 ">
							 <input type="file" class="form-control" name="documents" />
                     
                                                  
                            </div>
                          </div>

                      </div>
<!--------------------------------------------------------------------------->
                    </div>
                    <!-- End SmartWizard Content -->





                   
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>

    

	
  
 </div>
 @endsection