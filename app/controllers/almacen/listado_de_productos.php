<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 25/1/2023
 * Time: 5:13
 */

$sql_productos = "SELECT p.*, c.Nombre as categoria, u.correo as correo
                  FROM producto as p
                  INNER JOIN categoria as c ON p.id_Categoria = c.id
                  INNER JOIN marca as m ON p.id_Marca = m.id
                  INNER JOIN usuario as u ON m.id = u.id";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
