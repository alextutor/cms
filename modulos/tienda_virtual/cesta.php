<?php session_start();		
// Deshabilitar todo reporte de errores
error_reporting(0);
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
$nTotalCarro=0;
$suma=0;
if($carro){ //inicio si
  $color=array("#ffffff","#F0F0F0");
  $contador=0;
  //$suma=0;
   foreach($carro as $k => $v){
	   $subto=$v['cantidad']*$v['precio'];
	   $suma=$suma+$subto;
	   $contador++;
   }
     $nTotalCarro=count($carro);
}   //fin si
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#conte_cesta {	background:url(tienda_virtual/imagen/cesta.gif);
	background-repeat: no-repeat;
	padding-left:45px;
	height:50px
	font-size: 13px;
  color: #3b3b3b;
  font-weight: bold;
  text-decoration: none;
}

</style>
</head>

<body>
<div id="conte_cesta">MiniCesta &nbsp;&nbsp; <a href="principal.php?pagina=tienda_virtual/vercarrito">[ver cesta]</a><br />
  Articulos &nbsp:&nbsp <?php echo $nTotalCarro ; ?><br />
  Total US$. &nbsp : &nbsp<?php echo number_format($suma,2)  ?>
 </div>
</body>
</html>