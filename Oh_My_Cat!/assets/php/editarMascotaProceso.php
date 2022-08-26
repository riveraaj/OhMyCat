<?php
    if(!isset($_POST['codigo'])){
        header('Location: ../../petCatalog.php?mensaje=error');
    }

    include_once 'conexionBD.php';
    $idMascota = $_POST["codigo"];
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $raza = $_POST["txtRaza"];
    $id = $_POST["txtDueno"];
    $select = $_POST["txtSelect"];

    $query = "UPDATE mascota SET idMascota = '$id', Nombre = '$nombre', Edad = '$edad', Raza = '$raza', Fallecido = $select WHERE idMascota = '$idMascota'";
    
    if(mysqli_query($conexion, $query)){
        header('Location: ../../petCatalog.php?mensaje=registrado');
    } else {
        header('Location: ../../petCatalog.php?mensaje=error');
        exit();
    }

?>