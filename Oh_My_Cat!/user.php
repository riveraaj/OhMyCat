<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location: index.php");
    }
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
    <link rel="stylesheet" href="assets/css/user.css">
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main">
        <div class="container-main">
            <h2>TU INFORMACIÓN PERSONAL</h2>
            <p>Por favor, asegúrese de actualizar su información personal si ha cambiado.</p>
            <form action="" method="post" id="form-info" enctype="multipart/form-data">
                <div class="form-container">
                    <div class="form-items">
                        <label for="photo" id="label-photo">FOTO DE PERFIL</label>
                        <div class="profile">
                            <div class="profile__image js__profile-image">
                                <?php
                                include 'assets/php/conexionBD.php';
                                $usuario = $_SESSION['usuario'];
                                $sql = "SELECT foto FROM registro_publico WHERE usuario = '$usuario'";
                                $respuesta = mysqli_query($conexion, $sql);
                                while ($res = mysqli_fetch_assoc($respuesta)) {
                                    if (isset($res['foto']) && $res['foto'] != "img/") { ?>
                                        <img src="assets/<?php echo $res['foto']; ?>" id="photo">
                                    <?php } else { ?>
                                        <img src="assets/img/default.png" id="photo">
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <div class="action">
                            <label class="action__upload-btn" for="img-selector">EDIT</label>
                            <input type="file" name="photo" id="img-selector" class="action__hiddenField js__profile-upload-btn" accept="image/png, .jpeg, .jpg">
                            <p></p>
                        </div>
                    </div>
                    <div class="container-right-left">
                        <div class="left-form">
                            <div class="form-items">
                                <input name="name" type="text" class="form-inputs" id="name" placeholder=" " <?php
                                                                                                                include 'assets/php/conexionBD.php';
                                                                                                                $usuario = $_SESSION['usuario'];
                                                                                                                $sql = "SELECT nombre FROM registro_publico WHERE usuario = '$usuario'";
                                                                                                                $respuesta = mysqli_query($conexion, $sql);
                                                                                                                while ($res = mysqli_fetch_assoc($respuesta)) {
                                                                                                                    if (isset($res['nombre'])) { ?> value="<?php echo $res['nombre']; ?>" <?php }
                                                                                                                } ?>>
                                <label for="name" class="form-labels">Nombre</label>
                                <span class="form-line"></span>
                                <p></p>
                            </div>
                            <div class="form-items">
                                <input name="apellidos" type="text" class="form-inputs" id="apellidos" placeholder=" " <?php
                                                                                                                        include 'assets/php/conexionBD.php';
                                                                                                                        $usuario = $_SESSION['usuario'];
                                                                                                                        $sql = "SELECT apellido FROM registro_publico WHERE usuario = '$usuario'";
                                                                                                                        $respuesta = mysqli_query($conexion, $sql);
                                                                                                                        while ($res = mysqli_fetch_assoc($respuesta)) {
                                                                                                                            if (isset($res['apellido'])) { ?> value="<?php echo $res['apellido']; ?>" <?php }
                                                                                                                        } ?>>
                                <label for="apellidos" class="form-labels">Apellidos</label>
                                <span class="form-line"></span>
                                <p></p>
                            </div>
                            <div class="form-items">
                                <input name="email" type="email" class="form-inputs" id="email" placeholder=" " <?php
                                                                                                                include 'assets/php/conexionBD.php';
                                                                                                                $usuario = $_SESSION['usuario'];
                                                                                                                $sql = "SELECT correo FROM registro_publico WHERE usuario = '$usuario'";
                                                                                                                $respuesta = mysqli_query($conexion, $sql);
                                                                                                                while ($res = mysqli_fetch_assoc($respuesta)) {
                                                                                                                    if (isset($res['correo'])) { ?> value="<?php echo $res['correo']; ?>" <?php }
                                                                                                                } ?>>
                                <label for=email" class="form-labels">Correo electrónico</label>
                                <span class="form-line"></span>
                                <p></p>
                            </div>
                            <div class="date">
                                <label for="date" class="form-labels-date">Fecha de nacimiento</label>
                                <input name="date" type="date" class="form-inputs-date" id="date" <?php
                                                                                                    include 'assets/php/conexionBD.php';
                                                                                                    $usuario = $_SESSION['usuario'];
                                                                                                    $sql = "SELECT fecha FROM registro_publico WHERE usuario = '$usuario'";
                                                                                                    $respuesta = mysqli_query($conexion, $sql);
                                                                                                    while ($res = mysqli_fetch_assoc($respuesta)) {
                                                                                                        if (isset($res['fecha'])) { ?> value="<?php echo $res['fecha']; ?>" <?php }
                                                                                                    } ?>>
                                <p></p>
                            </div>
                        </div>
                        <div class="right-form">
                            <div class="form-items">
                                <input name="actualPass" type="password" class="form-inputs" id="oldPass" placeholder=" ">
                                <label for="actualPass" class="form-labels">Contraseña actual</label>
                                <span class="form-line"></span>
                                <p></p>
                            </div>
                            <div class="form-items">
                                <input name="newPass" type="password" class="form-inputs" id="newPass" placeholder=" ">
                                <label for="newPass" class="form-labels">Nueva contraseña</label>
                                <span class="form-line"></span>
                                <p></p>
                            </div>
                            <div class="form-items">
                                <input name="newPassConfirm" type="password" class="form-inputs" id="newPassConfirm" placeholder=" ">
                                <label for="newPassConfirm" class="form-labels">Confirmación</label>
                                <span class="form-line"></span>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btnSubmit" value="Guardar">
                </div>
            </form>
        </div>
    </main>
    <?php include "assets/shared/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/user.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>