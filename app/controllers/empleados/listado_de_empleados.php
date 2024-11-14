<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 18/1/2023
 * Time: 15:17
 */

$sql_empleados = "SELECT e.id as id, e.Nombre as Nombre, e.Apellido_Paterno as Apellido_Paterno, e.Apellido_Materno as Apellido_Materno, 
                  e.DNI as DNI, e.Fecha_de_Nacimiento as fecha_nacimiento, e.Sexo as sexo, e.Sueldo as sueldo, e.Correo as correo, 
                  e.Celular as celular, e.Direccion as direccion, c.Nombre_Cargo as cargo, e.Estado as estado 
                  FROM empleado as e INNER JOIN cargo as c ON e.id_Cargo = c.id ";
$query_empleados = $pdo->prepare($sql_empleados);
$query_empleados->execute();
$empleados_datos = $query_empleados->fetchAll(PDO::FETCH_ASSOC);

