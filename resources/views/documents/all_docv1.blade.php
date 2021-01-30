@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css"/>

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
                  <h4 class="card-title">ALL DOCUMENT TEMPLATE LIST 
				  <a class="btn btn-success btn-lg pull-right" href="{{url('upload')}}" >Add Template</a> </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                 <table id="all_template_list" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
						              <th>Sr.No</th>
									        <th>Template Name </th>
                           <!--<th>Template </th>-->
									        
									        <th >Download </th>
                          <th >Edit </th>
                          <th>Delete</th>
                          
									       
                         
                        </tr>
                      </thead>

                      <tbody>
                           <?php $i=1;?>
                        @foreach ($allDocs as $doc)
                        <tr>
						        <td>{{$i++}}</td>
							     <td>{{$doc->template_name}}</td>
                  							
								{{--<td>
                  <?php if(!empty($doc->uploaded_template)) { ?>
                  <img  src="{{asset('uploads/template/'.$doc->uploaded_template)}}"  style="height: 50px; width: 50px" alt="">
                  <?php }else {?>
                <h5>No Template </h5>
                <?php } ?>
                </td>--}}
                 <td><a href="{{url('downloadDoc',$doc->id)}}">Download</a></td>
                  
								
				    

            <td >
				                    <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                             <td >
				   					<form action="{{url('deleteDoc',$doc->id) }}" method="POST">
				                    @csrf
				                   
				      
				                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
  var table= $('#all_emp_list').DataTable();
  //new $.fn.dataTable.ColReorder(table);
  $('#all_client_list').resize();
 });
  </script>

    
   
 

@endsection