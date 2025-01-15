<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Incluir la conexión a la base de datos
include 'php/dbconnect.php';


// Carga los datos del usuario logueado
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $_SESSION['usuario']['id']);
$stmt->execute();
$usuario = $stmt->fetch();


// Procesar la subida de la foto
if (isset($_FILES['photoupload'])) {
    $nombreFoto = $_FILES['photoupload']['name'];
    $rutaFoto = 'foto/' . $nombreFoto;
    if(move_uploaded_file($_FILES['photoupload']['tmp_name'], $rutaFoto)) {
        $stmt = $conn->prepare("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, email = :email, foto = :foto WHERE id = :id");
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':apellidos', $_POST['apellidos']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':foto', $rutaFoto);
        $stmt->bindParam(':id', $_SESSION['usuario']['id']);
        $stmt->execute();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar incidencia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php
    include 'partials/cabecera.php';
    ?>

    <main>
        <?php
        include 'partials/aside.php';
        ?>
        <section class="mainSection">
            <div class="incidenciasContainer">
                <h3>Datos usuario</h3>

                <div class="addIncidenciaForm">
                    <form action="" method="post" class="editIncidenciaForm" enctype="multipart/form-data">
                        <div>
                            <label for="nombre"> Nombre</label>
                            <input type="text" name="nombre" id="nombre" required value="<?php echo $usuario['nombre']; ?>">
                        </div>
                        <div>
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" required value="<?php echo $usuario['apellidos']; ?>">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required value="<?php echo $usuario['email']; ?>">
                        </div>
                        <div>
                            <label for="photoupload">Sube tu foto</label>
                            <input type="file" name="photoupload" id="photoupload" accept="image/*">
                        </div>
                        <button type="submit">Guardar edición</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php
    include 'partials/footer.php';
    ?>

</body>

</html>