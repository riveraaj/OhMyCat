$.ajax({
    type: "POST",
    url: 'assets/php/contactRequest.php',
    data: "data",
    success: function (response) {
        const datos = $.parseJSON(response);
        var mymap = L.map('map').setView([datos.local1.lat, datos.local1.lon], 14);
        var marker = L.marker([datos.local1.lat, datos.local1.lon]).addTo(mymap);

        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=HqWTn2CGUiOuI43rVkeo', {
            maxZoom: 20,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);
    }
});