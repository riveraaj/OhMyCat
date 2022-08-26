<?php
    include_once "assets/php/conexionBDAdministrativa.php";
    session_start();
    if (!isset($_SESSION['administrativo'])) {
        header("location: loginAdministrativo.php");
    }
    $sentencia = $bd->query("SELECT B.cedula, B.Nombre, B.Apellido1, B.Apellido2, A.numero, C.Descripcion_Direccion FROM telefono A JOIN persona B ON A.Persona_cedula = B.cedula JOIN direccion C ON B.cedula = C.Persona_cedula JOIN veterinario D WHERE B.cedula = D.Persona_cedula; ");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
                    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'repetido') {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Cédula ya registrada.
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
                            Lista de veterinarios
                        </div>
                        <div class="p-0">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Cédula</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($persona as $dato) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $dato->cedula; ?></td>
                                            <td><?php echo $dato->Nombre; ?></td>
                                            <td><?php echo $dato->Apellido1; ?></td>
                                            <td><?php echo $dato->Apellido2; ?></td>
                                            <td><?php echo $dato->numero; ?></td>
                                            <td><?php echo $dato->Descripcion_Direccion; ?></td>
                                            <td><a class="text-success" href="editarVeterinario.php?cedula=<?php echo $dato->cedula; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="assets/php/eliminarVeterinario.php?cedula=<?php echo $dato->cedula; ?>"><i class="bi bi-trash"></i></a></td>
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
                        <form class="p-4" method="POST" action="assets/php/registroVeterinario.php">
                            <div class="mb-3">
                                <label class="form-label">Cédula: </label>
                                <input type="text" class="form-control" name="txtCedula" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nombre: </label>
                                <input type="text" class="form-control" name="txtNombre" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Primer apellido: </label>
                                <input type="text" class="form-control" name="txtApeUno" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Segundo apellido: </label>
                                <input type="text" class="form-control" name="txtApeDos" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Teléfono: </label>
                                <input type="text" class="form-control" name="txtTelefono" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Dirección: </label>
                                <input type="text" class="form-control" name="txtDireccion" autofocus required>
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="1">
                                <input type="submit" class="btn btn-dark" value="Registrar">
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