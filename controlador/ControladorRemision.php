<?php

$app = $this;
$app->cargarRequest();

if ($app->cargarVista("remision") === false) {
    $app->error("No se encontro la vista. factura.");
}
$vista = new VistaRemision();


if ($app->cargarModelo("index") === false) {
    $app->error("No se encontro el modelo. index.");
}
$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");

$nit = $_REQUEST["nit"];
$nombre = $_REQUEST["nombre"];
$nrofacVista = $_REQUEST["nrofac"];
$sucursalr = $_REQUEST["sucursalr"];
$fecha = $_REQUEST["fecha"];

$modelo->getDetallesRemisiones($nit, $nrofacVista);

agregaCelda($arreglo->grupo->titulo->codproducto, "valor:Cod Producto;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->producto, "valor:Descripcion Producto;clase:celdaAz");

agregaCelda($arreglo->grupo->titulo->cantidad, "valor:Cantidad;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->unidad, "valor:Precio Unidad;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->total, "valor:Total;clase:celdaAz");
$mauro=1;
$contadorr=1;
while ($registro = $modelo->getRegistro()) {
    $producto = trim($registro["sidepr"]);
    $codproducto= trim($registro["producto"]);
    $cantidad = trim($registro["cantidad"]);
    $unidad = trim($registro["cosunid"]);
    $total = trim($registro["costotal"]);
    
    
    if (($mauro % 2) == 0) {
        $stylo = celdaBo;
        $styloc = celdaBoc;
    } else {
        $stylo = celdaBo1;
        $styloc = celdaBo1c;
    }
    
    $totalFactura=$totalFactura+$total;
    
    
    $cantidad = number_format($cantidad);
    $unidad = number_format($unidad);
    $total = number_format($total);
    
    agregaCelda($arreglo->grupo->$contadorr->producto, "valor:$producto;clase:$styloc");
    agregaCelda($arreglo->grupo->$contadorr->codproducto, "valor:$codproducto;clase:$styloc");
    agregaCelda($arreglo->grupo->$contadorr->cantidad, "valor:$cantidad;clase:$stylo");
    agregaCelda($arreglo->grupo->$contadorr->unidad, "valor:$unidad;clase:$stylo");
    agregaCelda($arreglo->grupo->$contadorr->total, "valor:$total;clase:$stylo");
    $mauro=$mauro+1;
    $contadorr=$contadorr+1;
}
    $totalFactura = number_format($totalFactura);
agregaCelda($arreglo->grupo->total->producto, "valor:--;clase:celdaAz");
    agregaCelda($arreglo->grupo->total->codproducto, "valor:TOTAL;clase:celdaAz");
    agregaCelda($arreglo->grupo->total->cantidad, "valor:--;clase:celdaAz");
    agregaCelda($arreglo->grupo->total->unidad, "valor:--;clase:celdaAz");
    agregaCelda($arreglo->grupo->total->total, "valor:$totalFactura;clase:celdaAz");


   

$vista->asignarVariable("titulo", "Prueba");
$vista->asignarVariable("nit", $nit);
$vista->asignarVariable("nombre", $nombre);
$vista->asignarVariable("nrofac", $nrofacVista);
$vista->asignarVariable("sucursalr", $sucursalr);
$vista->asignarVariable("fecha", $fecha);

$vista->asignarVariable("arreglo", $arreglo);


$vista->cargarTemplate("header");
$vista->dibujar();
$vista->cargarTemplate("footer");
?>
