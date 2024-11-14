<?php

/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 08:51
 */

include ('../../config.php');





$id_tipo_usuario = $_POST['id'];
$nombre_tipo_usuario = $_POST['nombre'];

$sentencia_tipo_usuario = $pdo->prepare("UPDATE tipo_usuario
    SET Nombre=:nombre_tipo_usuario,
        Estado=:estado
    WHERE id = :id_tipo_usuario");

$sentencia_tipo_usuario->bindParam('nombre_tipo_usuario', $nombre_tipo_usuario);
$sentencia_tipo_usuario->bindParam('estado', $_POST['estado'], PDO::PARAM_INT);
$sentencia_tipo_usuario->bindParam('id_tipo_usuario', $id_tipo_usuario, PDO::PARAM_INT);
$sentencia_tipo_usuario->execute();

session_start();
$_SESSION['mensaje'] = "Se actualizó al tipo de usuario de la manera correcta";
$_SESSION['icono'] = "success";
header('Location: '.$URL.'/roles/');
