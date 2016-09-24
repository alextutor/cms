<!-- modulo paginacion 
http://www.masquewordpress.com/paginacion-php-con-clase/
-->
<link  href="/templates/<?=$cnomplantilla?>/estilos/paginacion.css"	rel="stylesheet" type="text/css">   
<?php  include_once($_SERVER['DOCUMENT_ROOT'].'/paginator.class.php'); ?>
<style type="text/css">
	.barra_navegacion { width:50%; margin:10px auto}
</style>
<!-- modulo paginacion -->

<style type="text/css">
.post { width:100%;flex: none;display: flex;
justify-content: space-between;flex-wrap: wrap;box-sizing:border-box;
	 margin-bottom:.5em;padding: 0.5em; border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 5px;
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1) inset;overflow:hidden; float:left;}
.post img{ width:100%;}
.post .image_post {width: 30%;}
.post .conteni_post {width: 70%; padding: 0px 5px;box-sizing: border-box;}
.post .titulo_post {margin-bottom: 24px;margin-bottom: 5px; color:#006c97}
.post .titulo_post h1 { font-size:13px; text-align:left; font-weight:bold;margin-bottom: 2px;}
.post .titulo_post a:visited {color:#006c97}

.post .fechainicio {font-size: 13px;font-weight: bold;width: 99%;text-align: right; margin-bottom:5px;}

.post .publicado_hace {font-size: 11px;font-weight: normal;line-height: 22px;float: left;width: 99%;
background: url(imagenes/icon-time.png) no-repeat top left;padding: 0px 0 0px 3px;}
.post .resumen { font-size:13px; text-align: left; margin-top:10px;}
.post .continua_leyendo {margin-bottom: 5px;float: right;margin-right: 15px; margin-top:5px; font-weight:bold; background-color:#EF8585; padding:5px 9px; border-radius:10px;}
.post .continua_leyendo a:visited  {color: #FFF;}
.post a:visited {text-decoration: none;color: #1b0e05;font-weight: bold;}
.post:hover{background-color: #F0F0F0; cursor:pointer;}
</style>  
    
<!--  Para cambiar el div al pasar mouse funciona con  .post:hover 
<article class="post" class-hover="post" > -->
<script>
	$(function() {
	$('div[class-hover]').hover(function() {
	$(this).attr('tmp', $(this).attr('class')).attr('class', $(this).attr('class-hover')).attr('class-hover', $(this).attr('tmp')).removeAttr('tmp');
	}).each(function() {
	$('<div />').attr('class', $(this).attr('class-hover'));
	});;
	});
</script>
<!--  Para cambiar el div al pasar mouse  -->

<?php 
$sql="SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='2'  order by c.dfeccontenido asc LIMIT 0 , 1 ";
//echo $sql;exit;
$sqlpag   = mysql_query($sql);

while ($rowpag=db_fetch_array($sqlpag))
{
	$codcont = $rowpag['ccodcontenido'];
	$webpag  = "modulos/".$rowpag['cincestcontenido'];
	db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
	db_query("INSERT INTO visitascontenido (ccodvisita, ccodcontenido, cestvisita, cestvoto ) VALUES ('".$_SESSION['NROCONTENIDO']."','".$codcont."','1','0' )");
	include $webpag;
}
$sql_seccion = "SELECT * FROM  seccion WHERE ccodseccion like '".$cat."%' and cnivseccion='".($nivsecc+1)."' AND cestseccion='1' ";
$que_seccion = db_query($sql_seccion);

while ($row_seccion=db_fetch_array($que_seccion))
{ 
	$enlaceurl     = $rutasec."/".$row_seccion['camiseccion'];
?>
	<div class="seccionindex100">
		<dl class="seccionindex" >
			<dt>
			<?php	if($row_seccion['cimgseccion']!="")	{ ?>            
				<a href="<?=$enlaceurl?>" title="<?=$row_seccion['cnomseccion']?>" >
                 <img src="/timthumb.php?src=<?=$row_seccion['cimgseccion']; ?>&w=140&h=100&zc=0&q=100&s=1" border="0" 
              title="<?=$row_seccion['cnomseccion']?>"  alt="<?=$row_seccion['cnomseccion']?>" align="left">
               </a>    
          <?php } ?>
			</dt>
			<dd><a href="<?=$enlaceurl?>" title="<?=$row_seccion['cnomseccion']?>"><?=$row_seccion['cnomseccion']?></a><br /><?=$row_seccion['cdesseccion']?></dd>
		</dl>
	</div>
<?php }

/*------------------------------ Aqui entra si es Normal ---------------------------------------------*/

$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.cordcontenido asc ";
//echo $sql_query;exit;
/*$query = db_query($sql_query);
$total = db_num_rows($query);
$pag    = $pagina;
//echo "total:".$total."pagsecc:".$pagsecc;exit;
//echo $sql_query;exit;
$numpags = ceil($total/$pagsecc);
//echo "numpags:".$numpags;exit;
$reg     = ($pag-1) * $pagsecc;
//echo "reg:".$reg."pag:".$pag."pagsecc:".$pagsecc;exit; 
//echo $sql_query . " LIMIT " .$reg." , ".$pagsecc;exit;*/

//----------------- Inicio Paginacion alex ----------------------
$rsquery = db_query($sql_query);
$num_rows=mysql_num_rows($rsquery);
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}
$pages = new Paginator;
$pages->items_total = $num_rows; //cuantos registros se mostraran
// Configuramos el total de links a mostrar. Por ejemplo el valor <br />
//por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
$pages->mid_range = 3; 
$pages->items_per_page= $pagsecc; // $pagsecc viene de index.php
$pages->paginate();
//----------------- Fin Paginacion ----------------------
//echo $pagsecc."-".$num_rows;exit;
?>

<?php if($pagsecc<$num_rows){?> <div class="barra_navegacion"><?=$pages->display_pages();?></div> <?php } ?>
<?php 
$producto_query = db_query($sql_query. " $pages->limit " );
while ($row=db_fetch_array($producto_query))
{ 	
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
<article class="post" class-hover="post" >
    <div class="image_post">
        <?php
        if($row['cimgcontenido']!=""){ ?>
        <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
        	  <img src="/timthumb.php?src=<?=$row['cimgcontenido']; ?>&w=140&h=100&zc=0&q=100&s=1" border="0" 
              title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>" align="left">          
        </a>    
        <?php } ?>             
    </div>      
    <div class="conteni_post">
        <header class="titulo_post">
          <h1>
              <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
              <?=$row['cnomcontenido']?></a>
          </h1>                       
        </header>   
   		<div class="fechainicio">Mes de Inicio : <?=traducefecha($rowcontenido1['inicioclases'],"MY")?> </div>                                  
         <div class="resumen"><?=$row['crescontenido']?></div>       
         <div class="publicado_hace">Fecha de Publicación : <time datetime="<?=$row['dfeccontenido']?>"><?=traducefecha($row['dfeccontenido'],"N")?></time></div>                 
          <div class="continua_leyendo">                      
           <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?> style="color:#FFF" >               Continúa Leyendo
           </a>
          </div>        
       
  </div>  
        
</article>
<?php  } // fin while?>    

<?php if($pagsecc<$num_rows){?> <div class="barra_navegacion"><?=$pages->display_pages();?></div> <?php } ?>
 <!-- Aumentar el tamaño de un DIV de acuerdo a los contenidos internos del mismo 
 poner en el padre overflow:hidden;   -->   
<?php //=paginar($pag, $total, $pagsecc, 3, $rutasec);?>