<?php	
	//echo $menuestilomenu."--incabeceramenu.php---";exit;
 	switch ($menuestilomenu) {
	 case "1":	 //Menu Clasico 
		 include_once( $_SERVER['DOCUMENT_ROOT'].'/menus/menu_clasico/menu_clasico.php');	   
		 break;
	 case "2": // Zetta Menu
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/zetta_menu/zetta_menu.php');			
		  break;
	 case "3": // Menu Duramenu
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/menu_duramenu/menu_duramenu.php');			
		  break;		
	 case "4": // menu_estilo_04
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/menu_estilo_04/menu_estilo_04.php');			
		  break;
	 case "5": // menu_estilo_04
		  include_once($_SERVER['DOCUMENT_ROOT'].'/menus/menu_estilo_05/menu_estilo_05.php');			
		  break;	  			  	  		
	}	
?>