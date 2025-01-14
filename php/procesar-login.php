<?php
session_start(); // Iniciar sesión al principio

// Conexion a la base de datos
include 'dbconnect.php';

// Validar y sanitizar los datos de entrada
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = trim($_POST['password']);

try {
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch();

    // Verificar si el usuario existe
    if ($usuario) {
        if (password_verify($password, $usuario['password'])) {
            // Inicio de sesión exitoso
            $_SESSION['usuario'] = $usuario;
            header("Location: ../main.php");
            exit;
        } else {
            // Contraseña incorrecta
            $_SESSION['error'] = "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
            header("Location: ../login.php");
            exit;
        }
    } else {
        // Usuario no encontrado
        $_SESSION['error'] = "Usuario no encontrado. Verifica tu correo.";
        header("Location: ../login.php");
        exit;
    }
} catch (PDOException $e) {
    // Manejar errores de base de datos
    $_SESSION['error'] = "Ocurrió un error al procesar la solicitud.";
    header("Location: ../login.php");
    exit;
} finally {
    // Cerrar la conexión a la base de datos
    $conn = null;
}
?>
