<?php
//echo "sdasdas";exit;
$sqlcontenido = db_query("SELECT * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."'");
$nconta=1;
while ($row=db_fetch_array($sqlcontenido))
 {   //include "modulos/web_opciones.php"; 
    // si se llena con un archivo de excel
	if($row['idexcel']<>"" and $nconta=1){
		 $sql_obtener = db_query("select * from excel_archivos where idexcel='".$row['idexcel']."'");
		 $rs_contenidocss = db_fetch_array($sql_obtener);	
		 $miarchivocss=$rs_contenidocss['archivocss'];		   	
		 echo "<link  href='".$miarchivocss."'  rel='stylesheet' type='text/css' >";
		 $nconta++;		
	}	
  ?>
<h1><?=$row['cnomcontenido']?></h1>
<div id="articulo">
     <div class="cont_cabecera">
          <!--Inicio si hay imagen --> 	
          <?php if (trim($row['cimgcontenido'])!=""){ //inicio si 2 ?>
                <div class="img_centro">
                      <a  rel="shadowbox[galeria1]" href="<?=$row['cimgcontenido']?>"  title="<?=$row['cnomcontenido']?>">
                      <!--
                      <img src="/timthumb.php?src=<?=$row['cimgcontenido']?>&w=300&h=170" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>"  width="<?=$row['tamano_cimgcontenido']?>%">                                
                      -->
                      <img src="<?=$row['cimgcontenido']?>" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>"  width="<?=$row['tamano_cimgcontenido']?>%"></a>          
                </div>                    
          <?php } //Fin si 2?>	      
          <!--Fin si hay imagen --> 	 
      </div>
<?php if (trim($row['crescontenido'])!="") {  ?>     
<div class="resumen_articulo"> <?=$row['crescontenido']?>  <!--resumen -->   </div>
<?php } ?>
<div class="contenido_articulo"><?= $row['cdetcontenido']?> </div> <!--contenido --> 
</div><!--fin articulo -->
  <?php //include "modulos/web_galerias.php";?>
  <?php //include "modulos/web_comentarios.php";?>
  <?php // Nota dentro de la pagina se valida
  	include "modulos/comentarios-articulos.php";
  ?>
<?php 
$articulosrelacionados= $row['articulosrelacionados'];
} // Fin while 
?>

<?php 
// se  pone en Form-Actualiza-estilos-web.php
switch ($galeria_imagen) {
    case 'PhotoSwipe':
      include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido-photoswipe.php");
        break;
    case 'Shadowbox':
       include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido.php");
        break;
}
?>
<?php if ($articulosrelacionados==1){
		 include "modulos/articulo_relacionado.php";
	 }
 ?>
