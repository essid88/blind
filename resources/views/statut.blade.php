
@extends('backend')

@section('content')


<div>
</div>
<div> 
</div>
<div>
</div>
<div class="page-heading -dark"><h2>Google Maps</h2>
<div class="breadcrumb">
<a class="breadcrumb-item" href="{{ url('/aveugle') }}">Home</a>
<a class="breadcrumb-item -active">Google Maps</a></div>
<div class="row">
<div class="col -lg-12">
<div class="panel -dark" style="width: 1240px">
<div class="panel-heading" >
<h4>Default Map</h4>

 </div>
</div>

    <body>
    @if($aveugles->isEmpty())
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





</body>
      <div> 
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
        
       <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyByuKK1BIUD75QvFHBvB_EyVcjiAhvF5uE&language=fr">

        </script>
        
        <script type="text/javascript">
            // Carte Google Map Tonton du web
            google.maps.event.addDomListener(window, 'load', init);
            function initialize() {
    var loc = {};
    var geocoder = new google.maps.Geocoder();
    if(google.loader.ClientLocation) {
        loc.lat = google.loader.ClientLocation.latitude;
        loc.lng = google.loader.ClientLocation.longitude;

        var latlng = new google.maps.LatLng(loc.lat, loc.lng);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
                alert(results[0]['formatted_address']);
            };
        });
    }
}

google.load("maps", "3.x", {other_params: "sensor=false", callback:initialize});
        
            function init() {

                // Options de base de la Google Map
                var mapOptions = {
                    // Zoom au depart sur la carte (obligatoire)
                    zoom: 6,
 
                    // La latitude et longitude pour centrer la carte (obligatoire)
                    center: new google.maps.LatLng(34, 9), // tunisie
 
                    // Placez ici le style de map qui vous plait.
                    styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
                };
 
                
                var mapElement = document.getElementById('map');
 
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
                 @foreach($aveugles as $item)
                 @if($item->log != null )
                 {
                    // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng({{ $item->log}} , {{ $item->lat}} ),
                    map: map,
                    title: '{{ $item->nom }}'
                });
                 }
                 @endif
                 
              
                 @endforeach  
            }
        </script>
        </div>


      <div id="map"></div>
      </body>



@endsection

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

        @foreach($aveugles as $item)
        document.getElementById('dialogboxhead').innerHTML = '<img  src="uploads/warning.png" style="height: 50px;"">Warning</img><button onclick="Alert.ok()" type="button"  class="close" data-dismiss="dialogbox" aria-label="Close"><span aria-hidden="true">&times;</span></button><hr color="blue">';
        document.getElementById('dialogboxbody').innerHTML =' <strong><h style=" color:black;"> {{ $item->nom}} {{ $item->prenom}}</strong><h style=" color:black;"> have a problem please check it<br><h style=" color:black;">Number : <strong><h style=" color:red; ">{{ $item->telephone}}</strong><br><h style=" color:black;">Other-Number :<strong><h style=" color:red;"> {{ $item->tele_famille}}</strong><hr color="blue">';
        document.getElementById('dialogboxfoot').innerHTML = '<a href="{{ url('mapsid/' . $item->id ) }}" title="View In Map"><center><button class="btn -primary" ><i class="background" aria-hidden="true" ></i> View In Map </button></a>&nbsp<button onclick="Alert.ok() "class="btn -primary" >Close</center></button>';

        
        @endforeach
    }
  this.ok = function(){
    document.getElementById('dialogbox').style.display = "none";
    document.getElementById('dialogoverlay').style.display = "none";
  }
}
var Alert = new CustomAlert();

</script>



