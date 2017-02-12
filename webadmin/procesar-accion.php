<?php session_start();
	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/rutinas/conexion.php');
	//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------		
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	

extract($_POST); 
$task=$_POST['task'];
//$option=$_POST['option'];
$id=$_POST['cid'];
//echo $id[0]."---";exit;
$codigoid = strstr($id[0], '&', true); // Desde PHP 5.3.0
//echo "id=".$codigoid."---task=". $task ."---option=".$option ."--Codigoid=".$codigoid;exit;
$pagina=$_POST['pagina'];

//echo $id[0];exit;

//---------------------------------------Inicio Buscar-------------------------
$buscar=$_POST['filter_search'];//cuando hago boton buscar
if ($buscar<>"" and $task==""){
	switch ($pagina){
    case "com_articulos":
	//echo $task	;exit;
?>
	<script language='JavaScript'> 
        cfiltro= "<?=$buscar?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_articulos&cfiltro='+cfiltro
    </script>
<?php			
	 break;   
	} 
	exit;		
}
//---------------------------------------Fin Buscar-------------------------
//$id[0]   a sido sustituido por codigoid
switch ($task){
    case "com_categories_editar":	
	?>
	<script language='JavaScript'> 
        id= "<?=$codigoid?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_categories_editar&id='+id
    </script>
	<?php		
	break;
	case "com_usuario_editar":	
	?>
	<script language='JavaScript'> 
        id= "<?=$codigoid?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_usuario_editar&id='+id
    </script>
	<?php		
	break;
	case "com_sub_categories_editar":
	?>
	<script language='JavaScript'> 
		id= "<?=$codigoid?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_sub_categories_editar&id='+id
	</script>
<?php
	break;
	 case "com_menus_editar":
?>
	<script language='JavaScript'> 
        id= "<?=$codigoid?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_menus_editar&id='+id
    </script> 
<?php	
	break;
	case "com_cursos_editar":			
	?>
	<script language='JavaScript'> 
		id= "<?=$codigoid?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_cursos_editar&id='+id
	</script>       
  <?php
	break;
	case "com_articulos_editar":
		//echo "com_articulos_editar";exit;
		//echo $codigoid;exit;
	?>
	<script language='JavaScript'> 
		id= "<?=$codigoid?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_articulos_editar&id='+id
	</script>
  <?php
	break;
	case "com_fotos_insertar":
	?>
	<script language='JavaScript'> 
		id= "<?=$codigoid?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_fotos_insertar&id='+id
	</script>   
 <?php
  break;
  case "com_presentacion_editar":
  ?>
  <script language='JavaScript'> 
      id= "<?=$codigoid?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_presentacion_editar&id='+id
  </script>   
    <?php
  break;
  case "com_agencia_editar":
  ?>
  <script language='JavaScript'> 
      id= "<?=$codigoid?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_agencia_editar&id='+id
  </script>         
  
  <?php
  break;
  case "com_seccion_condominio_editar":
  ?>
  <script language='JavaScript'> 
      id= "<?=$codigoid?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_seccion_condominio_editar&id='+id
  </script>   
    <?php
  break;
  case "com_agencia_editar":
  ?>
  <script language='JavaScript'> 
      id= "<?=$codigoid?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_agencia_editar&id='+id
  </script>         
       
<?php
	break;
	 case "com_menus_eliminar":
		 $xmenu=0;
   		foreach ($_POST['cid'] as $id){ 
			$codigoid = strstr($id, '&', true); 
			$sSQL = "UPDATE menu SET estado='-2' WHERE idmenu=$codigoid" ; 
			mysql_query($sSQL); 
			++$xmenu;			
		}
?>
	<script language='JavaScript'> 
        id= "<?=$codigoid?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
		xmenu= "<?=$xmenu?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_menus&mensaje='+xmenu+' tipos de menú han sido borrados correctamente'
    </script>    
        
<?php								
        break;
    case "com_categories_eliminar":		
   		foreach ($_POST['cid'] as $id){
			$codigoid = strstr($id, '&', true); 		 
			$sSQL = "UPDATE categoria SET estado='-2' WHERE idcategoria=$codigoid" ; 
			mysql_query($sSQL);			 			
		}
?>
	<script language='JavaScript'> 
        page= "<?=$NOMBREEMPRESA?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_categories&mensaje=Registro Eliminado' 
    </script>  
    
<?php								
        break;		
    case "com_sub_categories_eliminar":		
   		foreach ($_POST['cid'] as $id){ 
			$codigoid = strstr($id, '&', true); 				
			$sSQL = "UPDATE subcategoria SET estado='-2' WHERE idsubcategoria=$codigoid" ; 
			mysql_query($sSQL);			 			
		}
?>
	<script language='JavaScript'> 
        page= "<?=$NOMBREEMPRESA?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_sub_categories&mensaje=Registro Eliminado' 
    </script>  
        
<?php								
        break;
    case "com_articulos_eliminar":				
   		foreach ($_POST['cid'] as $id){ 			
			//echo $id."dfasdfsd";exit;
			//$sSQL = "UPDATE productos SET estado='-2' WHERE idproductos=$id" ; 			
			//mysql_query($sSQL);	
			//UPDATE seccioncontenido SET estado='-2' where ccodcontenido = '1217280915091201582176BS&cBuscaporidSeccion=&cfiltro='		 						
			$codigoid = strstr($id, '&', true);			
			mysql_query("UPDATE seccioncontenido SET estado='-2' where ccodcontenido = '".$codigoid. "'");
			mysql_query("UPDATE contenidogaleria SET estado='-2' where ccodcontenido = '".$codigoid. "'");
			mysql_query("UPDATE contenidoopinion SET estado='-2' where ccodcontenido = '".$codigoid. "'");
			mysql_query("UPDATE contenidodetalle SET estado='-2' where ccodcontenido = '".$codigoid. "'");
			mysql_query("UPDATE contenido 		  SET estado='-2' where ccodcontenido = '".$codigoid."'");
			//echo $dd."---";exit;
		}
?>
	<script language='JavaScript'> 
        page= "<?=$NOMBREEMPRESA?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_articulos&mensaje=Registro Eliminado' 
    </script>  	
<?php								
        break;
    case "com_cursos_eliminar":		
   		foreach ($_POST['cid'] as $id){
			$codigoid = strstr($id, '&', true); 			
			$sSQL = "UPDATE cursos SET estado='-2' WHERE id_curso=$codigoid" ; 
			mysql_query($sSQL);			 			
		}
?>

<?php								
    break;
    case "com_presentacion_eliminar":				
   		foreach ($_POST['cid'] as $id){ 
			$codigoid = strstr($id, '&', true); 					
			db_query("UPDATE pagehome SET estado='-2' where ccodinicio = '".$codigoid."'");
			db_query("UPDATE pagehome SET cesthome='-2' where ccodinicio = '".$codigoid."'");
			db_query("UPDATE pagehomedet SET estado='-2' where ccodinicio = '".$codigoid."'");
		}
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_presentacion&mensaje=Registro Eliminado' 
  </script>

<?php								
    break;
    case "com_seccion_eliminar":			
   		foreach ($_POST['cid'] as $id){ 			
			//$sSQL = "UPDATE seccion SET estado='-2' WHERE ccodseccion=$id" ; 			
			//mysql_query($sSQL);	
			$codigoid = strstr($id, '&', true); 
			//echo $codigoid."---";exit;				 						
			db_query("UPDATE seccioncontenido SET estado='-2' where ccodseccion = '".$codigoid."'");
			db_query("UPDATE secciondetalle SET estado='-2' where ccodseccion = '".$codigoid."'");
			db_query("UPDATE seccionmenu SET estado='-2' where ccodseccion = '".$codigoid."'");
			db_query("UPDATE seccion SET estado='-2' WHERE ccodseccion = '".$codigoid. "'");			
		}	
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_categoria&mensaje=Registro Eliminado' 
  </script>  	
  
 <?php								
    break;
    case "com_agencia_eliminar":		
   		foreach ($_POST['cid'] as $id){ 						
			//$sSQL = "DELETE FROM pagesucursal WHERE ccodsucursal ccodsucursal=$id" ; 
			//mysql_query($sSQL); 		
			$codigoid = strstr($id, '&', true); 					 						
			db_query("UPDATE pagesucursal estado='-2'  WHERE ccodsucursal='".$codigoid."'");
		}	
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_agencia&mensaje=Registro Eliminado' 
  </script>  	
 
 <?php								
    break;
    case "com_empresa_eliminar":		
   		foreach ($_POST['cid'] as $id){ 
			$codigoid = strstr($id, '&', true); 					 												
			$sSQL = "UPDATE page SET estado='-2 WHERE ccodpage='".$codigoid."'"; 
			mysql_query($sSQL); 					 						
			//db_query("UPDATE page SET estado='-2 WHERE ccodpage='".$id."'");
		}	
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_empresa&mensaje=Registro Eliminado' 
  </script>  	

 <?php								
    break;
    case "com_menu_eliminar":		
   		foreach ($_POST['cid'] as $id){
			$codigoid = strstr($id, '&', true); 						
			$sSQL = "UPDATE pagemenu SET estado='-2' WHERE ccodmenu=$codigoid" ; 
			mysql_query($sSQL); 			
			//rest = substr("abcdef", -1);    // devuelve "f"
			//substr("abcdef", 0, -1); // devuelve "abcde" 
			
			//$ccodmenu=substr($id,-1);					 						
			//$id=substr($id,0,-1);
			//db_query("DELETE FROM seccionmenu WHERE ccodseccion='".$id."' and ccodmenu='".$ccodmenu. "'");
		}	
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_menus&mensaje=Registro Eliminado' 
  </script>  	  
<?php								
    break;	
	//este caso es particular porque esta haciendo nuevo pero como editando
    case "com_subseccion_new":		   		
?>
  <script language='JavaScript'>
     id= "<?=$codigoid?>"; 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_sub_seccion_new&id='+id
  </script>

 <?php								
    break;
    case "com_usuario_eliminar":		
   		foreach ($_POST['cid'] as $id){ 	
			$codigoid = strstr($id, '&', true); 					
			$sSQL = "UPDATE usuarios SET estado='-2' WHERE id_usuario=$codigoid" ; 
			mysql_query($sSQL); 			
			//rest = substr("abcdef", -1);    // devuelve "f"
			//substr("abcdef", 0, -1); // devuelve "abcde" 
			
			//$ccodmenu=substr($id,-1);					 						
			//$id=substr($id,0,-1);
			//db_query("DELETE FROM seccionmenu WHERE ccodseccion='".$id."' and ccodmenu='".$ccodmenu. "'");
		}	
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_usuario&mensaje=Registro Eliminado' 
  </script>  	       
 
  <?php								
    break;
    case "com_videos_eliminar":		
   		foreach ($_POST['cid'] as $id){ 		
			//echo $id."dsadasd";exit;	
			$codigoid = strstr($id, '&', true); 			
			$sSQL = "UPDATE contenido SET estado='-2' WHERE ccodcontenido='".$codigoid ."'" ; 
			//echo $sSQL;exit;
			mysql_query($sSQL); 
			$sSQL = "UPDATE seccioncontenido SET estado='-2' WHERE ccodcontenido='".$codigoid ."'" ; 
			mysql_query($sSQL); 			
			//rest = substr("abcdef", -1);    // devuelve "f"
			//substr("abcdef", 0, -1); // devuelve "abcde" 
			
			//$ccodmenu=substr($id,-1);					 						
			//$id=substr($id,0,-1);
			//db_query("DELETE FROM seccionmenu WHERE ccodseccion='".$id."' and ccodmenu='".$ccodmenu. "'");
		}	
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_videos&mensaje=Registro Eliminado' 
  </script> 
  
<?php		
	 break;   
	}  
?>
