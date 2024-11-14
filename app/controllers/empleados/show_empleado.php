<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/1/2023
 * Time: 22:11
 */

$id_empleado_get = $_GET['id']; // Obtiene el ID del empleado desde la URL

$sql_empleados = "SELECT emp.id as id, emp.Nombre as Nombre, emp.Apellido_Paterno as Apellido_Paterno, 
                  emp.Apellido_Materno as Apellido_Materno, emp.DNI as DNI, 
                  emp.Fecha_de_Nacimiento as Fecha_de_Nacimiento, emp.Sexo as Sexo, 
                  emp.Sueldo as Sueldo, emp.Correo as Correo, emp.Celular as Celular, 
                  emp.Direccion as Direccion, car.Nombre_Cargo as Cargo, emp.Estado as Estado 
                  FROM empleado as emp 
                  INNER JOIN cargo as car ON emp.id_Cargo = car.id
                  WHERE emp.id = :id";

$query_empleados = $pdo->prepare($sql_empleados);
$query_empleados->bindParam(':id', $id_empleado_get, PDO::PARAM_INT);
$query_empleados->execute();
$empleados_datos = $query_empleados->fetchAll(PDO::FETCH_ASSOC);

foreach ($empleados_datos as $empleados_dato) {
    $id = $empleados_dato['id'];
    $Nombre = $empleados_dato['Nombre'];
    $Apellido_Paterno = $empleados_dato['Apellido_Paterno'];
    $Apellido_Materno = $empleados_dato['Apellido_Materno'];
    $DNI = $empleados_dato['DNI'];
    $Fecha_de_Nacimiento = $empleados_dato['Fecha_de_Nacimiento'];
    $Sexo = $empleados_dato['Sexo'];
    $Sueldo = $empleados_dato['Sueldo'];
    $Correo = $empleados_dato['Correo'];
    $Celular = $empleados_dato['Celular'];
    $Direccion = $empleados_dato['Direccion'];
    $Cargo = $empleados_dato['Cargo'];
    $Estado = $empleados_dato['Estado'];
}


