<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use DB;
use Validator;
use App\Country;
use App\State;
use App\City;
use Carbon\Carbon;
use Hash;
use Auth;
use Image;

class ClientController extends Controller
{

    public function createClientStep1(Request $request)
    {
    	$client=$request->session()->get('client');
    	return view("clients.create_client_step1",compact('client'));
    }
   public function saveClientStep1(Request $request)
   {
   	$validatedData = $request->validate([

   		"name"=>'required',
   		"email"=>'email',
   		//"mobile1"=>'required',
		"mobile1"=>['required','regex:/^[6789]\d{9}$/'],
   		//"mobile2"=>'required',
		//"mobile2"=>['required','regex:/^[789]\d{9}$/'],

   	]);
   	//if (empty($request->session()->get('client')))
   	//{
   		$client=new Client();
   		$client->fill($validatedData);
		//echo "<pre>";
   		//print_r($client);
   		//exit;
   		//$client->save();
   		$request->session()->put('client',$client);
   	//}
   	//else{
   		//$client=$request->session()->get('client');
   		//$client->fill($validatedData);
   		
   	//}
   		$client->save();
   		//echo "<pre>";
   		//print_r($client);
   		//exit;
		$request->session()->put('client',$client);
   		return redirect('/create_client_step2');
   }

    public function getStateList(Request $request)
     {
		
     	   $states = DB::table("states")
          ->where("country_id",$request->country_id)
		  // ->where("name",$request->country_id)
            ->pluck("name","id");
			
			
            return response()->json($states);
     }

     public function getCityList(Request $request)
     {
     		$cities = DB::table("cities")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
             return response()->json($cities);
     }

     public function createClientStep2(Request $request)
     {
     	$countries = DB::table("countries")->pluck("name","id");
     	$client=$request->session()->get('client');
     	return view("clients.create_client_step2",compact('client','countries'));
     }
     public function saveClientStep2(Request $request)
     {

     			//print_r($request->session()->put('client'));
          //	exit;
     	 $validator = Validator::make($request->all(), [
    	 	"profile_photo"=>"mimes:jpeg,png,jpg,bmp",
    	 	//"name"	       =>"required",
    	 	"Address1"     =>"required",
    	 	"Address2"     =>"required",
    	 	"country"      =>"required",
    	 	"state"        =>"required",
    	 	"city"         =>"required",
    	 	"pincode"      =>"required|regex:/^[1-9][0-9]{5}$/",
    	 	//"mobile"       =>"required",


    	 ],[
    	 	"profile_photo.mimes"  =>"Please upload the photo in,jpeg,png,jpg and bmp format only",
    	 	//"name.required"        =>"CLIENT NAME IS REQUIRED",
    	 	"Address1.required"    =>"ADDRESS1 IS REQUIRED",
    	 	"Address2.required"    =>"THIS FIELD IS REQUIRED",
    	 	"country.required"     =>"COUNTRY IS REQUIRED",
    	 	"state.required"       =>"STATE IS REQUIRED",
    	 	"city.required"        =>"CITY IS REQUIRED",
    	 	"pincode.required"     =>"PINCODE IS REQUIRED",
    	 	"pincode.regex"        =>"PLEASE ENTER CORRECT SIX DIGIT PINCODE ",
    	 	//"mobile.required"      =>"MOBILE NUMBER IS REQUIRED",

    	 ]);

    	  if ($validator->fails()) {

           // return redirect("addClient")->withErrors($validator)->withInput();
           return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{

          $profile_photo_destinationPath="uploads/client_photo";          
          if($request->file('profile_photo')!='')
          {
            $image_profile_photo=$request->file("profile_photo");
            $temp_profile_photo_name=time().'_'.$image_profile_photo->getClientOriginalName();
            //print_r( $temp_profile_photo_name);
            //exit;
            $image_profile_photo->move( $profile_photo_destinationPath, $temp_profile_photo_name);
          }    
         // else{
           // echo"No photo uploaded";
         // }          
		 
		 $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      $length_of_string=8;
      $random_string=substr(str_shuffle($str),  0, $length_of_string);
      $pwd=$random_string;
      $hash_pwd = Hash::make($pwd);
        //echo $request->emp_type;
        //exit;
             $user=new User();
              $user->name = $request->name;
             $user->email = $request->email;
             $user->password =$hash_pwd  ;
             $user->raw_value =  $pwd;
               $user->save();
             $clientUserId= $user->id;
		 
		 
		 
		 
          	//$data=$request->session()->get('client');  //session data
			  $lfms_client=$request->session()->get('client');
              $mobile=$lfms_client['mobile1'];
			  
        	$client                      = Client::where('mobile1','=',$mobile)->first();
		   $client->user_id             = $clientUserId;
          $client->name                = $request->name; //name from session
          $client->company             = $request->company;
          $client->address1            = $request->Address1;
          $client->address2            = $request->Address2;
          $client->country             = $request->country;
          $client->state               = $request->state;
          $client->city                = $request->city;
          $client->pincode             = $request->pincode;
          $client->email               = $request->email; ////email from session
          $client->mobile1             = $request->mobile; //mobile1 from session
          $client->mobile2             = $request->mobile2; //mobile2 from session
          $client->alternate_name      = $request->alternate_name;
          $client->alternate_relation  = $request->alternate_relation;
          $client->alternate_email     = $request->alternate_email;
          $client->alternate_phone     = $request->alternate_number;
		  /////////////Default Image///////////////////
			$default_Image="img2.jpg";
		   //$iamge= isset($temp_profile_photo_name)?$temp_profile_photo_name:" ";
		    $iamge= isset($temp_profile_photo_name)?$temp_profile_photo_name:$default_Image;
		    //$iamge= $temp_profile_photo_name;
          //$client->profile_photo       = $temp_profile_photo_name;
       // $client->profile_photo       = (file_exists($iamge))?$image:$default_Image;
		$client->profile_photo       = $iamge;
       	  $data=$client->save();
		  
		   $message = urlencode("Hello  $client->name Your password is $pwd");


$url="http://sms.krauss.co.in/api/sendmsg.php?user=mankomal&pass=e3bkopzx&sender=KRAUSS&phone=$client->mobile1&text=$message&priority=ndnd&stype=normal";
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
            return redirect("showAllClient")->with("successMsg","CLIENT IS SAVED SUCCESSFULLY");
          }


        }
      


     }

