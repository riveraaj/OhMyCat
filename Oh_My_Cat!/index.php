<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oh My Cat!</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="preload" href="./assets/css/index.css" as="style">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav_footer.css">
    <link rel="stylesheet" href="assets/css/sessions.php" type="text/css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main">
        <div id="carouselExampleControls" class="carousel slide scrollRight" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item  active" data-bs-interval="10000" id="first-slider">
                    <p>EXPERTOS EN CUIDADO ANIMAL<br><small>TUS MEJORES AMIGOS MERECEN UN CUIDADO AMISTOSO DE
                            MASCOTA</small></p>
                </div>
                <div class="carousel-item" data-bs-interval="8000" id="second-slider">

                    <p><strong>Daniela Ureña Umaña</strong><br>Súper recomendados! Es increíble el equipo y él trato que
                        tienen, los precios son razonables y la atención de primera calidad!</p>
                </div>
                <div class="carousel-item" data-bs-interval="10000" id="third-slider">

                    <p><strong>Roberto Ruffin</strong><br>Excelente atención, los llame toda la noche y me atendieron
                        con mucha amabilidad y profesionalidad. Pueden confiar si deben dejar sus mascotas internadas.
                    </p>
                </div>
                <div class="carousel-item" data-bs-interval="10000" id="fourth-slider">

                    <p><strong>Oscar González Calvo</strong><br>Excelente equipo profesional. Instalaciones impecables.
                        Son una garantía para el cuidado de las mascotas. Recomiendo ampliamente.</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container container-services">
            <h2>ALGUNOS DE NUESTROS SERVICIOS</h2>
            <p>Una mascota es parte de la familia y requiere de los mejores cuidados posibles.
                Prestamos un servicio clínico completo, tenemos la mejor tecnología disponible en un mismo lugar en
                manos de verdaderos profesionales.</p>
            <div class="container items-services">
                <div class="row scrollLeft">
                    <div class="col">
                        <div class="img-col">
                            <img src="assets/img/internalMedicine.jpg" alt="Imagen de medicina">
                        </div>
                        <h3>Medicina Interna</h3>
                    </div>
                    <div class="col">
                        <div class="img-col">
                            <img src="assets/img/laboratory.jpg" alt="Imagen de laboratorio">
                        </div>
                        <h3>Laboratorio</h3>
                    </div>
                    <div class="col">
                        <div class="img-col">
                            <img src="assets/img/surgeries.jpg" alt="Imagen de cirugía">
                        </div>
                        <h3>Cirugía</h3>
                    </div>
                    <div class="col">
                        <div class="img-col" id="xray">
                            <img src="assets/img/Xray.png" alt="Imagen de rayos X">
                        </div>
                        <h3>Rayos X</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card scrollRight">
            <img src="assets/img/veterinary.jpg" class="card-img-top" alt="Centro de veterinaria">
            <div class="card-body">
                <div class="card-center">
                    <small>QUIÉNES SOMOS EN OH MY CAT!</small>
                    <h3 class="card-title">SOBRE NOSOTROS</h3>
                </div>
                <h4>Quiénes Somos?</h4>
                <p class="card-text">Clinica Veterinaria 24 horas Con más de 30 años de experiencia en el área. Contamos
                    con tecnología de punta y personal profesional capacitado para ofrecerle un verdadero servicio
                    clínico....</p>
            </div>
        </div>
        <div class="container-ubicacion scrollLeft">
            <div class="container ubicacion">
                <h3>UBICACIÓN</h3>
                <span>ENCUENTRENOS EN EL MAPA</span>
                <h4>CLINICA PRINCIPAL</h4>
                <p>500 mts al Este del antiguo Hospital Jerusalem <br><br>
                    San José, Guadalupe <br><br>
                    Telefono: 2229-1743</p>
            </div>
            <div id="map" class="scrollLeft"></div>
        </div>
    </main>
    <?php include "assets/shared/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="assets/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>