@extends('backend')

@section('content')



<br><br><br>
<div class="beside mail  -collapse-with-sidebar -collapsible" style="width: 1300px;">
<div class="container-fluid mail-header" style="width: 1300px;">
<div class="row">
<div class="col -xs-12"><h3> 
<i class="fa fa-inbox"></i> Inbox</h3>
<div class="form -dark">
<div class="mail-actions">

<strong></strong>  <strong></strong>
<div class="btn-group">
 <a href="{{ url('/deleteallbox') }}" class="btn btn-danger btn-xs" style="color:black;" title="Delete All">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete All
                        </a>
</div>



<div class="dropdown-menu -dark">
<div class="dropdown-item">Updates</div>
<div class="dropdown-item">Social</div>
<div class="dropdown-item">Promotions</div>
<div class="dropdown-item">Forums</div></div></div><!-- /Mail Actions --></div></div></div></div>
<div class="table-responsive">
<table class="table -dark -hovered mail-items"><tbody>
<tr>
    <td></td>
	<td><strong>E-mail</strong></td>
	<td><strong>Subject</strong></td>
	<td><strong>Messsage</strong></td>
	<td><strong>Attachment</strong></td>
	<td><strong>Date</strong></td>
</tr>
   @if(!isset($data))
       <tr>
       <td colspan="5" align="center"> No E-mail Was Found ! </td>
       </tr>
       @else
@foreach($data as $over)

<!-- Mail Item -->
<tr class="mail-item -unread -starred" data-href="/volta/email/detail">
<td class="mail-item-actions" data-href="/volta/email/detail">
<div class="form -dark">
<!-- Form Group -->
<div class="form-group">

</label></div></div>
<!-- /Form Group -->
</div>





<div class="mail-item-star"> <i class="fa fa-star"></i> </div></td>
<td class="mail-item-sender">{{$over->from}}</td>

<td class="mail-item-title">{{$over->subject}} <span></span></td>

<td class="mail-item-title">{{$over->message}} <span></span></td>

@if(empty($over->filepath))
<td></td>
@else
<td class="mail-item-attachment"><img src="{{ $over->filepath . $over->filename }}" style="width: 50px;"> </td>
@endif
<td class="mail-item-date">{{$over->date}}</td></tr>
</html>
@endforeach
@endif
@endsection