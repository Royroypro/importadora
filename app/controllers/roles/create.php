<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 18/1/2023
 * Time: 15:39
 */

include ('../../config.php');

$Nombre = $_POST['nombre'];
$Estado = $_POST['Estado'] == 'on' ? 1 : 0;

$sentencia = $pdo->prepare("INSERT INTO tipo_usuario
       (Nombre,Estado) 
VALUES (:Nombre,:Estado)");

    $sentencia->bindParam('Nombre',$Nombre);
    $sentencia->bindParam('Estado',$Estado);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se registro el tipo de usuario de la manera correcta";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/roles/');
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/roles/create.php');
    }




