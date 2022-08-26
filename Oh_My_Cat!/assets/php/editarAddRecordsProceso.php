<?php
    if(!isset($_POST['txtCedula'])){
        header('Location: ../../addRecords.php?mensaje=error');
    }

    include_once 'conexionBDAdministrativa.php';
    $dateConsulta = $_POST["txtDate"];
    $diagnostico = $_POST["txtDiagnostico"];
    $tratamiento = $_POST["txtTratamiento"];
    $veterinario = $_POST["txtVeterinario"];
    $nombreMascota = $_POST["txtNombre"];
    $idExpediente = $_POST['txtCedula'];

    $sentencia = $bd->prepare("UPDATE expediente SET Fecha_Consulta = ?, Diagnostico = ?, Tratamiento = ?, nombreMascota = ?, idVeterinario = ? WHERE idExpediente = ?;");
    $resultado = $sentencia->execute([$dateConsulta, $diagnostico, $tratamiento, $nombreMascota, $veterinario, $idExpediente]);

    if ($resultado === TRUE) {
        header('Location: ../../addRecords.php?mensaje=editado'); 
    } else {
        header('Location: ../../addRecords.php?mensaje=error');
        exit();
    }
    
?>