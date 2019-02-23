@extends('backend')

@section('content')


   <div class="row">
  <div class="form -dark">
           

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Blind #{{ $aveugle->nom }} {{ $aveugle->prenom }}</div>
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

                        {!! Form::model($aveugle, [
                            'method' => 'PATCH',
                            'url' => ['/aveugle', $aveugle->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
                       {{ Form::open(array('url' => 'foo/bar')) }}

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('auth', null, array('placeholder' => 'Auth','class' => 'form-control')) !!}
      </div>
        </div>


                       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('nom', null, array('placeholder' => 'nom','class' => 'form-control')) !!}
      </div>
        </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('prenom', null, array('placeholder' => 'prenom','class' => 'form-control')) !!}
    </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('ville', null, array('placeholder' => 'ville','class' => 'form-control')) !!}
     </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('region', null, array('placeholder' => 'region','class' => 'form-control')) !!}
    </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('telephone', null, array('placeholder' => 'tel','class' => 'form-control')) !!}
    </div>
        </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('tele_famille', null, array('placeholder' => 'tel famille','class' => 'form-control')) !!}
    </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::file('photo', null, array('placeholder' => 'photo','class' => 'form-control')) !!}
    </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    @include ('aveugle.form', ['submitButtonText' => 'Update'])
                        {{ Form::close() }}
                  </div>
        </div>       

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
