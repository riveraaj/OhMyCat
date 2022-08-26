<?php
    include "assets/php/loginAdministrativo.php";
    if (isset($_SESSION['administrativo'])) {
        header("location: indexAdministrativo.php");
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/loginAdministrativo.css">

</head>

<body>
    <main>
        <div class="main-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="loginForm" method="POST" class="formRegister">
                <h2>Iniciar Sesión</h2>
                <div class="form-container">
                    <div class="form-items">
                        <input type="text" name="email" id="email" class="form-inputs" placeholder=" ">
                        <label for="email" class="form-labels">Nombre</label>
                        <spam class="form-line"></spam>
                        <p><?php echo $email_err; ?></p>
                    </div>
                    <div class="form-items">
                        <input type="password" name="password" id="pass" class="form-inputs" placeholder=" ">
                        <label for="pass" class="form-labels">Ingresa tu cédula</label>
                        <spam class="form-line"></spam>
                        <p><?php echo $password_err; ?></p>
                    </div>
                    <input type="submit" class="btnSubmit" value="Ingresar">
                </div>
            </form>
        </div>
    </main>
    <script src="assets/js/loginAdministrativo.js"></script>
</body>

</html>