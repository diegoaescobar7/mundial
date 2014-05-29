<?php

$app = $this;
$app->cargarRequest();

if ($app->cargarVista("ajax") === false) {
    $app->error("No se encontro la vista. ajax.");
}
$vista = new VistaAjax();

if ($app->cargarModelo("index") === false) {
    $app->error("No se encontro el modelo. index.");
}


//-------
//-------
//-------
$mes = $_REQUEST["mes"];
$mesaux = $_REQUEST["mes"];
$Year = $_REQUEST["Year"];




require('festivos.php');
$dias_festivos = new festivos($Year);
//var_dump($dias_festivos);

//echo $nombredia;
$dias = date("d",mktime(0,0,0,$mesaux+1,0,$Year));


if ($mesaux == 1) {
        $mesaux = "Ene";
    } else if ($mesaux == 2) {
        $mesaux = "Febr";
    } else if ($mesaux == 3) {
        $mesaux = "Marz";
    } else if ($mesaux == 4) {
        $mesaux = "Abr";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Jun";
    } else if ($mesaux == 7) {
        $mesaux = "Jul";
    } else if ($mesaux == 8) {
        $mesaux = "Agos";
    } else if ($mesaux == 9) {
        $mesaux = "Sept";
    } else if ($mesaux == 10) {
        $mesaux = "Oct";
    } else if ($mesaux == 11) {
        $mesaux = "Nov";
    } else {
        $mesaux = "Dic";
    }
    
    


//$modelo->getFechas();

agregaCelda($arreglo->grupo->titulo->codigo, "valor:Codigo;clase:celdaAz");
agregaCelda($arreglo->grupo->titulo->nombre, "valor:Nombre;clase:celdaAz");
$i=1;
while ($i <= $dias) {
    

    $mesdia = $mesaux . $i . $Year ;
    if($dias_festivos->esFestivo($i,$mes)== "false"){
        $festivo="si";
    }
    ;
   
    
    
    /* $var = $mes[$mesvar] . "a"; */
    $nombredia=jddayofweek(cal_to_jd(CAL_GREGORIAN, date($mes),date($i), date($Year)) , 0 );
    if($nombredia==0){
        $nombredia = "Dom";
    }
    elseif($nombredia==1){
        $nombredia = "Lun";
    }
    elseif($nombredia==2){
        $nombredia = "Mar";
    }
    elseif($nombredia==3){
        $nombredia = "Mier";
    }
    elseif($nombredia==4){
        $nombredia = "Jue";
    }
    elseif($nombredia==5){
        $nombredia = "Vie";
    }
    else{
        $nombredia = "Sab";
    }
    
    if($festivo=="si" or $nombredia=="Dom"){
        agregaCelda($arreglo->grupo->titulo->$mesdia, "valor:$mesaux"."<br>$i"."<br>$nombredia".";clase:vencidod");
    }
    else{
        agregaCelda($arreglo->grupo->titulo->$mesdia, "valor:$mesaux"."<br>$i"."<br>$nombredia".";clase:celdaAz");
    }
   

        
    


    $i=$i+1;
    $festivo="no";
}
agregaCelda($arreglo->grupo->titulo->valor, "valor:Total;clase:celdaAz");

//---
//---
//---

$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getCuadre($Year, $mes);

