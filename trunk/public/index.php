<?php
// Define ruta al directorio application
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Añade el fichero de arraque de la aplicacion
require_once APPLICATION_PATH."/Bootstrap.php";


$boot=new Bootstrap();

$boot->run();
