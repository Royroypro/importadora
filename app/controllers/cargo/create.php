<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 18/1/2023
 * Time: 15:39
 */

include ('../../config.php');

$nombre_cargo = $_POST['Nombre_Cargo'];
$estado = $_POST['estado'] ?? 1; // Default value for estado

$sentencia = $pdo->prepare("INSERT INTO cargo
    (Nombre_Cargo, Estado) 
VALUES (:nombre_cargo, :estado)");

$sentencia->bindParam('nombre_cargo', $nombre_cargo);
$sentencia->bindParam('estado', $estado);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registro el cargo de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/cargos/');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/cargos/create.php');
}

