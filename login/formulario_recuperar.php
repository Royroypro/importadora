<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establecer nueva contraseña</title>
    <link rel="stylesheet" href="../css/estilo_login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#formulario_nueva_contraseña').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "../app/controllers/login/nueva_contraseña.php",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response == 'success') {
                            let countdown = 10;
                            const interval = setInterval(function() {
                                $('#error-message').html(`Contraseña actualizada. Será redirigido a la página de inicio de sesión en ${countdown} segundos.`);
                                countdown--;
                                if (countdown < 0) {
                                    clearInterval(interval);
                                    window.location.href = '../login';
                                }
                            }, 1000);
                        } else {
                            $('#error-message').html(response);
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
    <div class="login-container">
        <h2>Establecer nueva contraseña</h2>

        <!-- Formulario para nueva contraseña -->
        <form id="formulario_nueva_contraseña" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            <div class="input-container">
                <label class="form-label" for="nueva_contraseña">Nueva Contraseña:</label>
                <input class="form-control" type="password" id="nueva_contraseña" name="nueva_contraseña" required style="width: 80%; border-radius: 10px;">
            </div>
            <div class="input-container">
                <label class="form-label" for="repetir_contraseña">Repetir Contraseña:</label>
                <input class="form-control" type="password" id="repetir_contraseña" name="repetir_contraseña" required style="width: 80%; border-radius: 10px;">
            </div>
            <!-- Mensaje de error -->
            <div id="error-message" style="color: green;"><?php echo $_GET['message'] ?? ''; ?></div>
            <button type="submit">Enviar</button>
        </form>
        <p class="olvidar-contraseña"><a href="index.php">Volver a Iniciar sesión</a></p>
    </div>
</body>
</html>

