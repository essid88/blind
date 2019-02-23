@extends('backend')

@section('content')
    <div class="container">
        <div class="row">
       

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">It's   {{ $aveugle->nom }} {{ $aveugle->prenom }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/aveugle') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/aveugle/' . $aveugle->id . '/edit') }}" title="Edit Aveugle"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['aveugle', $aveugle->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Aveugle',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <a href="{{ url('mapsid/' . $aveugle->id ) }}" title="View In Map"><button class="btn btn-info btn-xs" style="height: 45px; width: 140px;"><i class="background" aria-hidden="true"></i> View In Map </button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <th>Auth</th>
                                        <th>LastName</th>
                                        <th>FirstName</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Mobile</th>
                                        <th>Other Number</th>
                                        <th>Photo</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $aveugle->id }}</td>
                                        <td>{{ $aveugle->auth }}</td>
                                        <td>{{ $aveugle->nom }}</td>
                                        <td>{{ $aveugle->prenom }}</td>
                                        <td>{{ $aveugle->ville }}</td>
                                        <td>{{ $aveugle->region }}</td>
                                        <td>{{ $aveugle->telephone }}</td>
                                        <td>{{ $aveugle->tele_famille }}</td>
                                       
                                             @if(empty($aveugle->photo))  
                                       <td><img  src="{{asset("uploads/no-image.jpg") }}" style="height: 80px;""> </img> </td>     @else                                 
                                         <td><img  src="{{asset("uploads/$aveugle->photo") }}" style="height: 80px;"> </img> </td>
                                       
                                        @endif
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
