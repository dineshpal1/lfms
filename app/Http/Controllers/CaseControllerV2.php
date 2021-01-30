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
use App\Hearing_date;



use Validator;
use Carbon\Carbon;
use str;
use Illuminate\Support\Facades\Auth;


class CaseController extends Controller
{

public function showClient($id)
{
//$showClient=Client::findOrFail($id);


//return view("Admin.show_client",compact("showClient"));



//return view("clients.show_client2",compact("showClient"));


$showClient=DB::table("clients")

->select('clients.id','clients.name','company','address1','address2','country','state','city','pincode','email','mobile1','mobile2','alternate_name','alternate_relation','alternate_email','alternate_phone','profile_photo','countries.name as country_name','cities.name as city_name','states.name as state_name')   
->Join('countries', 'clients.country', '=', 'countries.id')
->Join("states",'clients.state','=','states.id')
->Join('cities','clients.city','=','cities.id')
// ->where("deleted_at","==","null")
//->whereNotNull('deleted_at')
->whereNull('deleted_at')
->where("clients.id",$id)
->first();
// print_r($showClient);
// exit;
return view("clients.show_client2",compact("showClient"));

}

////////////////////////CASE MANAGEMENT////////////////////////////////


public function getClientDetails(Request $request)
{

$client=$_POST['client_name'];
$client_list=\DB::table('clients')->where('name', '=', $client)->get();
//print_r($client_list);
//exit;
echo json_encode($client_list,true);

}

public function getEmployeeDetails()
{
$emp=$_POST['emp_name'];
$emp_list=\DB::table('employees')->where('name', '=', $emp)->get();

echo json_encode($emp_list,true);
}

public function addCase()
{

//$clients=Client::orderBy("name","ASC")->get();
//$emp=Employee::orderBy("name","ASC")->get();
//return view('cases.add_case2',compact('clients','emp')); 

$clients = Client::orderBy("name","ASC")->select('name AS label', 'email as value')->get();
//$emp=Employee::orderBy("name","ASC")->where('emp_type', 'Advocate')->get();
$clientjson=$clients->toJson();

$emp = Employee::orderBy("name","ASC")->select('name AS label', 'email as value')->where('emp_type', 'Advovate')->get();


$empjson=$emp->toJson();

return view('cases.add_case2',compact('clients','emp','empjson','clientjson')); 
}

public function saveCase(Request $request)
{
//echo"<pre>";
// print_r($request->all());
// exit;
$validator = Validator::make($request->all(), [
"documents"=>"mimes:pdf,jpeg|max:5000",
//"name"         =>"required",
"casetitle"     =>"required",
"courtname"     =>"required",
"hearing_date"      =>"required",
"emp_name"        =>"required",
"emp_email"         =>"required",
"client_name"      =>"required",
"client_email"      =>"required",
"notes"      =>"required",



],[
"documents.mimes"  =>"Please upload the document in,pdf,jpeg format only",
//"name.required"        =>"CLIENT NAME IS REQUIRED",
"casetitle.required"    =>"CASE TITLE IS REQUIRED",
"courtname.required"    =>"THIS FIELD IS REQUIRED",
"hearing_date.required"     =>"HEARING DATE IS REQUIRED",
"emp_name.required"       =>"ASSOCIATE NAME IS REQUIRED",
"emp_email.required"        =>"ASSOCIATE EMAIL IS REQUIRED",
"client_name.required"     =>"CLIENT NAME IS REQUIRED",
"client_email.required"    =>"CLIENT EMAIL IS REQUIRED",
"notes.required"    =>"NOTES ARE REQUIRED",


]);
if ($validator->fails())
{
return redirect()->back()->withInput()->withErrors($validator->errors());
}
else{

$documents_destinationPath="uploads/documents";
if($request->file("documents") !='')
{
$document_image=$request->file("documents");
$temp_document_image_name=time().'_'.$document_image->getClientOriginalName();
$document_image->move($documents_destinationPath,$temp_document_image_name);
}
//else{
// echo"No document is uploaded";
//}
$emp=Employee::where('name',$request->emp_name)->first(); //for id of employee

$case=new Lfms_Case();
$case->emp_id            = $emp->id;            //id added for widget

$case->casetitle         = $request->casetitle;
$case->judgename         = $request->judgename;
$case->courtname         = $request->courtname;
$case->hearing_date      = $request->hearing_date;
$case->emp_name          = $request->emp_name;
$case->emp_email         = $request->emp_email;
$case->emp_phone         = $request->emp_phone;
$case->client_name       = $request->client_name;
$case->client_phone      = $request->client_phone;
$case->client_email      = $request->client_email;
$case->notes             = $request->notes;
$case->documents         = isset($temp_document_image_name)?$temp_document_image_name:" ";
$case->extension         =$document_image->getClientOriginalExtension();
$data=$case->save();
if($data)
{
return redirect("/showAllCases")->with("successMsg","CASE IS SAVED SUCCESSFULLY");
}
}


}
public function showAllCases()
{

$allCases=Lfms_Case::whereNull("deleted_at")->orderBy("first_hearing_date","DESC")->get();
//echo"<pre>";
// print_r($allCases);
// exit;
return view("cases.all_cases",compact("allCases"));
}

public function editCase($id)
{
$editCase=Lfms_Case::findOrFail($id);
$emp=Employee::orderBy("name","ASC")->get();
$clients=Client::orderBy("name","ASC")->get();


return view("cases.edit_case",compact("editCase","emp","clients"));
}
public function updateCase(Request $request,$id)
{
echo"<pre>";
//print_r($request->all());
// exit;


$this->validate($request,[

"documents"=>"mimes:jpeg,png,jpg,bmp,pdf,doc",
"casetitle"     =>"required",
"courtname"     =>"required",
"first_hearing_date"      =>"required",
"emp_name"        =>"required",
"emp_email"         =>"required",
"client_name"      =>"required",
"client_email"      =>"required",
"notes"      =>"required",
"order"=>"mimes:jpeg,jpg,pdf",


]);

$updateCase=Lfms_Case::findOrFail($id);
$image=$request->file("documents");
$slug=str_slug($request->client_name);
if(isset($image))
{
$cur_date=Carbon::now()->toDateString();
$image_name=$slug.'-'.$cur_date.'-'.$image->getClientOriginalExtension();
if(!file_exists("uploads/documents"))
{
mkdir("uploads/documents");
}
//@unlink("uploads/documents/".$updateCase->documents);
$image->move("uploads/documents",$image_name);
}
//else{
//$image_name=$updateCase->documents;
// }

//////////////////

$judgement=$request->file("order");

$slug=str_slug($request->client_name);
if(isset($judgement))
{
$cur_date=Carbon::now()->toDateString();
$judgement_name=$slug.'-'.$cur_date.'-'.$judgement->getClientOriginalExtension();
// $judgement_name=$cur_date.'-'.$judgement->getClientOriginalExtension();
$extension=$judgement->getClientOriginalExtension();
// echo $extension;
//exit;
if(!file_exists("uploads/order_judgement"))
{
mkdir("uploads/order_judgement");
}
$judgement->move("uploads/order_judgement",$judgement_name);
}
////////////////////
$dates=new Hearing_date();
$dates->case_id = $updateCase->id;
$dates->extension =isset($extension)?$extension:"";
$dates->date_of_hearing       =$request->date_of_hearing;
$dates->notes_updated        =$request->update_notes;
$dates->order_judgement      =isset($judgement_name)?$judgement_name:" "; 

$dates->next_date            =$request->next_date;
$dates->save();

///////////////////////
$emp=Employee::where('name',$request->emp_name)->first(); //for id of employee
$updateCase->emp_id       =$emp->id; 
$updateCase->casetitle    =$request->casetitle;
$updateCase->judgename    =$request->judgename;
$updateCase->courtname    =$request->courtname;
$updateCase->first_hearing_date =$request->first_hearing_date;////////////
$updateCase->emp_name     =$request->emp_name;
$updateCase->emp_email    =$request->emp_email;
$updateCase->emp_phone    =$request->emp_phone;
$updateCase->client_name  =$request->client_name;
$updateCase->client_phone =$request->client_phone;
$updateCase->client_email =$request->client_email;
$updateCase->notes        =$request->notes;
$updateCase->documents    =isset($image_name)?$image_name:" ";

$updateCase->save();

$emp_name=$updateCase->emp_name;
$casetitle=$updateCase->casetitle;
$hearing_date=$updateCase->hearing_date;
//$message = urlencode("Hello $updateCase->emp_name,The hearing of your case no $updateCase->casetitle is on $updateCase->hearing_date ");
$message = urlencode("Hello $emp_name, The hearing of your case no $casetitle is on $hearing_date ");

$url="http://sms.krauss.co.in/api/sendmsg.php?user=mankomal&pass=e3bkopzx&sender=KRAUSS&phone=$updateCase->emp_phone&text=$message&priority=ndnd&stype=normal";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}

curl_close($ch);


//msg for client

$message = urlencode("Hello $updateCase->client_name,The hearing of your case no $updateCase->casetitle is on $updateCase->hearing_date ");


$url="http://sms.krauss.co.in/api/sendmsg.php?user=mankomal&pass=e3bkopzx&sender=KRAUSS&phone=$updateCase->client_phone&text=$message&priority=ndnd&stype=normal";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}

