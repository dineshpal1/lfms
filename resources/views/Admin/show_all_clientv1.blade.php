@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">


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
				  <a class="btn btn-success btn-lg pull-right" href="{{route('add_client')}}" >Add Client</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                 <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
						                    <th>Sr.No</th>
									        <th>Client </th>
									        <th>Company </th>
									        <th>Address1 </th>
									        <th>Address2 </th>
									        <th>Country </th>
									        <th>State </th>
									        <th>City </th>
									        <th>Pincode </th>
									        <th>Email </th>
									        <th>Mobile No1 </th>
									        <th>Mobile No2 </th>
									        <th>Alternate Contact Person </th>
									        <th>Relation </th>
									        <th>Alternate Email </th>
									        <th>Alternate Contact Number </th>
									        <th>Photo </th>
									        <th >Action </th>
									       
                         
                        </tr>
                      </thead>

                      <tbody>
                           <?php $i=1;?>
                        @foreach ($allclient as $client)
                        <tr>
						        <td>{{$i++}}</td>
								<td>{{$client->name}}</td>
								<td>{{$client->company}}</td>
								<td>{{$client->address1}}</td>
								<td>{{$client->address2}}</td>		
								<td>{{$client->country_name}}</td>
								<td>{{$client->state_name}}</td>
								<td>{{$client->city_name}}</td>
								<td>{{$client->pincode}}</td>
								<td>{{$client->email}}</td>
								<td>{{$client->mobile1}}</td>
								<td>{{$client->mobile2}}</td>
								<td>{{$client->alternate_name}}</td>
								<td>{{$client->alternate_relation}}</td>
								<td>{{$client->alternate_email}}</td>
								<td>{{$client->alternate_phone}}</td>
								<td><img  src="{{asset('uploads/client_photo/'.$client->profile_photo)}}"  style="height: 100px; width: 100px" alt=""></td>
								<td>
									
   
				                    <a class="btn btn-info btn-sm" href="{{url('showClient',$client->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
				    
				                    <a class="btn btn-primary btn-sm" href="{{url('editClient',$client->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
  <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>


    
   
  <script >
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
      });

      $('#multi-filter-select').DataTable( {
        "pageLength": 5,
        initComplete: function () {
          this.api().columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );

              column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
            } );

            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });

      // Add Row
      $('#add-row').DataTable({
        "pageLength": 5,
      });

      var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action
          ]);
        $('#addRowModal').modal('hide');

      });
    });
  </script> 


@endsection