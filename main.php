<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include 'php/dbconnect.php';

// Procesar el formulario de incidencias
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];

    // Insertar la incidencia asociada al usuario logueado
    $stmt = $conn->prepare("INSERT INTO incidencias (fecha, descripcion, idUsuario) VALUES (:fecha, :descripcion, :idUsuario)");
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':idUsuario', $_SESSION['usuario']['id']);
    $stmt->execute();

    // Redirigir a la misma página para evitar reenvío del formulario
    header("Location: main.php");
    exit;
}

// Trae todas las incidencias
$sql = "SELECT * FROM incidencias";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area privada - web2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo"><img src="img/logo.svg" alt="logo"></a>
        <div class="userMenuContainer">
            <div class="userPicContainer" id="userPicContainer">
                <img src="img/User-Profile.png" alt="foto de perfil">
            </div>
            <div class="menuDesplegable" id="menuDesplegable">
                <ul class="menuList">
                    <li><a href="">Datos de usuario</a></li>
                    <li><a href="php/cerrar-sesion.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <aside class="mainAside">
            <!--Menú desktop-->
            <ul id="menuAside">
                <li><a href="" title="Pedidos"><i class="fa-solid fa-cart-shopping"></i>Pedidos</a></li>
                <li><a href="" title="Facturas"><i class="fa-solid fa-file-invoice"></i>Facturas</a></li>
                <li><a href="" title="Incidencias"><i class="fa-solid fa-circle-exclamation"></i>Incidencias</a></li>
                <li><a href="" title="Calendario"><i class="fa-solid fa-calendar"></i>Calendario</a></li>
                <li><a href="" title="Presupuestos"><i class="fa-solid fa-euro-sign"></i>Presupuestos</a></li>
            </ul>
            <!--Menú móvil-->
            <i class="fa-solid fa-bars" id="burgerIcon"></i>
            <ul id="menuAsideMobile">
                <li><a href="" title="Pedidos"><i class="fa-solid fa-cart-shopping"></i>Pedidos</a></li>
                <li><a href="" title="Facturas"><i class="fa-solid fa-file-invoice"></i>Facturas</a></li>
                <li><a href="" title="Incidencias"><i class="fa-solid fa-circle-exclamation"></i>Incidencias</a></li>
                <li><a href="" title="Calendario"><i class="fa-solid fa-calendar"></i>Calendario</a></li>
                <li><a href="" title="Presupuestos"><i class="fa-solid fa-euro-sign"></i>Presupuestos</a></li>
            </ul>
        </aside>
        <section class="mainSection">
            <div class="incidenciasContainer">
                <h3>Listado incidencias</h3>
                <div class="addIncidenciaForm">
                    <form action="php/crear-incidencia.php" method="post" class="addIncidencia">
                        <div>
                            <label for="fecha"> Fecha*</label>
                            <input type="date" name="fecha" id="fecha" required>
                        </div>
                        <div>
                            <label for="descripcion">Descripción*</label>
                            <input type="text" name="descripcion" id="descripcion" placeholder="Añade descripción"
                                required>
                        </div>
                        <button type="submit">Añadir incidencia</button>
                    </form>
                </div>

                <table class="incidenciasTable" id="incidenciasTable">
                    <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = $result->fetch()) {
                            echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['fecha']."</td>
                            <td>".$row['descripcion']."</td>
                            <td>
                                <a class='iconTrash' href='php/borrar-incidencia.php?idIncidencia=".$row['id']."'><i class='fa-solid fa-trash'></i></a>
                                <a class='iconEdit' href='editar-incidencia.php?idIncidencia=".$row['id']."'><i class='fa-solid fa-pen-to-square'></i></a>
                            </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>© Formacom</p>
        <div class="rrss-wrapper">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-github"></i>
            <i class="fa-brands fa-linkedin"></i>
        </div>
    </footer>

    <!--Código Javascript-->
    <script src="javascript/main.js"></script>

</body>

</html>