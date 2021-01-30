<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="{{asset('vendors/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/fullcalendar/dist/fullcalendar.print.css')}}" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
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

             @include("Admin.adminLayout.admin_sidebar")
            <!-- <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div> -->
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
            <!-- <div class="page-title">
              <div class="title_left">
                <h3>Calendar <small>Click to add/edit events</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar Events <small>Sessions</small></h2>
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
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id='calendar'></div>

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

       <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add Event</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                @csrf
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Event Type</label>
                  <div class="col-sm-9">
              <select name="event_type" class="form-control" id="event_type">
              <option value="">Choose Event Type</option>
              <option  value="Meeting">Meeting</option>
              <option  value="Court hearing date">Court hearing date</option>
              <option  value="office internal meet">Office internal meet</option>             
              <option  value="office internal discussion meet">Office internal discussion meet</option>
              <option  value="office event">Office event</option>
              <option  value="reminder">Reminder</option>
            </select>                  </div>
                </div>
                <div class="form-group">
             <label for="start" class="col-sm-3 control-label">Start DateTime</label>
          <div class="col-sm-5">
           <input type="date" name="start" class="form-control" id="start">
          </div>
          <div class="col-sm-4">
         <select id="start_time" name="start_time" class="form-control">
              <option value="6:00 AM">06:00 AM</option>
             <option value="7:00 AM">07:00 AM</option>
             <option value="8:00 AM">08:00 AM</option>
             <option value="9:00 AM">09:00 AM</option>
             <option value="10:00 AM">10:00 AM</option>
             <option value="11:00 AM">11:00 AM</option>
             <option value="12:00 PM">12:00 PM</option>
             <option value="1:00 PM">01:00 PM</option>
             <option value="2:00 PM">02:00 PM</option>
             <option value="3:00 PM">03:00 PM</option>
             <option value="4:00 PM">04:00 PM</option>
             <option value="5:00 PM">05:00 PM</option>
             <option value="6:00 PM">06:00 PM</option>
             <option value="7:00 PM">07:00 PM</option>
             <option value="8:00 PM">08:00 PM</option>
             <option value="9:00 PM">09:00 PM</option>
             <option value="10:00 PM">10:00 PM</option>
             <option value="11:00 PM">11:00 PM</option>
             <option value="12:00 AM">12:00 AM</option>
             <option value="1:00 AM">01:00 AM</option>
             <option value="2:00 AM">02:00 AM</option>
             <option value="3:00 AM">03:00 AM</option>
             <option value="4:00 AM">04:00 AM</option>
             <option value="5:00 AM">05:00 AM</option>
            </select>
          </div>
          </div>
           <div class="form-group">
             <label for="end" class="col-sm-3 control-label">End DateTime</label>
          <div class="col-sm-5">
           <input type="date" name="end" class="form-control" id="end">
          </div>
          <div class="col-sm-4">
         <select id="end_time" name="end_time" class="form-control">
              <option value="6:00 AM">06:00 AM</option>
             <option value="7:00 AM">07:00 AM</option>
             <option value="8:00 AM">08:00 AM</option>
             <option value="9:00 AM">09:00 AM</option>
             <option value="10:00 AM">10:00 AM</option>
             <option value="11:00 AM">11:00 AM</option>
             <option value="12:00 PM">12:00 PM</option>
             <option value="1:00 PM">01:00 PM</option>
             <option value="2:00 PM">02:00 PM</option>
             <option value="3:00 PM">03:00 PM</option>
             <option value="4:00 PM">04:00 PM</option>
             <option value="5:00 PM">05:00 PM</option>
             <option value="6:00 PM">06:00 PM</option>
             <option value="7:00 PM">07:00 PM</option>
             <option value="8:00 PM">08:00 PM</option>
             <option value="9:00 PM">09:00 PM</option>
             <option value="10:00 PM">10:00 PM</option>
             <option value="11:00 PM">11:00 PM</option>
             <option value="12:00 AM">12:00 AM</option>
             <option value="1:00 AM">01:00 AM</option>
             <option value="2:00 AM">02:00 AM</option>
             <option value="3:00 AM">03:00 AM</option>
             <option value="4:00 AM">04:00 AM</option>
             <option value="5:00 AM">05:00 AM</option>
            </select>
          </div>
          </div>

          <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Client</label>
          <div class="col-sm-9">
            <select name="client[]" class="form-control" id="client" multiple>