while ($registro = $modelo->getRegistro()) {
    $codsucursal = trim($registro["codsucursal"]);
    $nombre = trim($registro["nombre"]);
    $valor_recaudo=trim($registro["valor_recaudo"]);
    
    $codigo=trim($registro["codigo"]);
    $regional=trim($registro["regional"]);
    
    
    $mesaux = trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anio = trim($registro["anio"]);
    
    if ($mesaux == 1) {
        $mesaux = "Ene";
    } else if ($mesaux == 2) {
        $mesaux = "Febr";
    } else if ($mesaux == 3) {
        $mesaux = "Marz";
    } else if ($mesaux == 4) {
        $mesaux = "Abr";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Jun";
    } else if ($mesaux == 7) {
        $mesaux = "Jul";
    } else if ($mesaux == 8) {
        $mesaux = "Agos";
    } else if ($mesaux == 9) {
        $mesaux = "Sept";
    } else if ($mesaux == 10) {
        $mesaux = "Oct";
    } else if ($mesaux == 11) {
        $mesaux = "Nov";
    } else {
        $mesaux = "Dic";
    }
    $mesdia = $mesaux . $dia . $anio ;
    
    
    
    
    
    $valor_recaudo=number_format($valor_recaudo);
    
    $mes = $_REQUEST["mes"];
    
    $Year = $_REQUEST["Year"];


//echo $nombredia;

    $i=1;
while ($i <= $dias) {
    
    $mesdia = $mesaux . $i . $Year ;
    
    agregaCelda($arreglo->$regional->titulo->codigo, "valor:&nbsp;clase:celdaAz");
    agregaCelda($arreglo->$regional->titulo->nombre, "valor:&nbsp;clase:celdaAz");
    agregaCelda($arreglo->$regional->titulo->$mesdia, "valor:&nbsp"."<br>$dia".";clase:celdaAz");
    
     agregaCelda($arreglo->$regional->$codsucursal->codigo, "valor:&nbsp;clase:actual");
     agregaCelda($arreglo->$regional->$codsucursal->nombre, "valor:&nbsp;clase:actual");
     agregaCelda($arreglo->$regional->$codsucursal->$mesdia, "valor:&nbsp;clase:celdaBo1c");
     $i=$i+1;
     
     
     
}
    
}

$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getCuadre($Year, $mes);

while ($registro = $modelo->getRegistro()) {
    $codsucursal = trim($registro["codsucursal"]);
    $nombre = trim($registro["nombre"]);
    $valor_recaudo=trim($registro["valor_recaudo"]);
    
    $codigo=trim($registro["codigo"]);
    $regional=trim($registro["regional"]);
    
    
    $mesaux = trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anio = trim($registro["anio"]);
    
    
    if ($mesaux == 1) {
        $mesaux = "Ene";
    } else if ($mesaux == 2) {
        $mesaux = "Febr";
    } else if ($mesaux == 3) {
        $mesaux = "Marz";
    } else if ($mesaux == 4) {
        $mesaux = "Abr";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Jun";
    } else if ($mesaux == 7) {
        $mesaux = "Jul";
    } else if ($mesaux == 8) {
        $mesaux = "Agos";
    } else if ($mesaux == 9) {
        $mesaux = "Sept";
    } else if ($mesaux == 10) {
        $mesaux = "Oct";
    } else if ($mesaux == 11) {
        $mesaux = "Nov";
    } else {
        $mesaux = "Dic";
    }
    $mesdia = $mesaux . $dia . $anio ;
    $suma=$sumadia->$regional->$mesdia;
        
    $i=1;
while ($i <= $dias) {
    $mesdia = $mesaux . $i . $Year ;
    
    agregaCelda($arreglo->$regional->$regional->codigo, "valor:&nbsp;clase:celdaAz");
    agregaCelda($arreglo->$regional->$regional->nombre, "valor:&nbsp;clase:celdaAz");
    agregaCelda($arreglo->$regional->$regional->$mesdia, "valor:&nbsp;clase:celdaAz");
    
    
    $i=$i+1;
   }
    
}

$mes = $_REQUEST["mes"];
$mesaux = $_REQUEST["mes"];
$Year = $_REQUEST["Year"];


//echo $nombredia;
$dias = date("d",mktime(0,0,0,$mesaux+1,0,$Year));


if ($mesaux == 1) {
        $mesaux = "Ene";
    } else if ($mesaux == 2) {
        $mesaux = "Febr";
    } else if ($mesaux == 3) {
        $mesaux = "Marz";
    } else if ($mesaux == 4) {
        $mesaux = "Abr";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Jun";
    } else if ($mesaux == 7) {
        $mesaux = "Jul";
    } else if ($mesaux == 8) {
        $mesaux = "Agos";
    } else if ($mesaux == 9) {
        $mesaux = "Sept";
    } else if ($mesaux == 10) {
        $mesaux = "Oct";
    } else if ($mesaux == 11) {
        $mesaux = "Nov";
    } else {
        $mesaux = "Dic";
    }
    
    


//$modelo->getFechas();

