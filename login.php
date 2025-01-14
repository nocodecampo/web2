<?php
// Asegúrate de que no haya espacios antes de session_start();
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - web2</title>
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <section class="loginSection">
    <div class="container">
      <a href="index.php">
        <img src="img/logo.svg" alt="Google Classroom" />
      </a>
      <form
        action="php/procesar-login.php"
        method="post"
        class="loginForm"
        id="loginFormulario">
        <!-- Mostrar mensaje de error -->
        <?php
        if (isset($_SESSION['error'])) {
          echo '<p class="error-message">' . htmlspecialchars($_SESSION['error']) . '</p>';
          unset($_SESSION['error']); // Eliminar el mensaje de error después de mostrarlo
        }
        ?>
        <div class="inputContainer">
          <label for="usuario"> Email </label>
          <input type="email" name="email" id="usuario" placeholder="hola@ejemplo.com" />
        </div>
        <div class="inputContainer">
          <label for="password"> Contraseña </label>
          <input type="password" name="password" id="password" />
        </div>
        <button type="submit">Login</button>
      </form>
      <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </div>
  </section>

  <!--<script src="javascript/login.js"></script>-->
</body>

</html>