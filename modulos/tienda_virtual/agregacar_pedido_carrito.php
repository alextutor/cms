<?php session_start();
 include ($_SERVER ["DOCUMENT_ROOT"]."/config.php");  //conexion
extract($_REQUEST);
if(!isset($cantidad)){$cantidad=1;}
$carro = $_SESSION['carro'];
if (!isset($carro)) {
     $carro = array();
}
$identificador = md5($ccodcontenido);
if (isset($carro[$identificador])) { // ya existe solo actualizar cantidad      	
		if ($actualizar=='1'){
			
			$carro[$identificador]['cantidad'] = $cantidad;			
		/*	if (isset($_POST['cantidad']))
			{				
			  $upcantidad = $_POST['cantidad'];
			  $n        = count($upcantidad);
			  $i        = 0;			 
			  while ($i < $n)
   			  {
				  $carro[$i]['cantidad'] =$upcantidad[$i];
				  $i++;
   			  }
			}				
			*/
		} else { //esta ingresando del catalogo
			$carro[$identificador]['cantidad'] += $cantidad;
		} 	
		
} else {
        $qry=mysql_query("select * from contenido where ccodcontenido='".$ccodcontenido."'");
        $row=mysql_fetch_array($qry);
 
        $carro[$identificador]=array('identificador'=>md5($ccodcontenido),'cantidad'=>$cantidad,'producto'=>$row['cnomcontenido'],'nomproducto'=>$row['cnomcontenido'],'rutaimagen'=>$row['cimgcontenido'],'precio'=>$row['precio'],'id'=>$ccodcontenido);
} 
$_SESSION['carro'] = $carro; 
 header ("Location: /compras");    
?>