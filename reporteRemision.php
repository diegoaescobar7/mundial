<?php

//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
$dimensiones=array (10,20);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mauricio Valencia');
$pdf->SetTitle('Vencimiento Proveedores');
$pdf->SetSubject('IBG');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData("ibglogo.jpg", PDF_HEADER_LOGO_WIDTH, '', '');
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_HEADER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage('P', 'A4');

// set text shadow effect
//$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

include "../../ModeloBase.php";
include "modelo/ModeloIndex.php";
include "../../funciones.php";





$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");

$nit = $_REQUEST["nit"];
$nombre = $_REQUEST["nombre"];
$nrofacVista = $_REQUEST["nrofac"];
$sucursalr = $_REQUEST["sucursalr"];
$fecha = $_REQUEST["fecha"];

$modelo->getDetallesRemisiones($nit, $nrofacVista);

$arreglo->grupo->titulo->codproducto="Cod Producto";
$arreglo->grupo->titulo->producto="Descripcion Producto";

$arreglo->grupo->titulo->cantidad="Cantidad";
$arreglo->grupo->titulo->unidad="Precio Unidad";
$arreglo->grupo->titulo->total="Total";
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
   $arreglo->grupo->$contadorr->codproducto=$codproducto;
    $arreglo->grupo->$contadorr->producto=$producto;
    
    $arreglo->grupo->$contadorr->cantidad=$cantidad;
    $arreglo->grupo->$contadorr->unidad=$unidad;
    $arreglo->grupo->$contadorr->total=$total;
    $mauro=$mauro+1;
    $contadorr=$contadorr+1;
}
    $totalFactura = number_format($totalFactura);
    $arreglo->grupo->total->codproducto="TOTAL";
    $arreglo->grupo->total->producto="--";
    
    $arreglo->grupo->total->cantidad="--";
    $arreglo->grupo->total->unidad="--";
    $arreglo->grupo->total->total=$totalFactura;


   
    $d=date("m/d/Y");
    
    
    $h=date("g:i a");

    
  $html .=" <small style=\"text-align: center\"><FONT color=\"#000000\">".$nombre ."</FONT></small>";
$html .="  <br><small style=\"text-align: center\"><FONT color=\"#000000\">NIT: ".$nit ."</FONT></small>";
$html .="  <br><small style=\"text-align: center\"><FONT color=\"#000000\">REMISION Nro: ".$nrofacVista ."</FONT></small>";
$html .="  <br><small style=\"text-align: center\"><FONT color=\"#000000\">SUCURSAL: ".$sucursalr ."</FONT></small>";
$html .="  <br><small style=\"text-align: center\"><FONT color=\"#000000\">FECHA: ".$fecha ."</FONT></small>";


$html .= "<br><div style=\"text-align: center\"><table border=\"0.5\" cellpadding=\"1\" align=\"center\" style=\"font-size:8px\">";




foreach ($arreglo as $key => $value) {
    
    
    foreach ($value as $key => $value) {
        $html.= "<tr>";
       if($key == "titulo" or $key == "total"){
            foreach ($value as $key => $value) {
            
            $html.="<td align=\"center\" colspan=\"2\"><b>".$value."</b></td>";
        }
        }
        else{
        
        foreach ($value as $key => $value) {
            
                  
                      $html.="<td align=\"center\" colspan=\"2\">".$value."</td>"; 
                  
               
                       
                 }
                  
        }
       $html.="</tr>";
     }
    
          }
$html.="</table>";

$html.="<br><div style=\"text-align: right\"><small><FONT color=\"#000000\">".$h."</FONT></small></div></div>";



// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('VencimientoProveedores.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+