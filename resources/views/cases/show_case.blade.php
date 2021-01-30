@extends("Admin.adminLayout.admin_design")
@section("contents")

  


<div class="right_col" role="main">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> Show Case</h2>
<hr>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{url('showAllCases') }}"> Back</a>
</div>
</div>
</div>




<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">


<!--------------------->
<h6 style="text-align:center;"><b>History of Case Hearing</b> </h6>
<!--<span style="text-align:center;"><b>History of Case Hearing</b></span>-->

<table class="table table-bordered">
<thead >
<tr>

<th>Hearing Date</th>
<th>Update/Notes </th>
<th>Order/Judgement</th>
<th>Next Date</th>

</tr>
</thead>
<tbody>
@if($activity_on_hearing_dates->isNotEmpty())

@foreach($activity_on_hearing_dates as $activity_on_hearing_date)
<tr>

<td>{{$activity_on_hearing_date->date_of_hearing}}</td>
<td>{{$activity_on_hearing_date->notes_updated}}</td>
<td>
@if(!empty($activity_on_hearing_date->extension))

<?php  if($activity_on_hearing_date->extension=="pdf" ){ ?>

<i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20pt;display:block; margin:auto;" ></i>
<?php echo $activity_on_hearing_date->order_judgement;

} else {?>
<i class="fa fa-file-image-o" aria-hidden="true" style="font-size: 20pt;display:block; margin:auto;"></i>
<?php } 
echo $activity_on_hearing_date->order_judgement;
?>

@else
{{"No order/judgement"}}
@endif

</td>
<td>{{$activity_on_hearing_date->next_date}}</td>

</tr>
@endforeach
@else
<tr>
<td colspan="4" style="text-align:center;">No Case History</td>
</tr>
@endif
</tbody>
</table>



<!--------------------->

<div class="well well-sm">
<div class="row">
<!--	
<div class="col-sm-6 col-md-4">
<img  src="{{asset('uploads/documents/'.$showCase->documents)}}"  style="height: 250px; width: 300px" alt="" class="img-rounded img-responsive img" />

</div>
-->

<div class="col-sm-12 col-md-8">
<div class="field_align">
<h3><b>
<strong>Case Title:</strong>
{{ strtoupper($showCase->casetitle) }}</b></h3>

<p>
<strong>Judge Name:</strong>
{{ strtoupper($showCase->judgename )}}
</p>
<p><strong>Court Name:</strong>
{{ strtoupper($showCase->courtname)}}

</p>

<p>
<strong>First Hearing Date:</strong>
{{ $showCase->first_hearing_date }}
</p>
<p> 
<strong>Associate Name:</strong>
{{ strtoupper($showCase->emp_name) }}
</p>
<p>         
<strong>Associate Email:</strong>
{{ strtoupper($showCase->emp_email) }}
</p>


<p>
<strong>Associate Phone:</strong>
{{ $showCase->emp_phone }}
</p>
<p>  <strong>Client Name:</strong>
{{strtoupper( $showCase->client_name )}}</p>

<p>

<strong>Client Phone:</strong>
{{ $showCase->client_phone  }}
</p>
<p>
<strong>Client Email:</strong>
{{ $showCase->client_email  }}
</p>
<p>
<strong>Notes:</strong>
{{strtoupper( $showCase->notes) }}
</p>

</div>

</div> 


<div class="col-sm-6 col-md-4">

<?php //print_r($showCase->documents);exit;?>
<?php 
	
	//$docs=explode(',',$showCase->documents);
	//foreach($docs as $doc)
	//{
		//echo $doc.','.'<br/>';
	
	//exit;
//foreach(explode(',',$showCase->documents,0) as $docs){
	//echo $docs;
//}


?>
<!--<img  src="{{asset('uploads/documents/'.$showCase->documents)}}"  style="height: 250px; width: 300px" alt="" class="img-rounded img-responsive img img-thumbnail" />-->
<?php 
		//echo $showCase->documents;
		//exit;
   //  $docs=explode('.',$showCase->documents);
	// $ext=explode(',',$showCase->extension);
	//print_r($docs) ;
     
     //echo $docs[1];
    
	//exit;
?>

@if(!empty($showCase->extension))

{{"Initial case documents submitted"}}
<br>

{{--
@foreach(json_decode($showCase->documents) as $doc)
{{$doc}}



   @foreach(json_decode($showCase->extension) as $ex)



{{$ex}}

 @endforeach
@endforeach
--}}
<?php
$count=count(json_decode($showCase->documents));
//$count=count($a);
echo $count;
echo"<br>";
foreach(json_decode($showCase->documents) as $doc)
{
	$extArr=explode('.',$doc);
	$extension=end($extArr);
	
	echo $extension;
	
	
}
//exit;
?>
 {{--  
<?php 
foreach(json_decode($showCase->extension) as $ex){
if($ex=="jpeg" || $ex=="jpg")
{
?>
<a><i class="fa fa-file-image-o" aria-hidden="true" style="font-size: 20pt;display:block; margin:auto;"></i><a>
<?php 
echo $showCase->documents; 
}?>



<?php  if($ex=="doc" ){ ?>
<a><i class="fa fa-file-word-o" aria-hidden="true" style="font-size: 20pt;display:block; margin:auto;" ></i><a>
<?php  echo $showCase->documents;

}elseif($=="pdf" ){?>

<a><i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 20pt;display:block; margin:auto;"></i><a>
<?php echo  $showCase->documents;
}}?>

--}}
@else 
{{"NO initial case documents uploaded yet"}}
@endif

<br/>
<a href="{{url('/addMoreFile',$showCase->id)}}" class="btn btn-secondary">Upload more </a>

</div>


</div>







</div>


</div>
</div>
</div>
</div>
@endsection

	