      public function showAllClient()
      {
		/*
        //DB::connection()->enableQueryLog();
        $allclient=DB::table("clients")
        //$rentalReport=DB::table("clients as cl","countries as co","states as st","cities as ci")
           ->select('clients.id','clients.name','company','address1','address2','country','state','city','pincode','email','mobile1','mobile2','alternate_name','alternate_relation','alternate_email','alternate_phone','profile_photo','countries.name as country_name','cities.name as city_name','states.name as state_name')   
         ->Join('countries', 'clients.country', '=', 'countries.id')
         ->Join("states",'clients.state','=','states.id')
         ->Join('cities','clients.city','=','cities.id')
        // ->where("deleted_at","==","null")
      	//->whereNotNull('deleted_at')
        ->whereNull('deleted_at')
            ->get();
          */
		  $allclient=Client::all();
        return view("clients.show_all_client",compact('allclient'));
      }

       public function editClient($id)
      {
        $editClient=Client::findOrFail($id);
		$countries = DB::table("countries")->pluck("name","id");

        //echo $editClient->country;

       $stateFind=State::where("country_id",$editClient->country)->get();
       $cityFind=City::where("state_id",$editClient->state)->get();
	    return view("clients.edit_client",compact("editClient","countries","stateFind","cityFind"));
		
       // $countries=Country::orderBy("name","ASC")->get();
        //$states=State::orderBy("name","ASC")->get();
        //$cities=City::orderBy("name","ASC")->get();

       // $countries = DB::table("countries")->pluck("name","id");
         //echo"<pre>";
        //print_r($countries);

       // exit;
       // return view("Admin.edit_client",compact("editClient","countries"));

       // return view("clients.edit_client",compact("editClient","countries","states","cities"));
      }
       public function updateClient(Request $request,$id)
      {
       
        $this->validate($request,[
        "profile_photo"=>"mimes:jpeg,png,jpg,bmp",
        "name"         =>"required",
        "Address1"     =>"required",
        "Address2"     =>"required",
        "country"      =>"required",
        "state"        =>"required",
        "city"         =>"required",
        "pincode"      =>"required|regex:/^[1-9][0-9]{5}$/",
        "mobile1"       =>"['required','regex:/^[789]\d{9}$/']",
        ]);
        $updateClient=Client::findOrFail($id);
        $image=$request->file('profile_photo');
        $slug=str_slug($request->name);
        if(isset($image))
        {
          $currentDate=Carbon::now()->toDateString();
          $imageName=$slug.'-'.$currentDate.'-'.$image->getClientOriginalExtension();
          if(!file_exists('uploads/client_photo'))
          {
            mkdir('uploads/client_photo');
          }
          unlink('uploads/client_photo/'.$updateClient->profile_photo);
          $image->move("uploads/client_photo",$imageName);
        }else{
          $imageName=$updateClient->profile_photo;
        }
        $updateClient->name         = $request->name;
        $updateClient->company      = $request->company;
        $updateClient->address1     = $request->Address1;
        $updateClient->address2     = $request->Address2;
        $updateClient->country      = $request->country;
        $updateClient->state        = $request->state;
        $updateClient->city         = $request->city;
        $updateClient->pincode      = $request->pincode;
        $updateClient->email        = $request->email;
        $updateClient->mobile1      = $request->mobile;
        $updateClient->mobile2      = $request->mobile2;
        $updateClient->alternate_name  = $request->alternate_name;
        $updateClient->alternate_relation  = $request->alternate_relation;
        $updateClient->alternate_email  = $request->alternate_email;
        $updateClient->alternate_phone  = $request->alternate_phone;
        $updateClient->profile_photo  = $imageName;
        $updateClient->save();
		
	$update_user=User::where('id',$updateClient->user_id)->first();

    $update_user->name=$request->name;
    $update_user->email=$request->email;
    $update_user->save();
		
        return redirect("showAllClient")->with("successMsg","CLIENT UPDATED SUCCESSFULLY");

      }
      public function deleteClient($id)
     {
      $deleteClient=Client::findOrFail($id);
      //if(file_exists("uploads/profile_photo/".$deleteClient->profile_photo))
     // {
      //  unlink("uploads/profile_photo/".$deleteClient->profile_photo);
    //  }
        $deleteClient->delete();
        return redirect()->back()->with("successMsg","CLIENT ARCHIVED");
     }
      public function showClient($id)
     {
     // $showClient=Client::findOrFail($id);
     // return view("clients.show_client",compact("showClient"));
	  
	    $showClient=DB::table("clients")
        
           ->select('clients.id','clients.name','company','address1','address2','country','state','city','pincode','email','mobile1','mobile2','alternate_name','alternate_relation','alternate_email','alternate_phone','profile_photo','countries.name as country_name','cities.name as city_name','states.name as state_name')   
         ->Join('countries', 'clients.country', '=', 'countries.id')
         ->Join("states",'clients.state','=','states.id')
         ->Join('cities','clients.city','=','cities.id')
        // ->where("deleted_at","==","null")
      	//->whereNotNull('deleted_at')
        //->whereNull('deleted_at')
		->where("id",$id)
            ->get();
          print_r($showClient);
		  exit;
         return view("clients.show_client",compact("showClient"));
	  
	  
     }
	   public function archiveClient()
     {
      $archive=Client::onlyTrashed()->get();
       // echo"<pre>";
       // print_r($archiveEmp);
       // exit;
        return view("clients.archive_client",compact("archive"));
     }

     public function restoreClient($id)
     {
        $data= Client::withTrashed()->where('id',$id)->restore();
       //PRINT_R($data);
       //exit;
       if($data)
       {
        return redirect("showAllClient")->with("successMsg","CLIENT RESTORE SUCCESSFULLY");

       }
     }
	 public function clientDashboard()
     {
      return view("clients.client_dashboard");
     }
	 
}
