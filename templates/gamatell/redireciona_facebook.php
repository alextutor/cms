<?php  
  // include_once($_SERVER['DOCUMENT_ROOT']. '/patrocinadores/horizontal-principal.php');      
 $idsec1=$_GET['idsec1'];
 //----/noticia/beneficiadosancashuanuco.php 
 $PaginaActual=$_SERVER['PHP_SELF'];
 $PaginaActual = substr($PaginaActual,0 ,strlen($PaginaActual)-4);  //substare los 4 ultimos .php
 $PaginaActual = substr($PaginaActual,1 ,strlen($PaginaActual));  //substrae todos menos el primero el priemro lo quita
 

 if ($idsec1=="") {
echo "<script language='JavaScript'>
	location.href='http://www.infodisfap.com/enlaces.php?idsec1=" . "$PaginaActual" . "'</script>";
}
?>	