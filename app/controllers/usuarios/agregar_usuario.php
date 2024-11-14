<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir el autoload de Composer
require '../../config.php';
require '../../../vendor/autoload.php';

// Obtener datos del formulario
$nombre_usuario = $_POST['nombre_usuario'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$id_empleado = $_POST['id_empleado'];
$id_tipo_usuario = $_POST['id_tipo_usuario']; // Faltaba el punto y coma

// Generar un token único para la verificación
$token = bin2hex(random_bytes(32));

// Generar el código de verificación
$codigo = rand(1000, 9999);

// Hash de la contraseña
$password_user = password_hash($password, PASSWORD_DEFAULT);

// Guardar los datos en la base de datos
$fecha = date('Y-m-d H:i:s');
$estado = 1; // Usuario activo pero no confirmado

try {
    $sentencia = $pdo->prepare("INSERT INTO usuario
        (nombre_usuario, correo, password, estado, id_empleado, id_tipo_usuario, token, codigo, fecha) 
        VALUES (:nombre_usuario, :correo, :password_user, :estado, :id_empleado, :id_tipo_usuario, :token, :codigo, :fecha)");

    $sentencia->bindParam('nombre_usuario', $nombre_usuario);
    $sentencia->bindParam('correo', $correo);
    $sentencia->bindParam('password_user', $password_user);
    $sentencia->bindParam('estado', $estado);
    $sentencia->bindParam('id_empleado', $id_empleado);
    $sentencia->bindParam('id_tipo_usuario', $id_tipo_usuario);
    $sentencia->bindParam('token', $token);
    $sentencia->bindParam('codigo', $codigo);
    $sentencia->bindParam('fecha', $fecha);

    $sentencia->execute();

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'seguridadelectronicahuacho@gmail.com'; // Tu correo
        $mail->Password   = 'baugzazpvrkxjvju'; // Contraseña de la aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Remitente y destinatario
        $mail->setFrom('seguridadelectronicahuacho@gmail.com', 'Sistema de Ventas');
        $mail->addAddress($correo); // Destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de Registro';

        // Generar los enlaces de verificación
        $verification_link = $URL . "/usuarios/verificar_codigo.php?token=" . $token;

        $mail->Body = "Hola, <br><br>Gracias por registrarte en nuestro sistema. Haz clic en el siguiente enlace para confirmar tu cuenta: <br><br>
                       <a href='" . $verification_link . "'>Confirmar mi cuenta</a><br><br>
                       O también puedes usar el siguiente código de verificación: <strong>" . $codigo . "</strong>.";

        // Enviar el correo
        $mail->send();

        // Mensaje de éxito
        session_start();
        $_SESSION['mensaje'] = "Se registró el usuario correctamente. Revisa tu correo para confirmar.";
        echo "Se registró el usuario correctamente. Revisa tu correo para confirmar.<br><br>";
        // Redirigir después de 3 segundos
        echo "<meta http-equiv='refresh' content='3;url=".$URL."/usuarios'>";

    } catch (Exception $e) {
        session_start();
        $_SESSION['mensaje'] = "Error al enviar el correo: " . $mail->ErrorInfo;
        header('Location: ' . $URL . '/usuarios/');
    }

} catch (PDOException $e) {
    session_start();
    $_SESSION['mensaje'] = "Error al registrar al usuario: " . $e->getMessage();
    header('Location: ' . $URL . '/usuarios/');
}
?>

