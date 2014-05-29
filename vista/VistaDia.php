<?php

class VistaDia extends VistaBase {

    function VistaDia() {

    }

    function dibujar() {
        ?>
        
       <div style="text-align: center"> <h1>Sucursal: <? print $this->nombre; ?></h1></div> 
       <div style="text-align: center"> <h1>Cod: <? print $this->codsucursal; ?></h1></div>
          
           <div style="text-align: center"> <h1>Fecha: <? print $this->mes; ?> / <? print $this->dia; ?> / <? print $this->anio; ?></h1></div>
           
          
        
   <? crearTabla1($this->arreglo); ?>
        
  <?php

  }

}
?>

