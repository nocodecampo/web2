<?php
session_start();
include 'dbconnect.php';
if (isset($_POST['fecha'])){
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $idUsuario = $_SESSION['usuario']['id'];
    $stmt = $conn->prepare("INSERT INTO incidencias (fecha, descripcion, idUsuario) VALUES (:fecha, :descripcion, :idUsuario)");
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->execute();
    header("Location: ../main.php");
    exit;
}
?>