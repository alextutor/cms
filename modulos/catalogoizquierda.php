<?php
/*----Inicio Moneda */
$sqlmoneda   = db_query("SELECT p.*,w.cnomparametro,w.cdesparametro FROM  page p, webparametros w where ccodpage ='12172806' AND p.ccodmoneda=w.cvalparametro");
$rowMoneda=db_fetch_array($sqlmoneda);
$cMoneda=$rowMoneda['cnomparametro'];
$cSimboloMoneda=$rowMoneda['cdesparametro'];
/*----Fin Moneda */

$sqlcontenido = db_query("SELECT * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."'");
while ($row=db_fetch_array($sqlcontenido))
 { 
	//include "modulos/web_opciones.php"; 
	?>
	<h1><?=$row['cnomcontenido']?></h1>
    <div id="articulo">
    <?=$row['cescontenido']?>
    <div class="cont_cabecera">
        <div class="img_izq"> 
          <?php if (trim($row['cimgcontenido'])!="") 
            { 
            ?>
            <a href="<?=$row['cimgcontenido']?>"  title="<?=$row['cnomcontenido']?>" rel="gb_imageset[nice_pics]">
            <img src="<?=$row['cimgcontenido']?>" width="180px" height="140px" border="0" align="left" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>"></a>
        <?php }?>    
        </div>
        <div class="texto_dere"> 
            <div class="precio colorprecio"><span class="lblprecio">Precio:</span>
			 <?php 									
			  if($row['precio_oferta']<>0){
				  echo "<div class='red text_decora_line_through '>
					<span class='verde_mar'>Antes &nbsp;</span>" .
				   $cSimboloMoneda."  " .number_format($row['precio'],2). 
				  "</div>";
				  echo "<div class='red m_top_3 bold'>
				  <span class='verde_mar'>Oferta&nbsp; </span>" .
				   $cSimboloMoneda.number_format($row['precio_oferta'],2) ."</div>";	
				  }else{		
				  echo  $cSimboloMoneda ."  " .number_format($row['precio'],2);
			 }
			?>       
            </div>
            <div class="garantia colorprecio"><span class="lblprecio">Garantía :</span><?=$row['garantia']?></div>
            <a href="/modulos/tienda_virtual/agregar_pedido.php?url=<?=$_SERVER["REQUEST_URI"];?>&ccodcontenido=<?=$row['ccodcontenido']?>&actualizar=0">
            <div class="ctn_boton_comprar"><div class="boton_comprar">Comprar</div></div>
            </a>
            <div class="resumen"><?=$row['crescontenido']?></div> <!--resumen -->
        </div>     
        <div style="clear:both"></div>
    </div>       
   
    <?= $row['cdetcontenido']?> <!--contenido -->
	<?php
	//include "catalogo_consultas.php";
	?>
    </div>
<?php }?>

