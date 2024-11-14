<?php
// create_modal.php

// Incluir archivo de conexión a la base de datos
include ('../../config.php');

// Verificar que el nombre del cargo se haya enviado por POST
if (isset($_POST['nombre_cargo'])) {
    $nombre_cargo = htmlspecialchars(strip_tags($_POST['nombre_cargo']));

    try {
        $query = "INSERT INTO cargo (Nombre_Cargo) VALUES (:nombre)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre', $nombre_cargo);

        if ($stmt->execute()) {
            // Obtener el ID del último cargo insertado
            $newCargoId = $pdo->lastInsertId();

            // Devolver el nuevo <option> para agregar al <select>
            echo "<option value='$newCargoId'>$nombre_cargo</option>";
        } else {
            echo "Error al crear el cargo.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>
