<?php
include ('../../config.php');
include ('../../layout/sesion.php');

$id_cargo = $_POST['id_cargo'];


try {
    $sentencia = $pdo->prepare("DELETE FROM cargo WHERE id = :id_cargo");
    $sentencia->bindParam(':id_cargo', $id_cargo);
    $sentencia->execute();

    session_start();
    $_SESSION['mensaje'] = "Se eliminó al cargo de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/cargos/');
} catch (PDOException $e) {
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/cargos/');
}

