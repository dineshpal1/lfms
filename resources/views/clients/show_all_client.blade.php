@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css" integrity="sha256-rfdVKxryktsNgqIt1/gXp6UEov0OUXAcZ4hJ9emFy7k=" crossorigin="anonymous" />

<style>
 #all_client_list > tbody > tr > td
{
   //padding:2px !important;
    font-size: 13px !important;
    font-weight: 500 !important;
}


.dataTables_filter input 
{ 
  border: 2px solid LightGray; 
   border-radius: 12px;
}

.dataTables_length select
{
  border: 2px solid LightGray; 
   border-radius: 12px;
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


          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">ALL CLIENT LIST  
				  <a class="btn btn-success btn-lg pull-right" href="{{url('create_client_step1')}}" >Add Client</a>
				  </h4>

                </div>
                <div class="card-body">
                
                    
                 <table id="all_client_list" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
						              <th>Sr.No</th>
									        <th>Client </th>
									        <th>Email </th>
									        <th>Mobile No1 </th>
									        <th class="no-sort">Photo </th>
									        <th class="no-sort"> </th>
                          <th class="no-sort"> </th>
                          <th class="no-sort"> </th>
									       
                         
                        </tr>
                      </thead>

                      <tbody>
                           <?php $i=1;?>
                        @foreach ($allclient as $client)
                        <tr>
						        <td>{{$i++}}</td>
								<td><a href="{{url('showClient',$client->id)}}">{{$client->name}}</a></td>
                <td>
                <?php if(!empty($client->email)) { ?>
								<a href="{{url('showClient',$client->id)}}">{{$client->email}}
                <?php }else{?>
                <h5>No Email</h5>
                <?php }?>
                </a></td>
								<td><a href="{{url('showClient',$client->id)}}">{{$client->mobile1}}</a></td>
								
								<td>

                 
          

                  <?php if(!empty($client->profile_photo)) { ?>


                  <a href="{{url('showClient',$client->id)}}"><img  src="{{asset('uploads/client_photo/'.$client->profile_photo)}}"  style="height: 35px; width: 35px" alt=""> <?php }else {?>
                     <h5>No Image</h5>
                      <?php } ?></a>
                 


                </td>
								<td class="editInline">
									
   
				                    <a class="btn btn-secondary btn-sm" href="{{url('showClient',$client->id) }}" title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
				    </td>

            <td class="editInline">
				                    <a class="btn btn-secondary btn-sm" href="{{url('editClient',$client->id) }}" title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                             <td class="editInline" >
				   					<form action="{{url('deleteClient',$client->id) }}" method="POST">
				                    @csrf
				                   
				      
				                    <button type="submit" class="btn btn-secondary btn-sm" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.js" integrity="sha256-Q0cguHZIfvl0zzk68PF1dGCY3pW2y6xvHx4GHLQ/lg4=" crossorigin="anonymous"></script>

  <script>
 
  jQuery(document).ready(function($) {
    $('#all_client_list').DataTable({
      columnDefs: [
            { "orderable": false, "targets": 'no-sort' }
        ],
        "dom": '<"pull-left"f><"pull-right"l>tip'
    });
});
  $(function() {
    $.noConflict();
  var table= $('#all_client_list').DataTable();
  //new $.fn.dataTable.ColReorder(table);
  $('#all_client_list').resize();
 
 });
 
 
 $("td.editInline").css("display","none");

$('tr').on('mouseover mouseout',function(){
     $(this).find('.editInline').toggle();
	 
 
});

 
   

 
  </script>

    
   
 

@endsection