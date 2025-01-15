<?php
if (isset($_GET['idIncidencia'])){
    include 'dbconnect.php';
    $idIncidencia = $_GET['idIncidencia'];
    $stmt = $conn->prepare("DELETE FROM incidencias WHERE id = :idIncidencia");
    $stmt->bindParam(':idIncidencia', $idIncidencia);
    $stmt->execute();
    header("Location: ../main.php");
    exit;
}
?>