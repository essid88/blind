@extends('backend')

@section('content')


  <div class="row">
  <div class="form -dark">
          

            <div class="col-md-9">
                <div class="panel panel-default">
                @if (Auth::user()->role =='Super_Admin')
                    <div class="panel-heading">Create New User</div>
                    <div class="panel-body">
                        <a href="{{ url('/show_user') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        
                        {!! Form::open(['url' => '/store', 'class' => 'form-horizontal', 'files' => true]) !!}
                         <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             
                {!! Form::text('name', null, array('placeholder' => 'last name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
           
                {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            
                {!! Form::text('password', null, array('placeholder' => 'password','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <input type="radio" name="role" value="Super_Admin">Super_Admin
           &nbsp; <input type="radio" name="role" value="admin">Admin
         </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>photo:</strong><br>
              
                {!! Form::file('img', null, array('placeholder' => 'img','class' => 'form-control')) !!}
            </div>
        </div>
                        @include ('user.form')
                        {!! Form::close() !!}

                    </div>
                    @else
                     <a href="{{ url('/aveugle') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <p>Not  allowed</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
   
@endsection
