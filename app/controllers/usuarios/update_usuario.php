<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/1/2023
 * Time: 22:40
 */

$id_usuario_get = $_GET['id'] ?? 0; // Obtiene el ID del usuario desde la URL

$sql_usuarios = "SELECT us.id as id_usuario, us.Nombre as nombres, us.Correo as email, us.Contraseña as password, us.id_Tipo_Usuario as id_tipo_usuario, tipo_usuario.Nombre as nombre_tipo_usuario, us.Estado as estado
                 FROM usuario as us 
                 INNER JOIN tipo_usuario as tipo_usuario ON us.id_Tipo_Usuario = tipo_usuario.id
                 WHERE us.id = :id_usuario";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->bindParam(':id_usuario', $id_usuario_get, PDO::PARAM_INT);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

$usuario_datos = current($usuarios_datos); // Obtener el primer registro

$nombres = $usuario_datos['nombres'] ?? '';
$email = $usuario_datos['email'] ?? '';
$password = $usuario_datos['password'] ?? '';
$id_tipo_usuario = $usuario_datos['id_tipo_usuario'] ?? 0;
$nombre_tipo_usuario = $usuario_datos['nombre_tipo_usuario'] ?? '';
$estado = $usuario_datos['estado'] ?? 0;



