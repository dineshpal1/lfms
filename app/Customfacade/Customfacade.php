<?php 
namespace App\Customfacade;
use App\Todo;
use App\Lfms_case; 
use App\Widget;
use DB;
use Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Customfacade
{
	public function countTask()
	{
		//echo"Hello from facade";
		//$data=Todo::count('id');
		//$data=DB::table('todos')->get()->count('id');
	$data=	Todo::where("completed",0)->count();
		echo $data;
		
	}
	public function allWidget()
	{
		//echo Auth::user()->id;
		//exit;
		//$widgets=Widget::where("status",0)->get();
		//return $widgets;
		$widgets=DB::table("widgets")
				    ->select('id','widget_name')
				 //->whereNotIn('id',DB::raw('select widget_id from user_widget where user_id = 1'))
					 ->whereNotIn('id',function($query)
					 	{
					 	$query->select(DB::raw('widget_id'))
                      ->from('user_widget')
                      ->whereRaw('user_id ='.Auth::user()->id);
					 	})
				 ->get();
				 return $widgets;
	}

		public function incompleted_task()
		{
			$data=Todo::orderBy("task_start","ASC")->where("completed",0)->take(4)->get()->toArray();
			return $data;
		}

		public function past_cases()
		{
			
			$date = today()->format('Y-m-d');

			$pastCases=Lfms_case::where('first_hearing_date','<=',$date)->orderBy("first_hearing_date","DESC")->take(4)->get();
			return $pastCases;
		}

		public function merge_task()
		{
			
			$task=Todo::orderBy("task_start","ASC")->where("completed",0)->take(4)->get()->toArray();

			$date = today()->format('Y-m-d');

			$pastCases=Lfms_case::where('first_hearing_date','<=',$date)->orderBy("first_hearing_date","DESC")->take(4)->get()->toArray();
			$merges=[];
			$merges=array_merge($task,$pastCases);
			//$merge = array_flatten($merges);
			//$merge=json_encode($merges);
			
			return $merges;

/*
			$data=Todo::orderBy("task_start","ASC")->where("completed",0)->take(4)->get()->toArray();
        $collection = collect([$data]);

        $date = today()->format('Y-m-d');

			$pastCases=Lfms_case::where('first_hearing_date','<=',$date)->orderBy("first_hearing_date","DESC")->take(4)->get()->toArray();

			$merged = $collection->merge([$pastCases]);
			$data=$merged->all();
			return $data;

*/
		}

}