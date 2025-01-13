<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web2";

// Crear conexión
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Encriptar la contraseña
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insertar el usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellidos, email, fechaNac, password) VALUES ('" . $_POST['nombre'] . "', '" . $_POST['apellidos'] . "', '" . $_POST['email'] . "', '" . $_POST['fechaNac'] . "', '" . $hashed_password . "')";
$conn->exec($sql);

echo "Usuario creado exitosamente";

// Cerrar conexión
$conn = null;

// Redirigir a la página de login
header('Location: ../login.html');
