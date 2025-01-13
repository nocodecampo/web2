<!-- Conexion con BBDD -->
<?php
// Configuración de la base de datos
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

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellidos, email, fechaNac, password) VALUES ('" . $_POST['nombre'] . "', '" . $_POST['apellidos'] . "', '" . $_POST['email'] . "', '" . $_POST['fechaNac'] . "', '" . $_POST['password'] . "')";

// Comprobar si se ha insertado correctamente
if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();

?>