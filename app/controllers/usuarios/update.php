<?php

/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 08:51
 */

include ('../../config.php');

$id_usuario = $_POST['id_usuario'];
$Nombre = $_POST['nombre'];
$Correo = $_POST['correo'];
$Contrasena = empty($_POST['contrasena']) ? null : password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$id_Tipo_Usuario = !empty($_POST['id_tipo_usuario']) ? $_POST['id_tipo_usuario'] : null;
$Estado = !empty($_POST['estado']) ? $_POST['estado'] : 0;

$sentencia = $pdo->prepare("UPDATE usuario
    SET Nombre=:Nombre,
        Correo=:Correo,
        Contraseña=COALESCE(:Contrasena, Contraseña),
        id_Tipo_Usuario=:id_Tipo_Usuario,
        Estado=:Estado,
        Fecha_Actualizacion=CURRENT_TIMESTAMP
    WHERE id = :id_usuario");

$sentencia->bindParam('Nombre', $Nombre);
$sentencia->bindParam('Correo', $Correo);
$sentencia->bindParam('Contrasena', $Contrasena);
$sentencia->bindParam('id_Tipo_Usuario', $id_Tipo_Usuario, PDO::PARAM_INT);
$sentencia->bindParam('Estado', $Estado, PDO::PARAM_INT);
$sentencia->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
$sentencia->execute();

session_start();
$_SESSION['mensaje'] = "Se actualizó al usuario de la manera correcta";
$_SESSION['icono'] = "success";
header('Location: '.$URL.'/usuarios/');

