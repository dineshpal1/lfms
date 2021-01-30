<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Carbon\Carbon;
use str;
use DB;
use Validator;

class DocumentController extends Controller
{
public function uploadDocument()
{
return view("documents.upload");
}

public function saveDocument(Request $request)
{
//echo"<pre>";
//print_r($request->all());
//exit;
//print_r($request->file("template")->getMimetype());
//exit;
$validator = Validator::make($request->all(), [
"doc_name"	       =>"required",
"template"	   =>"required|mimes:pdf,docx,doc,rtf,xls,xlsx|max:5000",





],[
"template.mimes"  =>"PLEASE UPLOAD THE FILE IN PDF,DOC,DOCX,XLS OR XLSX FORMAT ONLY",
"template.required" =>"THIS FIELD IS REQUIRED",
"template.max"=>"FILE SIZE IS GREATER THAN 50KB",
"template_name.required"        =>"EMPLOYEE NAME IS REQUIRED",
"doc_name.required"		=>"TEMPLATE NAME IS REQUIRED"

]);
if($validator->fails())
{
return redirect()->back()->withInput()->withErrors($validator->errors());
}
else{

$docs=$request->file("template");
$slug=str_slug($request->doc_name);
if(isset($docs))
{
$currentDate=Carbon::now()->toDateString();
$docName=$slug.'-'.$currentDate.'-'.$docs->getClientOriginalExtension();
if(!file_exists("uploads/template"))
{
mkdir("uploads/template");
}
$docs->move("uploads/template",$docName);
}

$doc=new Document();
$doc->template_name=$request->doc_name;
$template=isset($docName)?$docName:"";
$doc->uploaded_template=$template;
$doc->extension=$docs->getClientOriginalExtension();

$data=$doc->save();
//echo($doc);
//exit;
if($data){
return redirect("showAlldoc")->with("successMsg","TEMPLATE UPLOADED SUCCESSFULLY !!");
}
else{
return redirect("showAlldoc")->with("errorMsg","SOMETHING WRONG,PLEASE TRY AGAIN !");
}


}
}

public function showAlldoc()
{ 
$allDocs=Document::whereNull('deleted_at')->get();
return view("documents.all_doc",compact('allDocs'));
}

public function deleteDoc($id)
{
$doc=Document::findOrFail($id);
if(file_exists("uploads/template/".$doc->uploaded_template))
{
unlink("uploads/template/".$doc->uploaded_template);
}
$doc->delete();

return redirect()->back()->with("successMsg","TEMPLATE DELETED SUCCESSFULLY");
}


public function downloadDoc($Id)
{
$book_cover = Document::where('id', $Id)->firstOrFail();
$path = public_path(). '/uploads/template/'. $book_cover->uploaded_template;
return response()->download($path, $book_cover
->original_filename, ['Content-Type' => $book_cover->mime]);
}
 
 public function testOne()
 {
 	return view("documents.testing_data");
 }

}
