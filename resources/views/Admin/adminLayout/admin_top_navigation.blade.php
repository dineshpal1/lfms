 
 <style>
#all_task> tbody > tr > td
{
   //padding:2px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
}

 </style>
 <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
					
					   <?php $photo= Auth::user()->id;?>
                       @if(Auth::check() && Auth::user()->role->id==1)  
                      <img src="{{asset('images/img.jpg')}}" alt="">{{Auth::user()->name}}

                     @elseif(Auth::check() && Auth::user()->role->id==2 || Auth::user()->role->id==3 || Auth::user()->role->id==4 )
                      <img src="{{asset('uploads/emp_photo/'.Auth::user($photo)->employees->emp_photo)}}" alt=""> {{Auth::user($photo)->employees->name}}
                      @else
                      <img src="{{asset('uploads/client_photo/'.Auth::user($photo)->client->profile_photo)}}" alt=""> {{Auth::user($photo)->client->name}}
                      @endif
					
                      <!--<img src="{{asset('images/img.jpg')}}" alt="">John Doe-->
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-red">{{Customfacade::countTask()}}</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                     <li class="nav-item">
                      <?php
                      $tasks=Customfacade::merge_task();
                    echo"<pre>";
                   print_r($tasks);
                   // var_dump($tasks);

                     
                      
                        
                     


                      ?>
                      <h5 style="text-align: center;">Pending Task</h5>
                          <!----------------------------------->

                      <table class="table" id="all_task">
                      <thead>

                        <tr>
                          <th>Task Type</th>
                          <th>Task</th>
                         
                          <th>Action</th>
                        </tr>
                      </thead>
                 
                      <tbody>
                       @foreach($tasks as $task=>$value)
                       
                       
                        <tr>
                         <td>
                        
                     
                        
                           
                          </td>

                          <td>
                            
                           
                          </td>
                         
                          <td> 
                            <a href="{{url('/todosEdit')}}" class="btn btn-secondary btn-sm" title="edit" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          </td>
                    
                  
                        </tr>
                        
                     @endforeach
                      </tbody>
                      </table>
                       <div class="text-center">
                          <a class="dropdown-item">
                            <strong><a href="{{url('allIncompleted')}}">See more....</a></strong>
                            <!--<i class="fa fa-angle-right"></i>-->
                          </a>
                        </div>
                       <!-- <a class="dropdown-item">
                          <span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>-->
                      </li>
                    
                  <!----------------------------------->

                    <!--   <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
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
                          <span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
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
                          <span class="image"><img src="{{asset('images/img.jpg')}}" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>-->
                      <li class="nav-item">
                        {{--
                     @php  
                      $cases=Customfacade::past_cases(); 
                     // echo"<pre>";
                      //print_r($cases);
                      @endphp
                       <h5 style="text-align: center;">Past Cases</h5>

                        <table class="table" id="all_task">
                      <thead>

                        <tr>
                          <th>Title</th>
                          <th>First Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($cases as $case)
                        <tr>
                          <td>{{$case->casetitle}}</td>
                          <td>{{$case->first_hearing_date}}</td>
                          <td> <a href="{{url('/editCase',$case->id)}}" class="btn btn-secondary btn-sm" title="edit" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                      </tbody>
                      </table>
                      <!--  <div class="text-center">
                          <a class="dropdown-item">
                            <strong><a href="{{url('allIncompleted')}}">See more....</a></strong>-->
                            <!--<i class="fa fa-angle-right"></i>
                          </a>
                        </div>-->
--}}
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
