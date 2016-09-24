<?php session_start();
	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/rutinas/conexion.php');
	//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------		
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	

extract($_POST); 
$task=$_POST['task'];
$option=$_POST['task'];
$id=$_POST['cid'];
$pagina=$_POST['pagina'];	

//---------------------------------------Inicio Buscar-------------------------
$buscar=$_POST['filter_search'];//cuando hago boton buscar
if ($buscar<>""){
	switch ($pagina){
    case "com_articulos":
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

switch ($task){
    case "com_categories_editar":	
?>
	<script language='JavaScript'> 
        id= "<?=$id[0]?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_categories_editar&id='+id
    </script>
<?php		
	break;
	case "com_sub_categories_editar":
	?>
	<script language='JavaScript'> 
		id= "<?=$id[0]?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_sub_categories_editar&id='+id
	</script>
<?php
	break;
	 case "com_menus_editar":
?>
	<script language='JavaScript'> 
        id= "<?=$id[0]?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_menus_editar&id='+id
    </script> 
<?php	
	break;
	case "com_cursos_editar":			
	?>
	<script language='JavaScript'> 
		id= "<?=$id[0]?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_cursos_editar&id='+id
	</script>       
  <?php
	break;
	case "com_articulos_editar":
	?>
	<script language='JavaScript'> 
		id= "<?=$id[0]?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_articulos_editar&id='+id
	</script>
  <?php
	break;
	case "com_fotos_insertar":
	?>
	<script language='JavaScript'> 
		id= "<?=$id[0]?>"; 
		ROOT_PATH = "<?=$ROOT_PATH?>";
		location.href= ROOT_PATH+'/webadmin/index.php?option=com_fotos_insertar&id='+id
	</script>   
 <?php
  break;
  case "com_presentacion_editar":
  ?>
  <script language='JavaScript'> 
      id= "<?=$id[0]?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_presentacion_editar&id='+id
  </script>   
    <?php
  break;
  case "com_agencia_editar":
  ?>
  <script language='JavaScript'> 
      id= "<?=$id[0]?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_agencia_editar&id='+id
  </script>         
       
<?php
	break;
	 case "com_menus_eliminar":
		 $xmenu=0;
   		foreach ($_POST['cid'] as $id){ 
			$sSQL = "UPDATE menu SET estado='-2' WHERE idmenu=$id" ; 
			mysql_query($sSQL); 
			++$xmenu;			
		}
?>
	<script language='JavaScript'> 
        id= "<?=$id[0]?>"; 
        ROOT_PATH = "<?=$ROOT_PATH?>";
		xmenu= "<?=$xmenu?>";
        location.href= ROOT_PATH+'/webadmin/index.php?option=com_menus&mensaje='+xmenu+' tipos de menú han sido borrados correctamente'
    </script>    
        
<?php								
        break;
    case "com_categories_eliminar":		
   		foreach ($_POST['cid'] as $id){ 
			$sSQL = "UPDATE categoria SET estado='-2' WHERE idcategoria=$id" ; 
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
			$sSQL = "UPDATE subcategoria SET estado='-2' WHERE idsubcategoria=$id" ; 
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
			//$sSQL = "UPDATE productos SET estado='-2' WHERE idproductos=$id" ; 			
			//mysql_query($sSQL);			 						
			db_query("DELETE FROM seccioncontenido where ccodcontenido = '".$id."'");
			db_query("DELETE FROM contenidogaleria where ccodcontenido = '".$id."'");
			db_query("DELETE FROM contenidoopinion WHERE ccodcontenido = '".$id. "'");
			db_query("DELETE FROM contenidodetalle WHERE ccodcontenido = '".$id. "'");
			db_query("DELETE FROM contenido WHERE ccodcontenido = '".$id. "'");
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
			$sSQL = "UPDATE cursos SET estado='-2' WHERE id_curso=$id" ; 
			mysql_query($sSQL);			 			
		}
?>

<?php								
    break;
    case "com_presentacion_eliminar":				
   		foreach ($_POST['cid'] as $id){ 					
			db_query("DELETE FROM pagehome where ccodinicio = '".$id."'");
			db_query("DELETE FROM pagehomedet where ccodinicio = '".$id."'");
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
			db_query("DELETE FROM secciondetalle where ccodseccion = '".$id."'");
			db_query("DELETE FROM seccioncontenido where ccodseccion = '".$id."'");
			db_query("DELETE FROM seccionmenu where ccodseccion = '".$id."'");
			db_query("DELETE FROM seccion WHERE ccodseccion = '".$id. "'");	
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
			db_query("DELETE FROM pagesucursal WHERE ccodsucursal='".$id."'");
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
			//$sSQL = "DELETE FROM pagesucursal WHERE ccodsucursal ccodsucursal=$id" ; 
			//mysql_query($sSQL); 					 						
			db_query("DELETE FROM page WHERE ccodpage='".$id."'");
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
			$sSQL = "DELETE FROM pagemenu WHERE ccodmenu=$id" ; 
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
     id= "<?=$id[0]?>"; 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_sub_seccion_new&id='+id
  </script>

 <?php								
    break;
    case "com_usuario_eliminar":		
   		foreach ($_POST['cid'] as $id){ 						
			$sSQL = "DELETE FROM usuarios WHERE id_usuario=$id" ; 
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
			$sSQL = "DELETE FROM contenido WHERE ccodcontenido='".$id ."'" ; 
			//echo $sSQL;exit;
			mysql_query($sSQL); 
			$sSQL = "DELETE FROM seccioncontenido WHERE ccodcontenido='".$id ."'" ; 
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
