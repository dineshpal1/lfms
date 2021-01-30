<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Client;
use App\Lfms_Case;
use App\Employee;
use App\Country;
use App\State;
use App\City;
use App\Events;
use App\Todo;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Validator;
use Carbon\Carbon;
use str;


class CalendarController extends Controller
{

public function showCalendar(){

//  return view("Admin.add_event");
 /* $event=events::select(['id', 'title','start','end','color','event_type','start_time','end_time'])
    ->orderBy('created_at', 'desc')
    ->get()
    ->toArray();*/
$event=events::select(['title','start','end','id','description','start_time','end_time','event_type','starts','ends','clients','associates'])
    ->get()
    ->toArray();

     $allCases=Lfms_Case::whereNull("deleted_at")->orderBy("hearing_date","DESC")->get();
     $allclient=Client::all();
     $allassociates=Employee::all();
     
    // echo "<pre>";
    // print_r($allassociates);
    // exit;
    // return view("cases.all_cases",compact("allCases"));

//echo "<pre>";
//print_r($event);
//exit;
/*
     [{
            title: 'All Day Event',
            start: new Date(y, m, 1)
        }, {
            title: 'Long Event',
            start: new Date(y, m, d - 5),
            end: new Date(y, m, d - 2)
        }]
        */

$events=json_encode($event,true);
//print_r($events);
//exit;
/*[{"title":"All Day Event","start":"2020-04-01 00:00:00"},{"title":"Long Event","start":"2020-04-07 00:00:00"},{"title":"Repeating Event","start":"2020-04-09 16:00:00"},{"title":"Conference","start":"2020-04-11 00:00:00"},{"title":"Meeting","start":"2020-04-12 10:30:00"},{"title":"Lunch","start":"2020-04-12 12:00:00"},{"title":"Happy Hour","start":"2020-04-12 17:30:00"},{"title":"Dinner","start":"2020-04-12 20:00:00"},{"title":"Birthday Party","start":"2020-04-14 07:00:00"},{"title":"Double click to change","start":"2020-04-28 00:00:00"},{"title":"AAAAAAAAA","start":"2020-04-27 00:00:00"},{"title":"BBBBBB","start":"2020-04-27 00:00:00"},{"title":"Delhi Lockdown","start":"2020-04-02 00:00:00"},{"title":"Event24","start":"2020-04-04 00:00:00"}]
*/

  return view("Admin.create_event",compact('events','allCases','allclient','allassociates'));

}
public function getCalendarByEvent(){
//print_r($_POST);
$event_type=$_GET['event_type'];
$events=events::select(['id', 'title','start','end','color','event_type','start_time','end_time'])
    ->orderBy('created_at', 'desc')
    ->where('event_type', $event_type)
    ->get()
    ->toArray();

   $allCases=Lfms_Case::whereNull("deleted_at")->orderBy("hearing_date","DESC")->get();
     $allclient=Client::all();
    // return view("cases.all_cases",compact("allCases"));

echo "<pre>";
print_r($events);
exit;
  return view("Admin.create_event",compact('events','allCases','allclient'));

}
public function showEvent(){

//$events = DB::table("events")->pluck("id","start","end","title");

$query = DB::table('events')->select(['id','start','end','title'])->get();
$events = $query->toArray();

//echo "<pre>";
//print_r($events);
//exit;

  return view("Admin.show_event",compact('events'));
}


    public function saveEvent(Request $request)
    {
     // print_r($_POST);
      //exit;
        $event                   = new Events();
        $event->title            = $request->title;
        $event->start            = $request->start;
        $event->end              = $request->end;
        $event->title            = $request->title;

     
        $data=$event->save();
        if($data)
        {
          return redirect("/showCalendar")->with("successMsg","Event IS SAVED SUCCESSFULLY");
        }
    }

  public function viewEvent($start,$end,$_)
  {
    //$showClient=Client::findOrFail($id);
//return view("Admin.show_client",compact("showClient"))
    //echo $start;
    //echo $end;
    //echo $uid;
     //$key = Input::get('start');
   //echo $key;
    echo "hghj";
    echo $start;

    exit;
    //$events = DB::table("events")->pluck("id","start","end","title");
    //print_r($events);
    //exit;
     // return view("Admin.show_event",compact("events"));
  }
   public function viewEvent2()
  {
   //echo $start;
   echo "here";
   exit;
  }

