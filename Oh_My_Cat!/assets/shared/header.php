<header>
    <nav class="menu navbar-fixed">
        <div class="menu-container">
            <a class="menu-link" href="./index.php">
                <div class="logo">
                    <img src="assets/img/logo.jpeg" alt="Logo de la empresa" id="logo">
                </div>
                <h1 class="menu-logo">OH MY CAT<br><small>Clínica Veterinaria</small></h1>
            </a>
            <ul class="menu-links">
                <li class="menu-item">
                    <a href="services.php" class="menu-link">Servicios</a>
                </li>
                <li class="menu-item">
                    <a href="about.php" class="menu-link">Quiénes somos</a>
                </li>
                <li class="menu-item">
                    <a href="contact.php" class="menu-link">Contacto</a>
                </li>
                <li class="menu-item menu-item-show">
                    <a href="#" class="menu-link"><img id="icon-user" src="assets/img/user-menu.svg" alt="Icono iniciar sesión"><span id="user">Cuenta</span><img src="assets/img/arrow-menu.svg" class="menu-arrow" alt=""></a>
                    <ul class="menu-nesting accederSesion">
                        <?php if (!isset($_SESSION['usuario'])) { ?>
                            <li class="menu-inside">
                                <a href="login.php" class="menu-link menu-link-inside"><span id="iniciarSesion">Acceder</span></a>
                            </li>
                        <?php } ?>
                        <?php if (isset($_SESSION['usuario'])) { ?>
                            <li class="menu-inside infoUser">
                                <a href="user.php" class="menu-link menu-link-inside">
                                    <?php
                                    include 'assets/php/conexionBD.php';
                                    $usuario = $_SESSION['usuario'];
                                    $sql = "SELECT foto FROM registro_publico WHERE usuario = '$usuario'";
                                    $respuesta = mysqli_query($conexion, $sql);
                                    while ($res = mysqli_fetch_assoc($respuesta)) {
                                        if (isset($res['foto']) && $res['foto'] != "img/") { ?>
                                            <div class="container-img-submenu"><img src="assets/<?php echo $res['foto']; ?>" id="photoUser"></div>
                                            <span id="nameUser"><?php echo $usuario; ?></span>
                                        <?php } else { ?>
                                            <div class="container-img-submenu"><img src="assets/img/usuario.png" id="icon-exp" alt=""></div>
                                            <span id="nameUser"><?php echo $usuario; ?></span>
                                    <?php }
                                    } ?>

                                </a>
                            </li>
                            <li class="menu-inside expediente">
                                <a href="record.php" class="menu-link menu-link-inside">
                                    <div class="container-img-submenu"><img src="assets/img/expediente.png" id="icon-exp" alt=""></div>Expediente
                                </a>
                            </li>
                            <li class="menu-inside cerrarSesion">
                                <a href="assets/php/logout.php" class="menu-link menu-link-inside">
                                    <div class="container-img-submenu"><img src="assets/img/logout.png" alt="" id="icon-logout"></div>Cerrar sesión</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <div class="menu-hamburguer">
                <img src="assets/img/menu.svg" alt="" class="menu-img">
            </div>
        </div>
    </nav>
</header>