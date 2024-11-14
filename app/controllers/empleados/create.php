<?php
// Incluir archivo de configuración y conexión a la base de datos
include ('../../config.php');

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir y sanitizar los datos del formulario
    $nombre = htmlspecialchars(strip_tags($_POST['nombre']));
    $apellido_paterno = htmlspecialchars(strip_tags($_POST['apellido_paterno']));
    $apellido_materno = htmlspecialchars(strip_tags($_POST['apellido_materno']));
    $dni = htmlspecialchars(strip_tags($_POST['dni']));
    $fecha_nacimiento = htmlspecialchars(strip_tags($_POST['fecha_de_nacimiento']));
    $sexo = htmlspecialchars(strip_tags($_POST['sexo']));
    $sueldo = htmlspecialchars(strip_tags($_POST['sueldo']));
    $correo = htmlspecialchars(strip_tags($_POST['correo']));
    $celular = htmlspecialchars(strip_tags($_POST['celular']));
    $direccion = htmlspecialchars(strip_tags($_POST['direccion']));
    $id_cargo = htmlspecialchars(strip_tags($_POST['id_cargo']));
    $estado = 1; // Estado activo por defecto

    // Insertar el nuevo empleado en la base de datos
    try {
        $query = "INSERT INTO empleado (Nombre, Apellido_Paterno, Apellido_Materno, DNI, Fecha_de_Nacimiento, Sexo, Sueldo, Correo, Celular, Direccion, id_Cargo, Estado) 
                  VALUES (:nombre, :apellido_paterno, :apellido_materno, :dni, :fecha_nacimiento, :sexo, :sueldo, :correo, :celular, :direccion, :id_cargo, :estado)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido_paterno', $apellido_paterno);
        $stmt->bindParam(':apellido_materno', $apellido_materno);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':sueldo', $sueldo);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':id_cargo', $id_cargo);
        $stmt->bindParam(':estado', $estado);

        if ($stmt->execute()) {
            header("Location: " . $URL . "/empleados/index.php"); // Redirige a la lista de empleados
            exit();
        } else {
            echo "Error al guardar el empleado.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Consultar cargos activos para el menú desplegable
$consulta_cargos = $pdo->prepare("SELECT id, Nombre_Cargo FROM cargo WHERE Estado = 1");
$consulta_cargos->execute();
$cargos = $consulta_cargos->fetchAll(PDO::FETCH_ASSOC);
?>