<?php
	include($_SERVER['DOCUMENT_ROOT']. '/webadmin/recoger-valores.php');
	//echo $menuestilomenu."-----------";exit;	
/***  Inicio Grabado de Ubicaciones de Menu 	*/
	$nivel = $selectnivel;	
	//echo $nivel."-----";exit;
	if ($nivel<=1) // solo esta aplicando a los padre no alos hijos
	{
	//	Ojo ver recoger-valores.php
	//$sqlmenuestilo = "select * from seccionestilomenu where ccodseccion='".$id."' and ccodestilomenu='".$ccodestilomenu."' and ctipparametro='".$menu_estilo."'  and cvalparametro='".$multidrop."'"; 	
	$sqlmenuestilo = "select * from seccionestilomenu where ccodseccion='".$id."' and ccodestilomenu='".$ccodestilomenu."' 
	and menuestilomenu='".$menuestilomenu."'"; 	
	//echo $sqlmenuestilo;exit;
		$rsmenuestilo = db_query($sqlmenuestilo);		
		$totalmenuestilo   = db_num_rows($rsmenuestilo);	
		//echo $totalmenuestilo;exit;
		if($totalmenuestilo==0)
			{				
			//echo "holaaaa";exit;
			$Insert_seccionestilomenu = "INSERT INTO seccionestilomenu (
			ccodseccion, 
			ccodestilomenu,		
			menuestilomenu,		
			multidrop,					
			cnombreestilomenu,					
			ccodpage) 
			VALUES (
			'".$id."',
			'".$ccodestilomenu."',
			'".$menuestilomenu."',			
			'".$multidrop."',
			'".$cNombreestilomenu."',
			'".$selectpage."'
			)";
			//echo $save2_query;exit;
			db_query($Insert_seccionestilomenu);					
			}
		 else
			{
			 //echo $row['ctipseccion']."icass";exit; 
			 // Vea recoger-valores.php
			// echo $multidrop."ssssss";exit;
			 $update_seccionestilomenu = "UPDATE seccionestilomenu SET
						ccodseccion   ='".$id."',											
						ccodestilomenu   ='".$ccodestilomenu."',	
						menuestilomenu   ='".$menuestilomenu."',
						multidrop    ='".$multidrop."',						
						cnombreestilomenu ='".$cNombreestilomenu."',						
						ccodpage   ='".$selectpage."' 									
					     WHERE ccodseccion='".$id."' and ccodestilomenu ='".$ccodestilomenu."' and menuestilomenu ='".$menuestilomenu.
						 "' and ccodpage='".$selectpage."'";	
						// echo $update_query;exit;
			  db_query($update_seccionestilomenu);					
			} // Fin  $totalmenuestilo==0
		}	// Fin $nivel				
/***  Fin  Grabado de Ubicaciones de Menu 	*/
?>