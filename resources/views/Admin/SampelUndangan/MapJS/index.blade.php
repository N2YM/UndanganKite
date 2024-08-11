<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-rotatedmarker/leaflet.rotatedMarker.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-rotatedmarker/leaflet.rotatedMarker.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function initializeMap(mapId, latInputId, lngInputId, addressInputId) {
            var map = L.map(mapId).setView([-1.8592694909901866, 109.97138592970299], 13);

            var streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var satelliteLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.opentopomap.org/copyright">OpenTopoMap</a> contributors'
            });

            var baseLayers = {
                "Street View": streetLayer,
                "Satellite View": satelliteLayer
            };

            L.control.layers(baseLayers).addTo(map);

            var marker;
            var geocoder = L.Control.geocoder({
                    defaultMarkGeocode: false
                })
                .on('markgeocode', function(e) {
                    var latlng = e.geocode.center;
                    // Remove existing marker if any
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    // Add a new marker with draggable option
                    marker = L.marker(latlng, {
                        draggable: true
                    }).addTo(map);
                    map.setView(latlng, 16);
                    // Update input fields with the coordinates
                    document.getElementById(latInputId).value = latlng.lat;
                    document.getElementById(lngInputId).value = latlng.lng;
                    // Update address field with reverse geocoding
                    updateAddress(latlng, addressInputId);
                    // Add event listener for marker dragend event
                    marker.on('dragend', function(event) {
                        var position = marker.getLatLng();
                        document.getElementById(latInputId).value = position.lat;
                        document.getElementById(lngInputId).value = position.lng;
                        updateAddress(position, addressInputId);
                    });
                })
                .addTo(map);

            function updateAddress(latlng, addressInputId) {
                var url =
                    `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latlng.lat}&lon=${latlng.lng}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById(addressInputId).value = data.display_name;
                    })
                    .catch(error => {
                        console.error('Error fetching address:', error);
                    });
            }

            // Allow map rotation with mouse right-click and drag
            var rotationAngle = 0;
            var isRotating = false;
            map.getContainer().addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });
            map.getContainer().addEventListener('mousedown', function(e) {
                if (e.button === 2) { // Right mouse button
                    isRotating = true;
                }
            });
            map.getContainer().addEventListener('mousemove', function(e) {
                if (isRotating) {
                    rotationAngle += e.movementX * 0.5; // Adjust rotation speed as needed
                    map.getPane('mapPane').style.transform = `rotate(${rotationAngle}deg)`;
                }
            });
            map.getContainer().addEventListener('mouseup', function(e) {
                if (e.button === 2) { // Right mouse button
                    isRotating = false;
                }
            });
        }

        // Initialize maps for both Akad and Resepsi
        initializeMap('mapAkad', 'latitudeAkad', 'longitudeAkad', 'addressAkad');
        initializeMap('mapResepsi', 'latitudeResepsi', 'longitudeResepsi', 'addressResepsi');
        initializeMap('mapUlangTahunDewasa', 'latitudeUTD', 'longitudeUTD', 'addressUTD');
        initializeMap('mapKeagamaan', 'latitudeKeagamaan', 'longitudeKeagamaan', 'addressKeagamaan');
    });
</script>
