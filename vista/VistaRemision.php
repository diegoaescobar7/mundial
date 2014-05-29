<?php

class VistaRemision extends VistaBase {

    function VistaRemision() {

    }

    function dibujar() {
        ?>
        
       <div style="text-align: center"> <h2><? print $this->nombre; ?></h2></div>
           
           <div style="text-align: center"> <h2>NIT: <? print $this->nit; ?></h2></div>
           
           <div style="text-align: center"> <h2>REMISION Nro: <? print $this->nrofac; ?></h2></div>
           
           <div style="text-align: center"> <h2>SUCURSAL: <? print $this->sucursalr; ?></h2></div>
           
           <div style="text-align: center"> <h2>FECHA: <? print $this->fecha; ?></h2></div>
        
   <? crearTabla1($this->arreglo); ?>
       
           <br>
          
            <button id="mauro"onclick="return reporteRemision('<?echo $this->nombre;?>',<?echo $this->nit;?>,'<?echo $this->nrofac;?>' ,'<?echo $this->sucursalr;?>','<?echo $this->fecha;?>');">Imprimir</button>    
            
  <?php

  }

}
?>

