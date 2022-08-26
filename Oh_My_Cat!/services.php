<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <title>Oh My Cat!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav_footer.css">
    <link rel="stylesheet" href="assets/css/sessions.php" type="text/css">
    <link rel="stylesheet" href="assets/css/services.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main">
        <div class="header-services">
            <h2>NUESTROS SERVICIOS</h2>
            <p>Una mascota es parte de la familia y requiere de los mejores cuidados posibles.
                Prestamos un servicio clínico completo, tenemos la mejor tecnología disponible en un mismo lugar en
                manos de verdaderos profesionales.</p>
        </div>
        <div class="row scrollUp">
            <div class="col">
                <div class="img-col">
                    <img src="assets/img/internalMedicine.jpg" alt="Medico revisando a un gato">
                </div>
                <h3>Medicina Interna</h3>
                <p>Nuestra clinica se ocupa del paciente en su conjunto, atendiendo al diagnóstico y posterior
                    tratamiento de las posibles enfermedades.</p>
            </div>
            <div class="col">
                <div class="img-col">
                    <img src="assets/img/laboratory.jpg" alt="Medico revisando a un pajaro">
                </div>
                <h3>Laboratorio</h3>
                <p>Nos permite analizar las muestras de tu animal (sangre, orina, heces, pelo, piel, tejido de
                    biopsias...). Y esto nos facilita el hacer un diagnóstico más preciso y minucioso.</p>
            </div>
            <div class="col">
                <div class="img-col">
                    <img src="assets/img/surgeries.jpg" alt="Medico revisando cirugia para perro">
                </div>
                <h3>Cirugías</h3>
                <p>Diagnosticamos y tratamos los animales enfermos y heridos.</p>
            </div>
            <div class="col">
                <div class="img-col xray">
                    <img src="assets/img/Xray.png" alt="Medico revisando una radiografia de un perro">
                </div>
                <h3>Radiología</h3>
                <p>La radiología veterinaria es una técnica por la cual se realizan diversos diagnósticos a animales con
                    algún tipo de patología.</p>
            </div>
            <div class="col">
                <div class="img-col">
                    <img src="assets/img/cardiology.jpg" alt="Medico revisando el corazon a un perro">
                </div>
                <h3>Cardiología</h3>
                <p>La cardiología para perros y gatos es tan importante, dado que gracias a ella se pueden detectar
                    diferentes anomalías relacionadas con el sistema cardiovascular.</p>
            </div>
            <div class="col">
                <div class="img-col">
                    <img src="assets/img/groom.jpg" alt="Estilista cortandole el pelo a un cachorro">
                </div>
                <h3>Peluquería</h3>
                <p>La estética canina engloba el cuidado, mejora y mantenimiento de las mascotas en términos de salud,
                    alimentación y por supuesto, higiene y estética.</p>
            </div>
            <div class="col">
                <div class="img-col">
                    <img src="assets/img/petShop.jpg" alt="">
                </div>
                <h3>Pet Shop</h3>
                <p>Ofrecemos alimentos de las marcas más reconocidas, medicados, farmacia veterinaria, accesorios para
                    todo tipo de mascotas, etc.</p>
            </div>
            <div class="col">
                <div class="img-col">
                    <img src="assets/img/microchip.jpg" alt="Medico ubica perro gracias a un microchip">
                </div>
                <h3>Microchip para mascotas</h3>
                <p>Es un pequeño chip de computadora del tamaño de un grano de arroz que contiene un código único que
                    corresponde a los detalles de tu mascota. </p>
            </div>
        </div>
    </main>
    <?php include "assets/shared/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>