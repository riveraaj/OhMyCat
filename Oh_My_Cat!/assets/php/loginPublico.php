<?php
    session_start();
    require 'conexionBD.php';

    $email = $password = $passEncrypt = "";
    $email_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty(trim($_POST["email"]))){
            $email=trim($_POST["email"]);
        }

        if(!empty(trim($_POST["password"]))){
            $password=trim($_POST["password"]);
            $passEncrypt = hash("haval128,3", $password);
        } 

        $validarEmail = mysqli_query($conexion, "SELECT * FROM registro_publico WHERE usuario = '$email'");
        $validarPassword = mysqli_query($conexion, "SELECT * FROM registro_publico WHERE contrasenna = '$passEncrypt'");

        if(mysqli_num_rows($validarEmail)){
            $email_err = "";
            if(mysqli_num_rows($validarPassword)){
                $password_err = "";
                $_SESSION['usuario'] = $email;
                header("location: index.php");
            } else{
                $password_err = "Contraseña incorrecta";
            }
        } else{
            $email_err = "No se ha podido encontrar tu cuenta";
        }
    }
?>