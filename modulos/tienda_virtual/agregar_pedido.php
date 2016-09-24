<?php   ob_start();
	session_start();
  $actualizar=$_GET['actualizar'];     	
  $ccodcontenido=$_GET['ccodcontenido'];   
  //$root='/home/gamatell/public_html';  
  //$path='http://www.gamatell.com';  
 // include ($root."/rutinas/conexion-rosanet.php");   
  include ($_SERVER ["DOCUMENT_ROOT"]."/config.php");  //conexion
  $rs=mysql_query("select * from contenido where ccodcontenido ='".$ccodcontenido."'");
  while( ($fila=mysql_fetch_array($rs)) ) { 
  	$ccodcontenido=$ccodcontenido; 
    $cnomcontenido=$fila['cnomcontenido'];  
    $precio=$fila['precio'];  
	$cimgcontenido =$fila['cimgcontenido'];         
  }//Fin While     
   
   //Se asignan las variables. 
  //$IP = $REMOTE_ADDR; 
	$IP = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    ? $_SERVER['HTTP_X_FORWARDED_FOR']
    : $_SERVER['REMOTE_ADDR'];	
  $ssql ="insert into pedido(ccodcontenido,cnomcontenido,precio,IP,cimgcontenido,atendido) values('$ccodcontenido','$cnomcontenido','$precio','$IP','$cimgcontenido','NO')";
  mysql_query($ssql,$conexion) or die ("problema con query en agregar_pedido");   
 // mysql_select_db("sisdataw_eb");
 //include ($_SERVER['DOCUMENT_ROOT']. '/rutinas/conexion_gamatell.php') ;   
//$resultado=$cadena1 . $cadena2; 
 // $qry=mysql_query("SELECT idproductos,nombproductos,IP,id_pedido,rutaimagen FROM pedido WHERE idproducto=" .$idproducto . " and IP='".$IP."'") or die ("problema con query"); 
 //$res=mysql_fetch_array($qry);
  //Creamos el condicionamiento de loguear o no la entrada, dependiendo si el numero de registros es o no mayor a cero. 
   // include ($root."/Rutinas/cerrar_conexion.php");    
	//header("HTTP/1.1 301 Moved Permanently");
   //header ("Location:".$path."/carrito/subcarro/agregacar.php?id=".$res['id']);exit; 	  
  // header ("Location:".$path."/agregacar_pedido_carrito.php?id_pedido=".$res['id_pedido']);exit;
   header ("Location: /modulos/tienda_virtual/agregacar_pedido_carrito.php?actualizar=0&ccodcontenido=".$ccodcontenido) ;
 ?>