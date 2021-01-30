<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
              <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
    <style>
#casetitle::-webkit-input-placeholder { font-size:small; font-style: italic;color:pink;}
#casetitle::-ms-input-placeholder {font-size:small; font-style: italic;color:pink; }
#casetitle::-moz-placeholder {font-size:small; font-style: italic;color:pink; }

#judgename::-webkit-input-placeholder { font-size:small; font-style: italic;color:pink;}
#judgename::-ms-input-placeholder {font-size:small; font-style: italic;color:pink; }
#judgename::-moz-placeholder {font-size:small; font-style: italic;color:pink; }

#courtname::-webkit-input-placeholder { font-size:small; font-style: italic;color:pink;}
#courtname::-ms-input-placeholder {font-size:small; font-style: italic;color:pink; }
#courtname::-moz-placeholder {font-size:small; font-style: italic;color:pink; }

#first_hearing_date::-webkit-input-placeholder { font-size:small; font-style: italic;color:pink;}
#first_hearing_date::-ms-input-placeholder {font-size:small; font-style: italic;color:pink; }
#first_hearing_date::-moz-placeholder {font-size:small; font-style: italic;color:pink; }

    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
        
         <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard <!--<span class="fa fa-chevron-down"></span>--></a>
                 
                  </li>
                  
                  <li><a href="{{url('showAllCases')}}"><i class="fa fa-suitcase" aria-hidden="true"></i> Case Management <!--<span class="fa fa-chevron-down"></span>--></a>
               
                  </li>
                  <li><a href="{{url('/showCalendar')}}"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar <!-- <span class="fa fa-chevron-down"></span>--></a>
                   
                  </li>
                  <li><a><i class="fa fa-align-justify" aria-hidden="true"></i> Cause List <!--<span class="fa fa-chevron-down"></span>--></a>
                  
                  </li>
                  <li><a href="{{url('showAllClient')}}"><i class="fa fa-table"></i> Client Management <!-- <span class="fa fa-chevron-down"></span>--></a>
                  
                  </li>
          <li><a href="{{url('showAllEmp')}}"><i class="fa fa-group"></i> Employee Management <!-- <span class="fa fa-chevron-down"></span>--></a>
                   </li>
            <li><a href="{{url('todos')}}"><i class="fa fa-list" aria-hidden="true"></i> To-Do List <!-- <span class="label label-success pull-right"></span>--></a></li>
                  <li><a><i class="fa fa-wrench" aria-hidden="true"></i>Firm Setting <!--<span class="fa fa-chevron-down"></span>--></a>
                  
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <!--<h3>Live On</h3>-->
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-cog" aria-hidden="true"></i> Administration <!--<span class="fa fa-chevron-down"></span>--></a>
                  
                  </li>
                  <li><a href="{{url('showAlldoc')}}"><i class="fa fa-file" aria-hidden="true"></i> Document Templates <!--<span class="fa fa-chevron-down"></span>--></a>
                 
                  </li>
                  <li><a><i class="fa fa-envelope-o"></i> Text Messages <!-- <span class="fa fa-chevron-down"></span>--></a>
                 
                  </li>   

           <li><a><i class="fa fa-bar-chart" aria-hidden="true"></i> Reports  <span class="fa fa-chevron-down"></span></a>
          <ul>
           <li><a> Invoices <!-- <span class="fa fa-chevron-down"></span>--></a>
                   </li>
         
           </ul>
                   </li>
          
             <li><a><i class="fa fa-file-archive-o" aria-hidden="true"></i>Archive <span class="fa fa-chevron-down"></span></a>
                      <ul>
                         <li><a href="{{url('archiveCase')}}">Case Archive</a></li>
                        <li><a href="{{url('archiveClient')}}">Client Archive</a></li>
                        <li><a href="{{url('archiveEmployee')}}">Employee Archive</a></li>
                      </ul>
                     </li>
                   
                   
                   <!--<li><a><i class="fa fa-sitemap"></i> New Inquiries  <span class="fa fa-chevron-down"></span></a>
                   </li>-->
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt="">John Doe
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Case Management<small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Case Details</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Associate Details</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Client Details</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Case Document</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <form class="form-horizontal form-label-left" id="form-step-1">
                         @csrf
                              <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="casetitle">Case Title: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                              <input type="text" id="casetitle" name="casetitle" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('casetitle')}}" placeholder="Enter case title(e.g.Dinesh v/s Arvind)">
                          @if ($errors->has('casetitle'))
                          <span class="text-danger">{{ $errors->first('casetitle') }}</span>
                          @endif
                             
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="judgename">Judge Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
               <input type="text" id="judgename" name="judgename" class="form-control  error" aria-required="true" style="text-transform: uppercase" value="{{old('judgename')}}"  placeholder="Enter Judge name(e.g.ADJ Dinesh)">
                          @if ($errors->has('judgename'))
                          <span class="text-danger">{{ $errors->first('judgename') }}</span>
                          @endif
                             
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="courtname" class="col-form-label col-md-3 col-sm-3 label-align">Court Name:</label>
                            <div class="col-md-6 col-sm-6 ">

                              <input type="text" id="courtname" name="courtname" class="form-control  error" style="text-transform: uppercase" value="{{old('courtname')}}" placeholder="Enter court name(e.g.31,Tis hazari court)">
                         @if ($errors->has('courtname'))
                          <span class="text-danger">{{ $errors->first('courtname') }}</span>
                          @endif
                            </div>
                          </div>




                          <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">First Date Of Hearing <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
              <input type="date" id="first_hearing_date" name="first_hearing_date" class="form-control  error" aria-required="true" value="{{old('first_hearing_date')}}" placeholder="Enter hearing date(e.g.12/31/2020)">
                          @if ($errors->has('first_hearing_date'))
                          <span class="text-danger">{{ $errors->first('first_hearing_date') }}</span>
                          @endif
                             
                            </div>
                          </div>

                        </form>

                      </div>
                        <div id="step-2">
                       <form class="form-horizontal form-label-left" id="form-step-2">
                         @csrf
                        <!--  <h3>Autocomplete:</h3>
      <span class="autocomplete-select"></span>
     <input type="hidden" name="c_id" value="" id="c_id"> -->
                        <h2 class="StepTitle"><u>Advovate Details</u></h2>
                        <span class="autocomplete-select" placeholder="Search client name">Search associate name</span>
     <input type="hidden" name="assoc_id" value="" id="assoc_id">
                       <!--  <div class="form-group row">
                            <label for="emp_name" class="col-form-label col-md-3 col-sm-3 label-align">Associates Name</label>
                            <div class="col-md-6 col-sm-6 ">
                <select id="emp_name" name="emp_name" class="form-control error" aria-required="true">
                   <option value="" selected>Select Associates</option>
                  <?php foreach($emp as $advovate){?>
                             
                    <option value="<?php echo $advovate->id; ?>"><?php echo $advovate->name; ?></option>
                           
                     <?php }?>         
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
                          </div> -->
                          <input type="hidden" name="step2_id" value="" id="step2_id">
                      </form>
                      </div>
                       <div id="step-3">
                     <form class="form-horizontal form-label-left" id="form-step-3">
                         @csrf
                        <h2 class="StepTitle"><u>Client Details</u></h2>
                       <span class="autocomplete-select" id="client-select" placeholder="Search client name">Search client name</span>
     <input type="hidden" name="client_id" value="" id="client_id">

               <!-- <div class="form-group row">
                            <label for="client_name" class="col-form-label col-md-3 col-sm-3 label-align">Client Name</label>
                            <div class="col-md-6 col-sm-6 ">
                 <select id="client_name" name="client_name" class="form-control error" aria-required="true">
                              <option value="" selected>Select Client Name</option>
                  <?php foreach($clients as $client){?>
                             
                    <option value="<?php echo $client->id; ?>"><?php echo $client->name; ?></option>
                           
                     <?php }?>    
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
                          </div> -->
                <input type="hidden" name="step3_id" value="" id="step3_id">

                    </form>
                      </div>
                      <div id="step-4">
               <form class="form-horizontal form-label-left" id="form-step-4"  enctype="multipart/form-data" name="upload-image" action="{{ url('saveCaseDocument') }}">
               @csrf
             
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
                 <input type="file" class="form-control" name="documents" id="documents">    
                                                  
                            </div>
                          </div>
             <input type="hidden" name="step4_id" value="" id="step4_id">
             
                        </form>
                      </div>
                    </div>
                    <!-- End SmartWizard Content -->





                    <!-- Tabs -->
                    
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- jQuery Smart Wizard -->
    <script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>

  
  </body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
      if ($("#wizard").smartWizard('currentStep') == 0 ) {
    //perform_action();
   console.log("fgfgf");
}else{
   console.log($("#wizard").smartWizard('currentStep'));
}

