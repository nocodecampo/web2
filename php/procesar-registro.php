<?php
// abro la conexion a la base de datos
include 'dbconnect.php';

// Recibir los datos desde el formulario
try {
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, email, fechaNac, password) VALUES (:nombre, :apellidos, :email, :fechaNac, :password)");
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellidos', $_POST['apellidos']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':fechaNac', $_POST['fechaNac']);
    // encriptar la contraseña
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// redirigir a la página de login
header("Location: ../login.php");

// cierro la conexion a la base de datos
$conn = null;
?>
