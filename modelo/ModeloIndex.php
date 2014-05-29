<?php

class ModeloIndex extends ModeloBase {
function getCuadre($anio, $mes) {
    
    $sql ="select trunc(codsucursal) as codsucursal, fc_desc_sucursal(codsucursal) as nombre,regionales.codigo, (regionales.nombre) as regional ,codtp_comprobante, movimiento_detalle.codconcepto, sum(valor_recaudo) as valor_recaudo, month(fecha_operacion) as mes,
 day(fecha_operacion) as dia, year (fecha_operacion) as anio
from movimiento, movimiento_detalle, sucursales, regionales
where movimiento.numero_control=movimiento_detalle.control_detalle
and movimiento.codsucursal=sucursales.codigo
and sucursales.codregion=regionales.codigo
and codtp_comprobante = 42
and movimiento_detalle.codconcepto = 902
and year (fecha_operacion) = $anio
and month(fecha_operacion)= $mes
group by 1, 2, 3 , 4, 5, 6, 8,9, 10
order by 3 ,1, 6";
    $this->consultar($sql);
    
    }
    
    
    function getCuadreDetalle($codsucursal, $mes, $anio) {
    
    $sql ="select trunc(codsucursal) as codsucursal, fc_desc_sucursal(codsucursal) as nombre,regionales.codigo, (regionales.nombre) as regional ,codtp_comprobante, movimiento_detalle.codconcepto, sum(valor_recaudo) as valor_recaudo , month(fecha_operacion) as mes,
 day(fecha_operacion) as dia, year (fecha_operacion) as anio
from movimiento, movimiento_detalle, sucursales, regionales
where movimiento.numero_control=movimiento_detalle.control_detalle
and movimiento.codsucursal=sucursales.codigo
and sucursales.codregion=regionales.codigo
and codtp_comprobante = 42
and movimiento_detalle.codconcepto = 902
and codsucursal='$codsucursal'
and year (fecha_operacion) = $anio
and month(fecha_operacion)= $mes
group by 1, 2, 3 , 4, 5, 6, 8,9, 10
order by 3 ,1, 6, 9";
    $this->consultar($sql);
    
    }
    
     function getCuadreDia($codsucursal, $mes,$dia, $anio) {
    
    $sql ="select trunc(codsucursal) as codsucursal, fc_desc_sucursal(codsucursal) as nombre,regionales.codigo, (regionales.nombre) as regional ,codtp_comprobante, movimiento_detalle.codconcepto, sum(valor_recaudo) as valor_recaudo, month(fecha_operacion) as mes,
 day(fecha_operacion) as dia, year (fecha_operacion) as anio
from movimiento, movimiento_detalle, sucursales, regionales
where movimiento.numero_control=movimiento_detalle.control_detalle
and movimiento.codsucursal=sucursales.codigo
and sucursales.codregion=regionales.codigo
and codtp_comprobante = 42
and movimiento_detalle.codconcepto = 902
and codsucursal='$codsucursal'
and day (fecha_operacion) = $dia
and year (fecha_operacion) = $anio
and month(fecha_operacion)= $mes
group by 1, 2, 3 , 4, 5, 6, 8,9, 10
order by 3 ,1, 6, 9";
    $this->consultar($sql);
    
    }
    
    
      function getConcepto() {
    
    $sql ="select codconcepto, desconcepto from conceptos_mvto
where codconcepto = 902";
    $this->consultar($sql);
    
    }
    
       function getComprobante() {
    
    $sql ="select codtp_comprobante, destp_comprobante from tipos_comprobantes
where codcompania = '03'
and codtp_comprobante=42";
    $this->consultar($sql);
    
    }
  
}

?>
