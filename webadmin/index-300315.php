<?Php  session_start();	
	$_SESSION['option']=$_GET["option"];
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	$id=$_GET['id'];			
?>
<?php if ($_SESSION['permitido'] == "SI") {
			switch ($_SESSION['option']) {
			 case "pantallaprincipal": 
			 	include_once ( $INC_DIR . '/webadmin/pantalla-principal.php'); 
				 break;				 
			case "com_articulos": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-articulos.php'); 
				 break;	
			case "com_articulos_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-articulo.php'); 
				 break;				
			case "com_articulos_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-articulo.php'); 
				 break;				 
			case "com_categoria": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-seccion.php'); 
				 break;	
			case "com_seccion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-seccion.php'); 
				 break;				
			case "com_seccion_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-seccion.php'); 
				 break;	 				 				 	 	 				 					 	 							 			case "com_sub_seccion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-subseccion.php'); 
				 break;						 
			 case "com_menus": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu.php'); 
				 break;
			 case "com_menus_new": 
				include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-Menu.php'); 
				 break;
			 case "com_menus_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-actualiza-menu.php'); 
				 break;					 	 			 	 				
			 case "com_menus_elemen": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu-elementos.php'); 
				 break;
			 case "com_menus_elemen_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu-elementos.php'); 
				 break;		
			 case "com_presentacion": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-presentacion.php'); 
				 break;				
			  case "com_presentacion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-presentacion.php'); 
				 break;	
			 case "com_presentacion_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-Presentacion.php'); 
				 break;	
			 case "com_agencia": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-agencia.php'); 
				 break;				
			  case "com_agencia_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-agencia.php'); 
				 break;	
			 case "com_agencia_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-agencia.php'); 
				 break;		 
			 case "com_empresa": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-empresa.php'); 
				 break;				
			  case "com_empresa_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-empresa.php'); 
				 break;	
			 case "com_empresa_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-empresa.php'); 
				 break;
			 case "com_estilos_web": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-estilos-web.php'); 
				 break;	
			  case "com_estilos_web_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-estilos-web.php'); 
				 break;		 		 		
			 case "com_estilos_web_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-estilos-web.php'); 
				 break;		
			case "com_usuario": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-usuarios.php'); 
				 break;	
			case "com_usuario_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-usuarios.php'); 
				 break;				
			case "com_usuario_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-usuarios.php'); 
				 break;				 	 				 			 	 	 
			 case "com_videos": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-videos.php'); 
				 break;				
			  case "com_videos_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-videos.php'); 
				 break;	
			 case "com_videos_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-videos.php'); 
				 break;		 	 
			 }	 			 			 			 	  		  	
		  }		  
  ?>                