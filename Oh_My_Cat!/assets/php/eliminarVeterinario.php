<?php 
    if(!isset($_GET['cedula'])){
        header('Location: ../../veterinaryCatalog.php?mensaje=error');
        exit();
    }

    include 'conexionBDAdministrativa.php';
    $cedula = $_GET['cedula'];

    $sentencia4 = $bd->prepare("DELETE FROM veterinario where Persona_cedula = ?;");
    $resultado4 = $sentencia4->execute([$cedula]);
    if($resultado4 === TRUE){
        $sentencia = $bd->prepare("DELETE FROM direccion where Persona_cedula = ?;");
        $resultado = $sentencia->execute([$cedula]);
        if ($resultado === TRUE) {
            $sentencia2 = $bd->prepare("DELETE FROM telefono where Persona_cedula = ?;");
            $resultado2 = $sentencia2->execute([$cedula]);
            if($resultado2 === TRUE){
                $sentencia3 = $bd->prepare("DELETE FROM persona where cedula = ?;");
                $resultado3 = $sentencia3->execute([$cedula]);
                if($resultado3 === TRUE){
                    header('Location: ../../veterinaryCatalog.php?mensaje=eliminado');
                }else {
                    header('Location: ../../veterinaryCatalog.php?mensaje=error');
                }
            }else {
                header('Location: ../../veterinaryCatalog.php?mensaje=error');
            }
        } else {
            header('Location: ../../veterinaryCatalog.php?mensaje=error');
        }
    }
?>