<?php

namespace App\Http\Controllers;
use App\Client;
use App\Lfms_Case;
use App\Events;
use Auth;
use App\Employee;
use App\Widget;
use DB;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
$this->middleware(['auth','admin'])->except('logout');
}

/**
* Show the application dashboard.
*
* @return \Illuminate\Contracts\Support\Renderable
*/
public function index()
{
// return view('home');

$clients=Client::orderBy("id","DESC")->take(5)->get();
$cases=Lfms_Case::orderBy("first_hearing_date","DESC")->take(5)->get();
$events=Events::orderBy("title","DESC")->take(5)->get();
$emps=Employee::orderBy("id","DESC")->take(5)->get();
$user_widgets=DB::table("user_widget")->where("user_id",Auth::user()->id)->get();
$updated_cases=DB::table('cases')
    
                ->join('employees','cases.emp_id','=','employees.id')
                ->join('users','users.id','=','employees.user_id')
                ->select('cases.*')
                ->orderBy('first_hearing_date','ASC')
                ->take(5)
                ->get();
$date = today()->format('Y-m-d');

$pastCases=Lfms_case::where('first_hearing_date','<=',$date)->orderBy("first_hearing_date","DESC")->take(5)->get();

//echo"<pre>";
//print_r($user_widgets);
//exit;
/////////////////code of clinet widget start here//////////////////////
$OUTPUTS="";
 $output_clients="";
 $output_cases="";
 $output_employees="";
 $output_updated_cases="";
 $output_events="";
 $output_past_cases="";
 
  foreach($user_widgets as $widgets)
  {
	if($widgets->widget_id==1)

	{
 $output_clients= 
                "<div class='col-md-4 col-sm-4 client' id='client' >
              <div class='x_panel tile fixed_height_400'>
                <div class='x_title'>
                  <h2>Latest Clients</h2>
				 	  
				  
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                    </li>
                    <li class='dropdown'>
                      <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='#'>Settings 1</a>
                          <a class='dropdown-item' href='#'>Settings 2</a>
                        </div>
                    </li>
                    <li><a class='close-link'><i class='fa fa-close' id='client-close' /></i></a>
                    </li>
                  </ul>
                  <div class='clearfix'></div>
                </div>

                <div class='x_content'>

              


    <table class='table'>
                    <thead>
                      <tr>
                      <th>Name</th>
                     
                      <th>Mobile</th>
                      <th>View</th>
                      </tr>
                    </thead>
					
                    <tbody id='client-info'>";
                    
					
                  
				  //print_r($clients);
				 //exit;
				  foreach($clients as $client)
				  {
				$output_clients.="<tr>";
                $output_clients.="<td>$client->name</td>";
                $output_clients.="<td>$client->mobile1</td>";
				
				$url = 'showClient/'.$client->id;
				 //echo $url;
				 $current=url('showClient');
				//echo  $current;
				 //exit;
				
				 $output_clients.="<td>
				 <!--<a class='icon btn btn-info btn-sm' href='/showClient/$client->id' >
									<i class='pencil fa fa-eye' aria-hidden='true'></i>
				 </a>-->
							
						<a  class=' btn btn-info btn-sm' href='showClient/$client->id'><i class='fa fa-eye' aria-hidden='true'></i></a>	
									
									</td>";
				  }
                       $output_clients.="</tr>
						
                   </tbody>
                  </table>



 
                </div>
              </div>
            </div>";
			
/////////////////code of clinet widget end here//////////////////////
$OUTPUTS.=$output_clients;
	}	
	
 if($widgets->widget_id==2)	
{
 


/////////////////code of cases widget start here//////////////////////
$output_cases= 
                "<div class='col-md-4 col-sm-4 client' id='case' >
              <div class='x_panel tile fixed_height_400'>
                <div class='x_title'>
                 <h2>Cases<span style='font-size:15px;color:black;'> (Upcoming Hearing Dates) </span></h2>
				 
				  
				  
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                    </li>
                    <li class='dropdown'>
                      <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='#'>Settings 1</a>
                          <a class='dropdown-item' href='#'>Settings 2</a>
                        </div>
                    </li>
                    <li><a class='close-link'><i class='fa fa-close' id='case-close' /></i></a>
                    </li>
                  </ul>
                  <div class='clearfix'></div>
                </div>

                <div class='x_content'>

              


    <table class='table'>
                    <thead>
                      <tr>
                      <th>Case Title</th>
                     
                      <th>Date</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id='case-info'>";
                    
					
                  
				 // print_r($clients);
				 // exit;
				  foreach($cases as $case)
				  {
				$output_cases.="<tr>";
                $output_cases.="<td> $case->casetitle</td>
                 <td>$case->hearing_date</td>
				 <td> <a class='icon btn btn-info btn-sm' href='showCase/$case->id' ><i class=' pencil fa fa-eye' aria-hidden='true'></i></a></td>";
				 
				  }
                       $output_cases.="</tr>
						
                   </tbody>
                  </table>



 
                </div>
              </div>
            </div>";
$OUTPUTS.=$output_cases;
}
  
/////////////////code of cases widget end here//////////////////////
if($widgets->widget_id==3)
{
////////////////code of employee widger start here////////////////////////

$output_employees= 
                "<div class='col-md-4 col-sm-4 client' id='emp' >
              <div class='x_panel tile fixed_height_400'>
                <div class='x_title'>
                  <h2>Employees</h2>
				 
				  
				  
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                    </li>
                    <li class='dropdown'>
                      <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='#'>Settings 1</a>
                          <a class='dropdown-item' href='#'>Settings 2</a>
                        </div>
                    </li>
                    <li><a class='close-link'><i class='fa fa-close' id='emp-close' /></i></a>
                    </li>
                  </ul>
                  <div class='clearfix'></div>
                </div>

                <div class='x_content'>

              


    <table class='table'>
                    <thead>
                      <tr>
                      <th>Name</th>
                     
                      <th>Phone</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id='employee-info'>";
                    
					
                  
				
				  foreach($emps as $emp)
				  {
				$output_employees.="<tr>";
                $output_employees.="<td> $emp->name</td>
                 <td>$emp->phone</td>
				 <td> <a class='icon btn btn-info btn-sm' href='showEmp/$emp->id' ><i class=' pencil fa fa-eye' aria-hidden='true'></i></a></td>";
				  }
                      $output_employees.="</tr>
						
                   </tbody>
                  </table>



 
                </div>
              </div>
            </div>";
	$OUTPUTS.=$output_employees;		
}


////////////////code of employee widget end here//////////////////////
 if($widgets->widget_id==4)
 {
////////////////code of update_cases widget start here//////////////////////
$output_updated_cases= 
                "<div class='col-md-4 col-sm-4 ' id='update-case' >
              <div class='x_panel tile fixed_height_400'>
                <div class='x_title'>
                  <h2>CASES BY ASSOCIATE</h2>
				 
				  
				  
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                    </li>
                    <li class='dropdown'>
                      <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='#'>Settings 1</a>
                          <a class='dropdown-item' href='#'>Settings 2</a>
                        </div>
                    </li>
                    <li><a class='close-link'><i class='fa fa-close' id='update-case-close' /></i></a>
                    </li>
                  </ul>
                  <div class='clearfix'></div>
                </div>

                <div class='x_content'>

              


    <table class='table'>
                    <thead>
                      <tr>
                      <th>Case Title</th>
                     
                      <th>Associate</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id='update-case-info'>";
                    
					
                  
				
				  foreach($updated_cases as $case)
				  {
				$output_updated_cases.="<tr>";
                $output_updated_cases.="<td> $case->casetitle</td>
                 <td>$case->emp_name</td>
				 <td> <a class='icon btn btn-info btn-sm' href='showCase/$case->id' ><i class=' pencil fa fa-eye' aria-hidden='true'></i></a></td>";
				  }
                      $output_updated_cases.="</tr>
						
                   </tbody>
                  </table>



 
                </div>";
				   $output_updated_cases.="<a class='btn btn-success btn-sm pull-right' href='showAllCases'>More....</a>
              </div>
            </div>";
			

$OUTPUTS.= $output_updated_cases;

////////////////code of update_cases widget end here//////////////////////
 }
  if($widgets->widget_id==5)
  {
////////////////code of event widget start here//////////////////////
$output_events= 
                "<div class='col-md-4 col-sm-4 client' id='event' >
              <div class='x_panel tile fixed_height_400'>
                <div class='x_title'>
                  <h2>EVENTS/MEETINGS</h2>
				 
				  
				  
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                    </li>
                    <li class='dropdown'>
                      <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='#'>Settings 1</a>
                          <a class='dropdown-item' href='#'>Settings 2</a>
                        </div>
                    </li>
                    <li><a class='close-link'><i class='fa fa-close' id='event-close' /></i></a>
                    </li>
                  </ul>
                  <div class='clearfix'></div>
                </div>

                <div class='x_content'>

              


    <table class='table'>
                    <thead>
                      <tr>
                      <th>Event Title</th>
                     
                      <th>Event Type</th>
                      <th>View</th>
                      </tr>
                    </thead>
                    <tbody id='event-info'>";
                    
					
                  
				
				  foreach($events as $event)
				  {
				$output_events.="<tr>";
                $output_events.="<td> $event->title</td>
                 <td>$event->event_type</td>
				 <td> <a class='icon btn btn-info btn-sm' href='event/$event->id' ><i class=' pencil fa fa-eye' aria-hidden='true'></i></a></td>";
				  }
                      $output_events.="</tr>
						
                   </tbody>
                  </table>



 
                </div>
              </div>
            </div>";
			
$OUTPUTS.= $output_events;
  }


////////////////code of event widget end here//////////////////////
if($widgets->widget_id==6)
{
////////////////code of past_cases widget start here//////////////////////
$output_past_cases= 
                "<div class='col-md-4 col-sm-4' id='past-case'  >
              <div class='x_panel tile fixed_height_400'>
                <div class='x_title'>
                   <h2>CASES<span style='font-size:15px;color:black;'> (By Today/Past Hearing Dates)</span></h2>
				 
				  
				  
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                    </li>
                    <li class='dropdown'>
                      <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'><i class='fa fa-wrench'></i></a>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='#'>Settings 1</a>
                          <a class='dropdown-item' href='#'>Settings 2</a>
                        </div>
                    </li>
                    <li><a class='close-link'><i class='fa fa-close' id='past-case-close' /></i></a>
                    </li>
                  </ul>
                  <div class='clearfix'></div>
                </div>

                <div class='x_content'>

              


    <table class='table'>
                    <thead>
                      <tr>
                      <th>Dates</th>
                     
                      <th>Synopsis</th>
                      <th>Update</th>
                      </tr>
                    </thead>
                    <tbody id='past-case-info'>";
                    
					
                  
				
				  foreach($pastCases as $pastCase)
				  {
				$output_past_cases.="<tr>";
                $output_past_cases.="<td> $pastCase->hearing_date</td>";
						$str=substr($pastCase->notes,0,50);
                  $output_past_cases.="<td>$str......</td>";
				  $output_past_cases.="<td> <a class='icon btn btn-info btn-sm' href='editCase/$pastCase->id' ><i class=' pencil fa fa-eye' aria-hidden='true'></i></a></td>";
				  }
                      $output_past_cases.="</tr>
						
                   </tbody>
                  </table>



 
                </div>
              </div>
            </div>";
			

$OUTPUTS.= $output_past_cases;
}
  }

////////////////code of past_cases widget end here//////////////////////


//echo"<pre>";
//print_r($user_widget);
//exit;


return view("Admin.admin_dashboard",compact('OUTPUTS'));
}

public function logout () 
{

auth()->logout();
return redirect('/');
}

public function addWidget(Request $request)
{

//print_r($request->all());
// exit;
//$widget=new Widget();
//$widget->widget_name=$request->name;
//$data=$widget->save();
// $widget=Widget::all();
// print_r($widget);
// exit;
$addWidgets=DB::insert('insert into user_widget (user_id,widget_id) values(?,?)',[Auth::user()->id,$request->widget_id]);
return response($addWidgets);


}


public function updateUserWidget(Request $request)
{
  //print_r($request->all());
  //exit;
  
  $widget_id=$request->widget_id;
/*
 $updateWidget=DB::table("user_widget")
                ->where('widget_id',$widget_id)
                ->where('user_id',Auth::user()->id)
                ->delete();
                */
DB::table('user_widget')->where('widget_id', $widget_id)->where('user_id',Auth::user()->id)
->delete();

}
}
