<?php session_start();
//$root='/home/sisdataw/public_html';  
$suma=$_GET[total];
$ID="";   // averiguar porque esta aqui
$pathcarro='http://www.sisdatahost.com/tienda-virtual';  
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>

 <?php
   $suma=0;
   foreach($carro as $k => $v){
 	 $subto=$v['cantidad']*$v['precio'];
   	$suma=$suma+$subto;
   }
  ?>
    
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

div.tabla
{
	clear: none;
	overflow: auto;
}

div.fila_dominio_hosting
{
	clear: both;
	height:35px;
	margin-top: 5px;
	margin-right: 0px;
	margin-bottom: 5px;
	margin-left: 25px;
}

div.col_titulo_verde
{
	float: left;
	height:33px;
	padding: 5px;
	background:url(../imagen/flecha-verde-claro.jpg);
	background-repeat: no-repeat;	
}
div.col_titulo_plomo
{
	float: left;
	height:32px;
	padding: 5px;
	background: url(../imagen/flecha-ploma.jpg);
	background-repeat: no-repeat;			
}
div.col
{
	float: left;
	padding: 5px;
	border-color: #ffffff;
	border-style: solid;
	border-right-width: 0px;
	border-left-width: 0px;
	border-top-width: 0px;
	border-bottom-width: 1px;
}


</style>

<style type="text/css">
div.buscar-dominio
{
	clear: none;
	overflow: auto;
	float:right;	
}
div.fila-buscar-dominio
{
	clear: both;
}

div.col-buscar-dominio
{
	float: left;
	padding: 10px;
}

#notificar-pago {	
	background-color: #d4f4ff;
	width:100%;
	color : #333333;
	font-size : 16px; 
	font-weight : bold; 
	font-family : Verdana, Helvetica, sans-serif; 	
}

.cuadro-esco-domi{
	position:relative;
	width: 95%; /* probá una medida en px si querés */
	height:110px;
	background-color: #A8DBF1;
	background-position: 0px 0px;
	background-repeat: repeat-x;
	border: medium none currentColor;
	border-radius: 7px !important;
	padding: 8px;
	margin-top: auto;
	margin-right: auto;
	margin-bottom: auto;
	margin-left: auto;
}
</style>
<link href="../css/homestyle.css" rel="stylesheet" type="text/css">

<link href="../css/contenidotabla.css" rel="stylesheet" type="text/css">
</head>
<body>

<table width="100%" border="0" class="estilotabla" align="center">
  <tr>
    <td  align="center" class="celdatituloRojo">Carro de Pedidos</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
    <div id="notificar-pago">
      Operación Cancelada
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="45%">
          <div class='cuadro-esco-domi'>
            <H3 class="titulo_preguntasRojo">El pago no fue realizado.</H3>
            <p class="titulo_preguntas">Puedes seleccionar otra forma de pago haciendo<a href="http://www.sisdatahost.com/tienda-virtual/principal.php?pagina=tienda-virtual/forma_pago&total=<? echo $suma ?>"> click aqu&iacute;.</a></p>
          </div>
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>    
    </td>
  </tr>
</table>							
</body>
</html>