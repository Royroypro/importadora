<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 17/1/2023
 * Time: 13:00
 */
//Definir las constantes para la conexion a la base de datos
define('SERVIDOR','sehuacho.com');
define('PUERTO','3306');
define('USUARIO','mechan');
define('PASSWORD','_t9OEZl8qw9xb*fS');
define('BD','bdimportadora');

//Definir la variable $servidor con los datos de la conexion
$servidor = "mysql:host=".SERVIDOR.";port=".PUERTO.";dbname=".BD;

try{
    //Realizar la conexion a la base de datos
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexión a la base de datos fue con exito";
}catch (PDOException $e){
    //print_r($e);
    echo "Error al conectar a la base de datos";
}

//Definir la variable $URL con la ruta del sistema
$URL = "https://sehuacho.ddns.net:8443/importadora/";

//Definir la zona horaria
date_default_timezone_set("America/Caracas");
//Definir la fecha y hora actual
$fechaHora = date('Y-m-d H:i:s');


