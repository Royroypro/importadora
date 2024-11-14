<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 23/1/2023
 * Time: 20:04
 */

$id_get = $_GET['id'];

$sql_cargo = "SELECT * FROM cargo WHERE id = :id";
$query_cargo = $pdo->prepare($sql_cargo);
$query_cargo->bindParam(':id', $id_get, PDO::PARAM_INT);
$query_cargo->execute();
$cargo_datos = $query_cargo->fetchAll(PDO::FETCH_ASSOC);

foreach ($cargo_datos as $cargo_dato) {
    $Nombre_Cargo = $cargo_dato['Nombre_Cargo'];
    $Estado = $cargo_dato['Estado'];
}

