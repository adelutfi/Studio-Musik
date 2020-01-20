
function initMap() {

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(23.8066719, 90.3237784),
        styles: [
            {
                elementType: 'labels',
                stylers: [{
                    visibility: 'on'
                }]
            },
            {
                elementType: 'geometry',
                stylers: [{
                    color: '#EDEDED'
                }]
            },
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#b1b1b1'
                }]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{
                    color: '#F7F7F7'
                }]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{
                    color: '#F7F7F7'
                }]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{
                    color: '#F7F7F7'
                }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{
                    color: '#F7F7F7'
                }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{
                    color: '#F7F7F7'
                }]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{
                    color: '#F7F7F7'
                }]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#b1b1b1'
                }]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [
                    { "visibility": "off" }
                ]
            }
        ]
        //mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(23.8066719, 90.3237784),
        map: map,
        icon: 'assets/img/map-marker.png',
        animation: google.maps.Animation.DROP,
    });

}
