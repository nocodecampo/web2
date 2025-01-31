<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - web 2</title>
    <link rel="stylesheet" href="css/registro.css">
</head>

<body>
    <section class="loginSection">
        <div class="container">
            <h1>Regístrate en Google Classroom</h1>
            <form action="php/procesar-registro.php" method="post" class="loginForm" id="registro">
                <div class="inputContainer">
                    <label for="nombre">
                        Nombre*
                    </label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                <div class="inputContainer">
                    <label for="apellidos">
                        Apellidos*
                    </label>
                    <input type="text" name="apellidos" id="apellidos" required>
                </div>
                <div class="inputContainer">
                    <label for="email">
                        Email*
                    </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="inputContainer">
                    <label for="fechaNac">
                        Fecha de nacimiento
                    </label>
                    <input type="date" name="fechaNac" id="fechaNac">
                </div>
                <div class="inputContainer">
                    <label for="password">
                        Contraseña*
                    </label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="inputContainer">
                    <label for="repeatPassword">
                        Repetir contraseña*
                    </label>
                    <input type="password" name="repeatPassword" id="repeatPassword" required>
                    <span class="errorMsg" id="errMsg">*Las contraseñas deben ser iguales</span>
                </div>
                <button type="submit" class="btnCrear" id="enviar" disabled>Crear</button>
                <button type="reset" class="btnBorrar">Borrar datos</button>
            </form>
            <p>¿Ya tienes cuenta? <a href="login.html">Haz login aquí</a></p>
        </div>
    </section>

    <script src="javascript/registro.js"></script>
</body>

</html>