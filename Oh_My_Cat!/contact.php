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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav_footer.css">
    <link rel="stylesheet" href="assets/css/sessions.php" type="text/css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main">
        <div class="parallax bg">
            <div class="modals" id="modals">

            </div>
            <div class="container scrollButtom">
                <div class="horarios">
                    <h2>Nuestros Horarios</h2>
                    <div class="container-horarios">
                        <p id="dias-horario">Lunes<br>
                            <hr class="blue-hr">Martes<br>
                            <hr class="blue-hr">Miércoles<br>
                            <hr class="blue-hr">Jueves<br>
                            <hr class="blue-hr">Viernes<br>
                            <hr class="blue-hr">Sábado<br>
                            <hr class="blue-hr">Domingo
                        </p>
                        <p id="tiempo-horario">
                            <span class="horas">9:00 am - 5:00 pm</span><span class="horas">9:00 am - 5:00 pm</span><span class="horas">9:00 am - 5:00 pm</span><span class="horas">9:00 am - 5:00 pm</span><span class="horas">9:00 am - 5:00 pm</span><span class="horas">Cerrado</span><span class="horas">Cerrado</span>
                        </p>
                    </div>
                    <div class="support">
                        <span>En casos de <strong>EMERGENCIAS</strong> 24h todos los días</span>
                    </div>
                </div>
                <div class="tiendas">
                    <h2>NUESTRAS TIENDAS</h2>
                    <h3>San José - Guadalupe | Principal</h3>
                    <span>500 mts Este del antiguo Hospital Jerusalem</span><br>
                    <h3>Heredia - Plaza San Francisco</h3>
                    <span>Plaza San Francisco contiguo a Mall Oxígeno</span>
                </div>
            </div>
            <div class="form scrollUp">
                <h2>Creemos en la opinión del cliente</h2>
                <form action="https://formsubmit.co/jonathandavidr7@gmail.com" target="_blank" method="POST">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Escribe tus preguntas" rows="3" width="300" height="200" name="preguntas"></textarea>
                    </div>
                    <div class="form-group">
                        <h3>¿Cómo fue la experiencia?</h3>
                        <p class="clasificacion">
                            <input id="radio1" type="radio" name="estrellas" value="5">
                            <label for="radio1">★</label>
                            <input id="radio2" type="radio" name="estrellas" value="4">
                            <label for="radio2">★</label>
                            <input id="radio3" type="radio" name="estrellas" value="3">
                            <label for="radio3">★</label>
                            <input id="radio4" type="radio" name="estrellas" value="2">
                            <label for="radio4">★</label>
                            <input id="radio5" type="radio" name="estrellas" value="1">
                            <label for="radio5">★</label>
                        </p>
                    </div>
                    <input name="enviar" class="btn btn-primary" type="submit" value="Enviar">
                </form>
            </div>
            <div class="container mapa-selector scrollUp">
                <div class="select-map">
                    <h3>Seleccione una de nuestros locales</h3>
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">San José</option>
                        <option value="2">Heredia</option>
                    </select>
                    <button class="btn btn-primary" id="btnCargar" style="width: 120px; margin: auto; text-align: center;">Seleccionar</button>
                </div>
                <div id="map"></div>
            </div>
        </div>
        <?php include "assets/shared/footer.php" ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>