<!--               <option value="">Choose Client</option>
 -->             <?php foreach($allclient as $client){?>
              <option value="<?php echo $client->id?>"><?php echo ucfirst($client->name)?></option>
            <?php }?>
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Associates</label>
          <div class="col-sm-9">
            <select name="associates[]" class="form-control" id="associates" multiple>
            <?php foreach($allassociates as $associates){?>
              <option value="<?php echo $associates->id?>"><?php echo ucfirst($associates->name);//echo $associates->name?></option>
            <?php }?>
            </select>
          </div>
          </div>
               
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit" data-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel2">Edit Event</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                @csrf
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Event Type</label>
                  <div class="col-sm-9">
              <select name="event_type2" class="form-control" id="event_type2">
              <option value="">Choose Event Type</option>
              <option  value="Meeting">Meeting</option>
              <option  value="Court hearing date">Court hearing date</option>
              <option  value="office internal meet">Office internal meet</option>             
              <option  value="office internal discussion meet">Office internal discussion meet</option>
              <option  value="office event">Office event</option>
              <option  value="reminder">Reminder</option>
            </select>                  </div>
                </div>
                <div class="form-group">
             <label for="start" class="col-sm-3 control-label">Start DateTime</label>
          <div class="col-sm-5">
           <input type="date" name="start2" class="form-control" id="start2">
          </div>
          <div class="col-sm-4">
         <select id="start_time2" name="start_time2" class="form-control">
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
             <label for="end" class="col-sm-3 control-label">End DateTime</label>
          <div class="col-sm-5">
           <input type="date" name="end2" class="form-control" id="end2">
          </div>
          <div class="col-sm-4">
         <select id="end_time2" name="end_time2" class="form-control">
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
          <label for="title" class="col-sm-3 control-label">Client</label>
          <div class="col-sm-9">
            <select name="client2[]" class="form-control" id="client2" multiple>
<!--               <option value="">Choose Client</option>
 -->             <?php foreach($allclient as $client){?>
              <option value="<?php echo $client->id?>"><?php echo  ucfirst($client->name)?></option>
            <?php }?>
            </select>
          </div>
          </div>
             <div class="form-group">
          <label for="title" class="col-sm-3 control-label">Associates</label>
          <div class="col-sm-9">
            <select name="associates2[]" class="form-control" id="associates2" multiple>
            <?php foreach($allassociates as $associates){?>
              <option value="<?php echo $associates->id?>"><?php echo  ucfirst($associates->name)?></option>
            <?php }?>
            </select>
          </div>
          </div>  
               
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr2"></textarea>
                  </div>
                </div>
          <input type="hidden" name="event_id" value="" id="event_id">
           <input type="hidden" name="clients_id" value="" id="clients_id">
           <input type="hidden" name="associates_id" value="" id="associates_id">
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
        
   <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- FullCalendar -->
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
   <script src="{{asset('build/js/custom.js')}}"></script>

  </body>
</html>
 <script type="text/javascript">
    $(document).ready(function() {
 

$(".antosubmit").click(function(){
var formData=$('#antoform').serialize();

       //var branch_code = $(this).val();
       var title        = $("#title").val();
       var start_date   = $("#start").val();
       var start_time   = $("#start_time").val();
       var end_date     = $("#end").val();
       var end_time     = $("#end_time").val();
       var client       = $("#client").val();
       var descr       = $("#descr").val();
       var event_type       = $("#event_type").val();
      var associates     = $("#associates").val();

     // alert(associates);


      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ url('/addEvent')}}",
          method: 'POST',
          //data: {formData:formData, _token:token},
          data: {title:title,start_date:start_date,start_time:start_time,end_date:end_date,end_time:end_time,client:client,descr:descr,event_type:event_type,associates:associates,_token:token},
          success: function(data) {

            console.log(data);
          //$('#step2_id').val(data);
           //return false;
        setTimeout(function(){ location.reload(); }, 500);
            
          }
      });

     
    }); 

$(".antosubmit2").click(function(){
var formData=$('#antoform').serialize();

       //var branch_code = $(this).val();
       var title2        = $("#title2").val();
       var start_date2   = $("#start2").val();
       var start_time2   = $("#start_time2").val();
       var end_date2     = $("#end2").val();
       var end_time2     = $("#end_time2").val();
       var client2       = $("#client2").val();
       var descr2       = $("#descr2").val();
       var event_type2       = $("#event_type2").val();
       var event_id     = $("#event_id").val();
      var associates2     = $("#associates2").val();

      var token = $("input[name='_token']").val();
      $.ajax({
          url: "{{ url('/updateEvent')}}",
          method: 'POST',
          //data: {formData:formData, _token:token},
          data: {event_id:event_id,title:title2,start_date:start_date2,start_time:start_time2,end_date:end_date2,end_time:end_time2,client:client2,descr:descr2,event_type:event_type2,associates:associates2, _token:token},
          success: function(data) {

            console.log(data);
          //$('#step2_id').val(data);
            return false;
         // setTimeout(function(){ location.reload(); }, 500);

        
            
          }
      });

     
    }); 

 });    

 $( "#fc_edit" ).click(function() {

//$('#client2').on('select2:clear', function (e) {
//alert("ff");
/*
var values="1,2,3,4,5";
  $.each(values.split(","), function(i,e){
    $("#client2 option[value='" + e + "']").prop("selected", false);
});
*/
  // Do something
//});
 //  $("#client2").select("val", "");
  //alert( "Handler for .click() called." );
    // $("#client2 option[value='""']").prop("selected", false); // to deselect that option from selectbox
/*
       var id = $(this).data("id");
        if($(this).val() == id){
             $("select option[value='"+id+"']").prop("selected", false); // to deselect that option from selectbox
           }*/

  //var values="Test,Prof,Off";

  var client_list= $("#clients_id").val();

  //alert(client_list);

$.each(client_list.split(","), function(i,e){
    $("#client2 option[value='" + e + "']").prop("selected", true);
});



var associates_list= $("#associates_id").val();
  $.each(associates_list.split(","), function(i,e){
    $("#associates2 option[value='" + e + "']").prop("selected", true);
});

}); 

