  @extends("Admin.adminLayout.admin_design")
@section("contents")

        <style>
.btn-circle.btn-sm { 
            width: 40px; 
            height: 40px; 
            padding: 6px 0px; 
            border-radius: 25px; 
            font-size: 12px; 
            text-align: center; 
        } 
     
    div#client{
        overflow: auto;
    }

        </style> 
           
<!------------------------------------>
           
            <!-- page content -->
        <div class="right_col" role="main">
          <h1>ADMIN DASHBOARD</h1>
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
        </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Network Activities <small>Graph title sub-title</small></h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 ">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3  bg-white">
                  <div class="x_title">
                    <h2>Top Campaign Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>Facebook Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Twitter Campaign</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 ">
                    <div>
                      <p>Conventional Media</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Bill boards</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

        <?php $widgets= Customfacade::allWidget();?>
            <h2>Available Widgets </h2>
			 <?php $widgets= Customfacade::allWidget(); print_r($widgets);?>
            <div class="card  ">
                <!----------------->
              <div class="row">
              <div class="card-body col-sm-4">
              <!----------------->
        <select name="widget" class="form-control" id="selectWidget">
        <option value=""  >Select Widget</option>
        @foreach($widgets as $widget)
          <option value="{{$widget->id}}">{{$widget->widget_name}}</option>
          @endforeach
          </select>
      </div>
<!----------------->
   <div class="card-body col-sm-4">
 


<div class="container">
  
  <!-- Button to Open the Modal -->
  <!--<button type="button" class="btn btn-primary btn-circle btn-sm goClass">Go</button> -->
   @csrf
   <button type="button" class="btn btn-success  btn-sm goClass" data-id="">Show Widget</button> 
   <!----------
<div class="container">
  <div class="inner first">Hello</div>
  <h2>New heading</h2>
  <div class="inner third">Goodbye</div>
</div>

	<!-----------
  <!--<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">
    Add Widget
  </button>-->

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Widget</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       <form id="widgetform" class="form-horizontal calender" role="form">
        @csrf

         <div class="form-group">
                  <label class="col-sm-3 control-label">Widget Name:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>
       </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger widgitclose" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary widgitsubmit" data-dismiss="modal">Add Widget</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>






   </div>
 </div>
<!----------------->
      </div>
   
       <br />
		<div id="outer">
          <div class="row" >

