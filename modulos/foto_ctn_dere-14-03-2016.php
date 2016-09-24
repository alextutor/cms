<!-- paginacion  Paso 1
http://www.masquewordpress.com/paginacion-php-con-clase/
-->
<link  href="/templates/<?=$cnomplantilla?>/estilos/paginacion.css"	rel="stylesheet" type="text/css">   
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/paginator.class.php'); ?>
<style type="text/css">
	.barra_navegacion { width:50%; margin:10px auto}
</style>
<!-- Fin paginacion Paso 1-->
<?php //echo $codsecc."dadas";exit; 
//http://www.cristalab.com/tutoriales/carga-de-imagenes-a-demanda-con-jquery-c108616l/

/*$codigo = substr($codsecc,0,12); // esto alex lo agregue alex
$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion like '".$codigo."%' AND c.cestcontenido='1' and c.ccodcategoria='1' ";*/

$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.dfeccontenido desc ";
//echo $sql_query ;exit;
//----------------- Paginacion Paso 2  alex ----------------------
$rsquery = db_query($sql_query);
$num_rows=mysql_num_rows($rsquery);
$nroelemamostrar=20; // nro de elementos a mostrar por pagina
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
$pages->items_per_page= $nroelemamostrar;
$pages->paginate();
//----------------- Fin Paginacion Paso 2 ----------------------
?>
<!--Paginacion Paso 3 -->
<?php if ($num_rows > $nroelemamostrar){?><div class="barra_navegacion"><?=$pages->display_pages();?></div><?php } ?>

<?php
//echo $codsecc ; exit;
//echo $homesql;exit;
//$hometabla = db_query($homesql);
//$num_rows=mysql_num_rows($hometabla);
//echo $num_rows;exit;
$sqlstylo   = "Select s.cnomseccion, s.ccodseccion,ec.cnomclase,ec.cdesclase  FROM seccion s,estiloclases ec  WHERE   s.ccodclase=ec.ccodclase and s.ccodseccion= '".$codsecc."'"; 
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);
//echo $sqlstylo;exit;
?>
<?php
// Paginacion Paso 4 
//echo $sql_query;exit;
$producto_query = db_query($sql_query. " $pages->limit " );
?>
  <div class="<?=$rowstylo['cdesclase']?>" >       
  	<h1><?=$rowstylo['cnomseccion']?></h1>       
	<?php  
	while($rowhome  = db_fetch_array($producto_query)){ ?>         	  
         <!--
         <a rel="shadowbox[<?=$codsecc?>]" href="<?=$rowhome['cimgcontenido']?>"  title="<?=substr($rowhome['cnomcontenido'], 0, -4);?> " > 
          -->
         <a class="grouped_elements" rel="<?=$codsecc?>" href="<?=$rowhome['cimgcontenido']?>"  title="<?=substr($rowhome['cnomcontenido'], 0, -4);?> " />  
         
           <div class="info-image">
                     <img src='/timthumb.php?src=<?=$rowhome['cimgcontenido'] ?>&h=90&w=115&zc=0&q=100&s=1' border=0 title='<?=substr($rowhome['cnomcontenido'], 0, -4);?>' />	                  															           </div>
           <span class="titulo">
              <?php //echo substr($rowhome['cnomcontenido'],0,-4)  // quita .jpg ?>
          </span>                                  
           </a>     		
      <?php  } // Fin while  ?>
     </div>
 
 <!-- Paginacion Paso 5 -->
<?php if ($num_rows > $nroelemamostrar){?><div class="barra_navegacion"><?=$pages->display_pages();?></div><?php } ?>

<div class="clear"></div>
<!--http://www.workmate.nu/cgi-sys/defaultwebpage.cgi  ejemplo de listta -->