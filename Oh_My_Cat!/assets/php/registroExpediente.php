<?php
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtDate"]) || empty($_POST["txtDiagnostico"]) || empty($_POST["txtTratamiento"]) || empty($_POST["txtVeterinario"])){
        header('Location: ../../addRecords.php?mensaje=falta');
        exit();
    }

    include_once 'conexionBD.php';
    $dateConsulta = $_POST["txtDate"];
    $diagnostico = $_POST["txtDiagnostico"];
    $tratamiento = $_POST["txtTratamiento"];
    $veterinario = $_POST["txtVeterinario"];
    $nombreMascota = $_POST["txtNombre"];

    $sentencia = "INSERT INTO expediente (Fecha_Consulta, Diagnostico, Tratamiento, nombreMascota, idVeterinario) VALUES ('$dateConsulta', '$diagnostico', '$tratamiento', '$nombreMascota', '$veterinario')";

    if (mysqli_query($conexion, $sentencia)) {
        header('Location: ../../addRecords.php?mensaje=registrado');
    } else {
        header('Location: ../../addRecords.php?mensaje=error');
        exit();
    }
?>