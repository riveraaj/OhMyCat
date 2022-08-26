<?php 
    if(!isset($_GET['idMascota'])){
        header('Location: ../../petCatalog.php?mensaje=error');
        exit();
    }

    include 'conexionBDAdministrativa.php';
    $codigo = $_GET['idMascota'];

    $sentencia = $bd->prepare("DELETE FROM mascota where idMascota = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if ($resultado === TRUE) {
        header('Location: ../../petCatalog.php?mensaje=eliminado');
    } else {
        header('Location: ../../petCatalog.php?mensaje=error');
    }
    
?>