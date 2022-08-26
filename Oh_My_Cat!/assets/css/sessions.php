<?php
    header("Content-Type: text/css; charset: UTF-8");
    if(isset($_SESSION['usuario'])){
        $onSesion = "none";
        $onSesionAccess = "list-item";
    } else{
        $onSesion = "list-item";
        $onSesionAccess = "none";
    }
?>

.infoUser{
   display: <?php echo $onSesion; ?>;
}
.expediente{
    display: <?php echo $onSesion; ?>;
}
.cerrarSesion{
    display: <?php echo $onSesion; ?>;
}
.iniciarSesion{
    display: <?php echo $onSesionAccess; ?>;
}