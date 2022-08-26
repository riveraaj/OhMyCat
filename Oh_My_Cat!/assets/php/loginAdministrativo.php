<?php
    session_start();
    require 'conexionBD.php';

    $email = $password  = "";
    $email_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty(trim($_POST["email"]))){
            $email=trim($_POST["email"]);
        }

        if(!empty(trim($_POST["password"]))){
            $password=trim($_POST["password"]);
        } 

        $validarEmail = mysqli_query($conexion, "SELECT B.Nombre FROM veterinario A JOIN persona B ON A.Persona_cedula = B.cedula WHERE B.Nombre = '$email'");
        $validarPassword = mysqli_query($conexion, "SELECT A.Persona_cedula FROM veterinario A JOIN persona B ON A.Persona_cedula = B.cedula WHERE B.Nombre = '$email'");

        if(mysqli_num_rows($validarEmail) > 0 or $email == 'Admin'){
            $email_err = "";
            if(mysqli_num_rows($validarPassword) > 0 or $password == 'Admin123'){
                $password_err = "";
                $_SESSION['administrativo'] = $email;
                header("location: indexAdministrativo.php");
            } else{
                $password_err = "Cédula incorrecta";
            }
        } else{
            $email_err = "No se ha podido encontrar tu cuenta";
        }
    }
?>