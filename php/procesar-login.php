<?php
// Conexion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa - ";

// Comprobar si el usuario existe
$sql = "SELECT * FROM usuarios WHERE nombre = '" . $_POST['nombre'] . "' AND password = '" . $_POST['password'] . "'";
$result = $conn->query($sql);

// Si el usuario existe, redirigir a la página de inicio
if ($result->num_rows > 0) {
    header('Location: ../index.php');
} else {
    echo "Usuario no encontrado";
}

// Cerrar conexión
$conn->close();

?>