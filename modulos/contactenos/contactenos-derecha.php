<div class="der-container">
    	<h2><?php echo $webtitu ?></h2>
        <div class="contenido">
            <ul class="lists">
                <li class="mail"><span class="icon"></span>Responsable:   <br/>
                    <a href="mailto:<?php echo $emailcontacto ?>"><?php echo $emailcontacto ?></a>
                </li>
            </ul>
             <ul class="lists">  
                <li class="iphone"><span class="icon"></span>
                    <?php
					if ($ctelefonosec !="") {	
						$xxctelefonosec= "  /  ". $ctelefonosec ;
					 }
					 echo $ctelefonopri . $xxctelefonosec
					?>  
                    
                </li> 
                <?php if ($tmovil1 !="") {	?>
                <li class="iphone"><span class="icon"></span>
                    <?php echo $tmovil1 ?>  
                </li>
                <?php } ?>   
                <?php if ($tmovil2 !="") {	?>
                <li class="iphone"><span class="icon"></span>
                    <?php echo $tmovil2 ?>  
                </li>
                <?php } ?>
                <?php if ($tmovil3 !="") {	?>
                <li class="iphone"><span class="icon"></span>
                    <?php echo $tmovil3 ?>  
                </li>
                <?php } ?>               
            </ul>        
            <h4><?php echo $cdistrito."  -  ". $cprovincia ?></h4>
            <ul class="lists">
                <li class="location"><span class="icon"></span>
                    <?php echo $cdirecempresa ?>  
                </li>
                 <?php if (trim($chorarioatencion) !="" ) {	?>
                  <li class="chart"><span class="icon"></span>
                  	<?php echo $chorarioatencion ?> 					 
                  </li> 
                 <?php } ?>    
			 </ul> 
             <!-- Inicio para direccion 2 -->
             <?php if (trim($cdirecempresa2)!="") {	?>
             <h4><?php echo $cdistrito2."  -  ". $cprovincia2 ?></h4>
             <ul class="lists">
                <li class="location"><span class="icon"></span>
                    <?php echo $cdirecempresa2 ?>  
                </li>                
			 </ul> 
              <?php } ?>
            <!-- Fin  para direccion 2 -->           
             
        </div>
</div>
<div style="clear:both"></div>