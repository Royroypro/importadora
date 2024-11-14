<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 18/1/2023
 * Time: 15:17
 */

$sql_usuarios = "SELECT u.id as id, u.nombre as nombre, u.correo as correo, tu.nombre as rol, u.estado as estado 
                  FROM usuario as u INNER JOIN tipo_usuario as tu ON u.id_tipo_usuario = tu.id ";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
