<?php

$app = $this;
$app->cargarRequest();

if ($app->cargarVista("detalle") === false) {
    $app->error("No se encontro la vista. detalle.");
}
$vista = new VistaDetalle();


if ($app->cargarModelo("index") === false) {
    $app->error("No se encontro el modelo. index.");
}



$codsucursal = $_REQUEST["codsucursal"];
$mes = $_REQUEST["mes"];
$Year = $_REQUEST["anio"];



agregaCelda($arreglo->grupo->titulo->fecha, "valor:Fecha;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->comprobante, "valor:Comprobante;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->concepto, "valor:Concepto;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->valor_recaudo, "valor:Valor recaudo;clase:celdaAz");

$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getConcepto();
while ($registro = $modelo->getRegistro()) {
    $desconcepto = trim($registro["desconcepto"]);
}

$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getComprobante();
while ($registro = $modelo->getRegistro()) {
    $destp_comprobante = trim($registro["destp_comprobante"]);
}





$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getCuadreDetalle($codsucursal, $mes, $Year);
while ($registro = $modelo->getRegistro()) {
    
    $dia = trim($registro["dia"]);
    $mes=trim($registro["mes"]);
    $Year = trim($registro["anio"]);
    $nombre=trim($registro["nombre"]);
    $valor_recaudo = trim($registro["valor_recaudo"]);
    
    $totaldetalle+=$valor_recaudo;
    
    $valor_recaudo=number_format($valor_recaudo);
agregaCelda($arreglo->grupo->$dia->fecha, "valor:$mes/$dia/$Year;clase:celdaBo1c");
agregaCelda($arreglo->grupo->$dia->comprobante, "valor:$destp_comprobante;clase:celdaBo1c");
agregaCelda($arreglo->grupo->$dia->concepto, "valor:$desconcepto;clase:celdaBo1c");
agregaCelda($arreglo->grupo->$dia->valor_recaudo, "valor:$valor_recaudo;clase:celdaBo1c");
    
}
$totaldetalle=number_format($totaldetalle);
agregaCelda($arreglo->grupo->total->fecha, "valor:Total;clase:celdaAz");
agregaCelda($arreglo->grupo->total->comprobante, "valor:&nbsp;clase:celdaAz");
agregaCelda($arreglo->grupo->total->concepto, "valor:&nbsp;clase:celdaAz");
agregaCelda($arreglo->grupo->total->valor_recaudo, "valor:$totaldetalle;clase:celdaAz");



if ($mes == 1) {
        $mes = "Enero";
    } else if ($mes == 2) {
        $mes = "Febrero";
    } else if ($mes == 3) {
        $mes = "Marzo";
    } else if ($mes == 4) {
        $mes = "Abril";
    } else if ($mes == 5) {
        $mes = "Mayo";
    } else if ($mes == 6) {
        $mes = "Junio";
    } else if ($mes == 7) {
        $mes = "Julio";
    } else if ($mes == 8) {
        $mes = "Agosto";
    } else if ($mes == 9) {
        $mes = "Septiembre";
    } else if ($mes == 10) {
        $mes = "Octubre";
    } else if ($mes == 11) {
        $mes = "Noviembre";
    } else {
        $mes = "Diciembre";
    }










$vista->asignarVariable("titulo", "Prueba");

$vista->asignarVariable("codsucursal", $codsucursal);
$vista->asignarVariable("mes", $mes);
$vista->asignarVariable("anio", $anio);
$vista->asignarVariable("nombre", $nombre);

$vista->asignarVariable("arreglo", $arreglo);


$vista->cargarTemplate("header");
$vista->dibujar();
$vista->cargarTemplate("footer");
?>
