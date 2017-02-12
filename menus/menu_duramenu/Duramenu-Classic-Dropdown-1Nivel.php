<!-- INICIO BOOTSTRAP CLASSIC DROPDOWN -->
<li class="dropdown">	<!------- Inicio 1Nivel  Menu Duramenu-Classic Dropdown ------>
  <!-- todo completo no funciona el enlace asi que lo recorte mas abajo
  <a href="<?=$enlacecab?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> -->
  <a href="<?=$enlacecab?>" class="class1Nivelenlace"> 
  <?=$rowmenucab['cnomseccion']?> <span class="caret"></span>
  </a>  
  	<!---------------- Inicio 2Nivel  Menu Duramenu-Classic Dropdown ---------------------->   
   <?php 
		$i1_CLASSIC=0;
    	$sqlmenucab1 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  estado='1' ORDER BY  cordcontenido ASC";
		//echo $sqlmenucab2 ;exit;
		$resmenucab1 = db_query($sqlmenucab1);
		$nromenucab1 = db_num_rows($resmenucab1);
	?>
      <ul class="dropdown-menu"> <!-- Inicio UL 2Nivel  -->
        <?php  
			while ($rowmenucab1 = db_fetch_array($resmenucab1)) //Inicio while 1 - 2Nivel
			{
				$s1 = substr($rowmenucab1['ccodseccion'],0,16);
				$tipo1 = $rowmenucab1['ctipseccion'];
				switch($tipo1)
				{
				case 1:
					$enlacecab1 = "/".$rowmenucab['camiseccion']."/".$rowmenucab1['camiseccion'];							
					//indica si mostara url de la categoria padre
					//if ($rowmenucab['mostrarurlcatebase']=="NO"){
						//$enlacecab2 = "/".$rowmenucab2['camiseccion'];							
					//}   					
					
					//antes era a nivel de seccion ahora es a nivel de web en tabla estilopagina	
					//if ($mostrarurlcatebase=="NO"){
					if ($_SESSION['mostrarurlcatebase']	=="NO"){		
						$enlacecab1 = "/".$rowmenucab1['camiseccion'];							
					}   										
					break;
				case 2:
					$enlacecab1 = $rowmenucab1['curlseccion'];
					break;
				}
		?>
        <!-- Alex falta implementar 3nivel dentro de estos Li pero cro que no lo permite este tipo de estilo no es como categorias -->
        <li><a href="<?=$enlacecab1?>"><?=$rowmenucab1['cnomseccion']?> </a><li>
        <?php		
			} //Fin while 1 - 2Nivel 	
 		?>	                                 		
      </ul> <!-- Fin UL 2Nivel  -->
    <!---------------- Fin 2Nivel Menu Duramenu-Classic Dropdown ---------------------->

</li>    <!------- Fin 1Nivel  Menu Duramenu-Classic Dropdown ------>

<!-- FIN BOOTSTRAP CLASSIC DROPDOWN -->	 