curl_close($ch);

return redirect("showAllCases")->with("successMsg","CASE UPDATED SUCCESSFULLY");
}

public function deleteCase($id)
{

$deleteCase=Lfms_Case::findOrFail($id);
//if(file_exists("uploads/documents/".$deleteCase->documents))
//{
//unlink("uploads/documents/".$deleteCase->documents);
//}
$deleteCase->delete();
return redirect()->back()->with("successMsg","CASE DELETED SUCCESSFULLY");

}

public function showCase($id)
{
$showCase=Lfms_Case::findOrFail($id);
$activity_on_hearing_dates=DB::table("cases")
/*
->select('cases.casetitle','cases.judgename','hearing_dates.date_of_hearing','hearing_dates.notes_updated','hearing_dates.order_judgement','hearing_dates.next_date')*/
->select('cases.*','hearing_dates.date_of_hearing','hearing_dates.notes_updated','hearing_dates.order_judgement','hearing_dates.next_date')
->join("hearing_dates",'cases.id','=','hearing_dates.case_id')
->where('cases.id',$id)
->whereNull("cases.deleted_at")
->orderBy("date_of_hearing","DESC")
->get();
//ECHO"<pre>";
//PRINT_R($showCase);
//exit;
return view("cases.show_case",compact("showCase","activity_on_hearing_dates"));
}

