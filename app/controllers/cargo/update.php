<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 08:51
 */

include ('../../config.php');

$id = $_POST['id'];
$Nombre_Cargo = $_POST['Nombre_Cargo'];
$Estado = $_POST['Estado'];


        $sentencia = $pdo->prepare("UPDATE cargo
    SET Nombre_Cargo=:Nombre_Cargo,
        Estado=:Estado 
    WHERE id = :id ");

        $sentencia->bindParam('Nombre_Cargo',$Nombre_Cargo);
        $sentencia->bindParam('Estado',$Estado);
        $sentencia->bindParam('id',$id);
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Se actualizo el cargo de la manera correcta";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/cargos/');
        }else{
            session_start();
            $_SESSION['mensaje'] = "Error no se pudo actualizar en la base de datos";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/cargos/update.php?id='.$id);
        }

