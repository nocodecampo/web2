<?php
$foto = $_SESSION['usuario']['foto'];
if ($foto == null) {
    $foto = 'img/User-profile.png';
}
?>
<header>
        <a href="index.php" class="logo"><img src="img/logo.svg" alt="logo"></a>
        <div class="userMenuContainer">
            <div class="userPicContainer" id="userPicContainer">
                <img src="<?php echo $foto ?>" alt="foto de perfil">
            </div>
            <div class="menuDesplegable" id="menuDesplegable">
                <ul class="menuList">
                    <li><a href="datos-usuario.php">Datos de usuario</a></li>
                    <li><a href="php/cerrar-sesion.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </header>