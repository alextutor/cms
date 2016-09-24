<?php session_start();
//$root='/home/sisdataw/public_html';  
$suma=$_GET[total];
if($_SESSION["email"]=="") {
	$_SESSION["email"]=$_GET[email];
}	
$ID="";   // averiguar porque esta aqui
$pathcarro='http://www.sisdatahost.com/tienda-virtual';  
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;

?>

<?php 
//$products es la variable
//que usaremos para mostrar
//los productos en esta página
//(separados por '+') 
$products=''; 
//$products2 es la que usaremos
//para enviar a Paypal
//(separados por ',') 
$products2=''; 
foreach($carro as $k => $v){ 
$unidad=$v['cantidad']>1?" unidades de":" unidad de"; 
$products.=$v['cantidad'].$unidad.$v['nomproducto']."+"; 
$products2.=$v['cantidad'].$unidad.$v['nomproducto'].", "; 
} 
//eliminamos el último '+': 
$products=substr($products,0,(strlen($products)-1)); 
//eliminamos la última coma
//y el espacio que sigue a
//la misma: 
$products2=substr($products2,0,(strlen($products2)-2)); 
?>

<html>
<head>
<title>PRODUCTOS AGREGADOS AL CARRITO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="../css/contenidotabla.css" rel="stylesheet" type="text/css"/>
<link href="../css/homestyle.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
.total {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #d50000;
	border: 5px solid #f2ff80;
	background-color: #f2ff80;
	float: right;
	width: 250px;
	text-align: center;
	clear: both;
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
	width: 91px;
	height: 25px;
	border: 5px solid #d3eefa;
	float: right;
	clear: both;
}

#boton_marco_enviar{
	width: 237px;
	height: 44px;
	border: 5px solid #d3eefa;
	float: right;
	clear: both;
}


.largefont { 
  color: #666666; 
  font-family:arial; 
  font-size: 16px; 
}


</style>
<!--http://www.tabsgenerator.com/?page=index -->
<!----------------------Inicio  tabbed menu------------------------------->
<script type="text/javascript">

$(document).ready(function() {	


  //Get all the LI from the #tabMenu UL
  $('#tabMenu li').click(function(){
    
    //perform the actions when it's not selected
    if (!$(this).hasClass('selected')) {    
           
	    //remove the selected class from all LI    
	    $('#tabMenu li').removeClass('selected');
	    
	    //Reassign the LI
	    $(this).addClass('selected');
	    
	    //Hide all the DIV in .forma_pago_boxBody
	    $('.forma_pago_boxBody div.parent').slideUp('1500');
	    
	    //Look for the right DIV in forma_pago_boxBody according to the Navigation UL index, therefore, the arrangement is very important.
	    $('.forma_pago_boxBody div.parent:eq(' + $('#tabMenu > li').index(this) + ')').slideDown('1500');
	    
	 }
    
  }).mouseover(function() {

    //Add and remove class, Personally I dont think this is the right way to do it, anyone please suggest    
    $(this).addClass('mouseover');
    $(this).removeClass('mouseout');   
    
  }).mouseout(function() {
    
    //Add and remove class
    $(this).addClass('mouseout');
    $(this).removeClass('mouseover');    
    
  });

	//Mouseover with animate Effect for Category menu list
  $('.forma_pago_boxBody #category li').click(function(){

    //Get the Anchor tag href under the LI
    window.location = $(this).children().attr('href');
  }).mouseover(function() {

    //Change background color and animate the padding
    $(this).css('backgroundColor','#888');
    $(this).children().animate({paddingLeft:"20px"}, {queue:false, duration:300});
  }).mouseout(function() {
    
    //Change background color and animate the padding
    $(this).css('backgroundColor','');
    $(this).children().animate({paddingLeft:"0"}, {queue:false, duration:300});
  });  
	
	//Mouseover effect for Posts, Comments, Famous Posts and Random Posts menu list.
  $('#.forma_pago_boxBody li').click(function(){
    window.location = $(this).children().attr('href');
  }).mouseover(function() {
    $(this).css('backgroundColor','#888');
  }).mouseout(function() {
    $(this).css('backgroundColor','');
  });  	
	
});

