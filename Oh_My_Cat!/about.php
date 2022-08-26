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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav_footer.css">
    <link rel="stylesheet" href="assets/css/sessions.php" type="text/css">
    <link rel="stylesheet" href="assets/css/about.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main">
        <div class="main-container">
            <div class="header-about scrollButtom">
                <h2>Conoce más de Oh My Cat!</h2>
                <hr>
                <span>Los mejores médicos veterinarios y el equipo más avanzado.</span>
            </div>
            <div class="company-about">
                <div class="container-mision-vision">
                    <div id="mision" class="col card-about scrollRight">
                        <div class="container-hexagon">
                            <div id="hexagon-mision" class="hexagon">
                                <img src="assets/img/mision.png" alt="">
                            </div>
                            <h3>Misión</h3>
                        </div>
                        <p>Ofrecer bienestar tanto animal, como a las familias de nuestros pacientes a través de la prestación de servicios médicos veterinarios y complementarios, entregando calidad y satisfacción, superando las expectativas de nuestros clientes, contribuyendo a la innovación y desarrollo profesional del sector Médico Veterinario de la Región.
                        </p>
                    </div>
                    <div id="vision" class="col card-about scrollLeft">
                        <div class="container-hexagon">
                            <div id="hexagon-vision" class="hexagon">
                                <img src="assets/img/vision.png" alt="">
                            </div>
                            <h3>Visión</h3>
                        </div>
                        <p>Buscar la excelencia en la prevención, detección y curación de enfermedades en animales de compañía, aumentando el nivel de seguridad sanitaria en quienes conviven con ellos y hacerlo de forma sostenible, rentable, profesional y ética; así como mejorar la relación afectiva entre las mascotas y sus propietarios, generando un mayor equilibrio sanitario y emocional en ambos.
                        </p>
                    </div>
                </div>
                <div id="valores" class="card-about scrollUp">
                    <div class="container-hexagon">
                        <div id="hexagon-valores" class="hexagon">
                            <img src="assets/img/valor (1).png" alt="">
                        </div>
                        <h3>Valores</h3>
                    </div>
                    <p>Trabajo en equipo<br>Responsabilidad<br>Empatía<br>Respeto<br>Pasión
                    </p>
                </div>
            </div>
        </div>
    </main>
    <?php include "assets/shared/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="assets/js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>