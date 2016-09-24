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
<?php if(trim($row['crescontenido'])!="") {//inicio si 1	?>
     <div class="cont_cabecera">
          <!--Inicio si hay imagen --> 	
          <?php if (trim($row['cimgcontenido'])!=""){ //inicio si 2 ?>
                <div class="img_dere">
                      <a  rel="shadowbox[galeria1]" href="<?=$row['cimgcontenido']?>"  title="<?=$row['cnomcontenido']?>">
                      <img src="/timthumb.php?src=<?=$row['cimgcontenido']?>&h=170" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>"  width="100%"></a>          
                </div>     
                <div class="texto_izq"> <?=$row['crescontenido']?> </div><!--resumen -->
          <?php } //Fin si 2?>	      
          <!--Fin si hay imagen --> 	 
          
          <!--Inicio si hay resumen y no hay imagen el texto ocupado todo el contenido--> 	
          <?php 
          if(trim($row['crescontenido'])!="" and trim($row['cimgcontenido'])=="") {	//inicio si 3 ?>
		  	 <div class="texto_total"> <?=$row['crescontenido']?> </div><!--resumen -->	
		  <?php } //Fin si 3?>	      
          <!--Fin si hay resumen y no hay imagen --> 	
     </div>
 <?php } //fin si 1 ?>  
<div class="contenido_articulo"><?= $row['cdetcontenido']?> </div> <!--contenido --> 
</div><!--fin articulo -->
  <?php //include "modulos/web_galerias.php";?>
  <?php //include "modulos/web_comentarios.php";?>
<?php } // Fin while ?>

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
