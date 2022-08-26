<?php

    require_once 'conexionBD.php';

    //Declarar variables
    $telefono1 = $foto1 = $descripcion1 = $lat1 = $lon1 = "";
    $telefono2 = $foto2 = $descripcion2 = $lat2 = $lon2 = "";

    //Generar consulta y guardar datos
    $query = "SELECT descripcion, latitud, longitud, telefono, foto FROM ubicaciones_veterinarias WHERE id = 1";
    $respuestaBD = mysqli_query($conexion, $query);
    while($res = mysqli_fetch_assoc($respuestaBD)){
        $descripcion1 = $res['descripcion'];
        $lat1 = $res['latitud'];
        $lon1 = $res['longitud'];
        $telefono1 = $res['telefono'];
        $foto1 = $res['foto'];
    }

    $query = "SELECT descripcion, latitud, longitud, telefono, foto FROM ubicaciones_veterinarias WHERE id = 2";
    $respuestaBD = mysqli_query($conexion, $query);
    while($res = mysqli_fetch_array($respuestaBD)){
        $descripcion2 = $res['descripcion'];
        $lat2 = $res['latitud'];
        $lon2 = $res['longitud'];
        $telefono2 = $res['telefono'];
        $foto2 = $res['foto'];
    }
    
    //Guardar datos en un arreglo
    $local1 = array('descripcion' => $descripcion1, 'lat' => $lat1, 'lon' => $lon1, 'telefono' => $telefono1, 'foto' => $foto1);

    $local2 = array('descripcion' => $descripcion2, 'lat' => $lat2, 'lon' => $lon2, 'telefono' => $telefono2, 'foto' => $foto2);

    $response = array("local1" => $local1, "local2" => $local2);

    //Enviando respuesta al front-end
    echo json_encode($response, JSON_UNESCAPED_UNICODE);

    //Cerrando conexion a la BD
    mysqli_close($conexion);

?>