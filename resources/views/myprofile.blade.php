@extends('backend')
@section('content')





        <div class="container"  style="margin-left: 100px;">
        <div class="row">  
        <div class="_margin-top-1x">

               <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $User_Name }}</div>
                    <div class="panel-body">
                       <a href="{{ url('/aveugle') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                       <a href="{{ url('/User_edit/' . $user->id ) }}" title="Edit Aveugle" ><button class="btn btn-warning btn-xs" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                       <a href="{{ url('/reset1') }}" title="Reset"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow" aria-hidden="true"></i> Reset Password</button></a>
                       {{Form::open()}}    


                        </a>    
                        </a>
                        <br/>
                        <br/>
                        <div >
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Photo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td>{{ $UserId}}</td>
                                        <td>{{ $User_Name }}</td>
                                        <td>{{ $User_Email }}</td>
                                        <td>{{ $User_Role }}</td>  
                                         @if(empty($User_photo))  
                                       <td><img  src="uploads/no-image.jpg" style="height: 80px;""> </img></td>
                                       @else                                 
                                        <td><img  src="uploads/{{ $User_photo }}" style="height: 80px;""> </img></td>
                                       @endif                                    
                         
                                    </tr>
                               
                                {{Form::close()}}  
                                </tbody>
                            </table>
                             <div class="panel panel-default">
                            <div class="pagination-wrapper">  </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
