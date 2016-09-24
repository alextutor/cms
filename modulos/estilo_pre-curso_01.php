<?php session_start();				 			
	//viene de include/funciones_web.php (function contenidosweb($codbanner))
	$i=0;
	//para moneda  variables a usar $cMoneda $cSimboloMoneda
	include($_SERVER['DOCUMENT_ROOT']."/modulos/rs-moneda.php");	 
	 
	 //$sql1 solo es para sacar el total de registros sin $pages->limit
	 
	 //hablitar si deseas que muestre paginacion
	 /* $sql1   = "Select c.ccodcontenido,c.cnomcontenido,c.camicontenido,c.crescontenido,c.curlcontenido,s.ccodseccion,c.cimgcontenido,c.ccodmodulo,c.dfeccontenido,c.precio,c.precio_oferta,c.garantia,s.ccodseccion FROM contenido c, seccioncontenido s where c.ccodcontenido=s.ccodcontenido and  c.cestcontenido='1' and c.ccodmodulo='".$rowads['ccodmodulo']."' ".$sql_seccion.$sql_cate." order by c.ccodcontenido desc ";
	 	
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
		echo "</div>";*/
	
	 $sql2   = "Select c.ccodcontenido,c.cnomcontenido,c.camicontenido,c.crescontenido,c.curlcontenido,s.ccodseccion,c.cimgcontenido,c.ccodmodulo,c.dfeccontenido,c.precio,c.precio_oferta,c.garantia,c.duracion_curso,c.inicioclases,c.modalidad_curso FROM contenido c, seccioncontenido s where c.ccodcontenido=s.ccodcontenido and  c.cestcontenido='1' and c.ccodmodulo='".$rowads['ccodmodulo']."' ".$sql_seccion.$sql_cate." order by c.inicioclases desc $pages->limit";
	 
	 
	$hometabla = db_query($sql2);	
	
while($rowhome  = db_fetch_array($hometabla))	
	{	
	//$nContador=$nContador+1;
	$class = ($i++ & 1) == 1 ? 'odd' : 'even';
	
	$nomurl   = crearurl_articulo($rowhome['ccodseccion']);			
	$ruta     = "/".$nomurl."/".$rowhome['camicontenido'];

	$sqlxsex  = db_query("Select cnomseccion,camiseccion FROM seccion where ccodseccion='".$rowhome['ccodseccion']."' ");
	$rowxsex  = db_fetch_array($sqlxsex);	
?>
<div class="ctn_global">
	<div class="ctn_izquierda">
   	 <?php
        if($rowhome['cimgcontenido']!="")
        {
        ?>
        <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>" <?=$enlacedestino?>>
        <img src="<?=$rowhome['cimgcontenido']?>" border="0" title="<?=$rowhome['cnomcontenido']?>"  alt="<?=$rowhome['cnomcontenido']?>" width="220" >
        </a>
      <?php } ?>    
    </div>
    <div class="ctn_derecha">
    	<div class="name">
	        <a href="<?=$ruta?>" title="<?=$rowhome['cnomcontenido']?>"
         <?=$enlacedestino?>><?=$rowhome['cnomcontenido']?></a>
        </div> 
        <div class="izq_inte_50">Duración:</div><div class="dere_inte_50"><?=$rowhome['duracion_curso']?></div>
        <div class="izq_inte_50">inicioclases:</div><div class="dere_inte_50"><?=traducefecha($rowhome['inicioclases'],'N')?></div>
        <div class="izq_inte_50">modalidad:</div><div class="dere_inte_50">
		<?php 
         $rsmodacurso = db_query("select * from webparametros where ccodparametro='0019' and ctipparametro='1' and 
		 cvalparametro='".$rowhome['modalidad_curso']."'" );
		 $rowmodacurso = db_fetch_array($rsmodacurso);
		 echo $rowmodacurso['cdesparametro'];	
        ?>
        </div>    	
        <div class="izq_inte_50">Precio:</div><div class="dere_inte_50"><?= $cSimboloMoneda.number_format($rowhome['precio'],2) . "  ". $cMoneda ?></div>    	
    </div>
    <div class="clear"></div>
</div>	
<?php }	?>
<div class="cnt_paginacion"><?php //echo $pages->display_pages();?></div>
