<?php


class VistaDetalle extends VistaBase {

    function VistaDetalle() {

    }

    function dibujar() {
        ?>
        <div style="text-align: center"> <h1>Sucursal: <? print $this->nombre; ?></h1></div> 
       <div style="text-align: center"> <h1>Cod: <? print $this->codsucursal; ?></h1></div>
          
           <div style="text-align: center"> <h1>Traslados <? print $this->mes; ?></h1></div>
              
           
           <? crearTabla1($this->arreglo); ?>  
           
             <?php

  }

}
?>

