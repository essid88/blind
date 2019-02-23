
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
    @if($aveugle->isEmpty())
    <body>
    @else


<body>

<!-- Modal content -->

<div class="modal-content">
  <div class="modal-header">
 <img  src="uploads/warning.png" style="height: 50px;"></img>&nbsp; &nbsp; warning<hr color="red";>
 
  <div class="modal-body">
    <p><h style=" color:black;">Something went wrong please check it !</p>
    @foreach($aveugle as $item)
    
    <strong><h style=" color:black;"> {{ $item->nom}} {{ $item->prenom}} : <h style=" color:red;">{{$item->telephone}}</strong><br>
  @endforeach
 

  </div>
  <div class="modal-footer">
    <a href="{{ url('mapsid/' . $item->id ) }}" title="View In Map"><center>
    <button class="btn -primary" >
    <i class="background" aria-hidden="true" ></i> View In Map </button></a>&nbsp;<button  data-dismiss="modal-content" class="btn -primary" >Close</center></button>
  </div>


</div>
  @endif
</body>
<style type="text/css">
  
/* Modal Header */
.modal-header {
    
    
    color: white;
    background: #fff; 
    font-size:19px; 
    padding:10px; 
    color:#FA0202;
}

/* Modal Body */
.modal-body {
background:#fff;
 padding:20px; 
 color:#000;
}

/* Modal Footer */
.modal-footer {
   background: #fff;
    padding:10px; 
    text-align:right; 
    
    color: white;
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    margin-right: 10px;
    padding: 0;
    margin-top: 100px;
    border: 1px solid #888;
    width: 70%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top: -300px; opacity: 0} 
    to {top: 0; opacity: 1}
}

@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}


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
                    title: '{{ $item->nom }} : {{ $item->telephone }}',
                    
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