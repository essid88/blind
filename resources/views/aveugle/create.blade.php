@extends('backend')

@section('content')


  <div class="row">
  <div class="form -dark">
          

            <div class="container" style="margin-left: 100px;">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Blind</div>
                    <div class="panel-body">
                        <a href="{{ url('/aveugle') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/aveugle', 'class' => 'form-horizontal', 'files' => true]) !!}
                         <div class="row">


                          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             
                {!! Form::text('auth', null, array('placeholder' => 'auth','class' => 'form-control')) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             
                {!! Form::text('nom', null, array('placeholder' => 'last name','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
           
                {!! Form::text('prenom', null, array('placeholder' => 'firstt name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            
                {!! Form::text('ville', null, array('placeholder' => 'city','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            
                {!! Form::text('region', null, array('placeholder' => 'country','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
           
                {!! Form::text('telephone', null, array('placeholder' => 'mobile','class' => 'form-control')) !!}
                <a style="margin-left: 839px; margin-top: -35px;  float: left; width: 200px; color: #460B08;
" href="https://dashboard.nexmo.com/test-numbers" target="_blank">Add This Number to Nexmo</a>
            </div>
        </div>  
        <div></div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             
                {!! Form::text('tele_famille', null, array('placeholder' => 'other number','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>photo:</strong><br>
              
                {!! Form::file('photo', null, array('placeholder' => 'photo','class' => 'form-control')) !!}
            </div>
        </div>

                        @include ('aveugle.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
