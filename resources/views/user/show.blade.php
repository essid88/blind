@extends('backend')
@section('content')


@if (Auth::user() ==null)
 <script type="text/javascript"> window.location = "{{ url('/layout') }}"; </script>
@elseif (Auth::user()->role =='Super_Admin')
    <div class="container"  style="margin-left: 80px;">
        <div class="row">
         @include('search_user',['url'=>'search1','link'=>'search1'])    
<div class="_margin-top-1x" >

               <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                       <a href="{{ url('/aveugle') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('create') }}" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New User


                        </a>    
                        </a>
                        <br/>
                        <br/>
                        <div >
                            <table class="table table-borderless" style="width: 1000px;">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>photo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                 @if($User->isEmpty())
                             <tr>
                             <td colspan="5" align="center"> No User Was Found ! </td>
                            </tr>
                          @else
                                @foreach($User as $item)
                                    <tr>
                                        <td>{{ $item->id}}</td>
                                        
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        @if(empty($item->img))  
                                       <td><img  src="uploads/no-image.jpg" style="width: 80px; height: 80px;""> </img> </td>
                                        @else                                 
                                        <td><img  src="uploads/{{$item->img }}" style="width: 80px; height: 80px;""></img> </td>
                                      @endif
                                        <td>

                                            <a href="{{ url('/User_edit/' . $item->id ) }}" title="Edit Aveugle" ><button class="btn btn-primary btn-xs" style="height: 45px; width: 140px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'Get',
                                                'url' => ['/User_delete', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}

                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" style="height: 1px; width: 23px;"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Aveugle',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                  @endif
                                </tbody>
                            </table>
                             <div class="panel panel-default">
                            <div class="pagination-wrapper">  </div>
                        </div>

                    </div>
                </div>
            </div>
               @else
               <p>Not  allowed</p>
               @endif
        </div>
    </div>

@endsection
