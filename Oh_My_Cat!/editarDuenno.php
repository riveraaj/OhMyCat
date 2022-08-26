<?php
    include_once "assets/php/conexionBDAdministrativa.php";
    session_start();
    if (!isset($_SESSION['administrativo'])) {
        header("location: loginAdministrativo.php");
    }
    if (!isset($_GET['cedula'])) {
        header('Location: ownerCatalog.php?mensaje=error');
        exit();
    }

    $cedula = $_GET['cedula'];
    $sentencia = $bd->prepare("SELECT B.cedula AS cedula, B.Nombre, B.Apellido1, B.Apellido2, A.numero, C.Descripcion_Direccion FROM telefono A JOIN persona B ON A.Persona_cedula = B.cedula JOIN direccion C ON B.cedula = C.Persona_cedula WHERE B.cedula = ?;");
    $sentencia->execute([$cedula]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
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
                        <form class="p-4" method="POST" action="assets/php/editarDuennoProceso.php">
                            <div class="mb-3">
                                <label class="form-label">Nombre del veterinario: </label>
                                <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $persona->Nombre; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Primer apellido: </label>
                                <input type="text" class="form-control" name="txtApeUno" required value="<?php echo $persona->Apellido1; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Segundo apellido: </label>
                                <input type="text" class="form-control" name="txtApeDos" required value="<?php echo $persona->Apellido2; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Número de teléfono: </label>
                                <input type="text" class="form-control" name="txtTelefono" autofocus required value="<?php echo $persona->numero; ?>">

                                <label class="form-label">Dirección exacta: </label>
                                <input type="text" class="form-control" name="txtDireccion" autofocus required value="<?php echo $persona->Descripcion_Direccion; ?>">
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="txtCedula" value="<?php echo $persona->cedula; ?>">
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