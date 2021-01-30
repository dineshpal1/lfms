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

     .table > tbody > tr > td
{
   //padding:2px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
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

        
            <h2>Add a Widget </h2>
			 <?php $widgets= Customfacade::allWidget(); //print_r($widgets);?>
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
  
  
   @csrf
   <button type="button" class="btn btn-success  btn-sm goClass" data-id="">Show Widget</button> 
   <!-------------------->
			<div id="loader" style="position:absolute;left:60%;top:10%;display:none;">
			<img src="{{asset('images/8.gif')}}" alt="..."/>
			</div>
			<!-------------------->
  
</div>






   </div>
 </div>
<!----------------->
      </div>
   
       <br />
		<div id="outer" >
		
		
          <div class="row" >


<?php echo $OUTPUTS;?>
 

 


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


});

});


$(document).ready(function(){
$(document).ajaxStart(function(){
    $("#loader").css("display", "block");
  });	
	
	$(document).ajaxComplete(function(){
    $("#loader").css("display", "none");
  });
	
	
	
	
//////////// Update status as client deleted start here/////////////
 $('#client-close').click(function() {
     
	// alert("client deleted");
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

});	
///////////// Update status as client deleted end here/////////////

//////////// Update status as case deleted start here/////////////
 $('#case-close').click(function() {
     
	 //alert("case deleted");
var token=$("input[name='_token']").val();
$.ajax({
	url:"{{url('/updateUserWidget')}}",
	method:'POST',
	data: {widget_id:2, _token:token},
	 success: function(data) {
          console.log(data);
         //return false;
		 setTimeout(function(){ location.reload(); }, 500);
	 }
});

});	
///////////// Update status as case deleted end here/////////////

//////////// Update status as employee deleted start here/////////////
 $('#emp-close').click(function() {
     
	 //alert("Employee deleted");
var token=$("input[name='_token']").val();
$.ajax({
	url:"{{url('/updateUserWidget')}}",
	method:'POST',
	data: {widget_id:3, _token:token},
	 success: function(data) {
          console.log(data);
         //return false;
		 setTimeout(function(){ location.reload(); }, 500);
	 }
});

});	
///////////// Update status as employee deleted end here/////////////

//////////// Update status as employee deleted start here/////////////
 $('#update-case-close').click(function() {
     
	 //alert("update case deleted");
var token=$("input[name='_token']").val();
$.ajax({
	url:"{{url('/updateUserWidget')}}",
	method:'POST',
	data: {widget_id:4, _token:token},
	 success: function(data) {
          console.log(data);
         //return false;
		 setTimeout(function(){ location.reload(); }, 500);
	 }
});

});	
///////////// Update status as employee deleted end here/////////////

//////////// Update status as employee deleted start here/////////////
 $('#event-close').click(function() {
     
	 //alert("event deleted");
var token=$("input[name='_token']").val();
$.ajax({
	url:"{{url('/updateUserWidget')}}",
	method:'POST',
	data: {widget_id:5, _token:token},
	 success: function(data) {
          console.log(data);
         //return false;
		 setTimeout(function(){ location.reload(); }, 500);
	 }
});

});	
///////////// Update status as employee deleted end here/////////////

//////////// Update status as employee deleted start here/////////////
 $('#past-case-close').click(function() {
     
	 //alert("past-case-close deleted");
var token=$("input[name='_token']").val();
$.ajax({
	url:"{{url('/updateUserWidget')}}",
	method:'POST',
	data: {widget_id:6, _token:token},
	 success: function(data) {
          console.log(data);
         //return false;
		 setTimeout(function(){ location.reload(); }, 500);
	 }
});

});	
///////////// Update status as employee deleted end here/////////////

});
	
	
	


</script>