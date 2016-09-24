<?php session_start();
$_SESSION['paginaactual']=$_SERVER["REQUEST_URI"]; //sirve cuando estoy en ver carrito vuelva a esta pagina
//para moneda  variables a usar $cMoneda $cSimboloMoneda
include($_SERVER['DOCUMENT_ROOT']."/modulos/rs-moneda.php");

/*----Inicio Contador */
$sqlpag   = db_query("SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='2'  order by c.dfeccontenido asc LIMIT 0 , 1 ");
while ($rowpag=db_fetch_array($sqlpag))
{
	$codcont = $rowpag['ccodcontenido'];
	$webpag  = "modulos/".$rowpag['cincestcontenido'];
	db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
	db_query("INSERT INTO visitascontenido (ccodvisita, ccodcontenido, cestvisita, cestvoto ) VALUES ('".$_SESSION['NROCONTENIDO']."','".$codcont."','1','0' )");
	include $webpag;
}
/*----Fin Contador */

/*----Inicio Aqui no se que hace investigar */
$sql_seccion = "SELECT * FROM  seccion WHERE ccodseccion like '".$cat."%' and cnivseccion='".($nivsecc+1)."' AND cestseccion='1' ";

$que_seccion = db_query($sql_seccion);
while ($row_seccion=db_fetch_array($que_seccion))
{ 
	$enlaceurl     = $rutasec."/".$row_seccion['camiseccion'];
?>
	<div class="seccionindex50">
		<dl class="seccionindex" >
			<dt>
			<?php	if($row_seccion['cimgseccion']!="")	{ ?>
				<a href="<?=$enlaceurl?>" title="<?=$row_seccion['cnomseccion']?>" ><img src="webfiles/cabeceras/<?=$row_seccion['cimgseccion']?>" border="0" title="<?=$row_seccion['cnomseccion']?>" width="140" alt="<?=$row_seccion['cnomseccion']?>" ></a>
			<?php } ?>
			</dt>
			<dd><a href="<?=$enlaceurl?>" title="<?=$row_seccion['cnomseccion']?>"><?=$row_seccion['cnomseccion']?></a><br /><?=$row_seccion['cdesseccion']?></dd>
		</dl>
	</div>
<?php } 

/*----Fin Aqui no se que hace investigar */

$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.dfeccontenido desc ";
$query = db_query($sql_query);

$total = db_num_rows($query);
$pag    = $pagina;
$numpags = ceil($total/$pagsecc);
$reg     = ($pag-1) * $pagsecc;
$producto_query = db_query($sql_query . " LIMIT " .$reg." , ".$pagsecc);
$i=0;
?>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>
<div class="product_list">
<?php
while ($row=db_fetch_array($producto_query))
{ 
	//$nContador=$nContador+1;
	$class = ($i++ & 1) == 1 ? 'odd' : 'even';
	
	if($row['curlcontenido']=="")
	{
		$nomurl        = crearurl_articulo($row['ccodseccion']);
		$enlaceurl     = "/".$nomurl.$row['camicontenido'];
		$enlacedestino = "";

	}
	else
	{
		$enlaceurl     = $row['curlcontenido'];
		$enlacedestino = "target='_blank'";
	}
?>
    
    	<div class="product_item_in_list" style="width: 100%;">
            <div class="item_img">
                 <?php
                  if($row['cimgcontenido']!="")
                  {
                  ?>
                  <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
                  <img src="<?=$row['cimgcontenido']?>" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>" width="220px" height="120px" >
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
									if($row['precio_oferta']<>0){
									echo "<div class='red text_decora_line_through'>
									  <span class='verde_mar bold'>Antes </span>" .
                                     $cSimboloMoneda."  " .number_format($row['precio'],2). 
                                    "</div>";
									echo "<div class='red m_top_3'>
									<span class='verde_mar bold'>Oferta</span>" .
									 $cSimboloMoneda.number_format($row['precio_oferta'],2) ."</div>";	
									}else{		
									echo  $cSimboloMoneda ."  " .number_format($row['precio'],2);
										}
									 									
									?>
                                </div>                              
                                
                                <div style="clear: both;"></div>
                                                             
                              <div class="addCart">                     	
                                    <div class="add-cart-button">                                   
                                     <a href="/modulos/tienda_virtual/agregar_pedido.php?ccodcontenido=<?=$row['ccodcontenido']?>&actualizar=0">
                               <div class="to-cart-but" style="display: block;">Comprar</div>  
	                               </a>
                                </div>                                                                    
                              </div>
                            </div>    
                            <div class="name">
								<a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>"
                                 <?=$enlacedestino?>><?=$row['cnomcontenido']?></a>
                                <br>
                            </div>            
                        </div>                        
                        <div class="foot">
                        	<div class="id_weight"><?php echo $row['crescontenido']?></div>
                        </div>
                    </div>    
                </div>
            </div>
         </div>    
         	
<?php } //fin while 3?>       
</div>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>