agregaCelda($arreglo->$regional->total->codigo, "valor:&nbsp;clase:celdaAz");
agregaCelda($arreglo->$regional->total->nombre, "valor:&nbsp;clase:celdaAz");
$i=1;
while ($i <= $dias) {
    

    $mesdia = $mesaux . $i . $Year ;
    /* $var = $mes[$mesvar] . "a"; */

   $sumatotald=$sumatotal->$mesdia;

        agregaCelda($arreglo->$regional->total->$mesdia, "valor:&nbsp;clase:celdaAz");
    


    $i=$i+1;
}













//----
//----
//----

$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getCuadre($Year, $mes);

while ($registro = $modelo->getRegistro()) {
    $codsucursal = trim($registro["codsucursal"]);
    $nombre = trim($registro["nombre"]);
    $valor_recaudo=trim($registro["valor_recaudo"]);
    
    $codigo=trim($registro["codigo"]);
    $regional=trim($registro["regional"]);
    
    
    $mesaux = trim($registro["mes"]);
    $mes=trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anio = trim($registro["anio"]);
    
    if ($mesaux == 1) {
        $mesaux = "Ene";
    } else if ($mesaux == 2) {
        $mesaux = "Febr";
    } else if ($mesaux == 3) {
        $mesaux = "Marz";
    } else if ($mesaux == 4) {
        $mesaux = "Abr";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Jun";
    } else if ($mesaux == 7) {
        $mesaux = "Jul";
    } else if ($mesaux == 8) {
        $mesaux = "Agos";
    } else if ($mesaux == 9) {
        $mesaux = "Sept";
    } else if ($mesaux == 10) {
        $mesaux = "Oct";
    } else if ($mesaux == 11) {
        $mesaux = "Nov";
    } else {
        $mesaux = "Dic";
    }
    $mesdia = $mesaux . $dia . $anio ;
    
    $totaltotalfull+=$valor_recaudo;
    
    $sumadia->$regional->$mesdia+=$valor_recaudo;
    
    $sumasucursal->$codsucursal+=$valor_recaudo;
    
    $sumaregional->$regional+=$valor_recaudo;
    
    $sumatotal->$mesdia+=$valor_recaudo;
    
    $valor_recaudo=number_format($valor_recaudo);
    
    agregaCelda($arreglo->$regional->titulo->codigo, "valor:Codigo;clase:celdaAz");
    agregaCelda($arreglo->$regional->titulo->nombre, "valor:Nombre;clase:celdaAz");
    agregaCelda($arreglo->$regional->titulo->$mesdia, "valor:$mesaux"."<br>$dia".";clase:celdaAz");
    agregaCelda($arreglo->$regional->titulo->valor, "valor:Valor;clase:celdaAz");
    
     agregaCelda($arreglo->$regional->$codsucursal->codigo, "valor::<a onclick='return re_evento($codsucursal,\"$mes\",\"$anio\");'href='#';>$codsucursal</a>:;clase::actual", ":;", "::");
     agregaCelda($arreglo->$regional->$codsucursal->nombre, "valor::<a onclick='return re_evento($codsucursal,\"$mes\",\"$anio\");'href='#';>$nombre</a>:;clase::actual", ":;", "::");
     
     agregaCelda($arreglo->$regional->$codsucursal->$mesdia, "valor::<a onclick='return re_valor_recaudo($codsucursal,\"$mes\",\"$dia\",\"$anio\");'href='#';>$valor_recaudo</a>:;titulo::$nombre recaudo $dia de $mesaux :;clase::celdaBo1c", ":;", "::");
    
     $sumasucursaltotal=$sumasucursal->$codsucursal;
      $sumasucursaltotal=number_format($sumasucursaltotal);
     agregaCelda($arreglo->$regional->$codsucursal->valor, "valor:$sumasucursaltotal;titulo:Total $nombre;clase:celdaBo1c");
     
}

$modelo = new ModeloIndex();
$modelo->conectar("ifxibgdir");
$modelo->getCuadre($Year, $mes);

