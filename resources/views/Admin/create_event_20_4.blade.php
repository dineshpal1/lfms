        @include("Admin.adminLayout.admin_header")
            <!-- sidebar menu -->
          @include("Admin.adminLayout.admin_sidebar")
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
    @include("Admin.adminLayout.admin_top_navigation")
        <!-- /top navigation -->

        <!-- page content -->
       <!-- page content -->
        <div class="right_col" role="main">
       <?php
//require_once('bdd.php');


//$sql = "SELECT id, title, start, end, color FROM events ";

//$req = $bdd->prepare($sql);
//$req->execute();

//$events = $req->fetchAll();

?>



    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{asset('css/css/bootstrap.min.css')}}" rel="stylesheet" /> 
  
  <!-- FullCalendar -->
 <!--  <link href='css/fullcalendar.css' rel='stylesheet' /> -->
   <link href="{{asset('css/css/fullcalendar.css')}}" rel="stylesheet" />


    <!-- Custom CSS -->
    <style>

.navbar-nav {
    float: right;
    margin: 0;
}

    body {
        padding-top: 2px;
         padding-left: 2px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    #calendar {
    max-width: 750px;
    float: right;
}
 
 
  .col-centered{
    float: none;
    margin: 0 auto;
  }
  .col-lg-12 {
    width: 75%;
}

    </style>


 

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
               
                <div id="calendar" class="col-centered">
                </div>
            </div>
      
        </div>
        <!-- /.row -->
    
    <!-- Modal -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="{{ url('addEvent') }}">
      @csrf
        <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Add Event</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          </div>
       <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Event Type</label>
          <div class="col-sm-10">
            <select name="event_type" class="form-control" id="color">
              <option value="">Choose Event Type</option>
              <option  value="Meeting">Meeting</option>
              <option  value="Court hearing date">Court hearing date</option>
              <option  value="office internal meet">Office internal meet</option>             
              <option  value="office internal discussion meet">Office internal discussion meet</option>
              <option  value="office event">Office event</option>
              <option  value="reminder">Reminder</option>
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Choose</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
              <option style="color:#008000;" value="#008000">&#9724; Green</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
              <option style="color:#000;" value="#000">&#9724; Black</option>
              
            </select>
          </div>
          </div>
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Changa|Frank+Ruhl+Libre:500">
       

          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Start Date Time</label>
          <div class="col-sm-5">
           <input type="date" name="start" class="form-control" id="start">
<!--             <input data-clocklet="format: h:mm a" value="1:23 pm">
 -->            
 <!-- <input data-clocklet="class-name: my-clocklet-style; placement: top;"> -->

          </div>
          <div class="col-sm-5">
<!--            <input type="text" id="start_time" name="start_time" class="form-control">
 -->           <select id="start_time" name="start_time" class="form-control">
             <option value="06:00 AM">06:00 AM</option>
             <option value="07:00 AM">07:00 AM</option>
             <option value="08:00 AM">08:00 AM</option>
             <option value="09:00 AM">09:00 AM</option>
             <option value="10:00 AM">10:00 AM</option>
             <option value="11:00 AM">11:00 AM</option>
             <option value="12:00 PM">12:00 PM</option>
             <option value="01:00 PM">01:00 PM</option>
             <option value="02:00 PM">02:00 PM</option>
             <option value="03:00 PM">03:00 PM</option>
             <option value="04:00 PM">04:00 PM</option>
             <option value="05:00 PM">05:00 PM</option>
             <option value="06:00 PM">06:00 PM</option>
             <option value="07:00 PM">07:00 PM</option>
             <option value="08:00 PM">08:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="10:00 PM">10:00 PM</option>
             <option value="11:00 PM">11:00 PM</option>
             <option value="12:00 AM">12:00 AM</option>
             <option value="01:00 AM">01:00 AM</option>
             <option value="02:00 AM">02:00 AM</option>
             <option value="03:00 AM">03:00 AM</option>
             <option value="04:00 AM">04:00 AM</option>
             <option value="05:00 AM">05:00 AM</option>
             

           </select>
          </div>
          </div>
         
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">End Date Time</label>
          <div class="col-sm-5">
            <input type="date" name="end" class="form-control" id="end">
          </div>

          <div class="col-sm-5">
