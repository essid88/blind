
@extends('backend')

@section('content')

<style type="text/css">
	h4{
		 text-align:center;
		 color: green;
		 text-decoration-style: solid;
	}
th{
	color:black;
}

</style>
<div class="container"  style="margin-left: 80px;">
 <a href="{{ url('/aveugle') }}" title="Back"><button class="btn btn-warning btn-xs" style="height: 43px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
<a href="{{ url('download') }}" class="btn btn-success btn-sm" title="Add New Aveugle">
<i class="fa fa-plus" aria-hidden="true"></i> Download To PDF
</a>


<a href="{{ url('getPDF') }}" class="btn btn-success btn-sm" title="Add New Aveugle">
<i class="fa fa-plus" aria-hidden="true"></i> Get Into PDF
</a>

<div class="row"><div class="col -lg-12">
<br>
<div class="panel -dark" style=" width:  1100px;">
<div class="panel-heading">
<h4>Detailed Table</h4></div>
<div class="table-responsive">



<table class="table -dark" >
<thead >
<tr>
<th>Name</th>
<th>Created At</th>
<th>Place</th>
<th>Number</th>
<th>Other Number</th>
</tr>
</thead>
<tbody >
 @if($aveugles->isEmpty())
<tr>
<td colspan="5" align="center"> No Blind Was Found !! </td>
</tr>
@else
 @foreach($aveugles as $item)
<tr>
@if(empty($item->photo))  
<td><img  src="uploads/no-image.jpg" style="height: 80px;""> </img>{{ $item->nom }}&nbsp;<span>{{ $item->prenom }}</span></a></td>    
@else     
<td class="-user -detailed"><a href="{{ url('/aveugle/' . $item->id ) }}">
<img  src="uploads/{{ $item->photo }}" style="height: 80px;""> </img>{{ $item->nom }}<span>{{ $item->prenom }}</span></a></td>
  @endif
<td class="-detailed">{{ $item->created_at }}<span></span></td>
<td class="-detailed">{{ $item->ville }}<span> {{ $item->region }}</span></td>
<td class="-detailed">{{ $item->telephone }}</td>
<td class="-detailed">{{ $item->tele_famille }}</td>

</tr>
 @endforeach
@endif
</a>
</td></tr>
</tbody>
</table>
</div></div>
</div></div>
</div></div>
</div>
@endsection
