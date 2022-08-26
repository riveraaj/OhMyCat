<?php
    if(empty($_POST["oculto"]) || empty($_POST["txtCedula"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApeUno"]) || empty($_POST["txtApeDos"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"])){
        header('Location: ../../ownerCatalog.php?mensaje=falta');
        exit();
    }

    include_once 'conexionBDAdministrativa.php';
    $cedula = $_POST["txtCedula"];
    $nombre = $_POST["txtNombre"];
    $apellido1 = $_POST["txtApeUno"];
    $apellido2 = $_POST["txtApeDos"];
    $telefono = $_POST["txtTelefono"];
    $direccion = $_POST["txtDireccion"];

    $sentencia = $bd->prepare("INSERT INTO persona (cedula, Nombre, Apellido1, Apellido2) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$cedula, $nombre, $apellido1, $apellido2]);

    if ($resultado === TRUE) {
        $sentencia2 = $bd->prepare("INSERT INTO telefono (numero, Persona_cedula) VALUES (?,?);");
        $resultado2 = $sentencia2->execute([$telefono, $cedula]);
        if($resultado2 === TRUE){
            $sentencia3 = $bd->prepare("INSERT INTO direccion (Descripcion_Direccion, Persona_cedula) VALUES (?,?);");
            $resultado3 = $sentencia3->execute([$direccion, $cedula]);
            if($resultado3 === TRUE){
                $sentencia4 = $bd->prepare("INSERT INTO duenno (Persona_cedula) VALUES (?);");
                $resultado4 = $sentencia4->execute([$cedula]);
                if($resultado4 === TRUE){
                    header('Location: ../../ownerCatalog.php?mensaje=registrado');
                }else {
                    header('Location: ../../ownerCatalog.php?mensaje=error');
                    exit();
                }
            }else {
                header('Location: ../../ownerCatalog.php?mensaje=error');
                exit();
            }      
        }else {
            header('Location: ../../ownerCatalog.php?mensaje=error');
            exit();
        }
    }else {
        header('Location: ../../ownerCatalog.php?mensaje=error');
        exit();
    }
?>