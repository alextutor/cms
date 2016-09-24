<?php	
	//echo $menu_estilo."-----";exit;
 	switch ($menu_estilo) {
	  case "menu_estilo_01":		  
		 include_once($cRutaWeb.'/menu_estilo_01.php');	   
		 break;
	  case "menu_estilo_02":
		  include_once($cRutaWeb.'/menu_estilo_02.php');			
		  break;		
	}	
?>