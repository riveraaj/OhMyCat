const btnCargar = document.getElementById("btnCargar");
const modals = document.getElementById("modals");
const mapss = document.getElementById("map");

const Mapa = ()=>{
    const selectMap = document.querySelector('.form-select').value;
    $.ajax({
        type: "POST",
        url: 'assets/php/contactRequest.php',
        data: "data",
        success: function (response) {
            const datos = $.parseJSON(response);
            if(selectMap == 1){
                BuildMap(datos.local1.lat, datos.local1.lon);
                const modal1 = "<div class='modal fade' id='exampleModal1' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='border-radius: 100%;'><div class='modal-dialog' style='border-radius: 14px;'><div class='modal-content' style='border-radius: 14px;'><div class='modal-header' style='padding: 0; border-radius: 14px;'><img src='assets/"+ datos.local1.foto +"' alt='foto veterinaria' style='width:100%; border-top-right-radius: 14px; border-top-left-radius: 14px;'></div> <div class='modal-body'><span><i class='bi bi-pin-map-fill'> </i>  San José - Guadalupe</span><br><span><i class='bi bi-map-fill'> </i> Dirección: "+ datos.local1.descripcion +"</span><br><span><i class='bi bi-telephone-fill'> </i> Teléfono: "+ datos.local1.telefono +"</span></div></div></div></div>";
                modals.innerHTML =modal1;
                $("#exampleModal1").modal("show");
            }
            if(selectMap == 2){
                BuildMap(datos.local2.lat, datos.local2.lon);
                const modal2 = "<div class='modal fade' id='exampleModal2' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='border-radius: 100%;'><div class='modal-dialog' style='border-radius: 14px;'><div class='modal-content' style='border-radius: 14px;'><div class='modal-header' style='padding: 0; border-radius: 14px;'><img src='assets/"+ datos.local2.foto +"' alt='foto veterinaria' style='width:100%; border-top-right-radius: 14px; border-top-left-radius: 14px;'></div> <div class='modal-body'><span><i class='bi bi-pin-map-fill'> </i> Heredia - Plaza San Francisco</span><br><span><i class='bi bi-map-fill'> </i> Dirección: "+ datos.local2.descripcion +"</span><br><span><i class='bi bi-telephone-fill'> </i> Teléfono: "+ datos.local2.telefono +"</span></div></div></div></div>";
                modals.innerHTML = modal2;
                $("#exampleModal2").modal("show");
            }

            function BuildMap(lat, long){
                document.getElementById('map').innerHTML = "<div id='mapa' style='width: 100%; height: 100%;'></div>";
                var osmUrl = 'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=HqWTn2CGUiOuI43rVkeo', osmAttribution = 'Map data © <a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>', osmLayer = new L.TileLayer(osmUrl, {maxZoom:15, attribution: osmAttribution});
                var map = new L.Map('mapa');
                var marker = new L.Marker([lat, long]);
                map.setView(new L.LatLng(lat, long), 13);
                map.addLayer(osmLayer);
                map.addLayer(marker);
                mapss.style.display = "block";
            }
        }
    });
}

btnCargar.addEventListener('click', Mapa);