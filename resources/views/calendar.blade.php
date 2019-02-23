@extends('backend')

@section('content')



<div>
<div class="page-heading -dark"><h2>Calendar</h2>
<div class="breadcrumb">
<a class="breadcrumb-item" href="index.html">Home</a>
<a class="breadcrumb-item -active">Calendar</a></div>
<a class="btn -dark page-heading-button" id="calendar-add-event" href="#">
<i class="fa fa-plus-circle _margin-right-1x"></i> Add Event</a>
</div>
</div>
</div>
<div class="row"><div class="col -md-12"><div id="calendar"></div></div></div></div></div>



@endsection