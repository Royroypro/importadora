<?php
include('../../config.php');

// Verificar si se recibieron los datos del formulario por AJAX
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    // Se obtienen los datos del formulario
    $nombre_usuario = $_POST['usuario'];
    $password_user = $_POST['password'];
    
    // Consulta para verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuario WHERE nombre_usuario = :nombre_usuario LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute([
        ':nombre_usuario' => $nombre_usuario    ]);

    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    // Verificar si los datos ingresados son correctos
    if ($usuario && password_verify($password_user, $usuario['password'])) {
        // Si los datos son correctos, se inicia la sesión
        session_start();
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        echo 'success'; // Enviar respuesta exitosa
    } else {
        // Si los datos son incorrectos, se envía un mensaje de error
        echo 'Error: Usuario o password incorrectos'; // Enviar mensaje de error
    }
} else {
    echo 'Error: Datos incompletos'; // Si no se recibieron los datos correctamente
}
?>
