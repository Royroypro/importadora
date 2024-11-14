<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/estilo_login.css">
    
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>

        <!-- Formulario de login -->
        <form id="loginForm">
            <div class = input-container>
            <label class="form-label" for="usuario">Usuario:</label>
            <input  class="form-control" type="text" id="usuario" name="usuario" required>
            </div>
            <div class = input-container>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            </div>
                <!-- Mensaje de error -->
        <div id="error-message" style="color: red; display: none;"></div>

            <button type="submit">Iniciar sesión</button>
        </form>
            <p class="olvidar-contraseña"><a href="recuperar_password.php">Olvidé mi contraseña</a></p>
            
            
        
    </div>

    <script>
        // Manejo del formulario con AJAX
        $('#loginForm').on('submit', function(e) {
            e.preventDefault(); // Evitar el envío normal del formulario

            // Obtener los datos del formulario
            var formData = {
                'usuario': $('#usuario').val(),
                'password': $('#password').val()
            };

            // Enviar los datos del formulario a login.php con AJAX
            $.ajax({
                type: 'POST',
                url: '../app/controllers/login/ingreso.php', // Cambia esto si tu archivo PHP está en otra ubicación

                data: formData,
                success: function(response) {
                    // Si la respuesta es "success", redirigir
                    if (response === 'success') {
                        window.location.href = '../home.php';
                    } else {
                        // Si es un mensaje de error, mostrarlo
                        $('#error-message').text(response).show();
                    }
                },
                error: function() {
                    $('#error-message').text('Hubo un error al procesar la solicitud.').show();
                }
            });
        });
    </script>
</body>
</html>

