
<!-- HTML para el formulario de verificación -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Cuenta</title>
    <link rel="stylesheet" href="../css/estilo_login.css">
</head>
<body>
    <div class="login-container">
        <h2>Verificación de Cuenta</h2>
        <p>Ingresa el código de verificación que hemos enviado a tu correo:</p>

        <form action="../app/controllers/usuarios/verificar_codigo.php?token=<?php echo $_GET['token']; ?>" method="POST">
        
        <div class="input-container">
        <label for="codigo">Código de Verificación:</label>
           
           <input type="text" id="codigo" name="codigo" required>
        </div>
      

            <button type="submit">Verificar</button>
        </form>
    </div>
</body>
</html>
