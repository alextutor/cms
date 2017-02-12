 <?php 
	if (empty($_GET['idsec']))
	{
		$seccionactiva ="inicio";
	}
	else
	{
		$seccionactiva = $_GET['idsec'];
	}
    $i=0;
	//echo $mostrarurlcatebase;exit;
	
	//$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.estado='1'  ORDER BY s.cordcontenido";
	
	//Muestra el Menu 1 Nivel mayuscula/minuscula
	if ($_SESSION['menu_1Nivel_Mayuscula_Minuscula']=='Mayuscula')	{ $cnombreMayMinu=" UPPER(s.cnomseccion) AS cnomseccion ";	}
	else {	$cnombreMayMinu=" (s.cnomseccion) AS cnomseccion ";}
	
	$sqlmenucab = "SELECT 
	s.ccodsecestilo , 
	s.ccodseccion ,". 
	$cnombreMayMinu .", 
	s.camiseccion, 
	s.curlseccion , 
	s.ctipseccion , 
	s.mostrarurlcatebase , 
	pm.cubimenu , 
	s.ccodpage , 
	s.cnivseccion , s.estado , sem.menuestilomenu , sem.ccodestilomenu , 
	sem.multidrop , s.cordcontenido FROM  seccion s   INNER JOIN seccionmenu  sm
	ON (s.ccodseccion = sm.ccodseccion) INNER JOIN seccionestilomenu sem 
	ON (s.ccodseccion = sem.ccodseccion) INNER JOIN pagemenu pm 
	ON (sm.ccodmenu = pm.ccodmenu) WHERE (pm.cubimenu =1 AND s.ccodpage=".$codpage."  
	 AND s.cnivseccion ='1' AND s.estado ='1' AND sem.menuestilomenu ='".$menuestilomenu."')
	  ORDER BY s.cordcontenido ASC";
	  //echo $sqlmenucab;exit;
	$resmenucab = db_query($sqlmenucab);
	$nromenucab = db_num_rows($resmenucab);
	//------------------------1 nivel----------------------	
	while ($rowmenucab = db_fetch_array($resmenucab)) 
		{
			$i= $i+1;
			if ($i==1) echo "<ul class='Nivel1'>\n";
			$s1 = substr($rowmenucab['ccodseccion'],0,12);
			$tipo_cabseccion = $rowmenucab['ctipseccion'];
			switch($tipo_cabseccion)
			{
			case 1:
				$enlacecab = "/".$rowmenucab['camiseccion'];
				break;
			case 2:
				$enlacecab = $rowmenucab['curlseccion'];
				break;
			}
			$estactiva="";
			if ($rowmenucab['camiseccion']==$seccionactiva) $estactiva= " id='active'";
			echo "<li ".$estactiva."><a href='".$enlacecab."' title='".$rowmenucab[cnomseccion]."' >".$rowmenucab[cnomseccion]."</a>";					
		
		  //------------------------2 nivel----------------------
		echo "<ul class='Nivel2'>";
			$sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  estado='1' ORDER BY  cordcontenido ASC";
			$resmenucab2 = db_query($sqlmenucab2);
			$nromenucab2 = db_num_rows($resmenucab2);
			
			while ($rowmenucab2 = db_fetch_array($resmenucab2)) 
			{
				$s2 = substr($rowmenucab2['ccodseccion'],0,16);
				$tipo2 = $rowmenucab2['ctipseccion'];
				switch($tipo2)
				{
				case 1:
					$enlacecab2 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion'];							
					//indica si mostara url de la categoria padre
					//if ($rowmenucab['mostrarurlcatebase']=="NO"){
						//$enlacecab2 = "/".$rowmenucab2['camiseccion'];							
					//}   
					
					//antes era a nivel de seccion ahora es a nivel de web en tabla estilopagina	
					//if ($mostrarurlcatebase=="NO"){
					if ($_SESSION['mostrarurlcatebase']	=="NO"){						
						$enlacecab2 = "/".$rowmenucab2['camiseccion'];							
					}   										
					break;
				case 2:
					$enlacecab2 = $rowmenucab2['curlseccion'];
					break;
				}							
				echo "<li><a href='".$enlacecab2."'>".$rowmenucab2[cnomseccion]."</a>";

				//------------------------3 nivel----------------------
				echo "<ul class='Nivel3'>";
				$sqlmenucab3 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC   ";
				$resmenucab3 = db_query($sqlmenucab3);
				$nromenucab3 = db_num_rows($resmenucab3);
				
				while ($rowmenucab3 = db_fetch_array($resmenucab3)) 
				{
					$s3 = substr($rowmenucab3['ccodseccion'],0,20);
					$tipo3 = $rowmenucab3['ctipseccion'];
					switch($tipo3)
					{
					case 1:
						$enlacecab3 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3['camiseccion'];
						//antes era a nivel de seccion ahora es a nivel de web en tabla estilopagina	
						if ($mostrarurlcatebase=="NO"){
							$enlacecab3 = "/".$rowmenucab3['camiseccion'];							
						}  
					//antes era a nivel de seccion ahora es a nivel de web en tabla estilopagina	
					//if ($mostrarurlcatebase=="NO"){
					if ($_SESSION['mostrarurlcatebase']	=="NO"){						
						$enlacecab3 = "/".$rowmenucab3['camiseccion'];							
					}   										 	
						break;
					case 2:
						$enlacecab3 = $rowmenucab3['curlseccion'];
						break;
					}
					echo "<li><a href='".$enlacecab3."'>".$rowmenucab3[cnomseccion]."</a>";
					echo "<ul class='Nivel4'>";
					$sqlmenucab4 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s3."%'  and cnivseccion=4 and  estado='1' ORDER BY  seccion.cordcontenido ";
					$resmenucab4 = db_query($sqlmenucab4);
					$nromenucab4 = db_num_rows($resmenucab4);
					while ($rowmenucab4 = db_fetch_array($resmenucab4)) 
					{
						$tipo4 = $rowmenucab4['ctipseccion'];
						switch($tipo4)
						{
						case 1:
							$enlacecab4 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3['camiseccion']."/".$rowmenucab4['camiseccion'];
							//antes era a nivel de seccion ahora es a nivel de web en tabla estilopagina	
							if ($mostrarurlcatebase=="NO"){
								$enlacecab4 = "/".$rowmenucab4['camiseccion'];							
							}   	
							break;
						case 2:
							$enlacecab4 = $rowmenucab4['curlseccion'];
							break;
						}
						echo "<li><a href='".$enlacecab4."'>".$rowmenucab4[cnomseccion]."</a></li>\n";
					}
					echo "</ul>\n";
					echo "</li>\n";
				}
				echo "</ul>\n";
				echo "</li>\n";
			}
			echo "</ul>\n";
			echo "</li>\n";
			if ($i==$nromenucab) echo "</ul>\n";
		}
?>
<!--http://miiquel.com/tutorial/crear-un-menu-responsive-basico/-->
