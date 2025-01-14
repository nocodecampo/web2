<?php
// script para cerrar la sesión
session_start();
session_destroy();
header("Location: ../login.php");
?>