<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$todos=Todo::orderBy("completed","ASC")->get();
    	return view("todos.index",compact('todos'));
    }

     public function create()
    {
    	return view("todos.create");
    }

     public function edit($id)
    {
    	$todo=Todo::findOrFail($id);
    	return view("todos.edit",compact("todo") );
    }

    public function saveTodos(Request $request)
    {
    	//dd(auth()->user()->todos);

    	$request->validate([
    		"title"=>"required",
    		"task_start"=>"required",
    		"task_end"=>"required",
    	]);
    	//print_r($request->all());
    	//exit;
    		//$userid=auth()->id();
    		//$request['user_id']=$userid;
    		//echo $userid;
    		//exit;
    	//dd(auth()->user()->todos());
    	$data=auth()->user()->todos()->create($request->all());
    	//$data=Todo::create($request->all());
    	//print_r($data);
    	//exit;
    	if($data)
    	{
    	return redirect("/todos")->with("msg","Todo Created Successfully");
    }
    else{
    	return redirect("/todos")->with("errormsg","Todo Not Createded, Please Try Again!!!");
    }
    }

    public function updateTodos(Request $request,$id)
    {
    	$request->validate([
    		"title"=>"required",
    		"task_start"=>"required",
    		"task_end"=>"required",
    	]);
    	$updatetodo=Todo::findOrFail($id);

    	$updatetodo->title=$request->title;
    	$updatetodo->task_start=$request->task_start;
    	$updatetodo->task_end=$request->task_end;

    	$updatetodo->save();
    	//print_r($data);
    	//exit;
    	
    	return redirect("/todos")->with("msg","Todo Updated Successfully");
    
    }

    public function deleteTodos($id)
    {
    	$deleteTodo=Todo::findOrFail($id);
    	$deleteTodo->delete();
     	return redirect()->back()->with("msg","TASK DELETED SUCCESSFULLY");

    }


    public function complete(Todo $todo)
    {
    	$todo->update(['completed'=>true]);
    	return redirect()->back()->with('msg',"Task marked as completed");
    }

    public function incomplete(Todo $todo)
    {
    	$todo->update(['completed'=>false]);
    	return redirect()->back()->with('errormsg',"Task marked as Incompleted");
    }
        public function allIncompleted()
        {
          $data=Todo::orderBy("task_start","ASC")->where("completed",0)->get();
          return view("todos.all_incompleted",compact("data"));
        }


        public function closeTodos(Request $request)
        {
            /*
           $closedTodo=Todo::findOrFail($id);

           if($todo->completed==false)
           {
            $todo->update(['completed'=>true]);
            return redirect()->back()->with('msg',"Task marked as completed");
           }
           */
          // print_r($request->all());
           $closedTodo=Todo::find($request['id']);
           //echo  $closedTodo; 
            $closedTodo->completed=$request->completed;
             $closedTodo->save();
return redirect()->back()->with('msg',"Task marked as completed");

        }
}
