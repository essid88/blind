@extends('backend')

@section('content')


   <div class="row">
  <div class="form -dark">
           

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User #{{ $User->name }}</div>
                    <div class="panel-body">
                     
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($User, [
                            'method' => 'Get',
                            'url' => ['/User_edit1', $User->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
                       {{ Form::open(array('url' => 'foo/bar')) }}
                       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
      </div>
        </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
     </div>
        </div>
         
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <input type="radio" name="role" value="Super_Admin">Super Admin
           &nbsp; &nbsp; <input type="radio" name="role" value="admin">Admin
         </div>
        </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::file('img', null, array('placeholder' => 'img','class' => 'form-control')) !!}
    </div>
        </div>
 
    @include ('user.form', ['submitButtonText' => 'Update'])
                        {{ Form::close() }}
                  </div>
        </div>       

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