public function archiveCase()
{
$archive=Lfms_Case::onlyTrashed()->get();
// echo"<pre>";
// print_r($archiveEmp);
// exit;
return view("cases.archive_case",compact("archive"));
}

public function restoreCase($id)
{
$data= Lfms_Case::withTrashed()->where('id',$id)->restore();
//PRINT_R($data);
//exit;
if($data)
{
return redirect("showAllCases")->with("successMsg","CLIENT RESTORE SUCCESSFULLY");

}
}

public function saveCaseDetails(Request $request)
{
//print_r($_POST);
$params = array();
parse_str($_POST['formData'], $params);

//print_r($params);
//echo $params['casetitle'];

$case=new Lfms_Case();
// $emp=Employee::where('name',$request->emp_name)->first(); //for id of employee

$case->emp_id            = Auth::user()->id;
$case->casetitle         = isset($params['casetitle']) ? $params['casetitle'] : ' ';
$case->judgename         = isset($params['judgename']) ? $params['judgename'] : ' ';
$case->courtname         = isset($params['courtname']) ? $params['courtname'] : ' ';
$case->first_hearing_date      = isset($params['first_hearing_date']) ? $params['first_hearing_date'] : ' ';

$data=$case->save();
//////////////
//////////////
if($data)
{
//return redirect("/showAllCases")->with("successMsg","CASE IS SAVED SUCCESSFULLY");
return $case->id;
}
exit;
}
public function saveAssociateDetails(Request $request)
{
//print_r($_POST);
//exit;
//////////////////
$params = array();
parse_str($_POST['formData'], $params);


//print_r($params);

// $associate_ids=explode(',',$params['assoc_id']);

//print_r($associate_ids);
//exit;

$affectedRows = Lfms_Case::where('id', $params['step2_id'])
->update([

//'emp_name' => isset($params['emp_name']) ? $params['emp_name'] : ' ',
'emp_email' => isset($params['assoc_id']) ? $params['assoc_id'] : ' ',
// 'emp_phone' => isset($params['emp_phone']) ? $params['emp_phone'] : ' '

]);
//////////////
return true;

}
public function saveClientDetails(Request $request)
{
//print_r($_POST);

//////////////////
$params = array();
parse_str($_POST['formData'], $params);


//print_r($params);
//exit;
$affectedRows = Lfms_Case::where('id', $params['step3_id'])
->update([

// 'client_name' => isset($params['client_name']) ? $params['client_name'] : ' ',
'client_email' => isset($params['client_id']) ? $params['client_id'] : ' ',
//'client_phone' => isset($params['client_phone']) ? $params['client_phone'] : ' '

]);
//////////////
return true;

}
public function saveCaseDocument(Request $request)
{


$validator = Validator::make($request->all(), [
"documents"=>"mimes:jpeg,jpg,bmp,pdf,doc",

]);
if ($validator->fails())
{
return redirect()->back()->withInput()->withErrors($validator->errors());
}
else{


/////////////////////////////
$notes=$request->notes;
$step4_id=$request->step4_id;

$documents_destinationPath="uploads/documents";
if($request->file("documents") !='')
{
$document_image=$request->file("documents");
$temp_document_image_name=time().'_'.$document_image->getClientOriginalName();
$document_image->move($documents_destinationPath,$temp_document_image_name);
$extension= $document_image->getClientOriginalExtension();
//echo "Uploaded";
}

$affectedRows = Lfms_Case::where('id', $step4_id)
->update([

'notes' => isset($notes) ? $notes : ' ',
'documents' => isset($temp_document_image_name) ? $temp_document_image_name : ' ',
'extension' =>isset($extension) ? $extension :''
//  'documents' => isset($doc) ? $doc : ' '

]);

return true;

////////////////////////


}




} 