<!---------------------------------comment out these code from here------------------------------------>
		  {{-- <div class=" col-md-4 col-sm-4 client " id="client" style="display: none;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                  <h2>Latest Clients</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close" id="client-close" /></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

              
                  
<!------------------------------------------------>

    <table class="table">
                    <thead>
                      <tr>
                      <th>Name</th>
                     
                      <th>Mobile</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id="client-info">
                     
                 
                     <tr>
                    <td></td>
                     <td></td>
              
                      </tr>
                   
                 
                    </tbody>
                  </table>



  
                </div>
              </div>
            </div>
<!------------------------------>
            <div class="col-md-4 col-sm-4 " id="case" style="display: none;" >
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                  <h2>Cases<span style="font-size:15px;"> (Upcoming Hearing Dates) </span></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close" id="case-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

               
<table class="table">
                    <thead>
                      <tr>
                      <th>Case Title</th>
                     <!-- <th>Email</th>-->
                      <th>Hearing Date</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id="case-info">
                  
                      
                     
                    </tbody>
                  </table>


                </div>
              </div>
            </div>
<!------------------------------------------------------------->

            <div class="col-md-4 col-sm-4 " id="emp" style="display: none;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">

                  <h2>Employees</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close" id="emp-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <table class="table">
                    <thead>
                      <tr>
                      <th>Name</th>
                     <!-- <th>Email</th>-->
                      <!--<th>Type</th>-->
                       <th>Phone</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id="employee-info">
                     
                      
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

          </div>
		  </div><!------------outer div end here--------------------->
          <br/>
          <br/>
<!----------------------- DIV FOR UPDATE CASE WIDGET START HERE------------------------>

 <div class="row" >


            <div class=" col-md-4 col-sm-4 " id="update-case" style="display: none;" >
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                  <h2>CASES BY ASSOCIATE</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close" id="update-case-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

              
                  

    <table class="table">
                    <thead>
                      <tr>
                      <th>Case Title</th>
                    
                      <th>Associate</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id="update-case-info">
                   
                    </tbody>
                  </table>

                </div>
                 <a class="btn btn-success btn-sm pull-right" href="{{url('showAllCases')}}">More....</a>
              </div>
               
            </div>

         



<!----------------------- DIV FOR UPDATE CASE WIDGET END HERE------------------------>
<!------------------------DIV FOR EVENTS/MEETNGS WIDGET START HERE---------------------->
 <div class=" col-md-4 col-sm-4 " id="event" style="display: none;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                  <h2>EVENTS/MEETINGS</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close" id="event-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

              
                  

    <table class="table">
                    <thead>
                      <tr>
                      <th>Event Title</th>
                    
                      <th>Event Type</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id="event-info">

                    </tbody>
                  </table>

                </div>
              </div>
                
            </div>
     <!------------------------DIV FOR EVENTS/MEETINGS WIDGET END HERE---------------------->
      <!-----------DIV FOR TODAY/PAST HEARING DATE WIDGET START HERE---------------------->
<div class=" col-md-4 col-sm-4 " id="past-case" style="display: none;" >
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                  <h2>CASES<span style="font-size:14px;">(BY TODAY / PAST HEARING DATES)</span></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close" id="past-case-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

              
                  

    <table class="table">
                    <thead>
                      <tr>
                      <th>Dates</th>
                    
                      <th>Synopsis</th>
                      <th>Update</th>
                      </tr>
                    </thead>
                    <tbody id="past-case-info">

                    </tbody>
                  </table>

                </div>
              </div>
                
            </div>





 </div>--}}
 <!-----------DIV FOR TODAY/PAST HEARING DATE WIDGET END HERE---------------------->
 <!---------------------------------comment out above code end here------------------------------------>
<?php echo $OUTPUTS;?>
 <?php //echo $output_clients;?>
 <?php //echo $output_cases;?>
 <?php// echo $output_employees;?>
 <?php //echo $output_updated_cases;?>
 <?php //echo $output_events;?>
 <?php //echo $output_past_cases;?>

 


                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content --> 





<!------------------------------>         
       
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
	
	/////INSERT VALUE IN USER_WIDGET TABLE///////////
$(".goClass").click(function(){
var wizardValue=$("#selectWidget").val();
//alert(wizardValue);	
$('.goClass').attr('data-id' , wizardValue);
var token=$("input[name='_token']").val();
$.ajax({
	url:"{{url('/addWidget')}}",
	method:'POST',
	data:{widget_id:wizardValue,_token:token},
	success:function(data){
		 console.log(data);
		 setTimeout(function(){ location.reload(); }, 500);
	}
	
	
});	
//location.reload();
/*
//if(wizardValue==1)
	switch(wizardValue)
{
	case '1':
	$("#client").show();
	break;
	case '2':
	$("#case").show();
	break;
	case '3':
	 $("#emp").show();
	break;
	case '4':
	 $("#update-case").show();
	break;
	case '5':
	 $("#event").show();
	break;
	case '6':
	 $("#past-case").show();
	break;
	default:
	alert('No widget found!');
}
*/

});

});

///////////	// Update status as client deleted start here/////////////
$(document).ready(function(){
 $('#client-close').click(function() {
     
	// alert("wigdet calling");
var token=$("input[name='_token']").val();
$.ajax({
	url:"{{url('/updateUserWidget')}}",
	method:'POST',
	data: {widget_id:1, _token:token},
	 success: function(data) {
          console.log(data);
         //return false;
		 setTimeout(function(){ location.reload(); }, 500);
	 }
});
//location.reload();
});	
});
///////////	// Update status as client deleted end here/////////////	
	
	


</script>