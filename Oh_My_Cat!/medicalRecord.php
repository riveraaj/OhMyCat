<?php
    include_once "assets/php/conexionBDAdministrativa.php";
    session_start();
    if (!isset($_SESSION['administrativo'])) {
        header("location: loginAdministrativo.php");
    }
    $sentencia = $bd->query("SELECT A.Nombre, A.Fallecido, B.Persona_cedula AS Dueno, C.Nombre AS Duenno FROM persona C JOIN duenno B ON C.cedula = B.Persona_cedula JOIN mascota A ON B.Persona_cedula = A.idMascota;");
    $mascota = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="assets/css/nav_footer_Administrativo.css">
    <link rel="stylesheet" href="assets/css/veterinaryCatalog.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/scrollreveal"></script>    
</head>

<body>
    <?php include "assets/shared/headerAdministrativo.php"; ?>
    <main style="height: 100vh;">
        <div class="container" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; text-align: center;">
            <?php
            foreach ($mascota as $dato) {
            ?>
                <div class="card bg-dark scrollUp" style="color: #fff; max-width: 18rem; text-align: center; margin: 10px;">
                    <div class="card-header bg-warning" style="color: #000; font-weight: 600; font-size: 1.3em;">
                        <?php echo $dato->Nombre; ?>
                    </div>
                    <div class="card-body" style="padding: 40px">
                        <h5 class="card-title">Dueño(a): <?php echo $dato->Duenno; ?></h5>
                        <p class="card-text">Fallecido: <?php if ($dato->Fallecido == 0) {
                                                            echo 'No';
                                                        } else {
                                                            echo 'Si';
                                                        } ?></p>
                        <a href="expedienteMascotas.php?idMascota=<?php echo $dato->Nombre; ?>" class="btn btn-warning">Ver expediente</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <?php include "assets/shared/footerAdministrativo.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>