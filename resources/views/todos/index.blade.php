@extends("Admin.adminLayout.admin_design")
@section("contents")
<div class="right_col" role="main">
<!--<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css"/>
<style>
.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: #808080;    }
    49%{    color: #808080; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: #808080;    }
}

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
 

 

<a class=" btn btn-success pull-right" href="{{url('/todos/create')}}" >Add Task</a> </h4>
</div>
<div class="card-body">
<div class="table-responsive">
<table id="all_task_list" class="display table table-striped table-hover" >
<thead>
<tr>
<!--<th>Sr.No</th>-->
<th > </th>
<th>All Task </th>
<th>Task Start</th>
<th>Created By</th>
<th>Task End</th>
<!--<th>Time Remaining</th>-->
<th class="no-sort" > </th>

<th class="no-sort"></th>
<th class="no-sort"></th>

</tr>
</thead>

<tbody>
<?php $i=1;?>
@foreach ($todos as $todo)
<tr data-href="#">
<!--<td>{{--{{$i++}}--}}</td>-->
<td>
@if($todo->completed)
<span onclick="event.preventDefault();
document.getElementById('form-incomplete-{{$todo->id}}').submit()">
<i class="fa fa-dot-circle-o text-dark "  style="font-size: 10pt;margin-left:15px;cursor: pointer"></i>
<form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete',$todo->id)}}">

@csrf
@method("PUT")
</form>
@else
<span onclick="event.preventDefault();
document.getElementById('form-complete-{{$todo->id}}').submit()">
<i class="fa fa-circle text-secondary"  style="font-size: 10pt;margin-left:15px; cursor: pointer"></i></span>
<form  style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete',$todo->id)}}">
	
@csrf
@method("PUT")
</form>
@endif
</td>
@if($todo->completed)
<td><a href="#" class=" text-dark"> <del>{{strtoupper($todo->title)}}</del></a></td>
@else

<td><a href="#"><span class="text-secondary blinking">{{strtoupper($todo->title)}}</span></a></td>
@endif
<td>{{$todo->task_start}}</td>
<td> <?php if($todo->created_by==''){ ?>{{auth()->user()->name}}
<?php }else{echo $todo->created_by;}?>
</td>
<td>{{$todo->task_end}}</td>

<!--<td>###</td>-->

<td class="editInline">
@if(!$todo->completed)

	{{--<a href="{{url('/todosEdit',$todo->id)}}" class="text-dark"><i class="fa fa-edit" style="font-size: 15pt;"></i></a>--}}
  <a href="{{url('/todosEdit',$todo->id)}}" class="btn btn-secondary btn-sm" title="edit" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

@endif
</td>

<td class="editInline">
	@if(!$todo->completed)

<form action="{{url('deleteTodos',$todo->id) }}" method="POST">
                            @csrf
                           
                            
                            {{--<button type="submit" class="text-dark" ><i class="fa fa-trash" style="font-size: 15pt;"></i></button>--}}
                             <button type="submit" class="btn btn-secondary btn-sm " title="delete" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>

@endif
</td>
<td class="editInline">
  @if(!$todo->completed)

 <form action="{{url('closeTodos',$todo->id)}}" method="post" data-id="{{$todo->id}}">
  @csrf
  @method('PUT')
  <input type="hidden" name="completed" value="1" />

 <button     type="submit" class="btn btn-secondary btn-sm  " title="close task" id="close"> <i class="fa fa-times " aria-hidden="true" ></i></button>
 <!-- <a href="{{url('closeTodos',$todo->id)}}" class="btn btn-secondary btn-sm" title="close task" >
  
  </a>-->
  @endif
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
$('#all_client_list').resize();
});
</script>

<script>
    $(document).ready(function() {
      $(document.body).on("click","tr[data-href]",function(){
        window.location.href=this.dataset.href;
      });
    });

  $("td.editInline").css("display","none");

$('tr').on('mouseover mouseout',function(){
     $(this).find('.editInline').toggle();

});
///////////for closed task/////////
$(document).ready(function(){
$('#close').click(function(){
  var token=$("input[name='_token']").val();
  var name=$("input[name='completed']").val();

  alert(name);
  $.ajax({
    url:"{{'closeTodos',$todo->id}}",
     //url:'closeTodos/'+todo.data('id'),
    method:"PUT",
    data:{name:name,_token:token},
    success:function(data){
      console.log(data);
    }

  });

});
});

    </script>
   



@endsection
