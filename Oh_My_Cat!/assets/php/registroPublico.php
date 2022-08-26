<?php
    require 'conexionBD.php';

    $cedula = $email = $password = $passEncrypt = $user = "";
    $msjError = "";
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty(trim($_POST["email"]))){
            $email=trim($_POST["email"]);
        }
        if(!empty(trim($_POST["cedula"]))){
            $cedula=trim($_POST["cedula"]);
        }
        if(!empty(trim($_POST["password"]))){
            $password=trim($_POST["password"]);
            $passEncrypt = hash("haval128,3", $password);
        }

        if(!empty(trim($_POST["usuario"]))){
            $user=trim($_POST["usuario"]);
        }

        $query = "INSERT INTO registro_publico (id, correo, usuario, contrasenna, Persona_cedula) VALUES ('$cedula', '$email', '$user', '$passEncrypt', '$cedula')";

        $verifyEmail = mysqli_query($conexion, "SELECT * FROM registro_publico WHERE correo = '$email'");
        $verifyUser = mysqli_query($conexion, "SELECT * FROM registro_publico WHERE usuario = '$user'");
        $verifyCedula = mysqli_query($conexion, "SELECT * FROM registro_publico WHERE id = '$cedula'");

        if(!mysqli_num_rows($verifyCedula)){
            if(!mysqli_num_rows($verifyEmail)){
                $msjError = "";
                if(!mysqli_num_rows($verifyUser)){
                    $msjError = "";
                        //Ingreso datos
                        $ejecutar = mysqli_query($conexion, $query);
                        header("location: login.php");
                        $msjError = "";
                } else { 
                    $msjError = "Ya existe ese usuario";
                }
            }else {
                $msjError = "Ya está en uso este correo";
            }
        }else {
            $msjError = "Ya está registrada esa cédula";
        }

        mysqli_close($conexion);
    }
?>