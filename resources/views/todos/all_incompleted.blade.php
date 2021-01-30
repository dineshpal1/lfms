@extends("Admin.adminLayout.admin_design")
@section("contents")
<div class="right_col" role="main">
<!--<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css"/>
<style>
.


tr[data-href]
  {
    cursor: pointer; 
  }

#all_task_list > tbody > tr > td
{
   //padding:2px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
}





	</style>

<div class="main-panel">
<div class="content">
<div class="page-inner">




<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">ALL Pending Todo List  
 

 

<a class=" btn btn-success pull-right" href="{{url('/home')}}" >Back</a> </h4>
</div>
<div class="card-body">
<div class="table-responsive">
<table id="all_task_list" class="display table table-striped table-hover" >
<thead>
<tr>
<!--<th>Sr.No</th>-->
<th > </th>
<th> Task </th>
<th>Task Start</th>
<th>Created By</th>
<th>Task End</th>
<th>Action</th>
<!--<th>Time Remaining</th>-->



</tr>
</thead>

<tbody>
<?php $i=1;?>
@foreach ($data as $task)
<tr data-href="#">

<td>{{$i++}}</td>

<td>{{$task->title}}</td>

<td>{{$task->task_start}}</td>

<td>{{$task->created_by}}</td>
<td>{{$task->task_end}} </td>
<td><a href="{{url('/todosEdit',$task->id)}}" class="btn btn-secondary btn-sm" title="edit" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>


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
   jQuery(document).ready(function($) {
    $('#all_task_list').DataTable({
      columnDefs: [
            { "orderable": false, "targets": 'no-sort' }
        ],
        "dom": '<"pull-left"f><"pull-right"l>tip'
    });
});
$(function() {
$.noConflict();
var table= $('#all_task_list').DataTable();
//new $.fn.dataTable.ColReorder(table);
$('#all_task_list').resize();
});
</script>





@endsection