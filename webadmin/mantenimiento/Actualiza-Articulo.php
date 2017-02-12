<?Php session_start();
 //echo $iditem;exit;
//descripcin por contenido
//addslashes estaba en titulo,$resumen,$tags,$contenido
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
//-------	 
$option=$_GET["option"];
$cBuscaporidSeccion=$_GET["cBuscaporidSeccion"];
$cfiltro=$_GET["cfiltro"];
//$iditem=$_POST["id"];
//echo $iditem."rrr";exit;
?>
<?php    
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	
	include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	
 	         
  extract($_POST);
  
  $concatenamos = "";
	//foreach ($_POST as $campo => $valor){
           /* en la variable $concatenamos juntamos el campo y su valor */
     //   $concatenamos .= "$campo -> $valor.<br>";
   //}
 // echo $concatenamos ;exit;		 
				
  // $resumen=addslashes($resumen);
   
  $comenta = $_POST["comenta"] | 0; // para comentario 
  $cestcompartirredes = $_POST["cestcompartirredes"] | 0; // para compartir redes

   $paginacion=$_POST['paginacion']; 
   $inicioclases=date("Y-m-d",strtotime($inicioclases)); 
 
   
  $precio = ($precio=="") ? "00.0":$precio;
  $save_contenido= "UPDATE contenido 	SET
							codigo_curso= '" .$codigo_curso. "',
							duracion_curso= '" .$duracion_curso. "',
							inicioclases= '" .$inicioclases. "',
							modalidad_curso= '" .$modalidad_curso. "',												
							estado= '" .$estado. "',								
  							ccodmodulo= '" .$selectmodulo. "', 
						    precio    = '" .$precio. "', 
						    garantia    = '" .$garantia. "', 							
						    precio_oferta    = '" .$precio_oferta. "', 
							ccodcategoria    = '" .$selectcategoria. "', 
							ccodestcontenido = '" .$selectestilo. "', 
							cnomcontenido    = '" .$titulo . "', 
							camicontenido    = '" .$amigable. "', 
							crescontenido    = '" .$edi_resumen . "', 
							ctagcontenido    = '" .$tags. "', 
							cimgcontenido    = '" .$imagen. "',
							tamano_cimgcontenido = '" .$tamano_cimgcontenido. "',
							cordcontenido	 = '" .$orden. "',
							cestcomentario   = '" .$comenta. "', 
							cestcomenface   = '" .$cestcomenface. "', 
							cestcompartirredes = '" .$cestcompartirredes. "',
							articulosrelacionados = '" .$articulosrelacionados. "',
							dfeccontenido    = '" .fechaymd($idfecha). "', 
							ccodusuario      = '" .$_SESSION['id_usuario']. "',
							dfecmodifica     = now()
						WHERE ccodcontenido = '" . $id . "'";						
	//echo $save_contenido;exit;
	//db_query($save_contenido);
	$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Actualiza contenido");
	
	//aqui cambia descripcion es=  a  contenido
	//$save_detalle= "UPDATE contenidodetalle SET cdetcontenido='".addslashes($descripcion)."'WHERE ccodcontenido = '" . $id. "'";
	$save_detalle= "UPDATE contenidodetalle SET cdetcontenido='".addslashes($edi_contenido)."' WHERE ccodcontenido = '" . $id. "'";
	
	//db_query($save_detalle);
	$sqldetalle =mysql_query($save_detalle,$conexion) or die ("problema con Actualizar detalle");	
	
	db_query("DELETE FROM seccioncontenido where ccodpage ='".$selectpage."' and ccodcontenido = '".$id."' ");
	
	//$sqlsec = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$selectpage."' and cestseccion ='1' and ccodmodulo='1100' and ctipseccion='1' order by ccodseccion");
	
	//alex modifique ccodmodulo='1100'
	//$sqlsec = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$selectpage."' and cestseccion ='1' and ccodmodulo='".$selectmodulo."' and ctipseccion='1' order by ccodseccion");	
	
	//alex modifique ccodmodulo //aqui podemos ponerle una condicion si  es_producto que lo jale para no poner tantos ccodmodulo
	$sqlactuarti="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$selectpage."' and cestseccion ='1' and ccodmodulo='1100'or ccodmodulo='1200' or ccodmodulo='1300' and ctipseccion='1' order by ccodseccion";
	$sqlsec = db_query($sqlactuarti);	
	//echo $sqlactuarti;exit;
	
	while($rowsec = db_fetch_array($sqlsec)) 
	{		
		//$varcamp = "select".$rowsec['ccodseccion']; //alex
		//echo $varcamp ;exit;
		//$varcamp = ${'select'.$rowsec['ccodseccion']};    //alex
		//$varsecc = $juvame_form[$varcamp];//alex
		//if($varsecc)
		//echo ${'select'.$rowsec['ccodseccion']};exit;
		//if(${'select'.$rowsec['ccodseccion']})
		//if($varcamp)


	 //if(${'select'.$rowsec['ccodseccion']}=true)	
   	if(isset(${'select'.$rowsec['ccodseccion']}))
		{			
			$save_seccion="INSERT INTO seccioncontenido (ccodpage,ccodseccion, ccodcontenido ) values ('".$selectpage."','" . $rowsec['ccodseccion'] . "', '" . $id . "' )";
			//db_query($save_seccion);
			//echo $save_seccion."<br>";
			$sqlseccion =mysql_query($save_seccion,$conexion) or die ("problema con Actualizar seccion");
		}
	}//Fin While
	//exit;		
	
?>

<script language='JavaScript'>
	cBuscaporidSeccion = "<?=$cBuscaporidSeccion?>";
	cfiltro    = "<?=$cfiltro?>";
	page = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	cMensaje="El Articulo ha sido Actualizado correctamente";
	location.href= '/webadmin/index.php?option=com_articulos&mensaje='+cMensaje+'&cBuscaporidSeccion='
	+cBuscaporidSeccion+'&cfiltro='+cfiltro
</script> 	


