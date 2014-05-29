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


$modelo->getDetallesFechaNitDia($nit);
$arreglo->grupo->titulo->nrofac="Numero Factura";
$arreglo->grupo->titulo->sucursal="Sucursal";
$arreglo->grupo->titulo->fectra="Fecha Factura";

while ($registro = $modelo->getRegistro()) {
    
    $mesaux = trim($registro["mes"]);
    $mes = trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anho = trim($registro["anho"]);
     

    if ($mesaux == 1) {
        $mesaux = "Enero";
    } else if ($mesaux == 2) {
        $mesaux = "Febrero";
    } else if ($mesaux == 3) {
        $mesaux = "Marzo";
    } else if ($mesaux == 4) {
        $mesaux = "Abril";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Junio";
    } else if ($mesaux == 7) {
        $mesaux = "Julio";
    } else if ($mesaux == 8) {
        $mesaux = "Agosto";
    } else if ($mesaux == 9) {
        $mesaux = "Septiembre";
    } else if ($mesaux == 10) {
        $mesaux = "Octubre";
    } else if ($mesaux == 11) {
        $mesaux = "Noviembre";
    } else {
        $mesaux = "Diciembre";
    }
    $mesdia = $mesaux . $dia . $anho;
    /* $var = $mes[$mesvar] . "a"; */

    if ($vencerarr->$mesaux != 1) {

        $arreglo->grupo->titulo->$mesaux=$mesaux;
        $vencerarr->$mesaux = 1;
    }


    //$arreglo->grupo->titulo->$mesdia=$dia;

}

$modelo->getDetallesFechaNit($nit);

while ($registro = $modelo->getRegistro()) {
   
    $nrofac = trim($registro["nrofac"]);
    /*
    $sucursal = trim($registro["sucursal"]);
    */
    $mes = trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anho = trim($registro["anho"]);
    $vlrtra = trim($registro["vlrtra"]);
    $mesaux = trim($registro["mes"]);
   
    if ($mesaux == 1) {
        $mesaux = "Enero";
    } else if ($mesaux == 2) {
        $mesaux = "Febrero";
    } else if ($mesaux == 3) {
        $mesaux = "Marzo";
    } else if ($mesaux == 4) {
        $mesaux = "Abril";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Junio";
    } else if ($mesaux == 7) {
        $mesaux = "Julio";
    } else if ($mesaux == 8) {
        $mesaux = "Agosto";
    } else if ($mesaux == 9) {
        $mesaux = "Septiembre";
    } else if ($mesaux == 10) {
        $mesaux = "Octubre";
    } else if ($mesaux == 11) {
        $mesaux = "Noviembre";
    } else {
        $mesaux = "Diciembre";
    }
    $styloc = celdaBo1c;
    $styloc1 = celdaBoc;
    $stylo = celdaBo;
    $mesdia = $mesaux . $dia . $anho;
   
    
    
    $nitcli = $_REQUEST["nit"];
    
    
    $modelo3 = new ModeloIndex();
    $modelo3->conectar("ifxibgdir");
    $modelo3->getFectra($nit, $nrofac);
    $registro3 = $modelo3->getRegistro();
    $fectra = trim($registro3["fectra"]);
    $sucursal = trim($registro3["sucursal"]);
    
    $fectra = date("m-d-Y", strtotime($fectra));
    
    $arreglo->grupo->$nrofac->nrofac=$nrofac;
    $arreglo->grupo->$nrofac->sucursal=$sucursal;
    $arreglo->grupo->$nrofac->fectra=$fectra;
}












$modelo2 = new ModeloIndex();
$modelo2->conectar("ifxibgdir");
$modelo2->getDetallesFechaNit($nit);


while ($registro2 = $modelo2->getRegistro()) {
    $meses[] = $registro2;
}