$(".buttonNext").click(function(){
  //console.log('click');
    // console.log($("#wizard").smartWizard('currentStep'));
    
    // To save Client Data
     if($("#wizard").smartWizard('currentStep')==2)
     {
    //  alert($('#form-step-1').serialize());
      var formData=$('#form-step-1').serialize();

       //var branch_code = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ url('/saveCaseDetails')}}",
          method: 'POST',
          data: {formData:formData, _token:token},
          success: function(data) {

            console.log(data);
          $('#step2_id').val(data);
          $('#step3_id').val(data);
          $('#step4_id').val(data);
           // return false;
        
            
          }
      });

     }
      // To Update  Client Data as AssociateDetail
     if($("#wizard").smartWizard('currentStep')==3)
     {
     // alert($('#form-step-2').serialize());
      ////////////////////////////////////////
      var formData=$('#form-step-2').serialize();

       //var branch_code = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ url('/saveAssociateDetails')}}",
          method: 'POST',
          data: {formData:formData, _token:token},
          success: function(data) {

            console.log(data);
          //$('#step2_id').val(data);
            //return false;
        
            
          }
      });

     }

      // To Update  Client Data as Client Detail
     if($("#wizard").smartWizard('currentStep')==4)
     {
      //alert($('#form-step-3').serialize());
      ////////////////////////////////////////
      var formData=$('#form-step-3').serialize();

       //var branch_code = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ url('/saveClientDetails')}}",
          method: 'POST',
          data: {formData:formData, _token:token},
          success: function(data) {

            console.log(data);
          //$('#step2_id').val(data);
            //return false;
        
            
          }
      });

     }
      
 });

