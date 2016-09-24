<div class="cont_pie_gest">
  <div class="conizq">
     <p><span class="titupie"><?php echo $webtitu  ?></span></p>
  </div>
  <div class="condere">
	<?php if ($a > $b) { ?> 	
    <div class="menuabajo">
          <?php  include_once ($_SERVER['DOCUMENT_ROOT']. '/incpiemenu.php');  ?> 
    </div>
    <?php } ?> 	
    
    <div class="direccion">
      <?php echo $cdirecempresa ?><br />
      <?php echo $cdistrito ."  -  ". $cprovincia ?>
    </div>        
    <div class="contacto">
      <?php echo $ccontactopie; //definido en index?>
    </div>
    <div class="contador">
      <?php //include_once($_SERVER['DOCUMENT_ROOT']. "/contador.php"); ?>	
  </div>
	 <?php if ($a > $b) { ?> 
          <div class="cont_contycopry">
              <div class="Copyright">
               <a href="http://www.sisdatahost.com" target="new" >© Copyright 2014 - www.sisdatahost.com - Venta Hosting y Dominios <br />Diseño paginas web</a>
              </div>                       
           </div> 
      <?php } ?>                
 </div>    		
</div>