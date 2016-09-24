<?php session_start();
//$root='/home/sisdataw/public_html';  
//$pathcarro='http://www.gamatell.com/tienda_virtual';  
error_reporting(E_ALL);
@ini_set('display_errors', '1');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>
<html>

<head>
<script>
function validarNro(e) {
var key;
if(window.event) // IE
	{
	key = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	key = e.which;
	}

if (key < 48 || key > 57)
    {
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else 
        { return false; }
    }
return true;
}
</script>
<style type="text/css">
.tablacarritocompras{width:645px;float:left;margin-left:1px;margin-top:8px;}
* html .tablacarritocompras{margin-left:13px;}
.body_tablacarritocompras{width:645px;float:left;background-color:#e9e9e9;}
.bg_buttom_carritocompras{width:645px;height:5px;float:left;background-image:url(/images/0/14/bg_bottom_tabla.gif);background-repeat:no-repeat;line-height:1px;margin:0px;}
.items_tablacarritocompras{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;border-collapse:collapse;border-spacing:0;width:645px;float:left;margin:0px;text-align:center;font-size:11px;}
.titulotablacarritocompras{width:645px;float:left;min-height:29px;background-color:#850929;background-image:url(/modulos/tienda_virtual/imagen/bg_header_tabla.gif);background-repeat:no-repeat;}

/* Inicio Titulos carrito*/
.titulotablacarritocompras .item_titu{margin:0px;padding:0px;width:68px;float:left;padding-top:8px;padding-bottom:8px;line-height:14px;}
.titulotablacarritocompras .categoria_titu{margin:0px;padding:8px 0px;width:97px;float:left;}
.titulotablacarritocompras .producto_titu{margin:0px;padding:8px 0px;width:147px;float:left;}
.titulotablacarritocompras .precio_titu{margin:0px;padding:8px 0px;width:74px;float:left;}
.titulotablacarritocompras .cantidad_titu{margin:0px;padding:8px 0px;width:81px;float:left;}
.titulotablacarritocompras .subtotal_titu{margin:0px;padding:8px 0px;width:98px;float:left;}
.titulotablacarritocompras .borrar_titu{margin:0px;padding:8px 0px;width:67px;float:left;}
.titulotablacarritocompras h3{float:left;font-size:12px;padding-top:8px;padding-bottom:8px;font-weight:bold;text-align:center;color:#FFF;}
/* Fin Titulos carrito*/

/* Inicio detalle carrito*/
.items_tablacarritocompras .item_tabla{width:68px;vertical-align:middle;padding-top:8px;padding-bottom:8px;line-height:14px;border-right:#d7d7d7 solid 1px;border-bottom:#d7d7d7 solid 1px;overflow:hidden;background:#f1f1f1;}
.items_tablacarritocompras .categoria_tabla{width:97px;vertical-align:middle;padding-top:8px;padding-bottom:8px;border-right:#d7d7d7 solid 1px;border-bottom:#d7d7d7 solid 1px;overflow:hidden;background:#f1f1f1;color:#9e0c32;}
.items_tablacarritocompras .producto_tabla{width:147px;vertical-align:middle;padding-top:8px;padding-bottom:8px;border-right:#d7d7d7 solid 1px;border-bottom:#d7d7d7 solid 1px;overflow:hidden;background:#f1f1f1;}
.items_tablacarritocompras .precio_tabla{width:74px;vertical-align:middle;padding-top:8px;padding-bottom:8px;border-right:#d7d7d7 solid 1px;border-bottom:#d7d7d7 solid 1px;overflow:hidden;background:#f1f1f1;}
.items_tablacarritocompras .cantidad_tabla{width:81px;vertical-align:middle;padding-top:8px;padding-bottom:8px;border-right:#d7d7d7 solid 1px;border-bottom:#d7d7d7 solid 1px;overflow:hidden;background:#f1f1f1;}
.items_tablacarritocompras .subtotal_tabla{width:98px;vertical-align:middle;padding-top:8px;padding-bottom:8px;border-right:#d7d7d7 solid 1px;border-bottom:#d7d7d7 solid 1px;overflow:hidden;background:#f1f1f1;}
.items_tablacarritocompras .borrar_tabla{width:74px;vertical-align:middle;padding-top:8px;padding-bottom:8px;border-bottom:#d7d7d7 solid 1px;overflow:hidden;background:#f1f1f1;}
/* Fin detalle carrito*/

.items_tablacarritocompras .categoria_tabla a{text-decoration:underline;color:#9e0c32;}
.items_tablacarritocompras .input_cantidad{width:30px;height:15px;vertical-align:middle;font-size:11px;text-align:center;}
.items_tablacarritocompras .tr_total{font-weight:bold;}
.items_tablacarritocompras .total_total{width:390px;vertical-align:middle;padding-top:10px;padding-bottom:8px;border-right:#dfdfdf solid 1px;text-align:left;overflow:hidden;background-color:#dfdfdf;}
.items_tablacarritocompras .p_total{padding-left:15px;}
.items_tablacarritocompras .cantidad_total{width:81px;vertical-align:middle;padding-top:10px;padding-bottom:8px;border-right:#d7d7d7 solid 1px;overflow:hidden;background-color:#dfdfdf;}
.items_tablacarritocompras .subtotal_total{width:98px;vertical-align:middle;padding-top:10px;padding-bottom:8px;border-right:#d7d7d7 solid 1px;overflow:hidden;background-color:#dfdfdf;}
.items_tablacarritocompras .borrar_total{width:74px;vertical-align:middle;padding-top:10px;padding-bottom:8px;overflow:hidden;background-color:#dfdfdf;}
.conte_btn_compraractualizar{width:400px;text-align:right;margin-top:10px; float:right;}
.conte_btn_compraractualizar .btn_comprar{width:91px;float:right;}
.conte_btn_compraractualizar .btn_actualizar{width:91px;float:right;margin-right:6px;}
.conte_btn_compraractualizar .btn_seguircomprando{width:122px;float:left;margin-right:6px;}

.tiendavirtual_tituloimagen{float:left;width:100%;text-align:center;margin-top:38px;margin-bottom:33px;}

.TIE_cajaTexto3 {width: 30px;height: 15px;vertical-align: middle;font-size: 11px;text-align: center;border: 1px solid #A5ACB2;}

.vaciocarrito{margin-bottom:0px;margin-top:50px;}
.vaciocarrito .prod {	font-family: Verdana, Arial, Helvetica, sans-serif;	font-size: 12px;color: #333333;	padding-right:30px;}
</style>
</head>
<body>
    <div class="tablacarritocompras">
        <div class="titulotablacarritocompras">
            <h3 class="item_titu">Item</h3>
            <p class="separador_title_tablainvitados"></p>
            <h3 class="categoria_titu">Imagen</h3>
            <p class="separador_title_tablainvitados"></p>
            <h3 class="producto_titu">Producto</h3>
            <p class="separador_title_tablainvitados"></p>
            <h3 class="precio_titu">Precio</h3>
            <p class="separador_title_tablainvitados"></p>
            <h3 class="cantidad_titu">Cantidad</h3>
            <p class="separador_title_tablainvitados"></p>
            <h3 class="subtotal_titu">Subtotal</h3>
            <p class="separador_title_tablainvitados"></p>
            <h3 class="borrar_titu">Borrar</h3>
        </div>
		
     <?php if($carro){ ?>       
         <form name="a<?php echo $v['identificador'] ?>" method="post" action="/modulos/tienda_virtual/agregacar_pedido_carrito.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">    
     <?php
          $color=array("#ffffff","#ffffff");
          $contador=0;
          $suma=0;
          $CantidadTotal=0;
          foreach($carro as $k => $v){			   		  		  
		   $subto=$v['cantidad']*$v['precio'];		   
           $suma=$suma+$subto;	   
           $CantidadTotal=$v['cantidad']+$CantidadTotal;
           $contador++;
	    ?>              
        <div class="body_tablacarritocompras">
        <table border="0" align="center" class="items_tablacarritocompras">        
          <tbody><tr>
            <td class="item_tabla"><?=$contador?></td>
            <td class="categoria_tabla"><?php echo '<img src="' .$v['rutaimagen'] .'" width=50 height=50/>'?></td>
            <td class="producto_tabla"><?php echo $v['nomproducto'] ?></td>
            <td class="precio_tabla"><?php echo $v['precio'] ?></td>
           
            <td class="cantidad_tabla">
             <input style="text-align:center; width:35px;"  name="cantidad"  id="cantidad" type="text" class="prod"  onKeyPress="javascript:return validarNro(event)" 
             value="<?php echo $v['cantidad']; ?>" size="6">			            </td>
            <td class="subtotal_tabla"><?php echo number_format($subto,2); ?></td>
            <td class="borrar_tabla">
            <a href="/modulos/tienda_virtual/borracar.php?id=<?= $v['id'] ?>">
            <img src="/modulos/tienda_virtual/imagen/trash.gif" width="12" height="15" alt="eliminar" class="btn_comprar">
			</a></td>
          </tr>   
        <?php }//fin foreach?>            
          <tr class="tr_total">
            <td colspan="4" class="total_total"><p class="p_total">TOTAL(incluido I.G.V.)</p></td>
            <td class="cantidad_total"><?=$CantidadTotal?></td>
            <td class="subtotal_total"><?php echo number_format($suma,2); ?></td>
            <td class="borrar_total">&nbsp;</td>
          </tr>   
              </tbody></table>
        </div>
            <div class="bg_buttom_carritocompras">&nbsp;</div>
            
         <div class="conte_btn_compraractualizar">
          	<div class="btn_comprar">
    	       <a href="metodo-de-pago">
        	<img src="/modulos/tienda_virtual/imagen/btn_comprar.jpg" width="91" height="23" alt="Comprar" class="btn_comprar">
	          </a>
            </div> 	
        	<div class="btn_actualizar">
               <input name="imageField" type="image" src="/modulos/tienda_virtual/imagen/btn_actualizar.jpg" width="91" height="23" border="0">
            </div>
            <div class="btn_seguircomprando">
       		<a href="<?=$_SESSION['paginaactual'];?>">
           	<img src="/modulos/tienda_virtual/imagen/btn_seguir_comprando.png" width="120" height="23" alt="Seguir Comprando"  >            </a>   
            </div>            

           </div>
   	       <input name="ccodcontenido" type="hidden" id="ccodcontenido" value="<?php echo $v['id'] ?>">	
           <input type="hidden" id="actualizar" name="actualizar" value="1" />
               
    
	   </form> 
   
         <?php }else{ ?>
          <div class="vaciocarrito">
          <p align="center"> <span class="prod">No hay productos seleccionados</span> <a href="<?=$_SESSION['paginaactual']?>"><img src="/modulos/tienda_virtual/imagen/continuar.gif" width="20" height="15" border="0"></a> </p>
          </div>
            <?php } // fin else?>  
      </div> <!--Fin tablacarritocompras -->
</body>
</html>