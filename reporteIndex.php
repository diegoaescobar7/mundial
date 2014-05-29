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
$pdf->AddPage('L', 'A');

// set text shadow effect
//$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

include "../../ModeloBase.php";
include "modelo/ModeloIndex.php";
include "../../funciones.php";
$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");

$modelo->getFechas();
$arreglo->grupo->titulo->nit = "Nit";
$arreglo->grupo->titulo->nombre = "Nombre";

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

        $arreglo->grupo->titulo->$mesaux = $mesaux;
        $vencerarr->$mesaux = 1;
    }


    //$arreglo->grupo->titulo->$mesdia = $dia;
}
$arreglo->grupo->titulo->total= "Total Vencimientos";

$arreglo->grupo->titulo->remisiones="Remisiones";

$arreglo->grupo->titulo->totaltotal="Vencimientos+Remisiones";



$modelo->getDetallesFecha();
/* $mauro = 0;
  $stylo = "";
 */

while ($registro = $modelo->getRegistro()) {
    $nitcli = trim($registro["nitcli"]);
    $nombre = trim($registro["nombre"]);
    $arreglo->grupo->$nitcli->nit=$nitcli;
    $arreglo->grupo->$nitcli->nombre=$nombre;
}







$modelo2 = new ModeloIndex();
$modelo2->conectar("ifxibgdir");
$modelo2->getFechas();
while ($registro2 = $modelo2->getRegistro()) {
    $meses[] = $registro2;
}

      
       
        
$stylo = celdaBo;
$modelo->getNits();
while ($registro = $modelo->getRegistro()) {
    $nitcli = trim($registro["nitcli"]);
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

       $arreglo->grupo->$nitcli->$mesaux="&nbsp;";
       $arreglo->grupo->$nitcli->$mesdia="&nbsp;";
       
     
        if(date("n") > $mes or date("Y") > $anho){
        $arreglo->grupo->$nitcli->$mesdia="&nbsp;";
       $arreglo->grupo->$nitcli->$mesaux="&nbsp;";
        }
     
        if(date("n") < $mes){
       $arreglo->grupo->$nitcli->$mesdia="&nbsp;";
       $arreglo->grupo->$nitcli->$mesaux="&nbsp;";
        }
        
    
       
    }
}  












$modelo3 = new ModeloIndex();
$modelo3->conectar("ifxibgdir");
$modelo3->getTotalesRemision();
while ($registro3 = $modelo3->getRegistro()) {
    $TotalRemisiones[] = $registro3;
}
 



$modelo->getDetallesFecha();
/* $mauro = 0;
  $stylo = "";
 */

