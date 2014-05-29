<?php

$app = $this;
$app->cargarRequest();

if ($app->cargarVista("index") === false) {
    $app->error("No se encontro la vista. index.");
}
$vista = new VistaIndex();

if ($app->cargarModelo("index") === false) {
    $app->error("No se encontro el modelo. index.");
}
//$modelo = new ModeloIndex();
//$modelo->conectar("ifxibgdir");


$fecha = $_REQUEST["fecha"];

if($fecha=="" or $fecha==null){
$mes=date("n");
$Year=date("Y");
}
else{
    
$pieces = explode("/", $fecha);
$mes= $pieces[0]; // piece1
$Year= $pieces[1]; // piece2
    
}



$vista->asignarVariable("mes", $mes);
$vista->asignarVariable("Year", $Year);

$vista->asignarVariable("titulo", "Prueba");
$vista->asignarVariable("arreglo", $arreglo);
$vista->cargarTemplate("header");
$vista->dibujar();
$vista->cargarTemplate("footer");
?>

