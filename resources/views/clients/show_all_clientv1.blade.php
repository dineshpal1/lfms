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
				  <a class="btn btn-success btn-lg pull-right" href="{{url('create_client_step1')}}" >Add Client</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                 <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
						                    <th>Sr.No</th>
									        <th>Client </th>
									        <th>Email </th>
									        <th>Mobile No1 </th>
									        <th>Photo </th>
									        <th >Action </th>
									       
                         
                        </tr>
                      </thead>

                      <tbody>
                           <?php $i=1;?>
                        @foreach ($allclient as $client)
                        <tr>
						        <td>{{$i++}}</td>
								<td><a href="{{url('showClient',$client->id)}}">{{$client->name}}</a></td>
								<td><a href="{{url('showClient',$client->id)}}">{{$client->email}}</a></td>
								<td><a href="{{url('showClient',$client->id)}}">{{$client->mobile1}}</a></td>
								
								<td><a href="{{url('showClient',$client->id)}}"><img  src="{{asset('uploads/client_photo/'.$client->profile_photo)}}"  style="height: 50px; width: 50px" alt=""></a></td>
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

    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
   
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