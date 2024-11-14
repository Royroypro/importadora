<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 18/1/2023
 * Time: 15:02
 */

session_start();
if (isset($_SESSION['nombre_usuario'])) {
    $nombre_sesion = $_SESSION['nombre_usuario'];

    try {
        $sql = "SELECT u.id_usuario, u.nombre_usuario, u.id_empleado, u.correo, u.id_tipo_usuario, e.Nombre as nombre_empleado
                FROM usuario as u
                JOIN empleado as e ON u.id_empleado = e.id_empleado
                WHERE u.nombre_usuario = :nombre_sesion";

        $query = $pdo->prepare($sql);
        $query->execute(['nombre_sesion' => $nombre_sesion]);
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($usuarios as $usuario) {
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            $id_empleado_sesion = $usuario['id_empleado'];
            $correo_sesion = $usuario['correo'];
            $sql_tipo_usuario = "SELECT nombre FROM tipo_de_usuario WHERE id_tipo_usuario = :id_tipo_usuario";
            $query_tipo_usuario = $pdo->prepare($sql_tipo_usuario);
            $query_tipo_usuario->execute(['id_tipo_usuario' => $usuario['id_tipo_usuario']]);
            $tipo_usuario = $query_tipo_usuario->fetchColumn();
            $rol_sesion = $tipo_usuario;
            $nombre_empleado_sesion = $usuario['nombre_empleado'];
        }
    } catch (PDOException $e) {
        echo "Error al consultar el usuario: " . $e->getMessage();
        $file = fopen("error.log", "a");
        fwrite($file, date("Y-m-d H:i:s") . " - " . $e->getMessage() . "\n");
        fclose($file);
    }
} else {
    echo "no existe sesion";
    header('Location: ' . $URL . '/login');
}

