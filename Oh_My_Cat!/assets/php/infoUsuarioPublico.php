<?php
    session_start();
    require "conexionBD.php";

    //Declarar variables a usar
    $usuario = $_SESSION['usuario'];
    $nombre = $_POST['name'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $actualPass = $_POST['actualPass'];
    $newPass = $_POST['newPass'];
    $imagen = $_FILES['photo']['name'];
    $path = $_FILES['photo']['tmp_name'];
    $destino = '../img/'.$imagen;

    //Mover el archivo del folder temporal a una nueva ruta
    $imgBD = move_uploaded_file($path, $destino);

    //Reescribir ruta pra usarla 
    $destinoos = 'img/'.$imagen;

    //Encriptar claves para validar
    $actualPassEncrypt = hash("haval128,3", $actualPass);
    $newPassEncrypt = hash("haval128,3", $newPass);

    //Declarar respuesta
    $responseError = array();

    //Generar consultas para validar
    $queryActualPass = mysqli_query($conexion, "SELECT * FROM registro_publico WHERE usuario = '$usuario' AND contrasenna = '$actualPassEncrypt'");

    //Generar UPDATE de los datos
    $sql = "UPDATE registro_publico SET correo = '$email', contrasenna = '$newPassEncrypt', nombre = '$nombre', apellido = '$apellidos', foto = '$destinoos', fecha = '$date' WHERE usuario = '$usuario'";

    //Condiciones para verificar la contrasena actual del usuario y actualizacion de datos
    if(mysqli_num_rows($queryActualPass) > 0){
        $responseError['password'] = true;
        if(mysqli_query($conexion, $sql)){
            $responseError['guardado'] = true;
        }else {
            $responseError['guardado'] = false;
        }
    }else {
        $responseError['password'] = false;
    }

    //Enviando respuesta al front-end
    echo json_encode($responseError, JSON_UNESCAPED_UNICODE);

    //Cerrando conexion a la BD
    mysqli_close($conexion);
?>