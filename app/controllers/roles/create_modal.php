<?php
// create_modal.php

// Incluir archivo de conexión a la base de datos
include ('../../config.php');

// Verificar que el nombre del rol se haya enviado por POST
if (isset($_POST['nombre_rol'])) {
    $nombre_rol = htmlspecialchars(strip_tags($_POST['nombre_rol']));

    try {
        $query = "INSERT INTO tipo_usuario (Nombre) VALUES (:nombre)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre', $nombre_rol);

        if ($stmt->execute()) {
            // Obtener el ID del último rol insertado
            $newRolId = $pdo->lastInsertId();

            // Devolver el nuevo <option> para agregar al <select>
            echo "<option value='$newRolId'>$nombre_rol</option>";
        } else {
            echo "Error al crear el rol.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>

