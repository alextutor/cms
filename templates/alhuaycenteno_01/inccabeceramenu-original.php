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
	
	$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.cestseccion='1'  ORDER BY s.cordcontenido";
	$resmenucab = db_query($sqlmenucab);
	$nromenucab = db_num_rows($resmenucab);
	//------------------------1 nivel----------------------
	while ($rowmenucab = db_fetch_array($resmenucab)) 
		{
			$i= $i+1;
			if ($i==1) echo "<ul id='cabmenu'>\n";
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
			echo "<ul>";
			$sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  cestseccion='1' ORDER BY  cordcontenido ASC";
			$resmenucab2 = db_query($sqlmenucab2);
			$nromenucab2 = db_num_rows($resmenucab2);
		//------------------------2 nivel----------------------
			while ($rowmenucab2 = db_fetch_array($resmenucab2)) 
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
				echo "<li ><a href='".$enlacecab2."'>".$rowmenucab2[cnomseccion]."</a>";
				echo "<ul >";
				$sqlmenucab3 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=3 and  cestseccion='1' ORDER BY cordcontenido ASC   ";
				$resmenucab3 = db_query($sqlmenucab3);
				$nromenucab3 = db_num_rows($resmenucab3);
				//------------------------3 nivel----------------------
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
					echo "<li><a href='".$enlacecab3."'>".$rowmenucab3[cnomseccion]."</a>";
					echo "<ul >";
					$sqlmenucab4 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s3."%'  and cnivseccion=4 and  cestseccion='1' ORDER BY  seccion.cordcontenido ";
					$resmenucab4 = db_query($sqlmenucab4);
					$nromenucab4 = db_num_rows($resmenucab4);
					while ($rowmenucab4 = db_fetch_array($resmenucab4)) 
					{
						$tipo4 = $rowmenucab4['ctipseccion'];
						switch($tipo4)
						{
						case 1:
							$enlacecab4 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3['camiseccion']."/".$rowmenucab4['camiseccion'];
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