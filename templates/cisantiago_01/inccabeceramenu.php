<?php	
	//echo $menu_estilo."-----";exit;
 	switch ($menu_estilo) {
	 case "1":	 //menu_estilo_01	  
		 include_once( $_SERVER['DOCUMENT_ROOT'].'/menus/menu_estilo_01/menu_estilo_01.php');	   
		 break;
	 case "2": // menu_estilo_02
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/menu_estilo_02/menu_estilo_02.php');			
		  break;
	 case "3": // menu_estilo_03
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/menu_estilo_03/menu_estilo_03.php');			
		  break;		
	 case "4": // menu_estilo_04
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/menu_estilo_04/menu_estilo_04.php');			
		  break;
	 case "5": // menu_estilo_04
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/menu_estilo_05/menu_estilo_05.php');			
		  break;	  			  	  		
	}	
?>