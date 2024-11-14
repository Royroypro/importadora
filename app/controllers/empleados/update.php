<?php

/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 08:51
 */

// Incluimos el archivo de configuracion
include ('../../config.php');

// Obtenemos los datos del formulario
$id_empleado = $_POST['id_empleado'];
$Nombre = $_POST['nombres'];
$Apellido_Paterno = $_POST['apellido_paterno'];
$Apellido_Materno = $_POST['apellido_materno'];
$DNI = $_POST['dni'];
$Fecha_de_Nacimiento = $_POST['fecha_nacimiento'];
$Sexo = $_POST['sexo'];
$Sueldo = $_POST['sueldo'];
$Correo = $_POST['correo'];
$Celular = $_POST['celular'];
$Direccion = $_POST['direccion'];
$id_Cargo = $_POST['cargo'];
$Estado = $_POST['estado'];

// Actualizamos el usuario
$sentencia = $pdo->prepare("UPDATE empleado
    SET Nombre=:Nombre,
        Apellido_Paterno=:Apellido_Paterno,
        Apellido_Materno=:Apellido_Materno,
        DNI=:DNI,
        Fecha_de_Nacimiento=:Fecha_de_Nacimiento,
        Sexo=:Sexo,
        Sueldo=:Sueldo,
        Correo=:Correo,
        Celular=:Celular,
        Direccion=:Direccion,
        id_Cargo=:id_Cargo,
        Estado=:Estado
    WHERE id = :id_empleado ");

$sentencia->bindParam('Nombre', $Nombre);
$sentencia->bindParam('Apellido_Paterno', $Apellido_Paterno);
$sentencia->bindParam('Apellido_Materno', $Apellido_Materno);
$sentencia->bindParam('DNI', $DNI);
$sentencia->bindParam('Fecha_de_Nacimiento', $Fecha_de_Nacimiento);
$sentencia->bindParam('Sexo', $Sexo);
$sentencia->bindParam('Sueldo', $Sueldo);
$sentencia->bindParam('Correo', $Correo);
$sentencia->bindParam('Celular', $Celular);
$sentencia->bindParam('Direccion', $Direccion);
$sentencia->bindParam('id_Cargo', $id_Cargo);
$sentencia->bindParam('Estado', $Estado);
$sentencia->bindParam('id_empleado', $id_empleado);
$sentencia->execute();
session_start();
$_SESSION['mensaje'] = "Se actualizo al empleado de la manera correcta";
$_SESSION['icono'] = "success";
header('Location: '.$URL.'/empleados/');
