<?php
$sqlcontenido = db_query("SELECT * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."'");
while ($row=db_fetch_array($sqlcontenido))
 { //include "modulos/web_opciones.php"; 
?>
	<h1><?=$row['cnomcontenido']?></h1>
<div id="articulo">
   <div class="cont_cabecera">
      <div class="img_izq">        
          <?php if (trim($row['cimgcontenido'])!=""){ ?>                
              <a  rel="shadowbox[galeria1]" href="<?=$row['cimgcontenido']?>"  title="<?=$row['cnomcontenido']?>">
              <img src="<?=$row['cimgcontenido']?>" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>" width="100%" ></a>
      
     </div>   
  <?php }?>
  	 <div class="texto_dere"> <?=$row['crescontenido']?> </div>  <!--resumen -->
     <div style="clear:both"></div>
  </div>
  <div class="contenido_articulo"><?= $row['cdetcontenido']?>  <!--contenido --></div>
</div><!--fin articulo -->
    <?php //include "modulos/web_galerias.php";?>
    <?php //include "modulos/web_comentarios.php";?>
<?php }?>
<br />
 <?php  include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido.php");?>