<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
if (!isset($_GET['idIncidencia'])) {
    header("Location: main.php");
    exit;
}

// Incluir la conexión a la base de datos
include 'php/dbconnect.php';

// Traer la incidencia a editar
$sql = "SELECT * FROM incidencias WHERE id = :idIncidencia";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idIncidencia', $_GET['idIncidencia']);
$stmt->execute();
$incidencia = $stmt->fetch();
if (!$incidencia) {
    header("Location: main.php");
    exit;
}

// Procesar el formulario de incidencias
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $stmt = $conn->prepare("UPDATE incidencias SET fecha = :fecha, descripcion = :descripcion WHERE id = :idIncidencia");
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':idIncidencia', $_GET['idIncidencia']);
    $stmt->execute();
    header("Location: main.php");
    exit;
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
                <h3>Editar incidencias</h3>

                <div class="addIncidenciaForm">
                    <form action="" method="post" class="editIncidenciaForm">
                        <div>
                            <label for="id">ID (readonly)</label>
                            <input type="text" name="id" id="id" value="<?php echo $incidencia['id'] ?>" readonly>
                        </div>
                        <div>
                            <label for="fecha"> Fecha*</label>
                            <input type="date" name="fecha" id="fecha" required value="<?php echo $incidencia['fecha'] ?>">
                        </div>
                        <div>
                            <label for="descripcion">Descripción*</label>
                            <input type="text" name="descripcion" id="descripcion" placeholder="Añade descripción"
                                required value="<?php echo $incidencia['descripcion'] ?>">
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