<?php
session_start();
// Conexion a la base de datos
include 'dbconnect.php';
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta a la base de datos
try {
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch();

    // Verificar si el usuario existe
    if ($usuario) {
        if (password_verify($password, $usuario['password'])) {
            // Iniciar sesión
            session_start();
            $_SESSION['usuario'] = $usuario;
            // Redirigir a la página de main
            header("Location: ../main.html");
            exit();
        } else {
            // Contraseña incorrecta
            $_SESSION['error'] = "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
            header("Location: ../login.php");
            exit();
        }
    } else {
        // Usuario no encontrado
        $_SESSION['error'] = "Usuario no encontrado. Verifica tu correo.";
        header("Location: ../login.php");
        exit();
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Ocurrió un error al procesar la solicitud.";
    header("Location: ../login.php");
    exit();

    // Cerrar la conexión a la base de datos
    $conn = null;
}
?>