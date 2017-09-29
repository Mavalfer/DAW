(function() {
    var instituto = new google.maps.LatLng(37.161364, -3.591287);
    var mapa = new google.maps.Map(document.getElementById('mapa'), {
        center: instituto,
        zoom: 16
    });

    var peticion = {
        location: instituto,
        radius: 500,
        types: ['store']
    };
    //Para ver los tipos de sitios: https://developers.google.com/places/supported_types?hl=es
    var infowindow = new google.maps.InfoWindow();

    var servicio = new google.maps.places.PlacesService(mapa);
    servicio.nearbySearch(peticion, funcionCallback);

    function funcionCallback(arrayResultados, estado) {
        // con esta función tratamos el array de sitios devueltos por la llamada
        if (estado == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < arrayResultados.length; i++) {
                var sitio = arrayResultados[i];
                crearMarca(arrayResultados[i]);
            }
        }
    }

    function crearMarca(sitio) {
        var placeLoc = sitio.geometry.location;
        var marcador = new google.maps.Marker({
            map: mapa,
            position: placeLoc
        });

        google.maps.event.addListener(marcador, 'click', function() {
            var contenido = sitio.name+'<p>';
            if (sitio.vicinity){
                contenido+=sitio.vicinity+'<p>';
            }
            
            infowindow.setContent(contenido);
            infowindow.open(mapa, this);
        });
    }
})();