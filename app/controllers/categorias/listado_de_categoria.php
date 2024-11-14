<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 24/1/2023
 * Time: 17:22
 */

$sql_categorias = "SELECT * FROM categoria ";
$query_categorias = $pdo->prepare($sql_categorias);
$query_categorias->execute();
$categorias_datos = $query_categorias->fetchAll(PDO::FETCH_ASSOC);