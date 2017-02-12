 <?php
 	//echo "hola";exit;
	if (empty($_GET['idsec']))	{ $seccionactiva ="inicio";	}
	else {	$seccionactiva = $_GET['idsec'];}
    $i=0;
		
	$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.multidrop,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.estado='1'  ORDER BY s.cordcontenido";
	//echo $sqlmenucab;exit;
	$resmenucab = db_query($sqlmenucab);
	$nromenucab = db_num_rows($resmenucab);
	//------------------------1 nivel----------------------
	
	while ($rowmenucab = db_fetch_array($resmenucab)) //Inicio while 1	
	{
	  $i= $i+1;
	  if ($i==1) { //si 1 
	  ?>
	  <ul class='zetta-menu zm-response-switch zm-full-width zm-effect-fade'> <!-- Inicio Ul Padre-->
		  <?php
          ;} // fin si 1
          $s1 = substr($rowmenucab['ccodseccion'],0,12);
          $tipo_cabseccion = $rowmenucab['ctipseccion'];
              switch($tipo_cabseccion) //Inicio switch 1
              { 
              case 1:
                  $enlacecab = "/".$rowmenucab['camiseccion'];
                  break;
              case 2:
                  $enlacecab = $rowmenucab['curlseccion'];
                  break;
              } //fin switch 2
          $estactiva="";
          if ($rowmenucab['camiseccion']==$seccionactiva){ $estactiva= " id='active'"; } //aqui termina si
          ?>
                    
<!---------------- Inicio Estilo Menu multidrop  ---------------------->
  <?php 
  //echo $rowmenucab['multidrop'];
  switch ($rowmenucab['multidrop']) {
	  case "multidrop":
	  	 ?>
          <!-- 1 Nivel multidrop -->
          <li class="zm-left-align">        
              <a href='<?=$enlacecab ?>' title='<?php $rowmenucab['cnomseccion'] ?>'>
                  <?=$rowmenucab['cnomseccion']?> 
              </a>	                           
              <!---------------- Inicio 2  Menu ---------------------->			
                <?php				
				$i2=0;
              $sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  estado='1' ORDER BY  cordcontenido ASC";
			  //echo $sqlmenucab2 ;exit;
			$resmenucab2 = db_query($sqlmenucab2);
			$nromenucab2 = db_num_rows($resmenucab2);
			  ?>
            <div class="zm-multi-column w-480">            
             <ul class="w-120">		<!-- Inicio Ul-1 2do menu multidrop  w-170-->					
              <?php  
			while ($rowmenucab2 = db_fetch_array($resmenucab2)) //Inicio while 2
			{
				$s2 = substr($rowmenucab2['ccodseccion'],0,16);
				$tipo2 = $rowmenucab2['ctipseccion'];
				switch($tipo2)
				{
				case 1:
					$enlacecab2 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion'];							
					//indica si mostara url de la categoria padre
					if ($rowmenucab['mostrarurlcatebase']=="NO"){
						$enlacecab2 = "/".$rowmenucab2['camiseccion'];							
					}   					
					break;
				case 2:
					$enlacecab2 = $rowmenucab2['curlseccion'];
					break;
				}
				if ($i2==5 or $i2==10 or $i2==15) {					
				?>
	                </ul>
                    <ul class="w-170">
                <?php } ?>
				<li><a href='<?php echo $enlacecab2?>'><?php echo $rowmenucab2['cnomseccion']?></a>  		
               <!-- 3er Menu version reducida de abajo
               		<ul class="w-200">
                      <li><a href="#">Level Two</a></li>
                      <li><a href="#">Level Two</a></li>                   
                    </ul>  
               -->        
               
               <!---------------- Inicio 3  Menu drop_right ---------------------->               
               <?php   
			    $i3_2=0;           
               	$sqlmenucab3_2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC   ";				
				$resmenucab3_2 = db_query($sqlmenucab3_2);
				$nromenucab3_2 = db_num_rows($resmenucab3_2);
				//echo $sqlmenucab3_2 ."<br/> Nro registros: ". $nromenucab3_2 ; exit;
				?>
				<?php if ($nromenucab3_2>0){?> <ul class="w-200">	  <?php } ?>  <!-- Fin SI -->     
                <?php					
				while ($rowmenucab3_2 = db_fetch_array($resmenucab3_2)) 
				{
					$i3_2= $i3_2+1;
					$s3 = substr($rowmenucab3_2['ccodseccion'],0,20);
					$tipo3_2 = $rowmenucab3_2['ctipseccion'];
					switch($tipo3_2)
					{
					case 1:
						$enlacecab3_2 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3_2['camiseccion'];
						break;
					case 2:
						$enlacecab3_2 = $rowmenucab3_2['curlseccion'];
						break;
					}
					//echo "<li><a href='".$enlacecab3."'>".$rowmenucab3[cnomseccion]."</a>";
				 ?> 
                 	 
					<li><a href='<?php echo $enlacecab3_2?>'><?php echo $rowmenucab3_2['cnomseccion']?></a></li>   
				<?php
				} //Fin  while  3er  Menu drop_right               
			   ?>
               <?php if ($nromenucab3_2>0){ ?> </ul> <?php } ?> 
     <!---------------- Fin    3er  Menu multi-column ----------------------------------->
     
     
             		          
               </li>     <!--  Fin LI 2 menu-->           
              <?php 
				$i2++;
				//echo "Nivel 2 = ".$rowmenucab2['cnomseccion'];
 		    } //Fin while 2
			?>	                     					
            </div>          
          <!---------------- Fin    2  Menu multidrop ---------------------->	              		
          </li> <!-- Fin LI Padre Menu 1 multidrop -->      
       <?php 
	   	   break;
		   case "simple":  
	   ?>            
            <li>        
              <a href="<?=$enlacecab?>" title="<?php $rowmenucab['cnomseccion'] ?>">
                  <?=$rowmenucab['cnomseccion'] ?> 
              </a>	
            </li> 
             
        <?php 	   		
          break;	   
		  
		  
		  case "drop_right":  
		 ?>  
         <li>
         <a href="<?=$enlacecab?>" title="<?php $rowmenucab['cnomseccion'] ?>">
			 <?=$rowmenucab['cnomseccion'] ?>
         	<i class="zm-caret fa fa-angle-down"></i>
         </a>
			<ul class="w-280"><!--Inicio UL  drop_right mostrar 2do nivel -->				
                   <!---------------- Inicio 2  Menu drop_right ---------------------->			
                <?php
				$i2=0;
              $sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  estado='1' ORDER BY  cordcontenido ASC";
			  //echo $sqlmenucab2 ;exit;
			$resmenucab2 = db_query($sqlmenucab2);
			$nromenucab2 = db_num_rows($resmenucab2);
			  ?>          				
              <?php  
			while ($rowmenucab2 = db_fetch_array($resmenucab2)) //Inicio while 2
			{
				$s2 = substr($rowmenucab2['ccodseccion'],0,16);
				$tipo2 = $rowmenucab2['ctipseccion'];
				switch($tipo2)
				{
				case 1:
					$enlacecab2 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion'];							
					//indica si mostara url de la categoria padre
					if ($rowmenucab['mostrarurlcatebase']=="NO"){
						$enlacecab2 = "/".$rowmenucab2['camiseccion'];							
					}   					
					break;
				case 2:
					$enlacecab2 = $rowmenucab2['curlseccion'];
					break;
				}				                
			  //  echo "<li><a href='".$enlacecab2."'>"."<i class='zm-caret fa fa-angle-right'></i>".$rowmenucab2['cnomseccion']."</a></li>";
			  ?>                  
   			  <li>
              <a href="<?=$enlacecab2?>"><i class='zm-caret fa fa-angle-right'></i><?=$rowmenucab2['cnomseccion']?>
               </a>
               
               <!---------------- Inicio 3  Menu drop_right ---------------------->               
               <?php              
               	$sqlmenucab3 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC   ";
				$resmenucab3 = db_query($sqlmenucab3);
				$nromenucab3 = db_num_rows($resmenucab3);
				?>
				<?php if ($nromenucab3>0){?> <ul class="w-200">	  <?php } ?>  <!-- Fin SI -->     
                <?php					
				while ($rowmenucab3 = db_fetch_array($resmenucab3)) 
				{
					$s3 = substr($rowmenucab3['ccodseccion'],0,20);
					$tipo3 = $rowmenucab3['ctipseccion'];
					switch($tipo3)
					{
					case 1:
						$enlacecab3 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3['camiseccion'];
						break;
					case 2:
						$enlacecab3 = $rowmenucab3['curlseccion'];
						break;
					}
					//echo "<li><a href='".$enlacecab3."'>".$rowmenucab3[cnomseccion]."</a>";
				 ?> 
                 	 
					<li><a href="<?=$enlacecab3?>"><?=$rowmenucab3[cnomseccion]?></a></li>
				<?php	
				} //Fin  while  3er  Menu drop_right               
			   ?>
               <?php if ($nromenucab3>0){ ?> </ul> <?php } ?> <!-- Fin SI -->
                 <!---------------- Fin    3er  Menu drop_right ---------------------->
                 
               </li>  <!--  Fin LI Padre Menu 2 drop_right --> 
               <?php            				
 		    } //Fin while 2
			?>	                     					                    
          <!---------------- Fin    2  Menu drop_right ---------------------->	                   
             </ul>   <!--Fin UL  drop_right mostrar 2do nivel -->				
         <li> <!--  Fin LI Padre Menu 1 drop_right -->    
                   
         <?php
	   } // Fin case 
       ?>   
        <?php if ($i==$nromenucab) { // /* Inicio si 2  ?></ul> <!-- Fin Ul Padre --><?php  } /* fin si 2 */  ?>
<?php 
//echo $enlacecab."<br>";
//echo $rowmenucab['cnomseccion'];
} /* fin while 1  */  ?>  