/*

$(".buttonFinish").click(function(){

var file_data = $("#form-step-4")[0].files;

        var form_data = new FormData();
        form_data.append('file', file_data);


    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       url: "{{ url('/saveCaseDocument')}}",
      //  type: 'POST',              
       // data: formData,
          dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
        success: function(result)
        {
          //  location.reload();
            console.log(result);
            return false;
        },
        error: function(data)
        {
            console.log(data);
        }
    });
     
    }); 

*/


    $("select[name='emp_name']").change(function(){
      var emp_name = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ url('/getEmpDetails')}}",
          method: 'POST',
          data: {emp_name:emp_name, _token:token},
          success: function(data) {
          
           var arraydata = JSON.parse(data);

              //reading data using index
              var email = arraydata[0]["email"];
              var phone = arraydata[0]["phone"];
              $("input[name='emp_email'").val(email);
              $("input[name='emp_phone'").val(phone);

            console.log(data);
         
            return false;
          
          }
      });
  });

     $("select[name='client_name']").change(function(){
      var client_name = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ url('/getClientData')}}",
          method: 'POST',
          data: {client_name:client_name, _token:token},
          success: function(data) {
          
          var arraydata = JSON.parse(data);

              //reading data using index
             var email = arraydata[0]["email"];
              var phone = arraydata[0]["mobile1"];
             $("input[name='client_email'").val(email);
              $("input[name='client_phone'").val(phone);

            console.log(data);
         
            return false;
          
          }
      });
  });

 });     
</script>
<script type="text/javascript">
     $(document).ready(function() {
   // $.noConflict();
    $('.buttonFinish').on("click", function (e) {

     //  var notes = $("input[name='notes']").val();

        var notes = $.trim($("#notes").val());

         var step4_id = $("input[name='step4_id']").val();

       
      // alert(notes);
       // alert(step4_id);

        var uploadedFile = new FormData();
        uploadedFile.append('documents', documents.files[0]);
        uploadedFile.append('notes', notes);
        uploadedFile.append('step4_id', step4_id);
        $.ajax({
         // url: 'lab1.php',
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       url: "{{ url('/saveCaseDocument')}}",
          type: 'POST',
          processData: false, // important
          contentType: false, // important
          dataType : 'json',
         // data: uploadedFile,
           data: uploadedFile,
           success: function(result)
        {
          //  location.reload();
            console.log(result);
            //return false;
            window.location.href = "showAllCases";
        },
        error: function(data)
        {
            console.log(data);
        }
        });
    });

 });
/*

      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       url: "{{ url('/saveCaseDocument')}}",
      //  type: 'POST',              
       // data: formData,
          dataType    : 'text',           // what to expect back from the PHP script, if anything
                cache       : false,
                contentType : false,
                processData : false,
                data        : form_data,                         
                type        : 'post',
        success: function(result)
        {
          //  location.reload();
            console.log(result);
            return false;
        },
        error: function(data)
        {
            console.log(data);
        }*/