</script>
<!--
document.forms.enviar_pago.action= "https://www.paypal.com/cgi-bin/webscr"; 
document.forms.enviar_pago.action= "https://www.sandbox.paypal.com/cgi-bin/webscr";  
-->
<script language="JavaScript"> 
function redireccionar(){ 
	document.forms.enviar_pago.action= "https://www.paypal.com/cgi-bin/webscr"; 
     document.forms.enviar_pago.submit() 
} 

function enviar_instrucciones_correo(){ 
	document.forms.enviar_pago.action= "http://www.sisdatahost.com/tienda-virtual/envio_instruccion_pago.php"; 
     document.forms.enviar_pago.submit() 
} 
	
</script> 

<style>
a {color:#ccc;text-decoration:none;}
a:hover {color:#ccc;text-decoration:none}

#tabMenu {margin:0;padding:0 0 0 15px;list-style:none;}
/* ---------------------Inicio Tamano de los TABS ---------------------*/
#tabMenu li {
	float:left;
	height:94px;
	width:193px;
	cursor:pointer;
	cursor:hand;
	margin-right: 55px;
}
/* ---------------------Fin Tamano de los TABS ---------------------*/


li.dinero_electronico {background:url(http://www.sisdatahost.com/tienda-virtual/images/dinero_electronico_hosting.gif) no-repeat 0 ;}
li.otras_forma_pago {background:url(http://www.sisdatahost.com/tienda-virtual/images/transferencia_bancaria_hosting.gif) no-repeat 0 0;}

li.mouseover {background-position:0 0;}
li.mouseout {background-position:0 0;}
li.selected {background-position:0 0;}

.forma_pago_box {
	width:850px;
	margin-right: auto;
	margin-left: auto;
}
.forma_pago_boxTop {background:url(http://www.sisdatahost.com/tienda-virtual/images/forma_pago_boxTop.png) no-repeat;height:11px;clear:both}
.forma_pago_boxBody {
	background-color:#d4f4ff;
	border: 1px solid #333;
}
.forma_pago_boxBottom {background:url(http://www.sisdatahost.com/tienda-virtual/images/forma_pago_boxBottom.png) no-repeat;height:11px;}

.forma_pago_boxBody div.parent {display:none;}
.forma_pago_boxBody div.show {display:block;}

.forma_pago_boxBody div ul {margin:0 10px 0 55px;padding:0;width:590px;list-style-image:url(http://www.sisdatahost.com/tienda-virtual/images/arrow.gif)}
.forma_pago_boxBody div li {border-bottom:1px dotted #8e8e8e; padding:4px 0;cursor:hand;cursor:pointer}
.forma_pago_boxBody div ul li.last {border-bottom:none}
.forma_pago_boxBody div li span {font-size:8px;font-style:italic; color:#888;}
</style>
<!----------------------Fin  tabbed menu------------------------------->
</head>
<body>
<table width="100%" border="0" class="estilotabla" align="center">
  <tr>
    <td  align="center" class="celdatituloRojo"><a  class="text" href="http://www.infodisfap.com/principal.php?pagina=doctor-responde/index">Carro de Pedidos</a></td>
  </tr>
  <tr>
    <td>
    <div class="fila_dominio_hosting">
      <div class="col_titulo_plomo"  align="center"  style="width:159px">Paso 1: Dominio</div>
      <div class="col_titulo_plomo"  align="center"  style="width:159px">Paso 2: Confirmar Compra</div>
      <div class="col_titulo_plomo"  align="center"  style="width:159px">Paso 3: Datos Personales</div>
      <div class="col_titulo_verde" align="center" style="width:159px"><strong>Paso 4: Forma Pago</strong>     </div>
    </div></td>
  </tr>
  <tr>
    <td align="center"><div id="notificar-pago"> Forma de Pago. </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<div class="forma_pago_box">
<ul id="tabMenu">
  <li class="dinero_electronico selected"></li>
  <li class="otras_forma_pago"></li>
 
</ul>
<div class="forma_pago_boxTop"></div>

<div class="forma_pago_boxBody">  
  <div id="dinero_electronico" class="show parent">
  <!--http://www.desarrolloweb.com/articulos/conectar-con-paypal.html
  http://www.fernandosalom.es/noticia/33/como-crear-una-pasarela-de-pago-con-paypal -->
    <form name="enviar_pago" method="post" >
      <table width="100%" border="0">
        <tr>
          <td>&nbsp;</td>
          <td  ></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center" valign="middle" width="54%"><p>
            <input name="radio" type="radio" id="dinero_electronico2" value="dinero_electronico" checked> 
            <img src="images/paypal_tarjeta.gif" width="100" height="46">
            </p></td>
          <td width="46%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
       <!--cmd > indica el tipo de fichero que va a recoger PayPal 
       _cart : varios items   
       _donations : donaciones
       _xclick : boton de compra -->   
      <input type="hidden" name="cmd" value="_xclick">
      <!--Es el mail que el vendedor registró en su cuenta de Paypal.  -->
      <input type="hidden" name="business" value="sisdatahost@hotmail.com"> 
      <!--la dirección de nuestra tienda online . Ejemplo : http://www.sisdatahost.com-->
      <INPUT type="hidden" name="shopping_url" value="http://www.sisdatahost.com/"> 
       <!--currency_code: La moneda en que expresamos los valores:USD,GBP,JPY,CAD,EUR.  -->
      <input type="hidden" name="currency_code" value="USD"> 
	<!-- sera el enlace de vuelta a nuestro negocio que ofrece paypal-->
      <input type="hidden" name="return" value="
      http://www.sisdatahost.com/tienda-virtual/principal.php?pagina=tienda-virtual/exit">
   <!--en esta pagina es donde recogeremos el estado del pago y un gran numeros de variables con informacion adicional en nuestro caso lo hemos llamado paypal_ipn.php --> 
	<input   type="hidden" name="notify_url" value=  "http://www.sisdatahost.com/tienda-virtual/paypal_ipn.php">
   <!--método con que Paypal devolverá variables a la página ipn_success.php (1 es get 2 es post).  -->
       <input type="hidden" name="rm" value="2">
       <!--Es el importe total de la operación.  -->   
      <input type="hidden" name="amount" value="<?php echo number_format($suma,2); ?>"> 
      
      <!--Es el costo de envío.-->
    <input type="hidden" name="shipping" value="0"> 
    <input type="hidden" name="cbt" value="Presione aquí para volver a www.sisdatahost.com >>"> 
      <!--Es el detalle de lo que estamos vendiendo.  -->
     <input type="hidden" name="item_name" value="<?php echo $products2; ?>">       
      <!--bn: Esta es la identificación de la integración que estamos haciendo, normalmente la identificaremos con el nombre de la empresa vendedora -->
      <input type="hidden" name="bn" value="sisdatahost">       
      <input type="hidden" name="item_number" value="Nombre del comprador"> 
      <!--custom =Aquí podemos colocar cualquier variable que luego necesitemos para realizar nuestros procesos cuando Paypal redireccione al usuario a nuestra página de éxito.  -->
      <input type="hidden" name="custom" value="<?php echo number_format($suma,2); ?>"> 
     
      <!--image_url: Es la ruta absoluta de la imagen que aparecerá en la cabecera de la página de Paypal cuando el comprador esté pagando.  -->
      <input type="hidden" name="image_url" value=""> 
      
<input type="hidden" name="cancel_return" value="http://www.sisdatahost.com/tienda-virtual/principal.php?pagina=tienda-virtual/pago_cancelado"> 
<span class="total">Total a pagar:  $ <?php echo number_format($suma,2); ?></span>
       <div id="boton_marco">
      <input type=image src="../imagen/pagar.gif"  onclick="redireccionar()" width="90" height="26"  value="Enviar"> 
    </div>          
           </td>
          </tr>
      </table>
    </form>
 

  </div>  
  
  <div id="otras_forma_pago" class="parent">
  		<table width="100%" border="0">
          <tr>
            <td>   <?   include_once ($_SERVER['DOCUMENT_ROOT']. '/forma_pago_deposito_bancario.php');?></td>
          </tr>
          <tr>
            <td> <span class="total">Total a pagar:  $ <?php echo number_format($suma,2); ?></span></td>
          </tr>
          <tr>
            <td>
            <div id="boton_marco_enviar">
			  <input type="image" src="images/enviar_instrucciones_correo.gif"  onclick="enviar_instrucciones_correo()" width="235" height="42"  value="Enviar" />
			</div>
            </td>
          </tr>
        </table> 
  </div>
</div>

<div class="forma_pago_boxBottom"></div>

</div>   
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