while ($registro = $modelo->getRegistro()) {
    $codsucursal = trim($registro["codsucursal"]);
    $nombre = trim($registro["nombre"]);
    $valor_recaudo=trim($registro["valor_recaudo"]);
    
    $codigo=trim($registro["codigo"]);
    $regional=trim($registro["regional"]);
    
    
    $mesaux = trim($registro["mes"]);
    $dia = trim($registro["dia"]);
    $anio = trim($registro["anio"]);
    
    
    if ($mesaux == 1) {
        $mesaux = "Ene";
    } else if ($mesaux == 2) {
        $mesaux = "Febr";
    } else if ($mesaux == 3) {
        $mesaux = "Marz";
    } else if ($mesaux == 4) {
        $mesaux = "Abr";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Jun";
    } else if ($mesaux == 7) {
        $mesaux = "Jul";
    } else if ($mesaux == 8) {
        $mesaux = "Agos";
    } else if ($mesaux == 9) {
        $mesaux = "Sept";
    } else if ($mesaux == 10) {
        $mesaux = "Oct";
    } else if ($mesaux == 11) {
        $mesaux = "Nov";
    } else {
        $mesaux = "Dic";
    }
    $mesdia = $mesaux . $dia . $anio ;
    $suma=$sumadia->$regional->$mesdia;
    
    $sumaregionaltotal=$sumaregional->$regional;    
    $suma=number_format($suma);
        
    
    agregaCelda($arreglo->$regional->$regional->codigo, "valor:$codigo;clase:celdaAz");
    agregaCelda($arreglo->$regional->$regional->nombre, "valor:$regional;clase:celdaAz");
    agregaCelda($arreglo->$regional->$regional->$mesdia, "valor:$suma;titulo:$regional recaudo $dia de $mesaux;clase:celdaAz");
    
    $sumaregionaltotal=number_format($sumaregionaltotal);
    agregaCelda($arreglo->$regional->$regional->valor, "valor:$sumaregionaltotal;titulo:Total $regional;clase:celdaAz");
   
    
}


$mes = $_REQUEST["mes"];
$mesaux = $_REQUEST["mes"];
$Year = $_REQUEST["Year"];


//echo $nombredia;
$dias = date("d",mktime(0,0,0,$mesaux+1,0,$Year));


if ($mesaux == 1) {
        $mesaux = "Ene";
    } else if ($mesaux == 2) {
        $mesaux = "Febr";
    } else if ($mesaux == 3) {
        $mesaux = "Marz";
    } else if ($mesaux == 4) {
        $mesaux = "Abr";
    } else if ($mesaux == 5) {
        $mesaux = "Mayo";
    } else if ($mesaux == 6) {
        $mesaux = "Jun";
    } else if ($mesaux == 7) {
        $mesaux = "Jul";
    } else if ($mesaux == 8) {
        $mesaux = "Agos";
    } else if ($mesaux == 9) {
        $mesaux = "Sept";
    } else if ($mesaux == 10) {
        $mesaux = "Oct";
    } else if ($mesaux == 11) {
        $mesaux = "Nov";
    } else {
        $mesaux = "Dic";
    }
    
    


//$modelo->getFechas();

agregaCelda($arreglo->$regional->total->codigo, "valor:TOTALES;clase:celdaAz");
agregaCelda($arreglo->$regional->total->nombre, "valor:COMPAÑIA;clase:celdaAz");
$i=1;
while ($i <= $dias) {
    

    $mesdia = $mesaux . $i . $Year ;
    /* $var = $mes[$mesvar] . "a"; */

   $sumatotald=$sumatotal->$mesdia;
   
        $sumatotald=number_format($sumatotald);

        agregaCelda($arreglo->$regional->total->$mesdia, "valor:$sumatotald;titulo:Total $i de $mesaux;clase:celdaAz");
    


    $i=$i+1;
}

$totaltotalfull=number_format($totaltotalfull);
agregaCelda($arreglo->$regional->total->valor, "valor:$totaltotalfull;titulo:Total $mesaux;clase:celdaAz");



