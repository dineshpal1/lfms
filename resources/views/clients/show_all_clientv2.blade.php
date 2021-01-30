@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css" integrity="sha256-rfdVKxryktsNgqIt1/gXp6UEov0OUXAcZ4hJ9emFy7k=" crossorigin="anonymous" />

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



          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">ALL CLIENT LIST  </h4>
				  <a class="btn btn-success btn-lg pull-right" href="{{url('create_client_step1')}}" >Add Client</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                 <table id="all_client_list" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
						              <th>Sr.No</th>
									        <th>Client </th>
									        <th>Email </th>
									        <th>Mobile No1 </th>
									        <th>Photo </th>
									        <th >View </th>
                          <th >Edit </th>
                          <th >Delete </th>
									       
                         
                        </tr>
                      </thead>

                      <tbody>
                           <?php $i=1;?>
                        @foreach ($allclient as $client)
                        <tr  data-href="{{url('showClient',$client->id)}}">
						        <td>{{$i++}}</td>
								<td><a href="{{url('showClient',$client->id)}}">{{ucfirst($client->name)}}</a></td>
								<td><a href="{{url('showClient',$client->id)}}">{{$client->email}}</a></td>
								<td><a href="{{url('showClient',$client->id)}}">{{$client->mobile1}}</a></td>
								
								<td><a href="{{url('showClient',$client->id)}}"><img  src="{{asset('uploads/client_photo/'.$client->profile_photo)}}"  style="height: 50px; width: 50px" alt=""></a></td>
								<td >
									
   
				                    <a class="btn btn-info btn-sm" href="{{url('showClient',$client->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
				    </td>

            <td >
				                    <a class="btn btn-primary btn-sm" href="{{url('editClient',$client->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                             <td >
				   					<form action="{{url('deleteClient',$client->id) }}" method="POST">
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
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.js" integrity="sha256-Q0cguHZIfvl0zzk68PF1dGCY3pW2y6xvHx4GHLQ/lg4=" crossorigin="anonymous"></script>

  <script>
  $(function() {
    $.noConflict();
  var table= $('#all_client_list').DataTable();
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