  public function createEvent()
  {
  
  //$query = DB::table('events')->select(['id','start','end','title'])->get();
//$events = $query->toArray();

//$events=events::pluck('id','title','start','end')->toArray();

$events=events::select(['id', 'title','start','end','color'])
    ->orderBy('created_at', 'desc')
    ->get()
    ->toArray();

/*echo "<pre>";
print_r($events);
exit;*/
  return view("Admin.create_event",compact('events'));

  }
  public function addEvent(Request $request)
    {
    //print_r($_POST);
    $clients=$_POST['client'];
    $client_ids=implode(',',$clients);

    $associates=$_POST['associates'];
    $associates_ids=implode(',',$associates);
 

      //exit;
        $event                   = new Events();
        $event->title            = $request->title;
        $event->start            = $request->start_date;
        $event->start_time       = $request->start_time;

       // $event_start=$user_input_start_date."-".$user_input_start_time;

        $event->end              = $request->end_date;
        $event->end_time         = $request->end_time;
       // $event->color              = $request->color;
        $event->event_type       = $request->event_type;
        $event->clients           = $client_ids;
        $event->description       = $request->descr;
        $event->associates       = $request->associates_ids;



        $event->starts            = $request->start_date;
        $event->ends            = $request->end_date;

        $todo                   = new Todo();
        $todo->title            = $request->title;
        $todo->task_start       = $request->start_date;
        $todo->task_end          = $request->end_date;
        $todo->created_by          ='System';
//exit;
     
        $data=$event->save();
		 $data2=$todo->save();
        if($data)
        {
          return redirect("/showCalendar")->with("successMsg","Event IS SAVED SUCCESSFULLY");
        }
    }

  public function updateEvent(Request $request)
    {
     // print_r($_POST);
      //exit;

         $clients=$_POST['client'];
        $client_id=implode(',',$clients);

         $associates=$_POST['associates'];
       $associates_id=implode(',',$associates);

         $event_id           = request('event_id');
        $event_title        = request('title');
        $event_type         = request('event_type');
       // $event_color     = request('color');
        $event_start        = request('start_date');
        $event_start_time  = request('start_time');
        $event_end         = request('end_date');
        $event_end_time    = request('end_time');
        $client_ids    = $client_id;
        $descr             = request('descr');

         $associates_ids    = $associates_id;


        $starts            = request('start_date');
        $ends            = request('end_date');

//exit;
     
        /////////////////////////////////////////
         $affectedRows = Events::where('id', $event_id)
       ->update([
           'title' => isset($event_title) ? $event_title : ' ',
            'event_type' => isset($event_type) ? $event_type : ' ',
           //  'color'   => isset($event_color) ? $event_color : ' ',
             'start' => isset($event_start) ? $event_start : ' ',
             'start_time' => isset($event_start_time) ? $event_start_time : ' ',
             'end' => isset($event_end) ? $event_end : ' ',
       'end_time' => isset($event_end_time) ? $event_end_time : ' ',
       'description' => isset($descr) ? $descr : ' ',
        'clients' => isset($client_ids) ? $client_ids : ' ',
         'associates' => isset($associates_ids) ? $associates_ids : ' ',
          'starts' => isset($starts) ? $starts : ' ',
            'ends' => isset($ends) ? $ends : ' '
            

        ]);


if($affectedRows)  
          {

/////////////// To Send Mail On Email Update  ////////

$email = 'arvindkr.singh09@gmail.com';

//$data = array('name'=>"Test", "body" => "Test mail");

$data = array('event_title'=>$event_title, "event_type" =>$event_type,"event_start_date"=>$starts, "event_start_time" => $event_start_time, "event_end_date" => $ends, "event_end_time" => $event_end_time,"event_desc" => $descr);

$subject='Event Modification Confirmation';

Mail::send('mail.event', $data, function($message) use ($email, $subject) {
    $message->to($email)->subject($subject);
});

//////////////// End Of Sending Mail on Event Update /////////////////
            



            return redirect('showCalendar')->with('update', 'Event has been updated successfully!');

              exit;
          }else
          {
            return back()->with('error','Event Is Not Updated!');
              exit;
          }

     
        
    }

 // To Send Mail   

public function mail()
{
/*
 $name = 'Event Management';
   Mail::to('arvindkr.singh09@gmail.com')->send(new SendMailable($name));
   
   return 'Email sent Successfully';
*/

//$to_name = 'TO_NAME';
//$to_email = 'TO_EMAIL_ADDRESS';

$to_name = 'arvind';
$to_email = 'arvindkr.singh09@gmail.com';
$email = 'arvindkr.singh09@gmail.com';

$data = array('name'=>"Test", "body" => "Test mail");
/*$template= 'event.blade.php'; // resources/views/mail/xyz.blade.php
Mail::send($template, $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
            ->subject('Artisans Web Testing Mail');
    $message->from('FROM_EMAIL_ADDRESS','arvindkr8090@gmail.com');
});
*/
$subject='test message';

Mail::send('mail.event', $data, function($message) use ($email, $subject) {
    $message->to($email)->subject($subject);
});

}

 public function send(Request $request)
    {
      /*
        $this->validate($request, [
            'email' => 'required'
        ]);
        */
/*$template= 'event.blade.php'
       // $to_email = 'arvindkr.singh09@gmail.com';
    // Mail::to($to_email)->send(new SendMail());
     Mail::to('arvindkr.singh09@gmail.com')->send($template);
     return redirect()->back()->with('success', 'Email sent successfully. Check your email.');*/
    }

}
