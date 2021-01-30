<?php

namespace App\Http\Controllers;
use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use str;
use DB;
use Validator;
use Hash;
use Auth;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
    	 return view('employee.add_emp'); 
    }

    public function saveEmployee(Request $request)
    {
    	//echo"<pre>";
    	//print_r($request->all());
    	//exit;
    	 $validator = Validator::make($request->all(), [
    	 	"emp_photo"	   =>"mimes:jpeg,png,jpg,bmp",
    	 	"emp_name"	       =>"required",
    	 	"emp_address"     =>"required",
    	 	"emp_email"     =>"required|email",
    "emp_phone"    =>["required","max:10",'regex:/^[789]\d{9}$/','unique:App\Employee,phone'],
    	 	


    	 ],[
    	 	"emp_photo.mimes"  =>"Please upload the photo in,jpeg,png,jpg and bmp format only",
    	 	"emp_name.required"        =>"EMPLOYEE NAME IS REQUIRED",
    	 	"emp_address.required"    =>"ADDRESS IS REQUIRED",
    	 	"emp_email.required"    =>"EMAIL IS REQUIRED",
    	     "emp_email.email"    =>"PLEADE ENTER EMAIL IN CORRECT FORMAT",
    	 	"emp_phone.required"      =>"PHONE NUMBER IS REQUIRED",
			 "emp_phone.max"      =>"PHONE NUMBER IS NOT MORE THAN 10 DIGITS",
             "emp_phone.regex"      =>"PLEASE ENTER A VALID MOBILIE NUMBER",
              "emp_phone.unique"      =>"THIS MOBILIE NUMBER IS ALREADY TAKEN",

    	 ]);
    	 if ($validator->fails()) {

           
           return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        else{

        	$image=$request->file("emp_photo");
        	$slug=str_slug($request->emp_name);
        	if(isset($image))
        	{
        		$currentDate=Carbon::now()->toDateString();
        		$imageName=$slug.'-'.$currentDate.'-'.$image->getClientOriginalExtension();
        		if(!file_exists("uploads/emp_photo"))
        		{
        			mkdir("uploads/emp_photo");
        		}
        		$image->move("uploads/emp_photo",$imageName);
        	}
        	//else{
        		//echo"No Image uploaded";
        	//}
//////////////////////////////////////////////////////////////////////////////
  $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      $length_of_string=8;
      $random_string=substr(str_shuffle($str),  0, $length_of_string);
      $pwd=$random_string;
      $hash_pwd = Hash::make($pwd);
        //echo $request->emp_type;
        //exit;
             $user=new User();
             $user->name = $request->emp_name;
             $user->email = $request->emp_email;
             $user->password =$hash_pwd  ;
             $user->raw_value =  $pwd;

             if($request->emp_type=="Advocate")
             {
                $user->role_id=2;
             }
             else if($request->emp_type=="Accountant")
             {
                 $user->role_id=3;
             }
              else 
            {
                 $user->role_id=4;
             }

             $user->save();
            $empUserId= $user->id;


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        	$emp=new Employee();
			 $emp->user_id= $empUserId;
        	$emp->name 		 =$request->emp_name;
        	$emp->address 	 =$request->emp_address;
        	$emp->email 	 =$request->emp_email;
        	$emp->phone 	 =$request->emp_phone;
           	$emp->emp_type 	 =$request->emp_type;
	       	$emp->emp_photo  =isset($imageName)?$imageName:" ";

	       	$data=$emp->save();
			
			$message = urlencode("Hello $request->emp_name Your password is $pwd");


$url="http://sms.krauss.co.in/api/sendmsg.php?user=mankomal&pass=e3bkopzx&sender=KRAUSS&phone=$emp->phone&text=$message&priority=ndnd&stype=normal";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    //CURLOPT_POSTFIELDS => $postData
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

//echo $output;


			
			
			
	       	if($data){
	       		return redirect("showAllEmp")->with("successMsg","EMPLOYEE IS ADDED SUCCESSFULLY !!");
	       	}
	       	else{
	       		return redirect("showAllEmp")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");
	       	}

        	
        }

    }

    public function showAllEmployee()
    {
    	$allEmp=EMPLOYEE::whereNull('deleted_at')->get();
    	//echo"<pre>";
    	//print_r($allEmp);
    	//exit;
    	return view("employee.all_emp",compact("allEmp"));
    }

    public function showEmployee($id)
    {

    	$showEmp=Employee::findOrFail($id);
    	return view("employee.show_emp",compact("showEmp"));
    }

    public function editEmployee($id)
    {
    	$editEmp=Employee::findOrFail($id);
    	return view("employee.edit_emp",compact("editEmp"));
    }


     public function updateEmployee(Request $request,$id)
     {

     	$this->validate($request,[
     		"emp_photo"	   =>"mimes:jpeg,png,jpg,bmp",
    	 	"emp_name"	       =>"required",
    	 	"emp_address"     =>"required",
    	 	"emp_email"     =>"required|email",
    	 	"emp_phone"    =>["required","max:10",'regex:/^[789]\d{9}$/','unique:App\Employee,phone'],

     	]);
     	$updateEmp=Employee::findOrFail($id);
     	$image=$request->file("emp_photo");
     	$slug=str_slug($request->emp_name);
     	if(isset($image))
     	{
     		$currentDate=Carbon::now()->toDateString();
     		$imageName=$slug.'-'.$currentDate.'-'.$image->getClientOriginalExtension();
     		if(!file_exists("uploads/emp_photo"))
     		{
     			mkdir("uploads/emp_photo");
     		}
     		@unlink("uploads/emp_photo/".$updateEmp->emp_photo);
     		$image->move("uploads/emp_photo",$imageName);
     	}
     	//else{
     		//$imageName=$updateEmp->emp_photo;
     	//}
     	$updateEmp->name=$request->emp_name;
     	$updateEmp->address=$request->emp_address;
     	$updateEmp->email=$request->emp_email;
     	$updateEmp->phone=$request->emp_phone;
     	$updateEmp->emp_type=$request->emp_type;
     	$updateEmp->emp_photo=isset($imageName)?$imageName:" ";
     	$updateEmp->save();
		
		 $update_user=User::where('id',$updateEmp->user_id)->first();
       // print_r($update_user['id']);
      // exit;
        $update_user->name =$request->emp_name;
        $update_user->email =$request->emp_email;
         if($request->emp_type=="Advocate")
             {
                 $update_user->role_id=2;
             }
             else if($request->emp_type=="Accountant")
             {
                 $update_user->role_id=3;
             }
              else 
            {
                $update_user->role_id=4;
             }


        $update_user->save();
     	return redirect("showAllEmp")->with("successMsg","EMPLOYEE UPDATED SUCCESSFULLY");


     	
     }
     public function deleteEmployee($id)
     {
     	$deleteEmp=Employee::findOrFail($id);
     	//if(file_exists("uploads/emp_photo/".$deleteEmp->emp_photo))
     	//{
     		//unlink("uploads/emp_photo/".$deleteEmp->emp_photo);
     	//}
     	$deleteEmp->delete();
     	return redirect()->back()->with("successMsg","EMPLOYEE DELETED SUCCESSFULLY");
     }
	 
	  public function archiveEmployee()
    {
        $archiveEmp=Employee::onlyTrashed()->get();
       // echo"<pre>";
       // print_r($archiveEmp);
       // exit;
        return view("employee.archive_employee",compact("archiveEmp"));

    }
     public function restoreEmployee($id)
    {
                 
       $data= Employee::withTrashed()->where('id',$id)->restore();
       //PRINT_R($data);
       //exit;
       if($data)
       {
        return redirect("showAllEmp")->with("successMsg","EMPLOYEE RESTORE SUCCESSFULLY");

       }
       
    }
	public function resetPassword($id)
    {
      $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      $length_of_string=8;
      $random_string=substr(str_shuffle($str),  0, $length_of_string);
      $pwd=$random_string;
      $hash_pwd = Hash::make($pwd);
     //echo $pwd;
	  $emp=Employee::findOrFail($id);
	  
	   $user=User::where("id",$emp->user_id)->first();
      $user->password=$hash_pwd;
      $user->raw_value=$pwd;

      $user->save();
	  
	  
	  
	  $message = urlencode("Hi $user->name,Your password is successfully changed your new password is $pwd");


$url="http://sms.krauss.co.in/api/sendmsg.php?user=mankomal&pass=e3bkopzx&sender=KRAUSS&phone=$emp->phone&text=$message&priority=ndnd&stype=normal";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    //CURLOPT_POSTFIELDS => $postData
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
else{
    return redirect("showAllEmp")->with("successMsg","EMPLOYEE'S PASSWORD RESET SUCCESSFULLY");
}
curl_close($ch);

//echo $output;
	 
    }
	public function advocateDashboard()
{
   
     return view("employee.advocate_dashboard");
}

public function accountantDashboard()
{
  return view("employee.accountant_dashboard");   
}

public function othersDashboard()
{
  return view("employee.others_dashboard");   
}
	

}