while ($registro = $modelo->getRegistro()) {
    $nitcli = trim($registro["nitcli"]);
    $nombre = trim($registro["nombre"]);
    $mes = trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anho = trim($registro["anho"]);
    $vlrtra = trim($registro["vlrtra"]);
    $vlrtraFull = trim($registro["vlrtra"]);
    if ($remisionesTotal->$nitcli != 1) {
    foreach ($TotalRemisiones as $registro3) {
        $codven = trim($registro3["codven"]);
        
        
                if($nitcli==$codven){
                    $remisiones = trim($registro3["remisiones"]);
                    $remisionesux =trim($registro3["remisiones"]);
                    }
                   
                    
                                   
            $remisionesTotal->$nitcli = 1;               
        }
    
    }
   
    $mesaux = trim($registro["mes"]);
    /*
      $nitcli = trim($registro["nitcli"]);
      $nombre = trim($registro["nombre"]);
      $mes = trim($registro["mes"]);
      $mesaux = trim($registro["mes"]);
      $total_mes = trim($registro["total_mes"]);
      $por_vencer = trim($registro["por_vencer"]);
      $mesaux1 = trim($registro["mes"]);
      $valor_base = trim($registro["valor_base"]);
      $reemision = trim($registro["reemisiones"]);
     */
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

    $stylo = celdaBo;
    $styloc = celdaBo1c;
    /*

      $mes_total->$mes+=$total_mes;
     */
    $mesdia = $mesaux . $dia . $anho;


    //$arreglo->grupo->$nitcli->nit=$nitcli;
    //$arreglo->grupo->$nitcli->nombre=$nombre;
    
    
   

    $vlrtraFull=number_format($vlrtraFull);
    $arreglo->grupo->$nitcli->$mesdia=$vlrtraFull;
    $suma->$nitcli->$mes+=$vlrtra;
    $sumaaux = $suma->$nitcli->$mes;
    $sumames->$mes+=$vlrtra;
    $sumadia->$mes->$dia+=$vlrtra;
    
    $sumaaux=number_format($sumaaux);
    
    if (date("n") == $mes) {
        $arreglo->grupo->$nitcli->$mesaux=$sumaaux;
        $arreglo->grupo->$nitcli->$mesdia=$vlrtraFull;
    }
    else if(date("n") < $mes){
        $arreglo->grupo->$nitcli->$mesaux=$sumaaux;
        $arreglo->grupo->$nitcli->$mesdia=$vlrtraFull;
    }
    else if(date("n") > $mes or date("Y") > $anho){
        $arreglo->grupo->$nitcli->$mesaux=$sumaaux;
        $arreglo->grupo->$nitcli->$mesdia=$vlrtraFull;
    }
    
    
    $total->$nitcli+=$vlrtra;
    
    $totalauxFull=$total->$nitcli;
    
    
    
    $totalauxFull=number_format($totalauxFull);
    $totalfinal=$totalfinal+$vlrtra;
    $arreglo->grupo->$nitcli->total=$totalauxFull;
    
    
    
    
    if ($remisionesrarr->$nitcli != 1) {

      $total_remisiones = $total_remisiones + $remisiones;
      $remisionesrarr->$nitcli = 1;
      
      
      if ($remisiones == 0 or $remisiones == "" or $remisiones == null) {
          $arreglo->grupo->$nitcli->remisiones=0;
          
      }
      else{
      $remisionesFull=$remisiones;
      $remisionesFull=number_format($remisionesFull);
      $arreglo->grupo->$nitcli->remisiones=$remisionesFull;
      
      
      }
      }
         $totalclienteRemisiones->$nitcli+=$remisiones;
      
    
          $totaltotal=($total->$nitcli)+($totalclienteRemisiones->$nitcli);
           
          $totaltotal=number_format($totaltotal);
          $arreglo->grupo->$nitcli->totaltotal=$totaltotal;
          
     if ($totalremisionesrarr->$nitcli != 1) {
         
         
         $totalremisionesrarr->$nitcli = 1;
     }
     else{
         $remisionesux=0;
     }
     
      $remisiones=0;
      }




  $arreglo->grupo->total->nit="TOTALES";
  $arreglo->grupo->total->nombre="--";
  
  foreach ($meses as $registro2) {          
        
        $mesaux = trim($registro2["mes"]);
        $mes = trim($registro2["mes"]);
        $dia = trim($registro2["dia"]);
        $anho = trim($registro2["anho"]);
        

       $sumamestotal=$sumames->$mes;
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

        $arreglo->grupo->total->$mesaux=$sumamestotal;

       // $arreglo->grupo->total->$mesdia=$sumadiatotal;

        
    }
    
    $totalfinalparatotal = $totalfinal;
    $totalfinalparatotal=number_format($totalfinal);
    $arreglo->grupo->total->total=$totalfinalparatotal;
    
    
    $total_remisionesparatotal=$total_remisiones;
    $total_remisionesparatotal=number_format($total_remisiones);
    $arreglo->grupo->total->remisiones=$total_remisionesparatotal;
    
    $totaltotalfinal=$totalfinal+$total_remisiones;
    $totaltotalfinal=number_format($totaltotalfinal);
    $arreglo->grupo->total->totaltotal=$totaltotalfinal;
    
    $d=date("m/d/Y");
    
    
    $h=date("g:i a");

    
  $html .=" <h6 style=\"text-align: center\"><FONT color=\"#000000\">VENCIMIENTO PROVEEDORES</FONT></h6><br>";

$html .="<h6 style=\"text-align: center\" ><FONT color=\"#000000\">".$d."</FONT></h6>";
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
            if($key == "total" or $key == "remisiones" or $key == "totaltotal" or $key == "nit" or $key == "nombre"){
                $html.="<td align=\"center\" colspan=\"2\">".$value."</td>"; 
            }
           
            elseif($key == "Enero" or $key == "Febrero" or $key == "Marzo" or $key == "Abril" or $key == "Mayo" or $key == "Junio" or $key == "Julio" or $key == "Agosto" or $key == "Septiembre" or $key == "Octubre" or $key == "Noviembre" or $key == "Diciembre"){
               $html.="<td align=\"center\" colspan=\"2\">".$value."</td>"; 
            }
            
        }
        }
        $html.="</tr>";
    }
    
          }
$html.="</table>";


$html.="<div style=\"text-align: right\"><small><FONT color=\"#000000\">"
 .$h. "</FONT></small></div></div>";




// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('VencimientoProveedores.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+