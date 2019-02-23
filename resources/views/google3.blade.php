@extends('backend')

@section('content')



<div>
</div>
<div>	
</div>
<div>
</div>
<div class="page-heading -dark"><h2>Map for emergency cituation</h2>

<div class="row">
<div class="col -lg-12">
<div class="panel -dark" style="width: 1240px">
<div class="panel-heading" >

<h4>Google Map</h4>

 </div>
</div>

    <body>
      <div> 
        <style type="text/css">
            #map {
                width: 150%;
                height: 500px;
            }
            th, td {
    padding: 15px;
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
 
                 @if($aveugle){
                var mapElement = document.getElementById('map');
 
               
                var map = new google.maps.Map(mapElement, mapOptions);
                 var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
          parking: {
            icon: iconBase + 'parking_lot_maps.png'
          },
          library: {
            icon: iconBase + 'library_maps.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          }
        };
                 @foreach($aveugle as $item)
                 @if($item->log != null )
                 {
                  
                    var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

              var beachMarker  = new google.maps.Marker({
                    position: new google.maps.LatLng({{ $item->log}} , {{ $item->lat}} ),
                    map: map,
                    icon: image,
                    title: '{{ $item->nom }} : {{ $item->telephone }}',
                    
                });
                 }
                 @endif
                 
              
                 @endforeach  
                }@endif
                
                var mapElement = document.getElementById('map');
 
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
                 @foreach($aveugle as $item)
                 @if($item->log != null )
                 {
                    // Let's also add a marker while we're at it
                        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

              var beachMarker  = new google.maps.Marker({
                    position: new google.maps.LatLng({{ $item->log}} , {{ $item->lat}} ),
                    map: map,
                     icon: iconBase + 'library_maps.png',
                    title: '{{ $item->nom }} : {{ $item->telephone }}',
                    
                });
                 }
                 @endif
                 
              
                 @endforeach  
            }
        </script>
        </div>


      <div id="map"></div>


<br><br>
<div class="table-condensed" style="margin-left: 150px; width: 1000px;">
      <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>LastName</th><th>FirstName</th><th>Country</th><th>City</th><th>Mobile</th><th>Other Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @if($aveugle->isEmpty())
                            <script type="text/javascript"> window.location = "{{ url('/home') }}"; </script>
                          @else
                                @foreach($aveugle as $item)
                                    <tr>
                                        <td>{{ $item->id}}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->ville }}</td>
                                        <td>{{ $item->region }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->tele_famille }}</td>
                                        <td>
                                            <a href="{{ url('/ok/' . $item->id ) }}" title="Done" ><button  type="submit" name="done"  value="done" class="btn btn-info btn-xs" style="height: 40px; width: 140px;"><i class="fa fa-eye" aria-hidden="true"></i> Done</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                  @endif
                                </tbody>
                            </table>
                            </div>
 </body>



@endsection
