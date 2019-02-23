@extends('backend')


@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Event #{{ $event->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/events') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        {!! Form::model($event, [
                            'method' => 'PATCH',
                            'url' => ['/events', $event->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}
                         {{ Form::open(array('url' => '/dd')) }}
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('title', null, array('placeholder' => 'title','class' => 'form-control')) !!}
      </div>
        </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    {!! Form::text('color', null, array('placeholder' => 'color','class' => 'form-control')) !!}
    </div>
        </div>
                        

                        @include ('events.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