$stylo = celdaBo;
$modelo->getDetallesFechaNit($nit);
while ($registro = $modelo->getRegistro()) {
    $nrofac = trim($registro["nrofac"]);
      foreach ($meses as $registro2) {          
        
        $mesaux = trim($registro2["mes"]);
        $mes = trim($registro2["mes"]);
        $dia = trim($registro2["dia"]);
        $anho = trim($registro2["anho"]);
        

               
        if ($mesaux == 1) {
            $mesaux = "Enero";
        } else if ($mesaux == 2) {
            $mesaux = "Febrero";
        } else if ($mesaux == 3) {
            $mesaux = "Marzo";
        } else if ($mesaux == 4) {
            $mesaux = "Abril";
        } else if ($mesaux == 5) {
            $mesaux = "Mayo";
        } else if ($mesaux == 6) {
            $mesaux = "Junio";
        } else if ($mesaux == 7) {
            $mesaux = "Julio";
        } else if ($mesaux == 8) {
            $mesaux = "Agosto";
        } else if ($mesaux == 9) {
            $mesaux = "Septiembre";
        } else if ($mesaux == 10) {
            $mesaux = "Octubre";
        } else if ($mesaux == 11) {
            $mesaux = "Noviembre";
        } else {
            $mesaux = "Diciembre";
        }
        $mesdia = $mesaux . $dia . $anho;

       $arreglo->grupo->$nrofac->$mesaux="&nbsp;";
       $arreglo->grupo->$nrofac->$mesdia="&nbsp;";
       
     
        if(date("n") > $mes or date("Y") > $anho){
       $arreglo->grupo->$nrofac->$mesdia="&nbsp;";
       $arreglo->grupo->$nrofac->$mesaux="&nbsp;";
        }
     
        if(date("n") < $mes){
       $arreglo->grupo->$nrofac->$mesdia="&nbsp;";
       $arreglo->grupo->$nrofac->$mesaux="&nbsp;";
        }
        
    
       
    }
}




$modelo->getDetallesFechaNit($nit);

while ($registro = $modelo->getRegistro()) {
   
    $nrofac = trim($registro["nrofac"]);
    /*
    $sucursal = trim($registro["sucursal"]);
    */
    $mes = trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anho = trim($registro["anho"]);
    $vlrtra = trim($registro["vlrtra"]);
    $mesaux = trim($registro["mes"]);
   
    if ($mesaux == 1) {
        $mesaux = "Enero";
    } else if ($mesaux == 2) {
        $mesaux = "Febrero";
    } else if ($mesaux == 3) {
        $mesaux = "Marzo";
    } else if ($mesaux == 4) {
        $mesaux = "Abril";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Junio";
    } else if ($mesaux == 7) {
        $mesaux = "Julio";
    } else if ($mesaux == 8) {
        $mesaux = "Agosto";
    } else if ($mesaux == 9) {
        $mesaux = "Septiembre";
    } else if ($mesaux == 10) {
        $mesaux = "Octubre";
    } else if ($mesaux == 11) {
        $mesaux = "Noviembre";
    } else {
        $mesaux = "Diciembre";
    }
    $styloc = celdaBo1c;
    $styloc1 = celdaBoc;
    $stylo = celdaBo;
    $mesdia = $mesaux . $dia . $anho;
    $sumames->$nrofac->$mes+=$vlrtra;
    $sumamesActual=$sumames->$nrofac->$mes;
    
    
    $sumamesTotal->$mes+=$vlrtra;
    $sumadia->$mes->$dia+=$vlrtra;
    
    
    $sumamesActual=number_format($sumamesActual);
    $vlrtra=number_format($vlrtra);
    
    $nitcli = $_REQUEST["nit"];
    
    
    $modelo3 = new ModeloIndex();
    $modelo3->conectar("ifxibgdir");
    $modelo3->getFectra($nit, $nrofac);
    $registro3 = $modelo3->getRegistro();
    $fectra = trim($registro3["fectra"]);
    $sucursal = trim($registro3["sucursal"]);
    
    $fectra = date("m-d-Y", strtotime($fectra));
    
    $arreglo->grupo->$nrofac->nrofac=$nrofac;
    $arreglo->grupo->$nrofac->sucursal=$sucursal;
    $arreglo->grupo->$nrofac->fectra=$fectra;
    
    
    
    
     if (date("n") == $mes) {
         $arreglo->grupo->$nrofac->$mesaux=$sumamesActual;
        $arreglo->grupo->$nrofac->nrofac=$nrofac;
        $arreglo->grupo->$nrofac->$mesdia=$vlrtra;
    }
    else if(date("n") < $mes){
        $arreglo->grupo->$nrofac->$mesaux=$sumamesActual;
        $arreglo->grupo->$nrofac->nrofac=$nrofac;
        $arreglo->grupo->$nrofac->$mesdia=$vlrtra;
    }
    else if(date("n") > $mes or date("Y") > $anho){
        $arreglo->grupo->$nrofac->$mesaux=$sumamesActual;
        $arreglo->grupo->$nrofac->nrofac=$nrofac;
        $arreglo->grupo->$nrofac->$mesdia=$vlrtra;
    }
    
         
}

