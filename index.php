<?php

session_name("ses");
session_start();

require_once 'config.php';
require_once DIRBASE . 'funciones.php';
require_once DIRBASE . 'Aplicacion.php';
require_once DIRBASE . 'ModeloBase.php';
require_once DIRBASE . 'VistaBase.php';


$controlador = trim($_REQUEST["controlador"]);
if ($controlador == "") {
    $controlador = "index";
}
$app = new Aplicacion("1.1");
if ($app->cargarControlador($controlador) === false) {
    $app->error("No se encontro el controlador. " . $controlador . ".");
}
?>