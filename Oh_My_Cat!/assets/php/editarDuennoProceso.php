<?php
    if(!isset($_POST['txtCedula'])){
        header('Location: ../../ownerCatalog.php?mensaje=error');
    }

    include_once 'conexionBDAdministrativa.php';
    $cedula = $_POST["txtCedula"];
    $nombre = $_POST["txtNombre"];
    $apellido1 = $_POST["txtApeUno"];
    $apellido2 = $_POST["txtApeDos"];
    $telefono = $_POST["txtTelefono"];
    $direccion = $_POST["txtDireccion"];

    $sentencia = $bd->prepare("UPDATE persona SET Nombre = ?, Apellido1 = ?, Apellido2 = ? WHERE cedula = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido1, $apellido2, $cedula]);

    if ($resultado === TRUE) {
        $sentencia2 = $bd->prepare("UPDATE telefono SET numero = ? WHERE Persona_cedula = ?;");
        $resultado2 = $sentencia2->execute([$telefono, $cedula]);
        if($resultado2 === TRUE){
            $sentencia3 = $bd->prepare("UPDATE direccion SET Descripcion_Direccion = ? WHERE Persona_cedula = ?;");
            $resultado3 = $sentencia3->execute([$direccion, $cedula]);
            if($resultado3 === TRUE){
                header('Location: ../../ownerCatalog.php?mensaje=editado');
            } else {
                header('Location: ../../ownerCatalog.php?mensaje=error');
                exit();
            }
        } else {
            header('Location: ../../ownerCatalog.php?mensaje=error');
            exit();
        }
    } else {
        header('Location: ../../ownerCatalog.php?mensaje=error');
        exit();
    }
    
?>