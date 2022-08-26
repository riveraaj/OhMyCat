<?php
    include_once "assets/php/conexionBDAdministrativa.php";
    session_start();
    if (!isset($_SESSION['administrativo'])) {
        header("location: loginAdministrativo.php");
    }
    if (!isset($_GET['idExpediente'])) {
        header('Location: addRecords.php?mensaje=error');
        exit();
    }

    $cedula = $_GET['idExpediente'];
    $sentencia = $bd->prepare("SELECT A.idExpediente, B.Nombre, C.Nombre AS Veterinario, D.Persona_cedula, A.Fecha_Consulta, A.Diagnostico, A.Tratamiento FROM persona C JOIN veterinario D ON C.cedula = D.Persona_cedula JOIN expediente A ON D.Persona_cedula = A.idVeterinario JOIN mascota B ON A.nombreMascota = B.Nombre WHERE A.idExpediente = ?;");
    $sentencia->execute([$cedula]);
    $mascota = $sentencia->fetch(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="assets/css/nav_footer_Administrativo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        main {
            padding-bottom: 50px;
        }
    </style>
</head>

<body>
    <?php include "assets/shared/headerAdministrativo.php"; ?>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Editar información:
                        </div>
                        <form class="p-4" method="POST" action="assets/php/editarAddRecordsProceso.php">
                            <div class="mb-3">
                                <label class="form-label">Fecha de consulta: </label>
                                <input type="date" class="form-control" name="txtDate" autofocus required value="<?php echo $mascota->Fecha_Consulta ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Diagnóstico: </label>
                                <input type="text" class="form-control" name="txtDiagnostico" autofocus required value="<?php echo $mascota->Diagnostico; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tratamiento: </label>
                                <input type="text" class="form-control" name="txtTratamiento" autofocus required value="<?php echo $mascota->Tratamiento; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cédula del Veterinario: </label>
                                <input type="text" class="form-control" name="txtVeterinario" autofocus required value="<?php echo $mascota->Persona_cedula; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombre de la mascota: </label>
                                <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $mascota->Nombre; ?>">
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="txtCedula" value="<?php echo $mascota->idExpediente; ?>">
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "assets/shared/footerAdministrativo.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>