/*
 $( ".close" ).click(function() {
 var client_list= $("#clients_id").val();

$.each(client_list.split(","), function(i,e){
    $("#client2 option[value='" + e + "']").prop("selected", false);
});

});
 */

</script>
<style>
  .fc-time{
  /* display : none;*/
}
/*
.fc-axis {  display : block !important;}
*/
.modal-title {
line-height: 0.5 !important;
}
  </style>
    <style>
    .modal-body {
   
    padding: 0rem !important;
}
  </style>
  <script>
    function init_calendar() {

    if (typeof ($.fn.fullCalendar) === 'undefined') { return; }
    console.log('init_calendar');

    var date = new Date(),
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),
        started,
        categoryClass;

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
         slotDuration: '01:00',
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            if (moment().diff(start, 'days') > 0) {
                $('#calendar').fullCalendar('unselect');
                // or display some sort of alert
                alert("You can not create previuos date event!");
                return false;
            }
            $('#fc_create').click();
           // alert(start);
             let date = JSON.stringify(start)
             date = date.slice(1,11)
            // alert(date);

              $('#start').val(date); 
              $('#end').val(date);

            started = start;
            ended = end;

            $(".antosubmit").on("click", function () {
                var title = $("#title").val();
                if (end) {
                    ended = end;
                }

                categoryClass = $("#event_type").val();

                if (title) {
                    calendar.fullCalendar('renderEvent', {
                        title: title,
                        start: started,
                        end: end,
                        allDay: allDay
                    },
                        true // make the event "stick"
                    );
                }

                $('#title').val('');

                calendar.fullCalendar('unselect');

                $('.antoclose').click();

                return false;
            });
        },
		     dayClick: function(date, jsEvent, view, resourceObj) {

           $('#start_time').val(date.format('LT')); 

           $('#end_time').val(date.add(1, 'hours').format('LT'));
           
  },
        eventRender: function(event, element) {
    element.find(".fc-event-title").remove();
    element.find(".fc-event-time").remove();
    var new_description =   
     
         '<strong id="clients_id_hiddens' + event.id + '" style="display:none;">' + event.clients + '</strong>'
         + '<strong id="associates_id_hiddens' + event.id + '" style="display:none;">' + event.associates + '</strong>'
          + '<strong id="event_id_hiddens" style="display:none;">' + event.id + '</strong>'

    ;
    element.append(new_description);
},
        eventClick: function (calEvent, jsEvent, view) {
            $('#fc_edit').click();
          
        var starttime = moment(calEvent.start).format('hh:mm A');
        //alert(starttime);

        var endtime = moment(calEvent.end).format('hh:mm A');
      // alert(endtime);

        $('#start_time2').val(starttime); 
              $('#end_time2').val(endtime); 


             let today = new Date().toISOString().slice(0, 10);

         if(today>calEvent.starts)
         {
           //$('.antosubmit2').prop('disabled', true);
           //$('.antosubmit2').attr('title', 'You Can Not Update Previous Date Event!');
           $('.antosubmit2').hide();

         }else {
               // $('.antosubmit2').prop('disabled', false);
                // $('.antosubmit2').removeAttr( "title" );
                   $('.antosubmit2').show();
            }
            $('#title2').val(calEvent.title);
            // $('#event_id').val(calEvent.title);
              $('#event_id').val(calEvent.id);
              $('#descr2').val(calEvent.description); 
             // $('#start_time2').val(calEvent.start_time); 
             // $('#end_time2').val(calEvent.end_time); 

               $('#start2').val(calEvent.starts); 
                $('#end2').val(calEvent.ends); 
               $('#event_type2').val(calEvent.event_type); 
               $('#clients2').val(calEvent.clients); 
               $('#clients_id').val(calEvent.clients); 
               $('#associates_id').val(calEvent.associates); 
            $('#title2').val(calEvent.title);

            categoryClass = $("#event_type").val();

            $(".antosubmit2").on("click", function () {
                calEvent.title = $("#title2").val();

                calendar.fullCalendar('updateEvent', calEvent);
                $('.antoclose2').click();
            });

            calendar.fullCalendar('unselect');
        },
        editable: true,
         eventColor: '#039be5',
       eventTextColor:'#FFF',
   
       events:<?php echo $events ?>,
       /*[{"title":"All Day Event","start":"2020-04-01 14:00:00","end":"2020-04-01 16:00:00"},
       {"title":"Long Event","start":"2020-04-07 00:00:00"},
       {"title":"Repeating Event","start":"2020-04-09 16:00:00"},
       {"title":"Conference","start":"2020-04-11 00:00:00"}]*/

    });

};
  </script>