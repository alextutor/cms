<?php session_start();
//$root='/home/sisdataw/public_html';  
//$pathcarro='http://www.gamatell.com/tienda_virtual';  
$url=$_GET['url'];
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>
<html>
<head>
<title>PRODUCTOS AGREGADOS AL CARRITO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/contenidotabla.css" rel="stylesheet" type="text/css">
<link href="../css/homestyle.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.tit {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFFFFF;
	height: 30px;
}
.prod {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	padding-right:30px;
}
.total {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #d50000;
}
h1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 20px;
	color: #990000;
}
.blanco {
	color: #FFF;
}
#contenedor_confirma_compra {
	width: 95%;
	margin-top: 5px;
	margin-right: 10px;
	margin-bottom: 5px;
	margin-left: 10px;
	border: 1px solid #dd1520;
}
-->
.text {font-size:10; font-family:verdana; color:#ffffff; text-decoration:none}
div.col_titulo_plomo {	float: left;
	height:32px;
	padding: 5px;
	background: url(../imagen/flecha-ploma.jpg);
	background-repeat: no-repeat;			
}
div.col_titulo_verde {	float: left;
	height:33px;
	padding: 5px;
	background:url(../imagen/flecha-verde-claro.jpg);
	background-repeat: no-repeat;	
}
div.fila_dominio_hosting {
	background:url(imagen/Shoppingcart_128x128.png)	

    clear: both;
	height:35px;
	margin-top: 5px;
	margin-right: 0px;
	margin-bottom: 5px;
	margin-left: 25px;
}
#notificar_pago {	
	background-color: #e20a49;
	width:100%;
	text-align:center;
	color : #ffffff;
	font-size : 16px; 
	font-weight : bold; 
	font-family : Verdana, Helvetica, sans-serif; 	
}

#boton_marco{
	height: 25px;
	width: 91px;
	border: 5px solid #d3eefa;
}

.largefont { 
  color: #666666; 
  font-family:arial; 
  font-size: 16px; 
} 


#contenedor_tienda {	
	width: 700px;
	border: 1px solid #d8d566;
	text-align: center;
	background:	#fef8c4 ;
	margin: 0 auto;  	
}
.vaciocarrito{
	margin-bottom:20px;
	margin-top:20px;
	}
</style>
</head>

<body>
<div id="contenedor_tienda">
<table width="100%" border="0"  align="center">  
  <tr>
    <td>
    <div id="contenedor_confirma_compra">
  <div id="notificar_pago"> Ahora, Confirma Tu Compra. </div>
  <p align="center" class="textoderechaEncelda">
    <?php 
if($carro){
?>
  </p>
  <table width="632" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#cccccc">
    <tr bgcolor="#dd1520" class="tit"> 
      <td width="110" align="center" nowrap><span class="tex_blanco_Negri_13">Producto</span> </td>
      <td width="282" align="center" nowrap><span class="tex_blanco_Negri_13">Nombre</span></td>
      <td align="center" width="50" nowrap><span class="tex_blanco_Negri_13">Precio</span></td>
      <!--<td colspan="2" align="center" nowrap>A&ntilde;os</td> alex-->
      <td  width="70" align="center" nowrap><span class="tex_blanco_Negri_13">Cantidad</span></td>
      
      <td width="60" align="center" nowrap><span class="tex_blanco_Negri_13">Borrar</span></td>
      <td width="60" align="center" nowrap><span class="tex_blanco_Negri_13">Actualizar</span></td> 
    </tr>
    <?php
  $color=array("#ffffff","#ffffff");
  $contador=0;
  $suma=0;
   foreach($carro as $k => $v){
   $subto=$v['cantidad']*$v['precio'];
   $suma=$suma+$subto;
   $contador++;
    ?>
    <form name="a<?php echo $v['identificador'] ?>" method="post" action="<?php echo $pathcarro?>/agregacar.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">
      <tr height="35" bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'> 
        <td align="center"><span class="largefont"><?php echo '<img src="' .$v['rutaimagen'] .'" width=50 height=50/>'?></span></td>
        <td><span class="largefont"><?php echo $v['nomproducto'] ?></span></td>
        <td align="center"><span class="largefont"><?php echo $v['precio'] ?></span></td>
        
  <td  width="84" align="center">  <span class="largefont">       
   <input name="cantidad" type="text" id="cantidad" style="text-align:right" value="<?php echo $v['cantidad'] ?>" size="8" maxlength="3">
    
    
    <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"></span> </td>  
        <td align="center"><a href="/modulos/tienda_virtual/borracar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>"><img src='/modulos/tienda_virtual/imagen/iconos_del.gif' width="16" height="18" border="0"></a></td>
        
        <td align="center"> 
        <input name="imageField" type="image" src= '/modulos/tienda_virtual/imagen/actualizar.gif'   width="20" height="20" border="0">
        </td>
        
        
    </tr></form>
    <?php }?>
</table>
  <div align="center">
   
      <table width="633" border="0">
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td align="right">&nbsp;</td>
          </tr>
        <tr>
          <td width="395">&nbsp;</td>
          <td bgcolor="#f2ff80" align="right" width="128"><span class="prod">Total de Art&iacute;culos:</span></td>
          <td bgcolor="#f2ff80" align="right" width="96"><span class="prod"><?php echo count($carro); ?> </span></td>
          </tr>
        <tr >         
              <td>&nbsp;</td>
              <td bgcolor="#f2ff80" align="right"><span class="total">Total a Pagar:</span></td>
              <td bgcolor="#f2ff80" align="right"><span class="total">$ <?php echo number_format($suma,2); ?></span></td>
         
        </tr>
        <tr >
          <td>&nbsp;</td>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
        </tr>
        <tr >
          <td  align="right">
          <a href="<?=$_SESSION['paginaactual']?>" style="text-decoration:none;">
          <div align="center" class="botonfic"> Seguir Comprando </div></a>
          </td>
          <td  colspan="2" align="right">        
       <a href="http://www.gamatell.com/principal.php?pagina=tienda_virtual/metodo_pago" style="text-decoration:none;">             <div align="center" class="botonfic"> Pagar</div></a>                      
            </td>
          </tr>
      </table>

  </div>
  <div id="reg-cliente">
    <?php // include_once  ($_SERVER['DOCUMENT_ROOT'].'/tienda-virtual/registrocliente.php'); ?>
  </div>
  <br><br>
  <p><br>  <br>
  </p>
  <div align="center">
    <table width="378" border="0">
      <tr>
        <td width="167" align="center">&nbsp;</td>                 
        
        <td width="16">&nbsp;</td>
        <td width="181" align="center">&nbsp;</td>     
      </tr>
    </table>
  </div> 
  <?php }else{ ?>
  <div class="vaciocarrito">
  <p align="center"> <span class="prod">No hay productos seleccionados</span> <a href="<?=$_SESSION['paginaactual']?>"><img src="/modulos/tienda_virtual/imagen/continuar.gif" width="20" height="15" border="0"></a> </p>
  </div>
  
  
    <?php }?>
</div>


    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div> <!--fin contenedor_tienda -->

</body>
</html>
