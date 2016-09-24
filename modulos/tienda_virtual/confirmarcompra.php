<?php session_start();
//$root='/home/sisdataw/public_html';  
$pathcarro='http://www.gamatell.com/tienda-virtual';  
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
<link href="../../css/homestyle.css" rel="stylesheet" type="text/css">
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
#contenedor-confirma-compra {
	width: 95%;
	margin-top: 5px;
	margin-right: 10px;
	margin-bottom: 5px;
	margin-left: 10px;
	border: 10px solid #a8dbf1;
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
div.fila_dominio_hosting {	clear: both;
	height:35px;
	margin-top: 5px;
	margin-right: 0px;
	margin-bottom: 5px;
	margin-left: 25px;
}
#notificar-pago {	
	background-color: #d4f4ff;
	width:100%;
	color : #333333;
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
 


</style>
</head>

<body>
<table width="100%" border="0" class="estilotabla" align="center">
  <tr>
    <td  align="center" class="celdatituloRojo"><a  class="text" href="http://www.infodisfap.com/principal.php?pagina=doctor-responde/index">Carro de Pedidos</a></td>
  </tr>
  <tr>
    <td><div class="fila_dominio_hosting">
      <div class="col_titulo_plomo"  align="center"  style="width:159px">Paso 1: Dominio</div>
      <div class="col_titulo_verde"  align="center"  style="width:159px"><strong>Paso 2: Confirmar Compra</strong></div>
      <div class="col_titulo_plomo" align="center"   style="width:159px">Paso 3: Datos Personales</div>
      <div class="col_titulo_plomo"  align="center"  style="width:159px">Paso 4: Forma Pago</div>
    </div></td>
  </tr>
  <tr>
    <td align="center"><div id="notificar-pago"> Ahora, Confirma Tu Compra. </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <div id="contenedor-confirma-compra">
  <h1 align="center">Confirmar Compra</h1>
  <p align="center" class="textoderechaEncelda"><STRONG>Esta es su Orden de Compra. Por favor verifique todos los datos y   luego haga clic en '&iexcl;Est&aacute; Conforme!' </STRONG></p>
  <?php 
if($carro){
?>
  <table width="632" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr bgcolor="#333333" class="tit"> 
      <td width="116" nowrap>Producto</td>
      <td width="170" nowrap>Nombre</td>
      <td align="center" width="116" nowrap>Precio</td>
      <!--<td colspan="2" align="center" nowrap>A&ntilde;os</td> alex-->
      <td  width="84" align="center" nowrap>A&ntilde;os</td>
      
      <td width="73" align="center" nowrap>Borrar</td>
      <td width="215" align="center" nowrap>Actualizar</td> 
    </tr>
    <?php
  $color=array("#ffffff","#F0F0F0");
  $contador=0;
  $suma=0;
   foreach($carro as $k => $v){
   $subto=$v['cantidad']*$v['precio'];
   $suma=$suma+$subto;
   $contador++;
    ?>
    <form name="a<?php echo $v['identificador'] ?>" method="post" action="<?php echo $pathcarro?>/agregacar.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">
      <tr height="35" bgcolor="<?php echo $color[$contador%2]; ?>" class='prod'> 
        <td><span class="largefont"><?php echo $v['producto'] ?></span></td>
        <td><span class="largefont"><?php echo $v['nomproducto'] ?></span></td>
        <td align="center"><span class="largefont"><?php echo $v['precio'] ?></span></td>
        
  <td  width="84" align="center">  <span class="largefont">       
    <label for="cantidad"></label>
    <select name="cantidad" id="cantidad">
      <option value="1">1 Año</option>
      <option value="2">2 Años</option>
      <option value="3">3 Años</option>
      <option value="4">4 Años</option>
      <option value="5">5 Años</option>
      <option value="6">6 Años</option>
      <option value="7">7 Años</option>
      <option value="8">8 Años</option>
      <option value="9">9 Años</option>
      </select>
    
    
    <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"></span> </td>  
        <td align="center"><a href="<?php echo $pathcarro?>/borracar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>"><img src='<?php echo $pathcarro;?>/trash.gif' width="16" height="18" border="0"></a></td>
        
        <td align="center"> 
        <input name="imageField" type="image" src= '<?php echo $pathcarro;?>/actualizar.gif'   width="20" height="20" border="0">
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
          <td>&nbsp;</td>
          <td  colspan="2" align="right">
          <div id="boton_marco">         
          <a href="http://www.gamatell.com/tienda-virtual/principal.php?pagina=tienda-virtual/datos_personales"><img src="../imagen/continuar.gif" width="92" height="26"  border="0"
                    onMouseOver="javascript:this.src='../../imagen/continuar.gif';" 
					onMouseOut="javascript:this.src='../../imagen/continuar.gif';"/></a>
            </div>
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
  <p align="center"> <span class="prod">No hay productos seleccionados</span> <a href="catalogo.php?<?php echo SID;?>"><img src="continuar.gif" width="13" height="13" border="0"></a> 
    <?php }?></p>
</div>


    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
