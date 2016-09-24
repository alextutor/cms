<!-- modulo paginacion 
http://www.masquewordpress.com/paginacion-php-con-clase/
-->
<link  href="/templates/<?=$cnomplantilla?>/estilos/paginacion.css"	rel="stylesheet" type="text/css">   
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/paginator.class.php'); ?>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=PT+Sans);
	.barra_navegacion { width:50%; margin:10px auto}
</style>
<!-- modulo paginacion -->

<style type="text/css">
.cont_post {width: 100%;padding: 0.5em; display: flex;box-sizing:border-box;  
    justify-content: Space-between;  Flex-wrap: wrap;}
.cont_post .item {
    width: calc((100% - 10px)/2); flex: none; box-shadow: 0 0 0 1px #fff, 0 0 0 2px #ccc;
    box-sizing: border-box;margin-bottom: 20px;display: flex;justify-content: center;
    flex-wrap: wrap;padding: 5px 5px;}
.cont_post .image_post {float: left;width: 30%;}
.cont_post .contenido_post {float: left; display: flex;flex-direction: column; width: 100%;}
.cont_post .titulo_post {margin-bottom: 24px;margin-bottom: 5px; color:#dd2b13}
.cont_post .titulo_post h1 { font-size:18px; text-align:left!important; font-weight: bold;margin-bottom: 2px; text-transform:uppercase;
}
.cont_post .titulo_post a:visited {color:#dd2b13;}
.cont_post .titulo_post a:link {color:#dd2b13;}
.cont_post .titulo_post a:hover {color:#4D4D4D}

.cont_post .publicado_hace {font-size: 11px;font-weight: normal;line-height: 22px;float: left;width: 99%;
background: url(imagenes/icon-time.png) no-repeat top left;padding: 0px 0 0px 3px;}
.cont_post .resumen { font-size:15px; text-align: left; margin-top:10px;
    font-family: "PT Sans", sans-serif;}

.cont_post .continua_leyendo {margin-right: 15px; margin-top:5px;color:#dd2b13;}
.cont_post .continua_leyendo a:visited  {color: #dd2b13;}
.cont_post .continua_leyendo a:link  {color: #dd2b13;    float: right;}
.cont_post .continua_leyendo a:hover {color:#4D4D4D}

.cont_post a:visited {text-decoration: none;color: #1b0e05;font-weight: bold;}
.cont_post :hover{background-color:#FFF; cursor:pointer;} /* cambia de color cuando pasa el mouse por encima del div */
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
//echo "hola";exit;
/*ccodcategoria=1   es cuando se escoge en el formulario gestor articulo opcion Categoria Normal
/*ccodcategoria=2   es cuando se escoge en el formulario gestor articulo opcion Categoria Destacado

/* Entra cuando categoria es Destacado*/
$sql="SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' AND c.estado='1' and c.ccodcategoria='2'  order by c.dfeccontenido asc LIMIT 0 , 1 ";

//echo $sql;exit;

$sqlpag   = mysql_query($sql);
while ($rowpag=db_fetch_array($sqlpag))
{
	$codcont = $rowpag['ccodcontenido'];
	$webpag  = "modulos/".$rowpag['cincestcontenido'];
	db_query("UPDATE contenido SET   nviscontenido = nviscontenido + 1  WHERE ccodcontenido = '" . $codcont . "'");
	db_query("INSERT INTO visitascontenido (ccodvisita, ccodcontenido, cestvisita, cestvoto ) VALUES ('".$_SESSION['NROCONTENIDO']."','".$codcont."','1','0' )");
	include $webpag;	// Llama a articuloderecha.php o a otro 
	//echo $webpag;exit;	
}

//exit;
/*--------------------- Aqui entra Cuando categoria es Normal y no Destacado 
                   Lista los articulos que son seleccionados para esa seccion   ----------------*/
				   
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.cordcontenido asc ";
//echo $sql_query ;exit;
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
<article class="cont_post" class-hover="cont_post" >
	<?php if($pagsecc<$num_rows){?> <div class="barra_navegacion"><?=$pages->display_pages();?></div> <?php } ?>
    <?php 
    $producto_query = db_query($sql_query. " $pages->limit " );
    while ($row=db_fetch_array($producto_query))
    { 	
        
        if($row['curlcontenido']=="")
        {
            $nomurl        = crearurl_articulo($row['ccodseccion']);
            //quitado barra / seccion ofertas sus enlaces de subcategorias mostraba 2 barras
            //$enlaceurl     = "/".$nomurl.$row['camicontenido'];
            $enlaceurl     = "/".$nomurl."/".$row['camicontenido'];
            $enlacedestino = "";
    
        }
        else
        {
            $enlaceurl     = $row['curlcontenido'];
            $enlacedestino = "target='_blank'";
        }
    ?>
        <div class="item">            
			<?php
            if($row['cimgcontenido']!=""){ ?>
                <div class="image_post">
                <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
                    <img src="/timthumb.php?src=<?php echo $row['cimgcontenido']; ?>&w=180&h=130&zc=0&q=100&s=1" border="0" 
                    title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>" align="left" >
                </a>    
                </div>
            <?php } ?>                
            <div class="contenido_post">
                <header class="titulo_post">
                  <h1>
                      <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
                      <?=$row['cnomcontenido']?></a>
                  </h1>                       
                </header>        
                 <div class="publicado_hace">Fecha de Publicación : <time datetime="<?=$row['dfeccontenido']?>"><?=traducefecha($row['dfeccontenido'],"N")?></time></div>                  
                 <div class="resumen"><?=$row['crescontenido']?></div>       
                  <div class="continua_leyendo">                      
                   <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?> > 
                    [ Leer mas ]              	
                   </a>
                  </div>               
          </div> <!-- Fin conteni_post -->  
      </div>  <!-- Fin Item -->        
    <?php  } // fin while?>    
</article>

<?php if($pagsecc<$num_rows){?> <div class="barra_navegacion"><?=$pages->display_pages();?></div> <?php } ?>
 <!-- Aumentar el tamaño de un DIV de acuerdo a los contenidos internos del mismo 
 poner en el padre overflow:hidden;   -->   
<?php //=paginar($pag, $total, $pagsecc, 3, $rutasec);?>

