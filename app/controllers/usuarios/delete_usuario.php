<?php
include ('../../config.php');
include ('../../layout/sesion.php');

$id_usuario = $_POST['id_usuario'];

try {
    $sentencia = $pdo->prepare("DELETE FROM usuario WHERE id = :id_usuario");
    $sentencia->bindParam(':id_usuario', $id_usuario);
    $sentencia->execute();

    session_start();
    $_SESSION['mensaje'] = "Se eliminó al usuario de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/usuarios/');
} catch (PDOException $e) {
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/usuarios/');
}
