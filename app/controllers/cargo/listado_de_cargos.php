<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 23/1/2023
 * Time: 19:00
 */

$sql_cargos = "SELECT * FROM cargo ";
$query_cargos = $pdo->prepare($sql_cargos);
$query_cargos->execute();
$cargos_datos = $query_cargos->fetchAll(PDO::FETCH_ASSOC);
