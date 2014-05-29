<?php
 

class VistaIndex extends VistaBase {

    function VistaIndex() {
        
    }

    function dibujar() {
        ?>
        <div style="text-align: center"> <h1>CUADRE TRASLADOS</h1></div>
        <div style="text-align: center">
         
            
          
          <form action="." method="post">
              <label><B>FECHA:</B></label>
              <input name="fecha" id ="fechaDate" type="text" class="calendario"/>
          
             <button id="botos">Consultar</button>
           </form> 
          
                 </div>
        
        <br>
                <br>
                               
        
        <div align="center">
            
           
                
                

                
                
            </div></div>
        

        <? crearTabla1($this->arreglo); ?>
        
         <?php
    }

}


?>

