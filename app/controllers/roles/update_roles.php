<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 23/1/2023
 * Time: 20:04
 */

$id_tipo_usuario_get = $_GET['id'];
$sql_tipo_usuario = "SELECT tipo_usuario.id, tipo_usuario.Nombre, tipo_usuario.Estado FROM tipo_usuario WHERE tipo_usuario.id = :id_tipo_usuario";
$query_tipo_usuario = $pdo->prepare($sql_tipo_usuario);
$query_tipo_usuario->bindParam(':id_tipo_usuario', $id_tipo_usuario_get, PDO::PARAM_INT);
$query_tipo_usuario->execute();
$tipo_usuario_datos = $query_tipo_usuario->fetchAll(PDO::FETCH_ASSOC);

foreach ($tipo_usuario_datos as $tipo_usuario_dato) {
    $nombre_tipo_usuario = $tipo_usuario_dato['Nombre'];
    $estado_tipo_usuario = $tipo_usuario_dato['Estado'];
}
