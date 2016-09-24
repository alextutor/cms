<?php session_start();
$_SESSION['paginaactual']=$_SERVER["REQUEST_URI"]; //sirve cuando estoy en ver carrito vuelva a esta pagina
//para moneda  variables a usar $cMoneda $cSimboloMoneda
include($_SERVER['DOCUMENT_ROOT']."/modulos/rs-moneda.php");

/*----Inicio Contador */
$sqlpag   = db_query("SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='2'  order by c.dfeccontenido desc LIMIT 0 , 1 ");
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

$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.inicioclases  desc ";
$query = db_query($sql_query);

$total = db_num_rows($query);
$pag    = $pagina;
$numpags = ceil($total/$pagsecc);
$reg     = ($pag-1) * $pagsecc;
$producto_query = db_query($sql_query . " LIMIT " .$reg." , ".$pagsecc);
$i=0;
?>
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>
<div>
<?php
///-----------------Inicio Implementado por mi		
//implemente alex para que muestre como portada estilo_pre-curso_01.php
$sqlstylos="SELECT s.ccodclase,s.cnomseccion,es.cdesclase,es.cdesclase,es.cdesclase from seccion s,estiloclases es where  
s.ccodclase=es.ccodclase and ccodseccion='".$codsecc."'";
$rsStylos = db_query($sqlstylos);
$roStylos  = db_fetch_array($rsStylos);
echo "<div id='".$roStylos['cdesclase']."'>";
echo "<div class='".$roStylos['cdesclase']."_titulo'>".$roStylos['cnomseccion']."</div>";
echo "<div class='".$roStylos['cdesclase']."_detalle'>";
///-----------------Fin Implementado por mi		
while ($row=db_fetch_array($producto_query))
{ 
	//$nContador=$nContador+1;
	$class = ($i++ & 1) == 1 ? 'odd' : 'even';
	$nomurl   = crearurl_articulo($row['ccodseccion']);			
	$ruta     = "/".$nomurl."/".$row['camicontenido'];
	
	
	if($row['curlcontenido']=="")
	{
		$nomurl        = crearurl_articulo($row['ccodseccion']);
		$enlaceurl     = "/".$nomurl."/".$row['camicontenido'];
		$enlacedestino = "";

	}
	else
	{
		$enlaceurl     = $row['curlcontenido'];
		$enlacedestino = "target='_blank'";
	}
?>

<div class="ctn_global">
	<div class="ctn_izquierda">
   	 <?php
        if($row['cimgcontenido']!="")
        {
        ?>
        <a href="<?=$ruta?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
        <img src="<?=$row['cimgcontenido']?>" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>" width="220" >
        </a>
      <?php } ?>    
    </div>
    <div class="ctn_derecha">
    	<div class="name">
	        <a href="<?=$ruta?>" title="<?=$row['cnomcontenido']?>"
         <?=$enlacedestino?>><?=$row['cnomcontenido']?></a>
        </div> 
        <div class="izq_inte_50">Duración:</div><div class="dere_inte_50"><?=$row['duracion_curso']?></div>
        <div class="izq_inte_50">inicioclases:</div><div class="dere_inte_50"><?=traducefecha($row['inicioclases'],'N')?></div>
        <div class="izq_inte_50">modalidad:</div><div class="dere_inte_50"><?=$row['modalidad_curso']?></div>    	
        <div class="izq_inte_50">Precio:</div><div class="dere_inte_50"><?= $cSimboloMoneda.number_format($row['precio'],2)    ?></div>    	
    </div>
    <div class="clear"></div>
</div>         	
<?php } //fin while 3
echo "</div></div>";	
?>       
<?=paginar($pag, $total, $pagsecc, 3, $rutasec);?>