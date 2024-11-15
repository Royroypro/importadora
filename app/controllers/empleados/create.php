<?php
include ('../../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DNI = htmlspecialchars(strip_tags($_POST['DNI']));
    $Nombre = htmlspecialchars(strip_tags($_POST['Nombre']));
    $Apaterno = htmlspecialchars(strip_tags($_POST['Apaterno']));
    $Amaterno = htmlspecialchars(strip_tags($_POST['Amaterno']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $direccion = htmlspecialchars(strip_tags($_POST['dirección']));
    $telefono = htmlspecialchars(strip_tags($_POST['teléfono']));
    $estado = 'Activo'; // Ajusta esto según el tipo de dato en tu BD
    $id_cargo = htmlspecialchars(strip_tags($_POST['id_cargo']));


    try {
        $query = "INSERT INTO empleado (DNI, Nombre, Apaterno, Amaterno, email, dirección, teléfono, estado, id_cargo) 
                  VALUES (:DNI, :Nombre, :Apaterno, :Amaterno, :email, :direccion, :telefono, :estado, :id_cargo)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':DNI', $DNI);
        $stmt->bindParam(':Nombre', $Nombre);
        $stmt->bindParam(':Apaterno', $Apaterno);
        $stmt->bindParam(':Amaterno', $Amaterno);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id_cargo', $id_cargo);
        if ($stmt->execute()) {
            echo "Empleado guardado con &eacute;xito";
            exit();
        } else {
            echo "No se pudo guardar el empleado.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
}

