<?Php session_start();
   extract($_GET);
   //-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 	
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/webadmin/header.php');
	 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	         
//submenu  principal=cabecera,pie,etc  1nivel=es el menu inicio,quienes somos,servicios  2nivel=debajo de servicios						
	switch ($submenu){
		case "principal":
		 $sql2= 
		 "UPDATE pagemenu SET  
		  cnommenu='" . $cnombreMenu. "',  							
		  cubimenu = '" . $cubimenu. "' 													 								
		  where ccodmenu ='".$id."'";	 	
		  if ($despublicar=='1'){
			$save3_query = "DELETE FROM pagemenu where ccodmenu= '".$id."' and  ccodpage='".$_SESSION['page']."'";			
			mysql_query($save3_query);	
	 	  }
			break;
		case "1nivel":
			$sql2 = "UPDATE seccion SET cordcontenido='$cordmenu' WHERE ccodseccion='".$id."'" ;  		
			if ($despublicar=='1')
			{
				$save3_query = "DELETE FROM seccionmenu where ccodseccion= '".$id."' and  ccodmenu='".$ccodmenu."'";
				mysql_query($save3_query);	
			}	
			break;
		case "2nivel":
				//falta completar alex
			break;
		
	}  

if ($submenu=="SI")   {
	
}else{ //borrar esto arriba esto lo deje porque falta nivel2
	//$sql2 = "UPDATE seccionmenu SET cordmenu='$cordmenu' WHERE ccodseccion='$id' and ccodmenu='$ccodmenu'" ;  
 }	
// echo  $sql2,exit;

if(mysql_query($sql2)){ 
		//   $mensaje = "Se ha actualizado el articulo ".$name." correctamente";          
	?>
    <script language='JavaScript'>    
		page = "<?=$paginacion?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_menus&mensaje=El Menú ha sido guardada correctamente'
	</script> 	
	<?php    	
}else {
	 $mensaje = "Ha ocurrido un error al actualizar el articulo, prueba mas tarde";          
	 echo $mensaje;
}   
?>

