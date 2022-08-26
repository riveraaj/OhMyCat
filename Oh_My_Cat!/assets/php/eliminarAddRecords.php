<?php 
    if(!isset($_GET['idExpediente'])){
        header('Location: ../../addRecords.php.php?mensaje=error');
        exit();
    }

    include 'conexionBDAdministrativa.php';
    $cedula = $_GET['idExpediente'];

    $sentencia = $bd->prepare("DELETE FROM expediente where idExpediente = ?;");
    $resultado = $sentencia->execute([$cedula]);
    if($resultado === TRUE){
        header('Location: ../../addRecords.php?mensaje=eliminado');
    } else {
        header('Location: ../../addRecords.php?mensaje=error');
    }
    
?>