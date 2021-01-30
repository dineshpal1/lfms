<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth','admin'])->group(function(){
	
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/addWidget', 'HomeController@addWidget');
Route::get('/logout', 'HomeController@logout');
Route::get('/getClient', 'HomeController@getClient');
Route::get('/getCases', 'HomeController@getCases');
Route::get('/getEmployee', 'HomeController@getEmployee');
Route::get('/updateCase', 'HomeController@updateCase');
Route::get('/pastHearingDates', 'HomeController@pastHearingDates');
Route::get('/events', 'HomeController@events');
Route::post('/updateUserWidget', 'HomeController@updateUserWidget');



///////////ROUTE FOR CLIENT MGM/////////////////////
//Route::get('/addClient', 'CaseController@addClient')->name('add_client');
//Route::post('/saveClient', 'CaseController@saveClient');
//Route::get("/showAllClient","CaseController@showAllClient");
//Route::get("/editClient/{id}","CaseController@editClient");
//Route::post('/updateClient/{id}', 'CaseController@updateClient');
//Route::post('/deleteClient/{id}', 'CaseController@deleteClient');
//Route::get("/showClient/{id}","CaseController@showClient");

Route::post('/clientDetails', 'CaseController@getClientDetails');
Route::post('/empDetails', 'CaseController@getEmployeeDetails');
Route::get('/addCase', 'CaseController@addCase')->name('add_case');
Route::post('/saveCase', 'CaseController@saveCase');
Route::get('/showAllCases', 'CaseController@showAllCases');
Route::get("/editCase/{id}","CaseController@editCase");
Route::post('/updateCase/{id}', 'CaseController@updateCase');
Route::post('/deleteCase/{id}', 'CaseController@deleteCase');
Route::get("/showCase/{id}","CaseController@showCase");

Route::get('/archiveCase', 'CaseController@archiveCase');
Route::get('/restoreCase/{id}', 'CaseController@restoreCase');

Route::post("/hearing/{id}","CaseController@hearingDate");
Route::get('/addMoreFile/{id}', 'CaseController@addMoreFile');
Route::post('/saveMoreUploaded/{id}', 'CaseController@saveMoreUploaded');




////////By A.K.Singh /////////////////////
Route::get('/showCalendar', 'CalendarController@showCalendar');

Route::get('/event', 'CalendarController@showEvent');
Route::post('/saveEvent', 'CalendarController@saveEvent');

Route::post('/addEvent', 'CalendarController@addEvent');
Route::post('/updateEvent', 'CalendarController@updateEvent');

Route::post('/saveCaseDetails','CaseController@saveCaseDetails');

Route::post('/saveAssociateDetails','CaseController@saveAssociateDetails');

Route::post('/saveClientDetails','CaseController@saveClientDetails');
Route::post('/saveCaseDocument','CaseController@saveCaseDocument');


Route::post('/getEmpDetails','CaseController@getEmpDetails');

Route::post('/getClientData','CaseController@getClientData');





///////ROUTE FOR COUNTRY STATE AND CITY////////////////
//Route::get("get-country-list","CaseController@getCountryList");
//Route::get("get-state-list","ClientController@getStateList");
Route::get("get-state-list","ClientController@getStateList");
Route::get("get-city-list","ClientController@getCityList");

///////////////////ROUTE CALAENDER////////////////////////
Route::get('fullcalendar','FullCalendarController@index');
Route::get('fullcalendar/create','FullCalendarController@create');
Route::post('fullcalendar/update','FullCalendarController@update');
Route::post('fullcalendar/delete','FullCalendarController@destroy');


Route::get("/test","Test@test");
//Route::get("/event","Test@testCalender");
//Route::get("/create_calender","Test@createCalender");
//Route::post("/save_calender","Test@saveCalender");
//Route::get("/view_calender","Test@viewCalender")->name('viewCalender');

Route::get("/create_calender","Calender@createCalender");
Route::post("/save_calender","Calender@saveCalender");
Route::get("/view_calender","Calender@viewCalender")->name('viewCalender');

/////////////ROUTE FOR CLIENT ////////////////////////////////

Route::get('/create_client_step1', 'ClientController@createClientStep1');
Route::post('/save_client_step1', 'ClientController@saveClientStep1');
Route::get('/create_client_step2', 'ClientController@createClientStep2');
Route::post('/save_client_step2', 'ClientController@saveClientStep2');
Route::get("/showAllClient",      "ClientController@showAllClient");
Route::get("/editClient/{id}",      "ClientController@editClient");
Route::post('/updateClient/{id}', 'ClientController@updateClient');
Route::post('/deleteClient/{id}', 'ClientController@deleteClient');
Route::get("/showClient/{id}",   "CaseController@showClient");
Route::get('/archiveClient', 'ClientController@archiveClient');
Route::get('/restoreClient/{id}', 'ClientController@restoreClient');
Route::get('/client_dashboard', 'ClientController@clientDashboard')->name('clientdashboard');


///////////ROUTE FOR EMPLOYEE///////////////////////////////
Route::get('/addEmp', 'EmployeeController@addEmployee')->name('add_emp');
Route::post('/saveEmp', 'EmployeeController@saveEmployee');
Route::get('/showAllEmp', 'EmployeeController@showAllEmployee');
Route::get('/showEmp/{id}', 'EmployeeController@showEmployee');
Route::get('/editEmp/{id}', 'EmployeeController@editEmployee');
Route::post('/updateEmp/{id}', 'EmployeeController@updateEmployee');
Route::post('/deleteEmp/{id}', 'EmployeeController@deleteEmployee');
Route::get('/archiveEmployee', 'EmployeeController@archiveEmployee');
Route::get('/restoreEmp/{id}', 'EmployeeController@restoreEmployee');
Route::get('/reset_pw/{id}', 'EmployeeController@resetPassword');//for password reset
Route::get('/advocate_dashboard', 'EmployeeController@advocateDashboard')->name('advocatedashboard');
Route::get('/accountant_dashboard', 'EmployeeController@accountantDashboard')->name('accountantdashboard');
Route::get('/others_dashboard', 'EmployeeController@othersDashboard')->name('othersdashboard');


////////////////////TODO ROUTE//////////////////////////////////

Route::get("/todos","TodoController@index");
Route::get("/todos/create","TodoController@create");
Route::get("/todosEdit/{id}","TodoController@edit");
Route::post("/saveTodos","TodoController@saveTodos");
Route::post("/updateTodos/{id}","TodoController@updateTodos");
Route::put("/todos/{todo}/complete","TodoController@complete")->name('todo.complete');
Route::put("/todos/{todo}/incomplete","TodoController@incomplete")->name('todo.incomplete');

Route::post("/deleteTodos/{id}","TodoController@deleteTodos");
Route::get("allIncompleted","TodoController@allIncompleted");

Route::put("/closeTodos/{id}","TodoController@closeTodos");
////////////////////DOCUMENT ROUTE////////////////////////////
Route::get("/upload","DocumentController@uploadDocument");
Route::post("/saveDocument","DocumentController@saveDocument");
Route::get("/showAlldoc","DocumentController@showAlldoc");
Route::post('/deleteDoc/{id}', 'DocumentController@deleteDoc');
Route::get('downloadDoc/{id}','DocumentController@downloadDoc');

Route::get("testing","DocumentController@testOne");

});











