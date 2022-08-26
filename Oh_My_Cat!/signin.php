<?php
    session_start();
    include "assets/php/registroPublico.php";
    if (isset($_SESSION['usuario'])) {
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
    <link rel="stylesheet" href="assets/css/signin.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php include "assets/shared/header.php" ?>
    <main id="main">
        <div class="main-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="signinForm" method="POST" class="formRegister scrollUp">
                <h2>Crea tu cuenta</h2>
                <p>¿Ya tienes una cuenta? <a href="login.php">Entra aquí.</a></p>
                <div class="form-container">

                    <div class="form-items">
                        <input type="text" name="cedula" id="cedula" class="form-inputs" placeholder=" ">
                        <label for="cedula" class="form-labels">Cédula</label>
                        <span class="form-line"></span>
                        <p></p>
                    </div>

                    <div class="form-items">
                        <input type="text" name="usuario" id="usuario" class="form-inputs" placeholder=" ">
                        <label for="usuario" class="form-labels">Nombre de usuario</label>
                        <span class="form-line"></span>
                        <p></p>
                    </div>

                    <div class="form-items">
                        <input type="email" name="email" id="email" class="form-inputs" placeholder=" ">
                        <label for="email" class="form-labels">Correo electrónico</label>
                        <span class="form-line"></span>
                        <p></p>
                    </div>

                    <div class="form-items">
                        <input type="password" name="password" id="pass" class="form-inputs" placeholder=" ">
                        <label for="pass" class="form-labels">Contraseña</label>
                        <span class="form-line"></span>
                        <p></p>
                    </div>

                    <div class="form-items">
                        <input type="password" name="passConfirm" id="passConfirm" class="form-inputs" placeholder=" ">
                        <label for="passConfirm" class="form-labels">Confirmación</label>
                        <span class="form-line"></span>
                        <p></p>
                    </div>
                    <small><?php echo $msjError;
                            $msjError = ""; ?></small>
                    <input type="submit" class="btnSubmit" value="Registrarse">
                </div>
            </form>
        </div>
    </main>
    <?php include "assets/shared/footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/signin.js"></script>
</body>

</html>