public function hearingDate(Request $request,$id)
{
 echo "<PRE>";
 print_r($request->all());
 exit;

$validator = Validator::make($request->all(), [
//"order"=>"mimes:pdf,jpeg,jpg",
"date_of_hearing"     =>"required",
"update_notes"     =>"required",
"next_date"      =>"required",



],[
"order.mimes"  =>"Please upload the document in pdf,jpeg or in jpg format only",

"date_of_hearing.required"    =>"THIS IS REQUIRED",
"update_notes.required"    =>"THIS FIELD IS REQUIRED",
"next_date.required"     =>"NEXT DATE IS REQUIRED"



]);
if ($validator->fails())
{
return redirect()->back()->withInput()->withErrors($validator->errors());
}
else{

$updateCase=Lfms_Case::findOrFail($id);
$dates=new Hearing_date();
$judgement=$request->file("order");


if(isset($judgement))
{
$cur_date=Carbon::now()->toDateString();
$judgement_name=$cur_date.'-'.$judgement->getClientOriginalExtension();
// $judgement_name=$cur_date.'-'.$judgement->getClientOriginalExtension();
$extension=$judgement->getClientOriginalExtension();
// echo $extension;
//exit;
if(!file_exists("uploads/order_judgement"))
{
mkdir("uploads/order_judgement");
}
$judgement->move("uploads/order_judgement",$judgement_name);
}
////////////////////

$dates->case_id = $updateCase->id;
$dates->extension =isset($extension)?$extension:"";
$dates->date_of_hearing       =$request->date_of_hearing;
$dates->notes_updated        =$request->update_notes;
$dates->order_judgement      =isset($judgement_name)?$judgement_name:" "; 

$dates->next_date            =$request->next_date;
$dates->save();
//print_r($data);
//exit;
//return json_encode(array('statusCode'=>200));
 return json_encode(["statusCode"=>200]);
//return redirect("showAllCases")->with("successMsg","DATE UPDATED SUCCESSFULLY");

}
}

public function addMoreFile($id)
{
  $moreFiles=Lfms_Case::findOrFail($id);
 return view("cases.upload_more_files",compact('moreFiles'));
}
 public function saveMoreUploaded(Request $request,$id)
 {
  //echo $id;
  //exit;
    
  // $addCaseDoc=Lfms_Case::findOrFail($id);
   //echo $addCaseDoc;
  // exit;case

    $this->validate($request,[
      'multiple_document' =>"required",
      'multiple_document.*'=>'mimes:jpeg,jpg,pdf'

    ]);

     if($request->hasfile('multiple_document'))
     {
      foreach($request->file('multiple_document') as $document)
      {
        $cur_date=Carbon::now()->toDateString();
        $name=$document->getClientOriginalName();
        $extension=$document->getClientOriginalExtension();
        $document_name=$cur_date.'-'.$name;
        if(!file_exists('uploads/documents'))
        {
          mkdir('uploads/documents');
        }
        $document->move('uploads/documents',$document_name);
        $data[]=$document_name;
        $exten[]=$extension;
      }
     }
     $addCaseDoc=Lfms_Case::findOrFail($id);
      $doc=json_encode($data);
      $ext=json_encode($exten);
     $addCaseDoc->documents=isset($doc)?$doc:" ";
     $addCaseDoc->extension=isset($ext)?$ext:" ";
     $addCaseDoc->save();
     return redirect("showAllCases")->with("successMsg","FILE UPLOADED SUCCESSFULLY");
 }


}
