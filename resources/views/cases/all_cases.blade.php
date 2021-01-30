@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css"/>

<style >
  

  tr[data-href]
  {
    cursor: pointer; 
  }
    #all_case_list > tbody > tr > td
{
   //padding:2px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
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


  <div id='target'>
  </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">ALL CASES  </h4>
				  <a class="btn btn-success btn-lg pull-right" href="{{url('addCase')}}" >Add Case</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                 <table id="all_case_list" class="display table table-striped table-hover" onload="myFunction()" >
                      <thead>
                        <tr>
						              <th>Sr.No</th>
												<th >Client Name </th>
												 <th>Hearing Date </th>
									        <th>Case Title </th>
											<th>Judge Name </th>
									        <th>Court Name </th>
									       
											<th>Asso. Name </th>
									        <!-- <th>Asso. Email </th>-->
									        <!-- <th >Asso. Phone </th>-->
											
                         <!-- <th >Client Phone </th>-->
                          <!-- <th >Client Email </th>-->
											<th >Notes </th>
										<!--<th >Uploaded Documents </th>-->
						  
						 
											<th > </th>
											<th > </th>
											{{-- <th >Delete </th>--}}
									       
                         
                        </tr>
                      </thead>

                      <tbody  >
                           <?php $i=1;?>
                        @foreach ($allCases as $case)
                       
                        <tr data-href="{{url('showCase',$case->id)}}"  >
						        <td>{{$i++}}</td>
								<td><a href="{{url('showCase',$case->id)}}">{{ucfirst($case->client_name)}}</a></td>
								 <td><a href="{{url('showCase',$case->id)}}">{{$case->hearing_date}}</a></td>
								<td><a href="{{url('showCase',$case->id)}}">{{$case->casetitle}}</a></td>
								<td><a href="{{url('showCase',$case->id)}}">{{ucfirst($case->judgename)}}</a></td>
								<td><a href="{{url('showCase',$case->id)}}">{{ucfirst($case->courtname)}}</a></td>
               
                <td><a href="{{url('showCase',$case->id)}}">{{ucfirst($case->emp_name)}}</a></td>
					{{--<td><a href="{{url('showCase',$case->id)}}">{{ucfirst($case->emp_email)}}</a></td>
					<td><a href="{{url('showCase',$case->id)}}">{{$case->emp_phone}}</a></td>--}}
                   
					   {{-- <td><a href="{{url('showCase',$case->id)}}">{{$case->client_phone }}</a></td>
					   <td><a href="{{url('showCase',$case->id)}}">{{ucfirst($case->client_email)}}</a></td>--}}
                      <td><a href="{{url('showCase',$case->id)}}">{{substr($case->notes,0,30)}}....</a></td>
								
									<!--<td>
								 <?php if(!empty($case->documents)) { ?>
                  <a href="{{url('showCase',$case->id)}}"><img  src="{{asset('uploads/documents/'.$case->documents)}}"  style="height: 50px; width: 50px" alt="">
                  <?php }else {?>
                <h5>No Document</h5>
                <?php } ?></a>
								
								<!--<a href="{{url('showCase',$case->id)}}"><img  src="{{asset('uploads/documents/'.$case->documents)}}"  style="height: 50px; width: 50px" alt=""></a>
							</td>-->
							
								<!--<td class="editInline">-->
								<td class="editInline">
   
				                    <a class="btn btn-secondary btn-sm" href="{{url('showCase',$case->id) }}" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
				    
									</td>
                  <!--<td class="editInline">-->
								<td class="editInline">
            
				                    <a class="btn btn-secondary btn-sm" href="{{url('editCase',$case->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true" title="edit"></i></a>
                            </td>
                          
                            <!-- <td >
				   					<form action="{{url('deleteCase',$case->id) }}" method="POST">
				                    @csrf
				                   
				      
				                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
				                </form>
								</td>-->
								                       


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

<script  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.js"></script>


  <script>




  $(function() {
    $.noConflict();
  var table= $('#all_case_list').DataTable({stateSave: true});
  //new $.fn.dataTable.ColReorder(table);

  $('#all_case_list').resize();
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

  $(document).ready(function() {
     $( "#target" ).mousemove();
     
    });


   </script>
   
 

@endsection