@extends("Admin.adminLayout.admin_design")
@section("contents")
<div class="right_col" role="main">
<!--<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css"/>

<div class="main-panel">
<div class="content">
<div class="page-inner">
@if(session()->has('msg'))
<div class="btn btn-block btn-success">

{{session('msg')}}

</div>

@endif
@if(session()->has('errormsg'))
<div class="btn btn-block btn-danger">

{{session('errormsg')}}

</div>

@endif

<?php 
//echo"<pre>";
//print_r($todos);
//exit;
?>

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">ALL Todo List
<a class=" text-warning pull-right" href="{{url('/todos/create')}}" ><i class="fa fa-plus-circle large_icon" aria-hidden="true" style="font-size: 30pt;cursor:pointer;"></i></a> </h4>
</div>
<div class="card-body">
<div class="table-responsive">
<table id="all_task_list" class="display table table-striped table-hover" >
<thead>
<tr>
<th>Sr.No</th>
<th>All Task </th>
<th>Task Start</th>
<th>Created By</th>
<th>Task End</th>
<th>Time Remaining</th>
<th >Edit </th>
<th >Task Completed/Incompleted </th>
<th>Delete Task</th>


</tr>
</thead>

<tbody>
<?php $i=1;?>
@foreach ($todos as $todo)
<tr>
<td>{{$i++}}</td>
@if($todo->completed)
<td><a href="#"> <del>{{$todo->title}}</del></a></td>
@else

<td><a href="#">{{ucfirst($todo->title)}}</a></td>
@endif
<td>{{$todo->task_start}}</td>
<td>{{auth()->user()->name}}</td>
<td>{{$todo->task_end}}</td>
<?php 
//$start=$todo->task_start;
//$end=$todo->task_end;
//print_r($start);
//exit;
//$interval=$end->diff($$start);
//echo $interval->format("%a days, %h hours, %i minutes, %s seconds");



?>
<td>###</td>

<td><a href="{{url('/todosEdit',$todo->id)}}" class="text-warning"><i class="far fa-edit" style="font-size: 20pt;"></i></a></td>
<td>
@if($todo->completed)
<span onclick="event.preventDefault();
document.getElementById('form-incomplete-{{$todo->id}}').submit()">
<i class="fas fa-check text-success "  style="font-size: 20pt;margin-left:15px;cursor: pointer"></i>
<form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete',$todo->id)}}">
@csrf
@method("PUT")
</form>
@else
<span onclick="event.preventDefault();
document.getElementById('form-complete-{{$todo->id}}').submit()">
<i class="fas fa-times text-danger"  style="font-size: 20pt;margin-left:15px; cursor: pointer"></i></span>
<form style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete',$todo->id)}}">
@csrf
@method("PUT")
</form>
@endif
</td>
<td>
<form action="{{url('deleteTodos',$todo->id) }}" method="POST">
                            @csrf
                           
                            
                            <button type="submit" class="text-danger" ><i class="fas fa-trash" style="font-size: 20pt;"></i></button>
                        </form>


</td>

</tr>
@endforeach

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Datatables -->

</div>

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.js"></script>

<script>
$(function() {
$.noConflict();
var table= $('#all_task_list').DataTable();
//new $.fn.dataTable.ColReorder(table);
$('#all_client_list').resize();
});
</script>





@endsection