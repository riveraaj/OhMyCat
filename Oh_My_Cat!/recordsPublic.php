<?php
    include_once 'assets/php/conexionBDAdministrativa.php';
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location: index.php");
    }
    if (!isset($_GET['idMascota'])) {
        header('Location: record.php');
        exit();
    }
    $idMascota = $_GET['idMascota'];
    $sentencia = $bd->query("SELECT A.idExpediente, B.Nombre, C.Nombre AS Veterinario, A.Fecha_Consulta, A.Diagnostico, A.Tratamiento FROM persona C JOIN veterinario D ON C.cedula = D.Persona_cedula JOIN expediente A ON D.Persona_cedula = A.idVeterinario JOIN mascota B ON A.nombreMascota = B.Nombre WHERE B.Nombre = '$idMascota';");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav_footer.css">
    <link rel="stylesheet" href="assets/css/sessions.php" type="text/css">
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main" style="height: 100vh; padding-top: 140px; padding-bottom: 30px; width: 100%; background-color: var(--main-color);">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            Expediente de <?php echo $idMascota; ?>
                        </div>
                        <div class="p-0">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Expediente</th>
                                        <th scope="col">Veterinario</th>
                                        <th scope="col">Fecha de consulta</th>
                                        <th scope="col">Diagnóstico</th>
                                        <th scope="col">Tratamiento</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($expediente as $dato) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $dato->idExpediente; ?></td>
                                            <td><?php echo $dato->Veterinario; ?></td>
                                            <td><?php echo $dato->Fecha_Consulta; ?></td>
                                            <td><?php echo $dato->Diagnostico; ?></td>
                                            <td><?php echo $dato->Tratamiento; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a target="_blank" href="assets/php/pdfRecords.php?idMascota=<?php echo $dato->Nombre; ?>" id="descargarExpediente" type="button" class="btn btn-danger" style="margin: 40px 45%;">Descargar</a>
    </main>
    <?php include "assets/shared/footer.php" ?>
    <script src="assets/js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>

</html>