</script>

 <script src="{{asset('dist/js/bundle.min.js')}}"></script>
    <script>
    

      var autocomplete = new SelectPure(".autocomplete-select", {
        options:<?php echo $empjson;?>,
        /*options: [
          {
            label: "Barbina",
            value: "ba",
          },
          {
            label: "Bigoli",
            value: "bg",
          },
          {
            label: "Bucatini",
            value: "bu",
          },
          {
            label: "Busiate",
            value: "bus",
          },
          {
            label: "Capellini",
            value: "cp",
          },
          {
            label: "Fedelini",
            value: "fe",
          },
          {
            label: "Maccheroni",
            value: "ma",
          },
          {
            label: "Spaghetti",
            value: "sp",
          },
        ],

        */
      //  value: ["sp"],
        multiple: true,
        autocomplete: true,
        icon: "fa fa-times",
        onChange: value => { console.log(value);
           $('#assoc_id').val(value);
         },
        classNames: {
          select: "select-pure__select",
          dropdownShown: "select-pure__select--opened",
          multiselect: "select-pure__select--multiple",
          label: "select-pure__label",
          placeholder: "Search Cleint Name",
          dropdown: "select-pure__options",
          option: "select-pure__option",
          autocompleteInput: "select-pure__autocomplete",
          selectedLabel: "select-pure__selected-label",
          selectedOption: "select-pure__option--selected",
          placeholderHidden: "select-pure__placeholder--hidden",
          optionHidden: "select-pure__option--hidden",
        }
      });
      var resetAutocomplete = function() {
        autocomplete.reset();
      };

 var autocomplete2 = new SelectPure("#client-select", {
        options:<?php echo $clientjson;?>,
       
      //  value: ["sp"],
        multiple: true,
        autocomplete: true,
        icon: "fa fa-times",
        onChange: value => { console.log(value);
           $('#client_id').val(value);
         },
        classNames: {
          select: "select-pure__select",
          dropdownShown: "select-pure__select--opened",
          multiselect: "select-pure__select--multiple",
          label: "select-pure__label",
          placeholder: "Search Cleint Name",
          dropdown: "select-pure__options",
          option: "select-pure__option",
          autocompleteInput: "select-pure__autocomplete",
          selectedLabel: "select-pure__selected-label",
          selectedOption: "select-pure__option--selected",
          placeholderHidden: "select-pure__placeholder--hidden",
          optionHidden: "select-pure__option--hidden",
        }
      });
      var resetAutocomplete = function() {
        autocomplete2.reset();
      };

    </script>
    <style>
      body {
        font-family: "Roboto", sans-serif;
      }

      .select-wrapper {
        margin: auto;
        max-width: 600px;
        width: calc(100% - 40px);
      }

      .select-pure__select {
        align-items: center;
        background: #f9f9f8;
        border-radius: 4px;
        border: 1px solid rgba(0, 0, 0, 0.15);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        box-sizing: border-box;
        color: #363b3e;
        cursor: pointer;
        display: flex;
        font-size: 16px;
        font-weight: 500;
        justify-content: left;
        min-height: 44px;
        padding: 5px 10px;
        position: relative;
        transition: 0.2s;
        width: 100%;
      }

      .select-pure__options {
        border-radius: 4px;
        border: 1px solid rgba(0, 0, 0, 0.15);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        box-sizing: border-box;
        color: #363b3e;
        display: none;
        left: 0;
        max-height: 221px;
        overflow-y: scroll;
        position: absolute;
        top: 50px;
        width: 100%;
        z-index: 5;
      }

      .select-pure__select--opened .select-pure__options {
        display: block;
      }

      .select-pure__option {
        background: #fff;
        border-bottom: 1px solid #e4e4e4;
        box-sizing: border-box;
        height: 44px;
        line-height: 25px;
        padding: 10px;
      }

      .select-pure__option--disabled {
        color: #e4e4e4;
      }

      .select-pure__option--selected {
        color: #e4e4e4;
        cursor: initial;
        pointer-events: none;
      }

      .select-pure__option--hidden {
        display: none;
      }

      .select-pure__selected-label {
        align-items: 'center';
        background: #5e6264;
        border-radius: 4px;
        color: #fff;
        cursor: initial;
        display: inline-flex;
        justify-content: 'center';
        margin: 5px 10px 5px 0;
        padding: 3px 7px;
      }

      .select-pure__selected-label:last-of-type {
        margin-right: 0;
      }

      .select-pure__selected-label i {
        cursor: pointer;
        display: inline-block;
        margin-left: 7px;
      }

      .select-pure__selected-label img {
        cursor: pointer;
        display: inline-block;
        height: 18px;
        margin-left: 7px;
        width: 14px;
      }

      .select-pure__selected-label i:hover {
        color: #e4e4e4;
      }

      .select-pure__autocomplete {
        background: #f9f9f8;
        border-bottom: 1px solid #e4e4e4;
        border-left: none;
        border-right: none;
        border-top: none;
        box-sizing: border-box;
        font-size: 16px;
        outline: none;
        padding: 10px;
        width: 100%;
      }

      .select-pure__placeholder--hidden {
        display: none;
      }
      .stepContainer{
        height: 400px !important;
      }
    </style>