<!--            <input type="text" id="start_time" name="start_time" class="form-control">
 -->           <select id="end_time" name="end_time" class="form-control">
             <option value="06:00 AM">06:00 AM</option>
             <option value="07:00 AM">07:00 AM</option>
             <option value="08:00 AM">08:00 AM</option>
             <option value="09:00 AM">09:00 AM</option>
             <option value="10:00 AM">10:00 AM</option>
             <option value="11:00 AM">11:00 AM</option>
             <option value="12:00 PM">12:00 PM</option>
             <option value="01:00 PM">01:00 PM</option>
             <option value="02:00 PM">02:00 PM</option>
             <option value="03:00 PM">03:00 PM</option>
             <option value="04:00 PM">04:00 PM</option>
             <option value="05:00 PM">05:00 PM</option>
             <option value="06:00 PM">06:00 PM</option>
             <option value="07:00 PM">07:00 PM</option>
             <option value="08:00 PM">08:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="10:00 PM">10:00 PM</option>
             <option value="11:00 PM">11:00 PM</option>
             <option value="12:00 AM">12:00 AM</option>
             <option value="01:00 AM">01:00 AM</option>
             <option value="02:00 AM">02:00 AM</option>
             <option value="03:00 AM">03:00 AM</option>
             <option value="04:00 AM">04:00 AM</option>
             <option value="05:00 AM">05:00 AM</option>
             

           </select>
          </div>
          </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
      </div>
    </div>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="{{ url('updateEvent') }}">
         @csrf
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Title</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          </div>
       <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Event Type</label>
          <div class="col-sm-10">
<!--           <input type="text" name="event_type" class="form-control" id="event_type">
 -->            <select name="event_type" class="form-control" id="event_type">
              <option value="">Choose Event Type</option>
              <option  value="Meeting">Meeting</option>
              <option  value="Court hearing date">Court hearing date</option>
              <option  value="office internal meet">Office internal meet</option>             
              <option  value="office internal discussion meet">Office internal discussion meet</option>
              <option  value="office event">Office event</option>
              <option  value="reminder">Reminder</option>
            </select>
          </div>
          </div>
           <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Client</label>
          <div class="col-sm-10">
            <select name="client" class="form-control" id="client">
              <option value="">Choose Client</option>
             <?php foreach($allclient as $client){?>
              <option value="<?php echo $client->id?>"><?php echo $client->name?></option>
            <?php }?>
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Color</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Choose</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
              <option style="color:#008000;" value="#008000">&#9724; Green</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
              <option style="color:#000;" value="#000">&#9724; Black</option>
              
            </select>
          </div>
          </div>
             <div class="form-group">
          <label for="start" class="col-sm-2 control-label">Start Date Time</label>
          <div class="col-sm-5">
           <input type="date" name="start" class="form-control" id="start">
<!--             <input data-clocklet="format: h:mm a" value="1:23 pm">
 -->            
 <!-- <input data-clocklet="class-name: my-clocklet-style; placement: top;"> -->

          </div>
          <div class="col-sm-5">
