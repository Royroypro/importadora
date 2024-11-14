<?php
require_once '../app/config.php'; // Asegúrate de que aquí estás incluyendo la conexión a la base de datos

if (isset($_GET['id_empleado'])) {
    $id_empleado = $_GET['id_empleado'];

    $query = $pdo->prepare("SELECT Nombre, email, estado FROM empleado WHERE id_empleado = :id_empleado");
    $query->bindParam(":id_empleado", $id_empleado, PDO::PARAM_INT);
    $query->execute();

    if ($query->rowCount() > 0) {
        $empleado = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode(["Nombre" => $empleado['Nombre'], "Correo" => $empleado['email'], "Estado" => $empleado['estado']]);
    } else {
        echo json_encode(["Nombre" => "", "Correo" => "", "Estado" => ""]);
    }
}
?>
