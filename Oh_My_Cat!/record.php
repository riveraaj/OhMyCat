<?php
    include_once 'assets/php/conexionBDAdministrativa.php';
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location: index.php");
    }

    $sentencia = $bd->query("SELECT A.Edad, D.id, A.Raza, A.Nombre, A.Fallecido, B.Persona_cedula AS Dueno, C.Nombre AS Duenno FROM persona C JOIN duenno B ON C.cedula = B.Persona_cedula JOIN mascota A ON B.Persona_cedula = A.idMascota JOIN registro_publico D ON A.idMascota = D.Persona_cedula WHERE D.usuario = '$_SESSION[usuario]'; ");
    $expediente = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="assets/css/record.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main" style="height: 100vh;">
        <div class="container" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; text-align: center;">
            <?php if($expediente == NULL){?>
                <div class="alert alert-danger" style="margin: auto;" role="alert">
                    Usted no tiene expedientes de sus mascotas!
                </div>
            <?php } ?>            
            <?php
            
                foreach ($expediente as $dato) {
            ?>
                <div class="card bg-dark scrollUp" style="color: #fff; max-width: 18rem; text-align: center; margin: 10px;">
                    <div class="card-header bg-danger" style="font-weight: 600; font-size: 1.3em;">
                        <?php echo $dato->Nombre; ?>
                    </div>
                    <div class="card-body" style="padding: 40px">
                        <h5 class="card-title"><?php echo $dato->Raza; ?></h5>
                        <p class="card-text">Fecha de nacimiento: <?php echo $dato->Edad; ?></p>
                        <p class="card-text">Fallecido: <?php if ($dato->Fallecido == 0) {
                                                            echo 'No';
                                                        } else {
                                                            echo 'Si';
                                                        } ?></p></p>
                        <a href="recordsPublic.php?idMascota=<?php echo $dato->Nombre; ?>" class="btn btn-danger">Ver expediente</a>
                    </div>
                </div>
            <?php
            }
            ?>
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