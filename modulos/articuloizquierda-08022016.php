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
            <img src="<?=$row['cimgcontenido']?>" border="0" title="<?=$row['cnomcontenido']?>"  
            alt="<?=$row['cnomcontenido']?>" width="100%"></a>
 		<?php }?>      
      </div>   
  	 <div class="texto_dere"> <?=$row['cdetcontenido']?> </div>  <!--contenido  -->
  </div>
  <!--<div class="contenido_articulo"><?= $row['crescontenido']?> </div> <!--resumen--> 
</div><!--fin articulo -->
    <?php //include "modulos/web_galerias.php";?>
    <?php //include "modulos/web_comentarios.php";?>
<?php } //Fi while  ?>
<br />
 <?php  include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido.php");?>