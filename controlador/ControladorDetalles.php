<?php

$app = $this;
$app->cargarRequest();

if ($app->cargarVista("detalles") === false) {
    $app->error("No se encontro la vista. detalles.");
}
$vista = new VistaDetalles();


if ($app->cargarModelo("index") === false) {
    $app->error("No se encontro el modelo. index.");
}
$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
/*

$modelo->getDetalles();
$mauro = 0;
$totalfinal=0;

while ($registro = $modelo->getRegistro()) {

    $nit = trim($registro["nitcli"]);
    $nrofac = trim($registro["nrofac"]);
    $fecven = trim($registro["fecven"]);
    $vlrtra = trim($registro["vlrtra"]);
    
    $vlrtraFull = trim($registro["vlrtra"]);
    $nombre = trim($registro["nombre"]);
    
    
    $modelo2 = new ModeloIndex();
    $modelo2->conectar("ifxibgdir");
    $modelo2->getBase($nit, $nrofac);
    $registro2 = $modelo2->getRegistro();
    $base = trim($registro2["porc_aplica"]);
    $iva=trim($registro2["porc_aplica"]);
    $descuento = trim($registro2["descuento"]);
    $iva2=$iva+($descuento*-1);
    
    agregaCelda($arreglo->$nit->titulo->nrofac, "valor:Factura Numero;clase:celdaAz");
    agregaCelda($arreglo->$nit->titulo->fectra, "valor:Fecha Factura;clase:celdaAz");
    agregaCelda($arreglo->$nit->titulo->fecven, "valor:Fecha Vencimiento;clase:celdaAz");
    agregaCelda($arreglo->$nit->titulo->vlrtra, "valor:Total Con iva;clase:celdaAz");
    agregaCelda($arreglo->$nit->titulo->base, "valor:Total Sin iva;clase:celdaAz");
    agregaCelda($arreglo->$nit->titulo->iva, "valor:Iva Aplicado;clase:celdaAz");
    agregaCelda($arreglo->$nit->titulo->descuento, "valor:Descuentos;clase:celdaAz");

    if (($mauro % 2) == 0) {
        $stylo = celdaBo;
        $styloc = celdaBoc;
    } else {
        $stylo = celdaBo1;
        $styloc = celdaBo1c;
    }
    $total = $total + $vlrtra;
    $vlrtra = $english_format_number = number_format($vlrtra);
    $fecven = date("m-d-Y", strtotime($fecven));
    $total = $total + $vlrtra;
    agregaCelda($arreglo->$nit->$nrofac->nrofac, "valor:$nrofac;clase:$styloc");
    
    $modelo3 = new ModeloIndex();
    $modelo3->conectar("ifxibgdir");
    $modelo3->getFectra($nit, $nrofac);
    $registro3 = $modelo3->getRegistro();
    $fectra = trim($registro3["fectra"]);
  
  $fectra = date("m-d-Y", strtotime($fectra));
    
    agregaCelda($arreglo->$nit->$nrofac->fectra, "valor:$fectra;clase:$styloc");
    
    agregaCelda($arreglo->$nit->$nrofac->fecven, "valor:$fecven;clase:$styloc");
    agregaCelda($arreglo->$nit->$nrofac->vlrtra, "valor:$vlrtra;clase:$stylo");
    if($base == 0 or $base == "" or $base == null)
    {
       agregaCelda($arreglo->$nit->$nrofac->base, "valor:--;clase:$stylo"); 
       agregaCelda($arreglo->$nit->$nrofac->iva, "valor:--;clase:$stylo");
    }
    else{
        
          
        
        $base=($base/100)+1;
        $siniva=($vlrtraFull/$base);
        $sinivaFull = number_format($siniva);
        $iva = number_format($iva, 1);
        agregaCelda($arreglo->$nit->$nrofac->base, "valor:$sinivaFull;clase:$stylo");
        agregaCelda($arreglo->$nit->$nrofac->iva, "valor:$iva2 %;clase:$stylo");
        
    }
    
    if($descuento == 0 or $descuento == "" or $descuento == null){
        agregaCelda($arreglo->$nit->$nrofac->descuento, "valor:--;clase:$stylo");
    }
    else{
        $descuento = number_format($descuento, 1);
        agregaCelda($arreglo->$nit->$nrofac->descuento, "valor:$descuento %;clase:$stylo");
    }
    
    
    $mauro = $mauro + 1;
    $prueba->$nit->total+=$vlrtraFull;
    $prueba2->$nit->total2+=$siniva;
    $arreglotres[$nit] =$nombre;
    $siniva=0;
}
foreach ($arreglotres as $key => $value) {
    $nit = trim($key);
    $totalfinal = $totalfinal+$prueba->$nit->total;
    $totalfinal2 = $totalfinal2+$prueba2->$nit->total2;
    $prueba->$nit->total = number_format($prueba->$nit->total);
    $prueba2->$nit->total2 = number_format($prueba2->$nit->total2);
    agregaCelda($arreglo->$nit->total->nrofac, "valor:$value;clase:celdaAz");
    agregaCelda($arreglo->$nit->total->fectra, "valor:--;clase:celdaAz");
    agregaCelda($arreglo->$nit->total->fecven, "valor:Subtotal;clase:celdaAz");
    agregaCelda($arreglo->$nit->total->vlrtra, "valor:" . $prueba->$nit->total . ";clase:celdaAz");
    agregaCelda($arreglo->$nit->total->base, "valor:" . $prueba2->$nit->total2 . ";clase:celdaAz");
    agregaCelda($arreglo->$nit->total->iva, "valor:--;clase:celdaAz");
    agregaCelda($arreglo->$nit->total->descuento, "valor:--;clase:celdaAz");
}
$totalfinal = number_format($totalfinal);
$totalfinal2 = number_format($totalfinal2);
    agregaCelda($arreglo->$nit->totalT->nrofac, "valor:-;clase:celdaAz");
    agregaCelda($arreglo->$nit->totalT->fectra, "valor:--;clase:celdaAz");
    agregaCelda($arreglo->$nit->totalT->fecven, "valor:TOTAL;clase:celdaAz");
    agregaCelda($arreglo->$nit->totalT->vlrtra, "valor:$totalfinal;clase:celdaAz");
    agregaCelda($arreglo->$nit->totalT->base, "valor:$totalfinal2;clase:celdaAz");
    agregaCelda($arreglo->$nit->totalT->iva, "valor:--;clase:celdaAz");
    agregaCelda($arreglo->$nit->totalT->descuento, "valor:--;clase:celdaAz");
 
 */
$vista->asignarVariable("titulo", "Prueba");
$vista->asignarVariable("nit", $nit);
$vista->asignarVariable("nombre", $nombre);
$vista->asignarVariable("arreglo", $arreglo);
$vista->cargarTemplate("header");
$vista->dibujar();
$vista->cargarTemplate("footer");
?>