<!--            <input type="text" id="start_time" name="start_time" class="form-control">
 -->           <select id="start_time" name="start_time" class="form-control">
             <option value="06:00 AM">06:00 AM</option>
             <option value="07:00 AM">07:00 AM</option>
             <option value="08:00 AM">08:00 AM</option>
             <option value="09:00 AM">09:00 AM</option>
             <option value="10:00 AM">10:00 AM</option>
             <option value="11:00 AM">11:00 AM</option>
             <option value="12:00 PM">12:00 PM</option>
             <option value="01:00 PM">01:00 PM</option>
             <option value="02:00 PM">02:00 PM</option>
             <option value="03:00 PM">03:00 PM</option>
             <option value="04:00 PM">04:00 PM</option>
             <option value="05:00 PM">05:00 PM</option>
             <option value="06:00 PM">06:00 PM</option>
             <option value="07:00 PM">07:00 PM</option>
             <option value="08:00 PM">08:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="10:00 PM">10:00 PM</option>
             <option value="11:00 PM">11:00 PM</option>
             <option value="12:00 AM">12:00 AM</option>
             <option value="01:00 AM">01:00 AM</option>
             <option value="02:00 AM">02:00 AM</option>
             <option value="03:00 AM">03:00 AM</option>
             <option value="04:00 AM">04:00 AM</option>
             <option value="05:00 AM">05:00 AM</option>
             

           </select>
          </div>
          </div>
         
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">End Date Time</label>
          <div class="col-sm-5">
            <input type="date" name="end" class="form-control" id="end">
          </div>

          <div class="col-sm-5">
<!--            <input type="text" id="start_time" name="start_time" class="form-control">
 -->           <select id="end_time" name="end_time" class="form-control">
             <option value="06:00 AM">06:00 AM</option>
             <option value="07:00 AM">07:00 AM</option>
             <option value="08:00 AM">08:00 AM</option>
             <option value="09:00 AM">09:00 AM</option>
             <option value="10:00 AM">10:00 AM</option>
             <option value="11:00 AM">11:00 AM</option>
             <option value="12:00 PM">12:00 PM</option>
             <option value="01:00 PM">01:00 PM</option>
             <option value="02:00 PM">02:00 PM</option>
             <option value="03:00 PM">03:00 PM</option>
             <option value="04:00 PM">04:00 PM</option>
             <option value="05:00 PM">05:00 PM</option>
             <option value="06:00 PM">06:00 PM</option>
             <option value="07:00 PM">07:00 PM</option>
             <option value="08:00 PM">08:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="09:00 PM">09:00 PM</option>
             <option value="10:00 PM">10:00 PM</option>
             <option value="11:00 PM">11:00 PM</option>
             <option value="12:00 AM">12:00 AM</option>
             <option value="01:00 AM">01:00 AM</option>
             <option value="02:00 AM">02:00 AM</option>
             <option value="03:00 AM">03:00 AM</option>
             <option value="04:00 AM">04:00 AM</option>
             <option value="05:00 AM">05:00 AM</option>
             

           </select>
          </div>
          </div>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
              </div>
            </div>
          </div>
          
          <input type="hidden" name="id" class="form-control" id="id">
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
      </div>
    </div>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
  

    <script src="{{asset('js/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
  <!--   <script src="js/bootstrap.min.js"></script> -->

    <script src="{{asset('js/js/bootstrap.min.js')}}"></script>
  
  <!-- FullCalendar -->
 
  
  <script src="{{asset('js/js/moment.min.js')}}"></script>
  <script src="{{asset('js/js/fullcalendar.min.js')}}"></script>
  <script>
$(document).ready(function(){
 $(".nav_menu").trigger('click');

});
  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: '2020-04-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          //alert(event.event_type);
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #color').val(event.color);
           $('#ModalEdit #event_type').val(event.event_type);
          $('#ModalEdit #start').val(event.start);
          $('#ModalEdit #start_time').val(event.start_time); 
           $('#ModalEdit #end').val(event.end);
          $('#ModalEdit #end_time').val(event.end_time); 

          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
      <?php foreach($events as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
         event_type: '<?php echo $event['event_type']; ?>',
         start: '<?php echo $start; ?>',
         end: '<?php echo $end; ?>',
        start_time: '<?php echo $event['start_time']; ?>',
         end_time: '<?php echo $event['end_time']; ?>',
        },
      <?php endforeach; ?>
      ]
    });
    
    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Saved');
          }else{
            alert('Could not be saved. try again.'); 
          }
        }
      });
    }
    
  });

</script>


        </div>
        <!-- /page content -->
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
<!--     <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
 -->    <!-- Bootstrap -->
<!--    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
 -->    <!-- FastClick -->
<!--     <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
 -->    <!-- NProgress -->
<!--     <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
 -->    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
  </body>
</html>