echo "<pre>CREATE FUNCTION fc_saldodia_cuadre1 ( p_fecha     DATE)
   RETURNING CHAR(4), DATE, DECIMAL(16,0), DECIMAL(16,0), CHAR(1), CHAR(2), CHAR(80);

   DEFINE v_sucursal   CHAR(4);
   DEFINE v_codcompa   CHAR(2);
   DEFINE v_feccuadr   DATE;
   DEFINE v_valorcon   DECIMAL(16,0);
   DEFINE v_valorcua   DECIMAL(16,0);
   DEFINE v_codsucur   CHAR(4);
   DEFINE v_tipodato   CHAR(1);
   DEFINE v_compania   CHAR(2);
   DEFINE v_descompa   CHAR(80);
   DEFINE v_flagcaja   SMALLINT;


   FOREACH
   --   SELECT sc.codigo, cp.codigo
   --     INTO v_codsucur, v_codcompa
   --     FROM sucursales sc, companias cp
   --     WHERE sc.estado = 'A'
   --        AND sc.codigo <70 --de 70 para arriba estan las areas
   
    SELECT UNIQUE TRUNC(ide_sucursal),ide_empresa
    INTO v_codsucur, v_codcompa    
    FROM bcot_cuentassucursal
    WHERE ide_empresa IS NOT NULL
    ORDER BY 1 
        
      LET v_tipodato = 'C';
      LET v_flagcaja = 0;

      EXECUTE FUNCTION fc_retdatoscuadre1( p_fecha, v_codsucur, v_codcompa )
         INTO v_sucursal, v_feccuadr, v_compania, v_valorcon, v_valorcua;

      IF v_valorcon IS NULL THEN LET v_valorcon = 0; END IF;
      IF v_sucursal IS NULL OR v_feccuadr IS NULL OR v_valorcua IS NULL THEN
      IF v_flagcaja = 0 THEN LET v_tipodato = 'M'; END IF;
         FOREACH EXECUTE FUNCTION fc_saldodia_caja1 ( v_codsucur, p_fecha, v_codcompa )
            INTO v_sucursal, v_feccuadr, v_valorcon, v_valorcua, v_compania

            IF v_valorcua = 0 THEN LET v_flagcaja = 0; END IF;
            IF v_valorcon IS NULL THEN LET v_valorcon = 0; END IF;
            IF v_sucursal IS NOT NULL THEN
               IF v_compania IS NULL THEN LET v_compania = '99'; END IF;
               LET v_descompa = fc_desc_compania ( v_compania );
               RETURN v_sucursal, v_feccuadr, v_valorcua, v_valorcon, v_tipodato, v_compania, v_descompa WITH RESUME;
            END IF;
         END FOREACH;
      ELSE
         LET v_flagcaja = 1;
         LET v_tipodato = 'C';
      IF v_sucursal IS NOT NULL THEN
  
      	    IF v_compania IS NULL THEN LET v_compania = '99'; END IF;
      	    LET v_descompa = fc_desc_compania ( v_compania );
      	    RETURN v_sucursal, v_feccuadr, v_valorcua, v_valorcon, v_tipodato, v_compania,v_descompa WITH RESUME;
        END IF;
      END IF;
   END FOREACH;
END FUNCTION;

/*********************************/



CREATE FUNCTION fc_retdatoscuadre1 ( p_fecha     DATE,
                                    p_sucursal  CHAR(4),
                                    p_codcompa  CHAR(4)
                                  )
   RETURNING CHAR(4), DATE, CHAR(2), DECIMAL(12,0), DECIMAL(12,0);

   DEFINE v_codsucur     CHAR(4);
   DEFINE v_feccuadr     DATE;
   DEFINE v_codcompa     CHAR(2);
   DEFINE v_vlrtotal     DECIMAL(12,0);
   DEFINE v_vlrconsigna  DECIMAL(12,0);
   IF p_codcompa <>'03' OR p_sucursal = '2' OR p_sucursal ='02' THEN
   
   SELECT cc.codsucursal, cc.fecha_cuadre, cc.codcompania,
          SUM(cc.valor_total)
     INTO v_codsucur, v_feccuadr, v_codcompa, v_vlrtotal
     FROM cuadre_caja cc
    WHERE cc.fecha_cuadre = p_fecha
      AND cc.codsucursal = p_sucursal
      AND cc.codcompania = p_codcompa
      AND cc.codtp_comprobante NOT IN( 8, 16, 38, 64,103,78)
      AND cc.tipo_cuenta = 'C'
    GROUP BY 1, 2, 3;
    
   SELECT SUM(cc.valor_total) INTO v_vlrconsigna
     FROM cuadre_caja cc
    WHERE cc.fecha_cuadre = p_fecha
      AND cc.codsucursal = p_sucursal
      AND cc.codcompania = p_codcompa
      AND cc.codtp_comprobante IN( 8, 16, 38, 64,103,78)
      AND cc.tipo_cuenta = 'C';
   ELSE
   SELECT cc.codsucursal, cc.fecha_cuadre, cc.codcompania,
          SUM(cc.valor_total)
     INTO v_codsucur, v_feccuadr, v_codcompa, v_vlrtotal
     FROM cuadre_caja cc
    WHERE cc.fecha_cuadre = p_fecha
      AND (p_codcompa ='03' AND ((cc.codtp_comprobante =42 and cc.codconcepto<>902)OR cc.codtp_comprobante <>42))
      AND cc.codsucursal = p_sucursal
      AND cc.codcompania = p_codcompa
      AND cc.tipo_cuenta = 'C'
    GROUP BY 1, 2, 3;

   SELECT SUM(cc.valor_total) INTO v_vlrconsigna
     FROM cuadre_caja cc
    WHERE cc.fecha_cuadre = p_fecha
      AND (p_codcompa ='03' AND ((cc.codtp_comprobante =42 and cc.codconcepto=902)))
      AND cc.codsucursal = p_sucursal
      AND cc.codcompania = p_codcompa
      AND cc.tipo_cuenta = 'C';
    
    
   END IF;

   RETURN v_codsucur, v_feccuadr, v_codcompa, v_vlrconsigna, v_vlrtotal;

