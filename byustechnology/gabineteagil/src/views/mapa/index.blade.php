@extends('gabinete::layouts.main')
@section('title', 'Mapa')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block mb-3 mt-4 h3">Mapa</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-mapa')])
        @endslot
    @endcomponent

    <div class="container-fluid">
        @component('ui::card')
            <div id="googleMaps" style="width: 100%; min-height: 60vh;"></div>
        @endcomponent
    </div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0ELl7QgmF-3tRevTurL_v0JIH2ISAIXE&callback=initMap"></script>
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("googleMaps"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 15,
            });
            
            goToLocation()
            geocoder = new google.maps.Geocoder();
            codeAddress(geocoder, map)
        }

        function goToLocation() {
            // Verifica se temos a geolocalização no HTML5
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                    map.setCenter(pos);
                }, () => {
                    alert('Não foi possível encontrar a sua localização atual');
                });
            } else {
                alert('Seu navegador não suporta geolocalização');
            }
        }

        function codeAddress() {
            geocoder.geocode({
                'address': 'Rua 7 CJ, 987 - Cidade Jardim, Rio Claro/SP'
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

    </script>
@endsection