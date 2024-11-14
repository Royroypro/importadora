<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 20/1/2023
 * Time: 10:19
 */

include ('../../config.php'); // Asegura que $pdo y $URL estén definidos
include ('../../layout/sesion.php'); // Asegura que $id_empleado_sesion esté definido en la sesión

$id_empleado = $_POST['id_empleado'];

// Prepara la consulta para eliminar al empleado
$sentencia = $pdo->prepare("DELETE FROM empleado WHERE id = :id_empleado");
$sentencia->bindParam(':id_empleado', $id_empleado); // Corregido el nombre del parámetro
$sentencia->execute();

if ($id_empleado_sesion == $id_empleado) {
    $_SESSION['mensaje'] = "Se eliminó su cuenta de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/login');
} else {
    $_SESSION['mensaje'] = "Se eliminó al empleado de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/empleados');
}
?>



