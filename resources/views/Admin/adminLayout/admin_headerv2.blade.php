<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield("title")Lfms  </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

     <link href="{{asset('vendors/iCheck/skins/flat/green.css" rel="stylesheet')}}">
    
    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
     <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet')}}">
    <!-- JQVMap -->
    <link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet')}}"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet')}}">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
			
              @if(Auth::check() && Auth::user()->role->id==1)
              <a href="{{route('home')}}" class="site_title"><i class="fa fa-paw"></i> <span>LFMS</span></a>
              @elseif(Auth::check() && Auth::user()->role->id==2)
               <a href="{{route('advocatedashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>LFMS</span></a>
                @elseif(Auth::check() && Auth::user()->role->id==3)
               <a href="{{route('accountantdashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>LFMS</span></a>

                @elseif(Auth::check() && Auth::user()->role->id==4)
               <a href="{{route('othersdashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>LFMS</span></a>
                @elseif(Auth::check() && Auth::user()->role->id==5)
               <a href="{{route('clientdashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>LFMS</span></a>
               
              @endif
			  
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
				
			   <?php $photo= Auth::user()->id;?>
			   @if(Auth::check() && Auth::user()->role->id==1)
			 <a href="{{route('home')}}"> <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img"></a>
		  @elseif(Auth::check() && Auth::user()->role->id==2 || Auth::user()->role->id==3 || Auth::user()->role->id==4)
		  <a href="{{url('editEmp',Auth::user()->employees->id)}}"> 
                  
                  <img src="{{asset('uploads/emp_photo/'.Auth::user($photo)->employees->emp_photo)}}" alt="..." class="img-circle profile_img">
                  
                </a>
				 @else
					   <a href="{{url('editClient',Auth::user()->client->id)}}"> 
				   <img src="{{asset('uploads/client_photo/'.Auth::user($photo)->client->profile_photo)}}" alt="..." class="img-circle profile_img"></a>
				   @endif
               
			   
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>
				 @if(Auth::user()->role->id==1)
                    {{Auth::user()->name}}
                    @elseif (Auth::user()->role->id==2 || Auth::user()->role->id==3 || Auth::user()->role->id==4)
                     {{Auth::user($photo)->employees->name}}
                     @else
                      {{Auth::user($photo)->client->name}}
                     @endif
				</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

             
