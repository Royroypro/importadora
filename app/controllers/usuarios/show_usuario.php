<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/1/2023
 * Time: 22:11
 */

$id_usuario_get = $_GET['id']; // Obtiene el ID del usuario desde la URL

$sql_usuarios = "SELECT us.id as id_usuario, us.Nombre as nombre, us.Correo as email, 
                 us.Contraseña as password, us.id_Tipo_Usuario as id_tipo_usuario, tu.Nombre as nombre_tipo_usuario, 
                 us.Fecha_Registro as fecha_registro, us.Fecha_Actualizacion as fecha_actualizacion, 
                 us.Estado as estado, us.id_Empleado as id_empleado, 
                 e.Nombre as nombre_empleado
                 FROM usuario as us
                 INNER JOIN tipo_usuario as tu ON us.id_Tipo_Usuario = tu.id
                 INNER JOIN empleado as e ON us.id_Empleado = e.id
                 WHERE us.id = :id";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->bindParam(':id', $id_usuario_get, PDO::PARAM_INT);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_datos as $usuarios_dato) {
    $nombre = $usuarios_dato['nombre'];
    $email = $usuarios_dato['email'];
    $password = $usuarios_dato['password'];
    $id_tipo_usuario = $usuarios_dato['id_tipo_usuario'];
    $nombre_tipo_usuario = $usuarios_dato['nombre_tipo_usuario'];
    $fecha_registro = $usuarios_dato['fecha_registro'];
    $fecha_actualizacion = $usuarios_dato['fecha_actualizacion'];
    $estado = $usuarios_dato['estado'];
    $id_empleado = $usuarios_dato['id_empleado'];
    $nombre_empleado = $usuarios_dato['nombre_empleado'];
}



