
@extends('backend')

@section('content')
<br>
<br>
<div class="beside mail -left-aside -collapse-with-sidebar -collapsible">
<div class="row">
<div class="form -dark">
<div class="col -xs-12"><h3> <i class="fa fa-pencil"></i>       blindvision88@gmail.com</h3>
<div class="container-fluid">
<div class="form-group _margin-top-1x">

{!! Form::open(['url' => '/contact','files'=>true]) !!}

<div class="form-group _margin-top-1x">
<label for="exampleInputEmail1">Email adress</label>
<div class="container-fluid">
<div class="row">
<div class="col -xs-12">

<input class="form-control" name="email" type="email" placeholder="email ...">
@if(count($errors) >0 )
<label style="color: red"> {{ $errors->first('email') }}</label>
@endif
</div>
</div>
</div>
</div>

<div class="form-group">
<label for="exampleInputPassword1">Subject</label>
<div class="container-fluid"><div class="row">
<div class="col -xs-12">
<input type="text" class="form-control" name="subject" placeholder="subject ...." >
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



 {!! Form::file('a_file', null, array('placeholder' => 'photo','class' => 'form-control')) !!}



@if(count($errors) > 0)
<label style="color: green"> {{ $errors->first('a_file') }}</label>
@endif

</div>

<button type="submit" class="btn -dark -block">Send E-mail</button>
</form>

</div>
</div>
</div>
</div>
</div>


@endsection
