@extends("Admin.adminLayout.admin_design")
@section("contents")
 <div class="right_col" role="main">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/jquery.dataTables.css"/>
<style >
  

  p[data-href]
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
                  <h4 class="card-title">ALL DOCUMENT TEMPLATE LIST 
				  <a class="btn btn-success btn-lg pull-right" href="{{url('upload')}}" >Add Template</a> </h4>
                </div>
                <div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body" >
        <!--<h5 class="card-title">Special title treatment</h5>-->
         @foreach ($allDocs as $doc)
        
        <p  data-href="{{url('downloadDoc',$doc->id)}}" class="card-text inrow "   >
 <?php if(!empty($doc->uploaded_template)) { ?>
                  {{--{{substr($doc->uploaded_template,-4)}}--}}
                    {{--{{$extension = $doc->uploaded_template->getClientOriginalExtension()}}--}}
                  {{--<img  src="{{asset('uploads/template/'.$doc->uploaded_template)}}"  style="height: 50px; width: 50px" alt="">--}}
                  {{--{{$doc->uploaded_template}}--}}
                  @if($doc->extension=="docx" || $doc->extension=="doc" )
                 <i class="fa fa-file-word-o" aria-hidden="true" style="font-size: 60pt;display:block; margin:auto;" ></i>{{$doc->uploaded_template}}
                  @elseif($doc->extension=="xls" || $doc->extension=="xlsx")
                   <i class="fa fa-file-excel-o" aria-hidden="true" style="font-size: 60pt;display:block; margin:auto;"></i>{{$doc->uploaded_template}}
                   @elseif($doc->extension=="pdf")
                   <i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 60pt;display:block; margin:auto;"></i>{{$doc->uploaded_template}}
                  
                 
                  @endif
                  <?php }else {?>
                <h5>No Template </h5>
                <?php } ?>
        </p>
      
        <div class="row">
         <a class="btn btn-secondary btn-sm" href="{{url('downloadDoc',$doc->id)}}"><i class="fa fa-download" aria-hidden="true"></i></a>
   <a class="btn btn-secondary btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>

      <form action="{{url('deleteDoc',$doc->id) }}" method="POST">
                            @csrf
                           
              
                            <button type="submit" class="btn btn-secondary btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>

        </div>

          @endforeach
      


      </div>
    
    </div>
   
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



   <script>
    $(document).ready(function() {
      $(document.body).on("click","p[data-href]",function(){
        window.location.href=this.dataset.href;
      });
    });
    </script>   
    
   
 

@endsection

<!--------------------------------
 <a class="btn btn-warning btn-sm" href="{{url('downloadDoc',$doc->id)}}"><i class="fa fa-download" aria-hidden="true"></i></a>
   <a class="btn btn-primary btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a>

      <form action="{{url('deleteDoc',$doc->id) }}" method="POST">
                            @csrf
                           
              
                            <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>

  --------->







