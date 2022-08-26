<?php
    include_once "assets/php/conexionBDAdministrativa.php";
    session_start();
    if (!isset($_SESSION['administrativo'])) {
        header("location: loginAdministrativo.php");
    }
    if (!isset($_GET['idMascota'])) {
        header('Location: petCatalog.php?mensaje=error');
        exit();
    }

    $cedula = $_GET['idMascota'];
    $sentencia = $bd->prepare("SELECT A.idMascota, A.Nombre, A.Edad, A.Raza, C.Nombre AS Dueno, A.Fallecido FROM mascota A JOIN duenno B ON A.idMascota = B.Persona_cedula JOIN persona C ON B.Persona_cedula = C.cedula WHERE A.Nombre = ?;");
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
                            Editar datos:
                        </div>
                        <form class="p-4" method="POST" action="assets/php/editarMascotaProceso.php">
                            <div class="mb-3">
                                <label class="form-label">Nombre: </label>
                                <input type="text" class="form-control" name="txtNombre" required value="<?php echo $mascota->Nombre; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Edad: </label>
                                <input type="date" class="form-control" name="txtEdad" autofocus required value="<?php echo $mascota->Edad; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Raza: </label>
                                <input type="text" class="form-control" name="txtRaza" autofocus required value="<?php echo $mascota->Raza; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cédula del dueño(a): </label>
                                <input type="text" class="form-control" name="txtDueno" autofocus required value="<?php echo $mascota->idMascota; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fallesido: </label><br>
                                <select name="txtSelect" class="form-select" value="<?php echo $mascota->Fallecido; ?>">
                                    <option <?php if ($mascota->Fallecido == 0) { ?>selected<?php } ?> value="0">No</option>
                                    <option <?php if ($mascota->Fallecido == 1) { ?>selected<?php } ?> value="1">Si</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="codigo" value="<?php echo $mascota->idMascota; ?>">
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