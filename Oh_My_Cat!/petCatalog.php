<?php
    include_once "assets/php/conexionBDAdministrativa.php";
    session_start();
    if (!isset($_SESSION['administrativo'])) {
        header("location: loginAdministrativo.php");
    }
    $sentencia = $bd->query("SELECT A.idMascota, A.Nombre, A.Edad, A.Raza, C.Nombre AS Dueno, A.Fallecido FROM mascota A JOIN duenno B ON A.idMascota = B.Persona_cedula JOIN persona C ON B.Persona_cedula = C.cedula;");
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
</head>

<body>
    <?php include "assets/shared/headerAdministrativo.php"; ?>
    <main>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <!-- inicio alerta -->
                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Rellena todos los campos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Registrado!</strong> Se agregaron los datos.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Vuelve a intentar.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Cambiado!</strong> Los datos fueron actualizados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Eliminado!</strong> Los datos fueron borrados.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- fin alerta -->

                    <div class="card">
                        <div class="card-header">
                            Lista de mascotas
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Edad</th>
                                        <th scope="col">Raza</th>
                                        <th scope="col">Dueño(a)</th>
                                        <th scope="col">Fallecido</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mascota as $dato) {
                                    ?>

                                        <tr>
                                            <td scope="row"><?php echo $dato->Nombre; ?></td>
                                            <td><?php echo $dato->Edad; ?></td>
                                            <td><?php echo $dato->Raza; ?></td>
                                            <td><?php echo $dato->Dueno; ?></td>
                                            <td><?php if ($dato->Fallecido == 0) {
                                                    echo 'No';
                                                } else {
                                                    echo 'Si';
                                                } ?></td>
                                            <td><a class="text-success" href="editarMascota.php?idMascota=<?php echo $dato->Nombre; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="assets/php/eliminarMascota.php?idMascota=<?php echo $dato->idMascota; ?>"><i class="bi bi-trash"></i></a></td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="assets/php/registroMascota.php">
                            <div class="mb-3">
                                <label class="form-label">Nombre: </label>
                                <input type="text" class="form-control" name="txtNombre" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Edad: </label>
                                <input type="date" class="form-control" name="txtEdad" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Raza: </label>
                                <input type="text" class="form-control" name="txtRaza" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cédula del dueño(a): </label>
                                <input type="text" class="form-control" name="txtDueno" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fallecido: </label><br>
                                <select name="txtSelect" class="form-select">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="1">
                                <input type="submit" class="btn btn-primary" value="Registrar">
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