$arreglo->grupo->total->nrofac="TOTALES";
$arreglo->grupo->total->sucursal="--";  
$arreglo->grupo->total->fectra="--";
  
  
  foreach ($meses as $registro2) {          
        
        $mesaux = trim($registro2["mes"]);
        $mes = trim($registro2["mes"]);
        $dia = trim($registro2["dia"]);
        $anho = trim($registro2["anho"]);
        

       $sumamestotal=$sumamesTotal->$mes;
        $sumamestotal=number_format($sumamestotal);
        
        
        $sumadiatotal=$sumadia->$mes->$dia;
        $sumadiatotal=number_format($sumadiatotal);

        
        if ($mesaux == 1) {
            $mesaux = "Enero";
        } else if ($mesaux == 2) {
            $mesaux = "Febrero";
        } else if ($mesaux == 3) {
            $mesaux = "Marzo";
        } else if ($mesaux == 4) {
            $mesaux = "Abril";
        } else if ($mesaux == 5) {
            $mesaux = "Mayo";
        } else if ($mesaux == 6) {
            $mesaux = "Junio";
        } else if ($mesaux == 7) {
            $mesaux = "Julio";
        } else if ($mesaux == 8) {
            $mesaux = "Agosto";
        } else if ($mesaux == 9) {
            $mesaux = "Septiembre";
        } else if ($mesaux == 10) {
            $mesaux = "Octubre";
        } else if ($mesaux == 11) {
            $mesaux = "Noviembre";
        } else {
            $mesaux = "Diciembre";
        }
        $mesdia = $mesaux . $dia . $anho;



        //$arreglo->grupo->total->$mesdia=$sumadiatotal;

        $arreglo->grupo->total->$mesaux=$sumamestotal;
    }









$modelo3 = new ModeloIndex();
$modelo3->conectar("ifxibgdir");
$modelo3->getRemisiones($nit);

$nitcli = $_REQUEST["nit"];
while ($registro3 = $modelo3->getRegistro()) {


    $arreglo2->grupo->titulo->nrodoc="Numero";
    $arreglo2->grupo->titulo->sucursal="Sucursal";
    $arreglo2->grupo->titulo->fecha="Fecha";
    $arreglo2->grupo->titulo->costotal="Total";


    if (($mauro % 2) == 0) {
        $stylo = celdaBo;
        $styloc = celdaBoc;
    } else {
        $stylo = celdaBo1;
        $styloc = celdaBo1c;
    }

    $nrodoc = trim($registro3["nrodoc"]);
    $sucursalr = trim($registro3["sucursal"]);
    $fecha = trim($registro3["fecha"]);
    $costotal = trim($registro3["costotal"]);
    $costotalFull = trim($registro3["costotal"]);
    $total3 = $total3 + $costotalFull;
    $fecha = date("m-d-Y", strtotime($fecha));

    $costotal = number_format($costotal);

    $arreglo2->grupo->$nrodoc->nrodoc=$nrodoc;
    $arreglo2->grupo->$nrodoc->sucursal=$sucursalr;
    $arreglo2->grupo->$nrodoc->fecha=$fecha;
    $arreglo2->grupo->$nrodoc->costotal=$costotal;


    $mauro = $mauro + 1;
}
$total3 = number_format($total3);
if ($total3 > 0) {
    $arreglo2->grupo->total->nrodoc="TOTAL";
    $arreglo2->grupo->total->sucursal="--";
    $arreglo2->grupo->total->fecha="--";
    $arreglo2->grupo->total->costotal=$total3;
}




    
    $d=date("m/d/Y");
    
    
    $h=date("g:i a");

    
  $html .="  <div style=\"text-align: center\"> <h6><FONT color=\"#000000\">VENCIMIENTOS ".$nombre ."</FONT></h6><h6><FONT color=\"#000000\">".$d."</FONT></h6></div>";


$html .= "<div style=\"text-align: center\"><table border=\"0.5\" cellpadding=\"1\" align=\"center\" style=\"font-size:10px\">";




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
            
                  if($key == "nrofac" or $key == "sucursal" or $key == "fectra" or $key == "Enero" or $key == "Febrero" or $key == "Marzo" or $key == "Abril" or $key == "Mayo" or $key == "Junio" or $key == "Julio" or $key == "Agosto" or $key == "Septiembre" or $key == "Octubre" or $key == "Noviembre" or $key == "Diciembre"){
                      $html.="<td align=\"center\" colspan=\"2\">".$value."</td>"; 
                  }
               
                       
                 }
                  
        }
       $html.="</tr>";
     }
    
          }
$html.="</table>";





if(count($arreglo2)>0 ) {
    
    $html.="<div style=\"text-align: center\"> <h6><FONT color=\"#000000\">Remisiones</FONT></h6></div>";
    $html .= "<div style=\"text-align: center\"><table border=\"0.5\" cellpadding=\"1\" align=\"center\" style=\"font-size:10px\">";




foreach ($arreglo2 as $key => $value) {
    
    
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
    
}
else{
    $html.="<div style=\"text-align: center\"> <h6><FONT color=\"#000000\">No hay Remisiones</FONT></h6></div>";
}
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