<?php session_start();				 			
	//viene de include/funciones_web.php (function contenidosweb($codbanner))
	$i=0;
	//para moneda  variables a usar $cMoneda $cSimboloMoneda
	include($_SERVER['DOCUMENT_ROOT']."/modulos/rs-moneda.php");
	
	 //$sql1 solo es para sacar el total de registros sin $pages->limit
	  $sql1   = "Select c.ccodcontenido,c.cnomcontenido,c.camicontenido,c.crescontenido,c.curlcontenido,s.ccodseccion,c.cimgcontenido,c.ccodmodulo,c.dfeccontenido,c.precio,c.precio_oferta,c.garantia,s.ccodseccion FROM contenido c, seccioncontenido s where c.ccodcontenido=s.ccodcontenido and  c.cestcontenido='1' and c.ccodmodulo='".$rowads['ccodmodulo']."' ".$sql_seccion.$sql_cate." order by c.ccodcontenido desc ";
	 	
		$rs_total = db_query($sql1);	
		$ipp=(!empty($_GET['ipp'])) ? $_GET['ipp']:$rowads['nnroitems'];	
		 include_once($_SERVER['DOCUMENT_ROOT'].'/paginator.class.php');
		$pages = new Paginator();	
		$pages->items_total =  db_num_rows($rs_total);
		$pages->mid_range = 5; // Number of pages to display. Must be odd and > 3
		$pages->items_per_page = $ipp;
		$pages->paginate();
		echo "<div class='cnt_paginacion'>";
		echo $pages->display_pages();
	echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";
		echo "</div>";
	
	 $sql2   = "Select c.ccodcontenido,c.cnomcontenido,c.camicontenido,c.crescontenido,c.curlcontenido,s.ccodseccion,c.cimgcontenido,c.ccodmodulo,c.dfeccontenido,c.precio,c.precio_oferta,c.garantia FROM contenido c, seccioncontenido s where c.ccodcontenido=s.ccodcontenido and  c.cestcontenido='1' and c.ccodmodulo='".$rowads['ccodmodulo']."' ".$sql_seccion.$sql_cate." order by c.ccodcontenido desc $pages->limit";
	 
	 
	$hometabla = db_query($sql2);	
	
	/*$total = db_num_rows($Nrohometabla);
	$pagina    = 1;
	$pag    = $pagina;
	$pagsecc=$rowads['nnroitems'];
	$numpags = ceil($total/$pagsecc);		
	$reg     = ($pag-1) * $pagsecc;
	$hometabla = db_query($homesql . " LIMIT " .$reg." , ".$pagsecc);*/
	
	/*alex yo lo implemente para que jale de estilo seccion un estilo*/
	/*$sql_estilos_pre="Select * from estiloseccion where ccodsecestilo='".$rowads['ccodestilo']."'";
	$homeestilospre = db_query($sql_estilos_pre);
	$rowestilopre  = db_fetch_array($homeestilospre);	*/
	//echo $_SERVER['DOCUMENT_ROOT']."/modulos/".$rowestilopre['cincsecestilo'];exit;
	
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
                        <?php 									
						  if($rowhome['precio_oferta']<>0){
						  echo "<div class='red text_decora_line_through'>
							<span class='verde_mar'>Antes &nbsp;</span>" .
						   $cSimboloMoneda."  " .number_format($rowhome['precio'],2). 
						  "</div>";
						  echo "<div class='red m_top_3 bold'>
						  <span class='verde_mar'>Oferta&nbsp; </span>" .
						   $cSimboloMoneda.number_format($rowhome['precio_oferta'],2) ."</div>";	
						  }else{		
						  echo  $cSimboloMoneda ."  " .number_format($rowhome['precio'],2);
							  }
						?>
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
<div class="cnt_paginacion"><?php //echo $pages->display_pages();?></div>
