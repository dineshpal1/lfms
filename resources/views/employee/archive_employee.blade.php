@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css"/>
<style >
  

  tr[data-href]
  {
    cursor: pointer; 
  }
</style>
<div class="main-panel">
      <div class="content">
        <div class="page-inner">
    @if(session()->has('successMsg'))
<div class="btn btn-block btn-success">
 
  {{session('successMsg')}}
  
  </div>

@endif
@if(session()->has('errorMsg'))
<div class="btn btn-block btn-success">
 
  {{session('errorMsg')}}
  
  </div>

@endif



          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">ALL ARCHIVE EMPLOYEE LIST  </h4>
          <!--<a class="btn btn-success btn-lg pull-right" href="{{url('addEmp')}}" >Add Employee</a>-->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                 <table id="all_emp_list" class="display table table-striped table-hover" >
                      <thead>
                        <tr >
                          <th>Sr.No</th>
                          <th>Name </th>
                           <th>Address </th>
                          <th>Email </th>
                          <th>Mobile </th>
                          <th>Emp_Type </th>
                          <th>Photo </th>
                          <th>Restore</th>
                          <!--<th >View </th>-->
                         <!-- <th >Edit </th>-->
                          <!--<th >Delete </th>-->
                         
                         
                        </tr>
                      </thead>

                      <tbody>
                           <?php $i=1;?>
                        @foreach ($archiveEmp as $emp)
                        <tr data-href="{{url('showEmp',$emp->id)}}">
                    <td>{{$i++}}</td>
                <td><a href="{{url('showEmp',$emp->id)}}">{{ucfirst($emp->name)}}</a></td>
                <td><a href="{{url('showEmp',$emp->id)}}">{{ucwords($emp->address)}}</a></td>
                <td><a href="{{url('showEmp',$emp->id)}}">{{ucfirst($emp->email)}}</a></td>
                <td><a href="{{url('showEmp',$emp->id)}}">{{$emp->phone}}</a></td>
                <td><a href="{{url('showEmp',$emp->id)}}">{{ucfirst($emp->emp_type)}}</a></td>
                
                <td>
                <!--
                <a href="{{url('showEmp',$emp->id)}}"><img  src="{{asset('uploads/emp_photo/'.$emp->emp_photo)}}"  style="height: 50px; width: 50px" alt=""></a>-->
                
                  <?php if(!empty($emp->emp_photo)) { ?>
                  <a href="{{url('showEmp',$emp->id)}}"><img  src="{{asset('uploads/emp_photo/'.$emp->emp_photo)}}"  style="height: 50px; width: 50px" alt="">
                  <?php }else {?>
                <h5>No Image</h5>
                <?php } ?></a>
                
                </td>
                <td><a class="btn btn-success btn-sm" href="{{url('restoreEmp',$emp->id)}}"><i class='fas fa-trash-restore-alt'></i></a></td>
                {{--<td >
                  
   
                            <a class="btn btn-info btn-sm" href="{{url('showEmp',$emp->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
            </td>

            <td >
                            <a class="btn btn-primary btn-sm" href="{{url('editEmp',$emp->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>

                             <td >
                    <form action="{{url('deleteEmp',$emp->id) }}" method="POST">
                            @csrf
                           
              
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                </td>
                            --}}           


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
  var table= $('#all_emp_list').DataTable();
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
    </script>   
   
 

@endsection