END FUNCTION;
/************************************************************************************************************/

CREATE FUNCTION fc_saldodia_caja1 ( p_sucursal  CHAR(4),
                                            p_fecha     DATE,
                                            p_codcompa  CHAR(4)
                                        )
   RETURNING CHAR(4), DATE, DECIMAL(16,0), DECIMAL(16,0), CHAR(2);

   DEFINE v_fecha        DATE;
   DEFINE v_codsucurs    CHAR(4);
   DEFINE v_codcomprb    INTEGER;
   DEFINE v_formapago    INTEGER;
   DEFINE v_valorregi    DECIMAL(16,0);
   DEFINE v_valortotal   DECIMAL(16,0);

   DEFINE v_valorcon     DECIMAL(16,0);
   DEFINE v_naturaleza   CHAR(1);
   DEFINE v_cajacomprb   CHAR(1);
   DEFINE v_descomprb    CHAR(80);
   DEFINE v_desformpa    CHAR(80);
   DEFINE v_cajafrmpag   CHAR(1);
   DEFINE v_tipomvto     CHAR(1);
   DEFINE v_compania     CHAR(2);
   DEFINE v_compania1    CHAR(2);
   DEFINE v_comp         CHAR(2);


   LET v_codsucurs = NULL;
   LET v_fecha = NULL;
   LET v_valortotal = 0;
   LET v_compania = NULL;
   LET v_comp = NULL;

   IF p_codcompa <>'03' OR p_sucursal = '2' OR p_sucursal ='02' THEN
     FOREACH
        SELECT mv.fecha_operacion, mv.codsucursal, mv.codtp_comprobante,
               md.codforma_pago, fc_retcompania(mv.codtp_comprobante),
               SUM(md.valor_concepto)
          INTO v_fecha, v_codsucurs, v_codcomprb, v_formapago, v_compania,
               v_valorregi
         FROM movimiento mv, movimiento_detalle md
         WHERE mv.fecha_operacion = p_fecha
           
           AND mv.codsucursal = p_sucursal
           AND fc_retcompania(mv.codtp_comprobante) = p_codcompa
           AND NVL(md.aplica_valor,'S') = 'S'
           AND mv.estado ='A'
           AND mv.consecutivo = md.consec_mast
           AND mv.codtp_comprobante NOT IN (8,16,38,64,103,78)
           GROUP BY 1,2,3,4,5
         ORDER BY 5
  
        IF v_valorregi IS NULL THEN LET v_valorregi = 0; END IF;
        IF v_comp IS NULL THEN LET v_comp = v_compania; END IF;
        IF v_codcomprb IS NOT NULL THEN
           LET v_descomprb, v_naturaleza, v_cajacomprb, v_compania1 = fc_natura_comprobantes ( v_codcomprb );
        END IF;
        IF v_formapago IS NOT NULL THEN
           LET v_desformpa, v_cajafrmpag = fc_validacaja_frmpago ( v_formapago );
        END IF;
  
        IF v_cajafrmpag = 'N' AND v_cajacomprb = 'N' THEN
           LET v_tipomvto = 'B';
           LET v_valorregi = 0;
        ELSE
           IF v_naturaleza = 'D' THEN
              LET v_valorregi = v_valorregi * -1;
           END IF;
        END IF;
  
        IF v_compania <> v_comp THEN
           RETURN v_codsucurs, v_fecha, v_valorcon, v_valortotal, v_comp WITH RESUME;
           LET v_comp = v_compania;
           LET v_valortotal = 0;
           LET v_valortotal= v_valortotal + v_valorregi;
        ELSE
           LET v_valortotal = v_valortotal + v_valorregi;
        END IF;
     END FOREACH;
   
      SELECT SUM(md.valor_concepto) INTO v_valorcon
      FROM movimiento mv, movimiento_detalle md
      WHERE mv.fecha_operacion = p_fecha

      AND mv.codsucursal = p_sucursal
      AND fc_retcompania(mv.codtp_comprobante) = p_codcompa
      AND NVL(md.aplica_valor,'S') = 'S'
      AND mv.estado = 'A'
      AND mv.consecutivo = md.consec_mast
      AND mv.codtp_comprobante IN (8,16,38,64,103,78);
   ELSE
   FOREACH
      SELECT mv.fecha_operacion, mv.codsucursal, mv.codtp_comprobante,
             md.codforma_pago, fc_retcompania(mv.codtp_comprobante),
             SUM(md.valor_concepto)
        INTO v_fecha, v_codsucurs, v_codcomprb, v_formapago, v_compania,
            v_valorregi
       FROM movimiento mv, movimiento_detalle md
       WHERE mv.fecha_operacion = p_fecha
         AND (p_codcompa ='03' AND ((mv.codtp_comprobante ='42' and md.codconcepto<>'902')OR mv.codtp_comprobante <>'42'))
         AND mv.codsucursal = p_sucursal
         AND fc_retcompania(mv.codtp_comprobante) = p_codcompa
         AND NVL(md.aplica_valor,'S') = 'S'
         AND mv.estado ='A'
         AND mv.consecutivo = md.consec_mast
         
       GROUP BY 1,2,3,4,5
       ORDER BY 5

      IF v_valorregi IS NULL THEN LET v_valorregi = 0; END IF;
      IF v_comp IS NULL THEN LET v_comp = v_compania; END IF;
      IF v_codcomprb IS NOT NULL THEN
         LET v_descomprb, v_naturaleza, v_cajacomprb, v_compania1 = fc_natura_comprobantes ( v_codcomprb );
      END IF;
      IF v_formapago IS NOT NULL THEN
         LET v_desformpa, v_cajafrmpag = fc_validacaja_frmpago ( v_formapago );
      END IF;

      IF v_cajafrmpag = 'N' AND v_cajacomprb = 'N' THEN
         LET v_tipomvto = 'B';
         LET v_valorregi = 0;
      ELSE
         IF v_naturaleza = 'D' THEN
            LET v_valorregi = v_valorregi * -1;
         END IF;
      END IF;

      IF v_compania <> v_comp THEN
         RETURN v_codsucurs, v_fecha, v_valorcon, v_valortotal, v_comp WITH RESUME;
         LET v_comp = v_compania;
         LET v_valortotal = 0;
         LET v_valortotal= v_valortotal + v_valorregi;
      ELSE
         LET v_valortotal = v_valortotal + v_valorregi;
      END IF;
   END FOREACH;   
      
     SELECT SUM(md.valor_concepto) INTO v_valorcon 
     FROM movimiento mv, movimiento_detalle md
      WHERE mv.fecha_operacion = p_fecha
      AND (p_codcompa ='03' AND (mv.codtp_comprobante ='42' and md.codconcepto='902'))
      AND mv.codsucursal = p_sucursal
      AND fc_retcompania(mv.codtp_comprobante) = p_codcompa
      AND NVL(md.aplica_valor,'S') = 'S'
      AND mv.estado = 'A'
      AND mv.consecutivo = md.consec_mast;    
    
   END IF;
 RETURN v_codsucurs, v_fecha, v_valorcon, v_valortotal, v_compania;

END FUNCTION;</pre>";



//var_dump($arreglo);


$vista->asignarVariable("titulo", "Prueba");
$vista->asignarVariable("arreglo", $arreglo);
$vista->dibujar();
?>

