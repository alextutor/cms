<!---------------- Inicio Menu 3Nivel drop_right Por Marca de Motor ----------------------> 
			   <?php 	
			   //echo $rowmenucab['cnomseccion']."FFFFFFFFFFFFFFFFF"	;	  
			  // Alex recuerda cuando cambies de nommbre al 1nivel tambien cambiarle  el nombre en el  case puedes evitar esto si en el switch lo valides
			  // por ccodseccion 
			  //Alex el ancho lo ves en alex-resumen-uso-menu_duramenu.docx
               switch($rowmenucab['cnomseccion'])
				{
				case "Repuestos por Marca de Motor":
				?>
				   <div class="container-fluid dropdown-menu-shopping dropdown-menu-2col"> 				               
			   <?php   
			    $i3_2=0;           
               	$sqlmenucab3_2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC   ";				
				$resmenucab3_2 = db_query($sqlmenucab3_2);
				$nromenucab3_2 = db_num_rows($resmenucab3_2);
				//echo $sqlmenucab3_2 ."<br/> Nro registros: ". $nromenucab3_2 ; exit;
				?>
				<?php if ($nromenucab3_2>0){?> <div class="row">	  <?php } ?>  <!-- Fin SI -->     
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
						//antes era a nivel de seccion ahora es a nivel de web en tabla estilopagina	
					//if ($mostrarurlcatebase=="NO"){
						if ($_SESSION['mostrarurlcatebase']	=="NO"){		
							$enlacecab3_2 = "/".$rowmenucab3_2['camiseccion'];							
						}   	  	
						break;
					case 2:
						$enlacecab3_2 = $rowmenucab3_2['curlseccion'];
						break;
					}
					//echo "<li><a href='".$enlacecab3."'>".$rowmenucab3[cnomseccion]."</a>";
				 ?> 
                 	 <!--
                     alex recuerda el ancho de col-lg-6 col-md-6 col-sm-6  verlo en  alex-resumen-uso-menu_duramenu.docx
					<h3><a href='<?=$enlacecab3_2?>'><?=$rowmenucab3_2['cnomseccion']?></a></h3>  -->                
                    <a href='<?=$enlacecab3_2?>'>                    	
                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                     
                      	<h3><?=$rowmenucab3_2['cnomseccion']?></h3>
                      <!--
                      <ul>
                        <li><a href="#">Caps</a></li>
                        <li><a href="#">Socks</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Suits &amp; Blazer</a></li>
                        <li><a href="#">Sweaters</a></li>
                      </ul>
                       -->
                      </div>
                   </a> 
                                    
				<?php
				} //Fin  while  3er  Menu drop_right               
			   ?>
               <?php if ($nromenucab3_2>0){ ?> </div> <?php } ?>            
                  
            </div> <!-- Fin Contenedor 3Nivel -->
           	<?php
            	break;
				}
			?>	
 <!---------------- Fin Menu 3Nivel drop_right Por Marca de Motor ---------------------->     