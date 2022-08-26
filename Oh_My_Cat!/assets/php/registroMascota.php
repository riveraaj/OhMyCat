<?php
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtRaza"]) || empty($_POST["txtDueno"])){
        header('Location: ../../petCatalog.php?mensaje=falta');
        exit();
    }

    include_once 'conexionBD.php';
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $raza = $_POST["txtRaza"];
    $dueno = $_POST["txtDueno"];
    $estado = $_POST["txtSelect"];

    $sentencia = "INSERT INTO mascota (idMascota, Nombre, Edad, Raza, Fallecido) VALUES ('$dueno', '$nombre', '$edad', '$raza', $estado)";

    if (mysqli_query($conexion, $sentencia)) {
        header('Location: ../../petCatalog.php?mensaje=registrado');
    } else {
        header('Location: ../../petCatalog.php?mensaje=error');
        exit();
    }
?>