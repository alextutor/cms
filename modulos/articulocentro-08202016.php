<?php //echo $columnacenancho."hola huiza";exit;
$sqlarcentro="SELECT * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."'";
//echo $sqlarcentro;exit;


$sqlcontenido = db_query($sqlarcentro);
while ($row=db_fetch_array($sqlcontenido))
 { 
	//include "modulos/web_opciones.php"; 
	?>
	<h1><?=$row['cnomcontenido']?></h1>
   	<div id="articulo">
	<?php if (trim($row['cimgcontenido'])!="") 
		{ 
		?>
		<a rel="shadowbox[<?=$codcont?>]" href="<?=$row['cimgcontenido']?>"  title="<?=$row['cnomcontenido']?> " >        <!-- 
      <img src="<?=$row['cimgcontenido']?>" width="<?=$columnacenancho-30?>" border="0" title="<?=$row['cnomcontenido']?>" alt="<?=$row['cnomcontenido']?>" >          
    -->              
        <div class="img_centro">
              <img src="/timthumb.php?src=<?=$row['cimgcontenido']?>&h=170" border="0" title="<?=$row['cnomcontenido']?>"  alt="<?=$row['cnomcontenido']?>"  width="100%">          
         </div>             
        </a>
        <div class="resumen_articulo"> <?=$row['crescontenido']?>  <!--resumen -->   </div>
        <div class="contenido_articulo"> <?=$row['cdetcontenido']?>  <!--contenido -->   </div>
        
	<?php }?>
	
    <!--insertando la galeria de fotos por articulo --><br /><br />    
    </div>
    <?php  include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/listado-horizontal-foto-contenido.php");?>
<?php }?>



