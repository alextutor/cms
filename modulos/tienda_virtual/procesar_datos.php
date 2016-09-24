<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php
 $nomproducto=$_GET['domname']; 
 $id=$_GET[id];  
 include_once ($_SERVER['DOCUMENT_ROOT']. '/tienda-virtual/agregacar.php');       
 //header ("Location:".$path."/principal.php?pagina=tienda-virtual/confirmarcompra");exit;
 header ("Location:http://gamatell.com/principal.php?pagina=tienda-virtual/confirmarcompra");exit;
?>
</body>
</html>