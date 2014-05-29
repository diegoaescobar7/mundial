<?php

$app = $this;
$app->cargarRequest();

if ($app->cargarVista("dia") === false) {
    $app->error("No se encontro la vista. factura.");
}
$vista = new VistaDia();


if ($app->cargarModelo("index") === false) {
    $app->error("No se encontro el modelo. index.");
}


$codsucursal = $_REQUEST["codsucursal"];
$mes = $_REQUEST["mes"];
$dia = $_REQUEST["dia"];
$Year = $_REQUEST["anio"];

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




agregaCelda($arreglo->grupo->titulo->comprobante, "valor:Comprobante;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->concepto, "valor:Concepto;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->valor, "valor:Valor recaudo;clase:celdaAz");

$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getCuadreDia($codsucursal, $mes, $dia, $Year);

while ($registro = $modelo->getRegistro()) {
    
    $codconcepto = trim($registro["codconcepto"]);
    $codtp_comprobante = trim($registro["codtp_comprobante"]);
    $valor_recaudo = trim($registro["valor_recaudo"]);
    $nombre = trim($registro["nombre"]);
    
    $valor_recaudo=number_format($valor_recaudo);
    agregaCelda($arreglo->grupo->$valor_recaudo->comprobante, "valor:$destp_comprobante;clase:celdaBo1c");
    agregaCelda($arreglo->grupo->$valor_recaudo->concepto, "valor:$desconcepto;clase:celdaBo1c");
    agregaCelda($arreglo->grupo->$valor_recaudo->valor, "valor:$valor_recaudo;clase:celdaBo1c");
}


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
$vista->asignarVariable("dia", $dia);
$vista->asignarVariable("anio", $Year);
$vista->asignarVariable("nombre", $nombre);

$vista->asignarVariable("arreglo", $arreglo);

;
$vista->cargarTemplate("header");
$vista->dibujar();
$vista->cargarTemplate("footer");
?>
