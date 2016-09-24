<?php 
  ob_start();
   //$root='/home/sisdataw/public_html';  
   //$path='http://www.sisdataweb.com';  
    $path='http://www.sisdatahost.com/tienda-virtual';  

  include_once ($_SERVER['DOCUMENT_ROOT']. '/rutinas/conexion-carro.php');      		       
  $plan=$_GET[plan]; 
  $preciohos=$_GET[preciohos];     
 
   //Se asignan las variables. 
  //$IP = $REMOTE_ADDR; 
	$IP = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    ? $_SERVER['HTTP_X_FORWARDED_FOR']
    : $_SERVER['REMOTE_ADDR'];	
  //para insertar hosting
  if ($plan!="") {
     $producto='Hosting';	 
  	 $ssql ="insert into catalogo(producto,nomproducto,precio,IP) values('$producto','$plan','$preciohos','$IP')";
     mysql_query($ssql,$conexion) or die ("problema con query");       
  }

  $producto='Dominio';       
  $nomproducto=$_GET['domname'];    
  $precio="10";        
   
  $ssql ="insert into catalogo(producto,nomproducto,precio,IP) values('$producto','$nomproducto','$precio','$IP')";
  mysql_query($ssql,$conexion) or die ("problema con query");       
  
  mysql_select_db("sisdataw_eb");
//$resultado=$cadena1 . $cadena2; 
  $qry=mysql_query("SELECT producto,nomproducto,IP,id FROM catalogo WHERE nomproducto='".$nomproducto."' or nomproducto='".$plan."' AND IP='".$IP."'");

  
// $res=mysql_fetch_array($qry);   //si es un solo registro
 include_once ($_SERVER['DOCUMENT_ROOT']. '/rutinas/cerrar_conexion.php');       
 while($res=mysql_fetch_array($qry)) 
{ 
  //Creamos el condicionamiento de loguear o no la entrada, dependiendo si el numero de registros es o no mayor a cero. 
	header("HTTP/1.1 301 Moved Permanently");
   //header ("Location:".$path."/carrito/subcarro/agregacar.php?id=".$res['id']);exit; 	  
  // header ("Location:".$path."/principal.php?pagina=tienda-virtual/agregacar&id=".$res['id']);exit;   
   header ("Location:".$path."/principal.php?pagina=tienda-virtual/agregacar&id=".$res['id']);   
 }//fin while   
  header ("Location:".$path."/principal.php?pagina=tienda-virtual/confirmarcompra");exit;
 ?>