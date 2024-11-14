<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/1/2023
 * Time: 22:11
 */

$id_tipo_usuario_get = $_GET['id']; // Obtiene el ID del tipo de usuario desde la URL

$sql_tipo_usuario = "SELECT tu.id as id_tipo_usuario, tu.Nombre as nombre_tipo_usuario, 
                     tu.Estado as estado
                     FROM tipo_usuario as tu
                     WHERE tu.id = :id";

$query_tipo_usuario = $pdo->prepare($sql_tipo_usuario);
$query_tipo_usuario->bindParam(':id', $id_tipo_usuario_get, PDO::PARAM_INT);
$query_tipo_usuario->execute();
$tipo_usuario_datos = $query_tipo_usuario->fetchAll(PDO::FETCH_ASSOC);

foreach ($tipo_usuario_datos as $tipo_usuario_dato) {
    $id_tipo_usuario = $tipo_usuario_dato['id_tipo_usuario'];
    $nombre_tipo_usuario = $tipo_usuario_dato['nombre_tipo_usuario'];
    $estado = $tipo_usuario_dato['estado'];
}

