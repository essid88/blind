
@extends('backend')

@section('content')
<br>
<br>
<div class="beside mail -left-aside -collapse-with-sidebar -collapsible">
<div class="row">
<div class="form -dark">
<div class="col -xs-12"><h3> <i class="fa fa-pencil"></i>       +21655494446</h3>
<div class="container-fluid">
<div class="form-group _margin-top-1x">

{!! Form::open(['url' => '/contactsms','files'=>true]) !!}

<div class="form-group _margin-top-1x">
<label for="exampleInputEmail1">to</label>
<div class="container-fluid">
<div class="row">
<div class="col -xs-12">

<input class="form-control" name="sendto" type="text" placeholder="number ...">
@if(count($errors) >0 )
<label style="color: red"> {{ $errors->first('sendto') }}</label>
@endif
</div>
</div>
</div>
</div>


<div class="form-group">
<label for="exampleInputPassword1">Message</label>
<div class="container-fluid">
<div class="row">
<div class="col -xs-12">
<textarea  class="form-control" name="message" rows="3"  >
</textarea>
</div>
</div>
</div>
</div>


</div>

<button type="submit" class="btn -dark -block">Send SMS</button>
</form>

</div>
</div>
</div>
</div>
</div>


@endsection
