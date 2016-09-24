<?php   
  include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php'); 
 $id= $_POST['id'];  
 $paginacion=$_POST['paginacion'];  
 $Nombre= $_POST['Nombre'];   
 $comentario = $_POST['comentario']; 
 $fechacorta = $_POST['fechacorta'];   
 $titulo= $_POST['titulo'];    
 $email= $_POST['email'];  
 $aceptado = $_POST['aceptado']; 
 $idcate = $_POST['idcate'];  
 $idsubcate  = $_POST['idsudcategoria'];  
 $idSubSubcate  = $_POST['idSubSubcate'];  

 $procedencia  = $_POST['procedencia'];  
 
 $parent_id   = $_POST['parent_id'];  
 $RutaImagen = $_POST['RutaImagen'];     
 $telefono = $_POST['telefono'];     
 	
//Creamos la sentencia SQL y la ejecutamos
	$result = mysql_query("UPDATE doctorresponde SET Nombre='$Nombre', comentario='$comentario',
	fechacorta='$fechacorta' ,titulo='$titulo' ,email='$email' ,aceptado='$aceptado' ,idcate='$idcate' ,RutaImagen='$RutaImagen'    ,idsubcate='$idsubcate',idSubSubcate='$idSubSubcate' ,procedencia='$procedencia' , parent_id='$parent_id' ,telefono='$telefono',mostrarportada='$mostrarportada'   WHERE id='$id'") ;  
	//include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php');
?>
<script language="javascript">
    location.href = 'http://www.infodisfap.com/doctor-responde/mantDoctor-Responde-Admi.php?mensaje=Registro Actualizado&pagina=' + <?php echo  $paginacion ?> ;
</SCRIPT>