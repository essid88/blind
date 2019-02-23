@extends('backend')
@section('content')



 <body>
    @if($aveugle1->isEmpty())
    <body onload="Alert.this()">
    @else
    <body onload="Alert.render()">
    @endif

<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>
<style type="text/css">
            <style type="text/css">
            #map {
                width: 150%;
                height: 500px;
            }


#dialogoverlay{
  display: none;
  opacity: .4;
  position: fixed;
  top: 0px;
  left: 0px;
  background: #000;
  width: 100%;
  z-index: 10;
}
#dialogbox{
  display: none;
  position: fixed;
  background: #fff;
  border-radius:1px; 
  width: 550px;
  z-index: 10;
}
#dialogbox > div{ background:#FFF; margin:4px; }
#dialogbox > div > #dialogboxhead{ background: #fff; font-size:19px; padding:10px; color:#FA0202;  }
#dialogbox > div > #dialogboxbody{ background:#fff; padding:20px; color:#000; }
#dialogbox > div > #dialogboxfoot{ background: #fff; padding:10px; text-align:right; }

        </style>
</style>


 
    <div class="container"  style="margin-left: 80px;">
        <div class="row">
         @include('search',['url'=>'aveugle','link'=>'aveugle'])    
<div class="_margin-top-1x">

               <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Blind</div>
                    <div class="panel-body">
                        <a href="{{ url('/aveugle/create') }}" class="btn btn-success btn-sm" title="Add New Aveugle">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                           <a href="{{ url('/mapsAll') }}" class="btn btn-success btn-sm" title="Show Map">
                             <i class="fa fa-eye" aria-hidden="true"></i> Show Map
        
                            
                        </a>
                        <br/>
                        <br/>
                        <div >
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Auth</th><th>LastName</th><th>FirstName</th><th>Country</th><th>City</th><th>Mobile</th><th>Other Number</th><th>Photo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @if($aveugle->isEmpty())
                             <tr>
                             <td colspan="5" align="center"> No Blind Was Found ! </td>
                            </tr>
                          @else
                                @foreach($aveugle as $item)
                                    <tr>

                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->auth}}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->ville }}</td>
                                        <td>{{ $item->region }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->tele_famille }}</td>
                                       @if(empty($item->photo))  
                                       <td><img  src="uploads/no-image.jpg" style="height: 80px;""> </img> </td>     @else                                 
                                        <td><img  src="uploads/{{ $item->photo }}" style="height: 80px;""> </img> </td>
                                       
                                        @endif
                                        <td>
                                            <a href="{{ url('/aveugle/' . $item->id ) }}" title="View Aveugle"><button class="btn btn-info btn-xs" style="height: 40px; width: 140px;"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                            <a href="{{ url('/aveugle/' . $item->id . '/edit') }}" title="Edit Aveugle" ><button class="btn btn-primary btn-xs" style="height: 40px; width: 140px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/aveugle', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}

                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true" style="height: 1px; width: 23px;"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Aveugle',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            <a href="{{ url('mapsid/' . $item->id ) }}" title="View In Map"><button class="btn btn-info btn-xs" style="height: 45px; width: 140px;"><i class="background" aria-hidden="true"></i> View In Map </button></a>
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

        </div>
    </div>
</body>



<script>
function CustomAlert(){
    this.render = function(dialog){
      
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";

        @foreach($aveugle as $item)
        document.getElementById('dialogboxhead').innerHTML = '<img  src="uploads/warning.png" style="height: 50px;"">Warning</img><button onclick="Alert.ok()" type="button"  class="close" data-dismiss="dialogbox" aria-label="Close"><span aria-hidden="true">&times;</span></button><hr color="blue">';

        document.getElementById('dialogboxbody').innerHTML ='Some one have a problem click on the button View in Map,  Please check it right now . ';
        
        document.getElementById('dialogboxfoot').innerHTML = '<a href="{{ url('mapidurgent/' . $item->id ) }}" title="View In Map"><center><button class="btn -primary" ><i class="background" aria-hidden="true" ></i> View In Map </button></a>&nbsp<button onclick="Alert.ok() "class="btn -primary" >Close</center></button>';
        
        @endforeach
    }
  this.ok = function(){
    document.getElementById('dialogbox').style.display = "none";
    document.getElementById('dialogoverlay').style.display = "none";
  }
}
var Alert = new CustomAlert();

</script>
@endsection


