<?php
	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/rutinas/conexion.php');
	include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
$task=$_POST['task'];
$option=$_POST['task'];
$id=$_POST['cid'];		

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
			$sSQL = "UPDATE productos SET estado='-2' WHERE idproductos=$id" ; 
			mysql_query($sSQL);			 			
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
    case "com_seccion_eliminar":		
   		foreach ($_POST['cid'] as $id){ 			
			$sSQL = "UPDATE seccion SET estado='-2' WHERE ccodseccion=$id" ; 			
			mysql_query($sSQL);			 			
		}
?>
  <script language='JavaScript'> 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_categoria&mensaje=Registro Eliminado' 
  </script>  	
 
<?php								
    break;	
    case "com_subseccion_new":		   		
?>
  <script language='JavaScript'>
  	  id = "<?=$id?>"; 	 
      page= "<?=$NOMBREEMPRESA?>"; 
      ROOT_PATH = "<?=$ROOT_PATH?>";
      location.href= ROOT_PATH+'/webadmin/index.php?option=com_sub_seccion_new&id='+id
  </script>   
 
<?php		
	 break;   
	}  
?>
