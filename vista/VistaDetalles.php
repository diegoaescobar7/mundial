<?php

class VistaDetalles extends VistaBase {

    function VistaDetalles() {

    }

    function dibujar() {
        ?>
        
     <div style="text-align: center"> <h1>VENCIMIENTO PROVEEDORES DETALLADO COMPLETO FACTURAS</h1></div>
   
     <div align="center">
            
        <div id="detallesAjax" align="center">
            
            <script>
                var opts = {
                    lines: 13, // The number of lines to draw
                    length: 20, // The length of each line
                    width: 10, // The line thickness
                    radius: 30, // The radius of the inner circle
                    corners: 1, // Corner roundness (0..1)
                    rotate: 0, // The rotation offset
                    direction: 1, // 1: clockwise, -1: counterclockwise
                    color: '#000', // #rgb or #rrggbb or array of colors
                    speed: 1, // Rounds per second
                    trail: 60, // Afterglow percentage
                    shadow: false, // Whether to render a shadow
                    hwaccel: false, // Whether to use hardware acceleration
                    className: 'spinner', // The CSS class to assign to the spinner
                    zIndex: 2e9, // The z-index (defaults to 2000000000)
                    top: '200px', // Top position relative to parent in px
                    left: '50%' // Left position relative to parent in px
                };
                var target = document.getElementById('detallesAjax');
                var spinner = new Spinner(opts).spin(target);
                detallesAjax();
            </script>
        </div></div>
     <? crearTabla1($this->arreglo); ?>
  <?php

  }

}
?>

