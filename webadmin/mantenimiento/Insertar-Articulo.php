<?php  session_start(); 
	//addslashes estaba en titulo,$resumen,$tags,$contenido
	//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------		
   $pagew=$_SESSION['selectpage'];
   $INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
   extract($_POST);
   $comenta = $_POST["comenta"] | 0; // para comentario 
   $cestcompartirredes = $_POST["cestcompartirredes"] | 0; // para compartir redes

   $inicioclases=date("Y-m-d",strtotime($inicioclases));
  // $modulo="1100";
   $modulo=$_SESSION['modulo'];  // lo define en index de webadmin
   //$stylo = "3";
   
   //$inicioclases=date("Y-m-d",strtotime($inicioclases));   
   include($_SERVER['DOCUMENT_ROOT']. '/webadmin/include/funciones.php');	   
   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	  

//echo $idexcel."sadasdas";exit;
$new_cod = $pagew.date('ymdHis').codigo_azar(4);
$save_contenido= "INSERT INTO contenido 
						(
						idexcel,
						codigo_curso,
						duracion_curso,
						inicioclases,
						modalidad_curso,	
						estado,					
						precio,
						garantia,
						precio_oferta,
						ccodcontenido,
						ccodpage,
						ccodcategoria,
						ccodmodulo,
						ccodestcontenido,
						cnomcontenido,
						camicontenido,
						crescontenido,
						ctagcontenido,
						cimgcontenido,
						tamano_cimgcontenido,
						cordcontenido,
						cestcontenido,
						ctipcontenido,
						curlcontenido,
						cestcomentario,
						cestcomenface,
						cestcompartirredes,
						articulosrelacionados,
						dfeccontenido,
						ccodusuario,
						dfecmodifica)
						values(
						'" .$idexcel. "',
						'" . $codigo_curso . "',
						'" . $duracion_curso . "',
						'" . $inicioclases . "',
						'" . $modalidad_curso . "',
						'" . $estado . "',						
						'" . $precio . "',
						'" . $garantia . "',
						'" . $precio_oferta . "',
						'" . $new_cod . "', 
						'" . $pagew . "', 
						'" . $selectcategoria. "',
						'" . $selectmodulo . "', 												
						'" . $selectestilo . "', 
						'" . $titulo . "', 
						'" . $amigable . "', 
						'" . $edi_resumen . "', 
						'" . $tags . "', 
						'" . $imagen . "',
						'" . $tamano_cimgcontenido . "', 
						'" . $orden . "', 
						'1',
						'1',
						'',				
						'".$comenta."',
						'".$comenta_facebook."',
						'".$cestcompartirredes."',
						'".$articulosrelacionados."',
						'" .fechaymd($idfecha). "', 
						'" .$_SESSION['id_usuario']. "',
						now()
						)";	
    //cestcomentario  = Habilitar Comentarios							
	//db_query($save_contenido);
	//echo $save_contenido;exit;
	
	$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Insertar contenido");	
	
	$save_detalle = "INSERT INTO contenidodetalle 
						(ccodcontenido,cdetcontenido)
						 values ('". $new_cod .  "',
						'" .addslashes($edi_contenido)."')";						
	$sqldetalle =mysql_query($save_detalle,$conexion) or die ("problema con Insertar detalle");	
		
	//$sqlsec = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$pagew."' and cestseccion ='1' and ccodmodulo='1100' and ctipseccion='1' order by ccodseccion");
	
	
	//alex modifique ccodmodulo='1100'
		//$sqlsec = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$pagew."' and cestseccion ='1' and ccodmodulo='".$selectmodulo."' and ctipseccion='1' order by ccodseccion");
	
	
	//alex modifique ccodmodulo='1100' or ccodmodulo='1200' 
		$sqlsec = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$pagew."' and cestseccion ='1' and ccodmodulo='1100' or  ccodmodulo='1200' and ctipseccion='1' order by ccodseccion");
	while($rowsec = db_fetch_array($sqlsec)) 
	
	 
	{		
		//$varcamp = "select".$rowsec['ccodseccion'];			
		//$varsecc = $juvame_form[$varcamp];
		//echo "<li><input type='checkbox' name='select".$row_seccion[ccodseccion]."' checked>".	
		
		if(${'select'.$rowsec['ccodseccion']})
		{
			/*$save_seccion="INSERT INTO seccioncontenido (ccodpage,ccodseccion, ccodcontenido ) values ('".$juvame_form['selectpage']."','" . $rowsec[ccodseccion] . "', '" . $new_cod . "' )";
			*/
			$save_seccion="INSERT INTO seccioncontenido (ccodpage,ccodseccion, ccodcontenido ) values ('".$pagew."','" . $rowsec['ccodseccion'] . "', '" . $new_cod . "' )";
			
			db_query($save_seccion);
		}
	}	
     
?>
<script language='JavaScript'>    
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/index.php?option=com_articulos&mensaje=El Articulo ha sido Ingresada correctamente' 
</script> 
