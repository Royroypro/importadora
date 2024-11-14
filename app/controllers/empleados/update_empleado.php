<?php

/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 19/1/2023
 * Time: 22:40
 */

/**
 * Obtiene el ID del usuario desde la URL
 */
$id_usuario_get = $_GET['id'] ?? 0;

/**
 * Consulta para obtener los datos del usuario
 */
$sql_usuarios = "SELECT emp.id as id_usuario, emp.Nombre as nombres, emp.Apellido_Paterno as apellido_paterno, emp.Apellido_Materno as apellido_materno, 
                 emp.DNI as dni, emp.Fecha_de_Nacimiento as fecha_nacimiento, emp.Sexo as sexo, emp.Sueldo as sueldo, emp.Correo as correo, emp.Celular as celular, 
                 emp.Direccion as direccion, car.Nombre_Cargo as cargo, emp.Estado as estado 
                 FROM empleado as emp 
                 INNER JOIN cargo as car ON emp.id_Cargo = car.id
                 WHERE emp.id = :id_usuario";

/**
 * Prepara la consulta y ejecuta
 */
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->bindParam(':id_usuario', $id_usuario_get, PDO::PARAM_INT);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

/**
 * Recorre los datos del usuario y los almacena en variables
 */
foreach ($usuarios_datos as $usuarios_dato) {
    $nombres = $usuarios_dato['nombres'];
    $apellido_paterno = $usuarios_dato['apellido_paterno'];
    $apellido_materno = $usuarios_dato['apellido_materno'];
    $dni = $usuarios_dato['dni'];
    $fecha_nacimiento = $usuarios_dato['fecha_nacimiento'];
    $sexo = $usuarios_dato['sexo'];
    $sueldo = $usuarios_dato['sueldo'];
    $correo = $usuarios_dato['correo'];
    $celular = $usuarios_dato['celular'];
    $direccion = $usuarios_dato['direccion'];
    $cargo = $usuarios_dato['cargo'];
    $estado = $usuarios_dato['estado'];
}


