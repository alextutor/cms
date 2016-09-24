<?php session_start();			 			
	//viene de include/funciones_web.php (function contenidosweb($codbanner))
	$i=0;
	include_once($_SERVER['DOCUMENT_ROOT']."/modulos/rs-moneda.php");
		
while($rowhome  = db_fetch_array($hometabla))	
	{	
	//$nContador=$nContador+1;
	$class = ($i++ & 1) == 1 ? 'odd' : 'even';
	
	$nomurl   = crearurl_articulo($rowhome['ccodseccion']);			
	$ruta     = "/".$nomurl.$rowhome['camicontenido'];
	$sqlxsex  = db_query("Select cnomseccion,camiseccion FROM seccion where ccodseccion='".$rowhome['ccodseccion']."' ");
	$rowxsex  = db_fetch_array($sqlxsex);	
?>
<div class="product_item_in_list" style="width: 100%;">
  <div class="item_img">
       <?php
        if($rowhome['cimgcontenido']!="")
        {
        ?>
        <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>
        <img src="<?=$rowhome['cimgcontenido']?>" border="0" title="<?=$rowhome['cnomcontenido']?>"  alt="<?=$rowhome['cnomcontenido']?>" width="120" >
        </a>
      <?php } ?>    
  </div>
  <div class="item_info">         
      <div class="<?php echo $class?>" style="float:left; width:100%; min-height:120px;">				
          <div style="padding:15px;">
              <div class="prod_np">
                  <div class="prodprice">
                      <div class="prod_price_name2">Precio  <span style="font-size: 13px;">↓</span></div>
                      <div class="price colorprecio">
                          <?php echo $cSimboloMoneda ."  " .number_format($rowhome['precio'],2) ?>
                      </div>                              
                      
                      <div style="clear: both;"></div>
                                                   
                    <div class="addCart">                     	
                          <div class="add-cart-button">                                   
                           <a href="/modulos/tienda_virtual/agregar_pedido.php?ccodcontenido=<?=$rowhome['ccodcontenido']?>&actualizar=0">
                     <div class="to-cart-but" style="display: block;">Comprar</div>  
                         </a>
                      </div>                                                                    
                    </div>
                  </div>    
                  <div class="name">
                      <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>"
                       <?=$enlacedestino?>><?=$rowhome['cnomcontenido']?></a>
                      <br>
                  </div>            
              </div>                        
              <div class="foot">
                  <div class="id_weight"><?php echo $rowhome['crescontenido']?></div>
              </div>
          </div>    
      </div>
  </div>
</div>	
<?php }	?>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>
