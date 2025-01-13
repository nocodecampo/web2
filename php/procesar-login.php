<?php
// Conexion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web2";

// Crear conexión
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}

// Recibir los datos desde el formulario
$usuario = $_POST['nombre'];
$clave = $_POST['password'];

// Consulta a la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND password = '$clave'";
$result = $conn->query($sql);

// Verificar si el usuario existe
if ($result->rowCount() > 0) {
    // Iniciar sesión
    session_start();
    $_SESSION['nombre'] = $usuario;
    header("Location: ../index.php");
} else {
    echo "Usuario o contraseña incorrectos";
}

$conn = null;

?>