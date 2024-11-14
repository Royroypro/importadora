<?php
include ('../../config.php');
include ('../../layout/sesion.php');

$id_tipo_usuario = $_POST['id_tipo_usuario'];

try {
    $sentencia = $pdo->prepare("DELETE FROM tipo_usuario WHERE id = :id_tipo_usuario");
    $sentencia->bindParam(':id_tipo_usuario', $id_tipo_usuario);
    $sentencia->execute();

    session_start();
    $_SESSION['mensaje'] = "Se eliminó al tipo de usuario de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/roles/');
} catch (PDOException $e) {
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/roles/');
}

