<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/estilo_login.css">
    
</head>
<body>
    <div class="login-container">
        <h2>Recuperar contraseña</h2>

        <!-- Formulario de login -->
        <form id="recuperarForm">
            <div class = input-container>
                <label class="form-label" for="email">Correo electrónico:</label>
                <input class="form-control" type="email" id="email" name="email" required style="width: 100%; border-radius: 10px; height: 30px;">
            </div>
                <!-- Mensaje de error -->
        <div id="error-message" style="color: green; display: none;">&nbsp;</div>
        <script>
            setTimeout(function () {
                $('#error-message').hide();
            }, 20000);
        </script>
    
            <button type="submit">Enviar</button>
        </form>
            <p class="olvidar-contraseña"><a href="index.php">Volver a Iniciar sesión</a></p>
            


        
    </div>

    <script>
        // Manejo del formulario con AJAX
        $('#recuperarForm').on('submit', function(e) {
            e.preventDefault(); // Evitar el envío normal del formulario

            // Obtener los datos del formulario
            var formData = {
                'email': $('#email').val()
            };

            // Enviar los datos del formulario a login.php con AJAX
            $.ajax({
                type: 'POST',
                url: '../app/controllers/login/recuperar_contraseña.php', // Cambia esto si tu archivo PHP está en otra ubicación

                data: formData,
                success: function(response) {
                    // Si la respuesta es "success", mostrar mensaje de éxito
                    if (response === 'success') {
                        $('#error-message').text('Se ha enviado un correo electrónico con instrucciones para recuperar tu contraseña.').show();
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

