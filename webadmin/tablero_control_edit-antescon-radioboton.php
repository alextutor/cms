<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/tinymce41/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	
	  width: "100%",
    height: 500,	
    plugins: [
        "  advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste "
    ],	
	extended_valid_elements : "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]", 
	
    toolbar: "insertfile undo redo | styleselect | bold italic | " +
             "alignleft aligncenter alignright alignjustify | " +
             "bullist numlist outdent indent | link image",
    language: "es"
});
</script>
<?php  
//por defecto $tipocontenido =1
if($row_contenido['ctiphome'] == '1'){ //--------------------------Imagen

	?>
    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen</td>
        <td class="colblancoend">
         <input type='text' name='imagen' id='imagen' size='80'  maxlength='150' value="<?=$row_contenido['cimgpubli']?>" ><input type="button" value="Seleccionar" onClick="openAsset('imagen')" id="btnAsset" name="btnAsset" >
         
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Ancho</td>
        <td class="colblancoend">
	 <input type='text' name='anchoimagen' id='anchoimagen' value="<?=$row_contenido['nancho']?>" > px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Alto</td>
        <td class="colblancoend">
  <input type='text' name='altoimagen' id='altoimagen' value="<?=$row_contenido['nalto']?>" > px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">URL</td>
        <td class="colblancoend">
 <input type='text' name='urlimagen' id='urlimagen' size="80" value="<?=$row_contenido['curlpubli']?>" >
        </td>
    </tr>
    </table>
	<?php
}
 if($row_contenido['ctiphome'] == '2'){ //--------------------------------Animaciones Flash
	?>
    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
    <tr>
        <td width='150' class='colgrishome' align="right">Flash</td>
        <td class="colblancoend">
          <input type='text' name='flash' id='flash' size='80'  maxlength='150' value="<?=$row_contenido['cimgpubli']?>" ><input type="button" value="Seleccionar" onClick="openAsset('imagen')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Ancho</td>
        <td class="colblancoend">
        <input type='text' name='anchoflash' id='anchoflash' value="<?=$row_contenido['nancho']?>" > px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Alto</td>
        <td class="colblancoend">
		<input type='text' name='altoflash' id='altoflash' value="<?=$row_contenido['nalto']?>" > px
        </td>
    </tr>
    </table>
	<?php
}
if($row_contenido['ctiphome'] == '3'){ //--------------------------------Codigo HTML
	?>
    <table cellpadding='0' cellspacing='0' border='0' width='100%' style=" float:left">
    <tr>
        <td width='150' class='colgrishome' align="right" valign="top">Codigo HTML</td>
    </tr>
        <tr>
        <td class="colblancoend">
       <textarea name="htmlcodigo" id="htmlcodigo" cols="50"  rows="10"><?=$row_contenido['cadspubli']?></textarea>
        </td>
    </tr>
    </table>
	<?php
	
}
if($row_contenido['ctiphome'] == '4'){ //Contenido Dinamico
	?>
    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
    <tr>
        <td width='150' class='colgrishome' align="right">Pagina</td>
        <td class="colblancoend">
      <select name="paginadinam" id="paginadinam" style="width:340px" >
		<?php 
		if ($_SESSION['webuser_nivel'] == '9')
		  	$sql_page = db_query("select * from page  where  cestpage='1' and credpage='' order by cnompage");
		else
		  	$sql_page = db_query("select * from page p, personapage pp  where p.ccodpage=pp.ccodpage and pp.ccodpersona='".$_SESSION['webuser_id']."' and p.cestpage='1' and p.credpage='' order by p.cnompage");
		 while($row_page = db_fetch_array($sql_page)) 
		 {
			 if( $row_page['ccodpage']==$row_contenido['ccodpage'])
				echo '<option value="' . $row_page['ccodpage'] .'" selected>' . $row_page['cnompage'] . '</option>';
			 else
				echo '<option value="' . $row_page['ccodpage'] .'">' . $row_page['cnompage'] . '</option>';
		 }
		?>
            </select>
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Modulo</td>
        <td class="colblancoend">
       <select name="modulodinam" id="modulodinam" style="width:340px" onChange="xajax_procesar_estilos(xajax.getFormValues('form'))">
            <?php 
		$sqlmod = db_query("select * from webmodulos where cestmodulo='1' order by ccodmodulo");
		while ($rowmod = db_fetch_array($sqlmod)) 
		{	
			if($rowmod['ccodmodulo']==$row_contenido['ccodmodulo']){
				echo '<option value='.$rowmod['ccodmodulo'].' selected>'.$rowmod['cnommodulo'].'</option>';
			}else{
				echo '<option value='.$rowmod['ccodmodulo'].'>'.$rowmod['cnommodulo'].'</option>';
			}
		}

            ?>
      </select>
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Seccion</td>
        <td class="colblancoend">
          <select name="secciondinam" id="secciondinam" style="width:340px" >
		<?php 
		   $sql_secniv = db_query("select * from seccion where ccodpage='".$row_contenido['ccodpage']."' and ccodmodulo = '".$row_contenido['ccodmodulo']."' and ctipseccion='1' order by ccodseccion");
           while($row_secniv = db_fetch_array($sql_secniv)) 
		   {
				if ($row_secniv['cnivseccion']=='1')
				{
					if ($row_secniv['ccodseccion']==$row_contenido['ccodseccion']) 
						echo "<option value='".$row_secniv['ccodseccion']."' selected>".$row_secniv['cnomseccion']."</option>";
					else
						echo "<option value='".$row_secniv['ccodseccion']."'>".$row_secniv['cnomseccion']."</option>";	
				}
					
				if ($row_secniv['cnivseccion']=='2') 
				{
					if ($row_secniv['ccodseccion']==$row_contenido['ccodseccion']) 
						echo "<option value='".$row_secniv['ccodseccion']."' selected>&nbsp;&nbsp;&nbsp;&raquo;&nbsp;".$row_secniv['cnomseccion']."</option>";
					else
						echo "<option value='".$row_secniv['ccodseccion']."'>&nbsp;&nbsp;&nbsp;&raquo;&nbsp;".$row_secniv['cnomseccion']."</option>";
				}
					
				if ($row_secniv['cnivseccion']=='3') 
				{
					if ($row_secniv['ccodseccion']==$row_contenido['ccodseccion']) 
						echo "<option value='".$row_secniv['ccodseccion']."' selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;".$row_secniv['cnomseccion']."</option>";
					else
					 	echo "<option value='".$row_secniv['ccodseccion']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;".$row_secniv['cnomseccion']."</option>";		
				}
				if ($row_secniv['cnivseccion']=='4') 
				{
					if  ($row_secniv['ccodseccion']==$row_contenido['ccodseccion']) 
						echo "<option value='".$row_secniv['ccodseccion']."' selected>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;".$row_secniv['cnomseccion']."</option>";
					else
						echo "<option value='".$row_secniv['ccodseccion']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;".$row_secniv['cnomseccion']."</option>";
				}
		   }
        ?>
            </select>
            
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Categoria</td>
        <td class="colblancoend">
        <select name="selectcategoria" id="selectcategoria" style="width:340px" >
        <option value='0'> Todas</option>
		<?php 
		   $modulo = db_query("select * from webparametros  where  ccodparametro='0013' and ctipparametro='1' order by cvalparametro asc");
           while($mod = db_fetch_array($modulo)) 
		   {
				  echo '<option value="'.$mod['cvalparametro'].'">'.$mod['cnomparametro'].'</option>';
		   }
        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Nro. Items</td>
        <td class="colblancoend">
      <input type='text' name='nroitems' id='nroitems' value="<?=$row_contenido['nnroitems']?>" >
        </td>
    </tr>
    
    <tr>
        <td width='150' class='colgrishome' align="right">Orden Extraccion</td>
        <td class="colblancoend">
       <select name="ordendinam" id="ordendinam" style="width:340px" >
            <?php 
               $extra = db_query("select * from webparametros  where  ccodparametro='0007' and ctipparametro='1' order by cvalparametro asc");
               while($ext = db_fetch_array($extra)) 
               {
				   if($mod['cvalparametro']==$row_contenido['ccodorden']){
					   echo '<option value="'.$ext['cvalparametro'].'" selected >'.$ext['cnomparametro'].'</option>';
				   }else{
					   echo '<option value="'.$ext['cvalparametro'].'">'.$ext['cnomparametro'].'</option>';
				   }
                      
               }
            ?>
        </select>
        </td>
    </tr>
    <tr>
        <td class='titlesub' colspan="2">Estilo Seccion</td>
    </tr>
    <tr>
        <td class='colgrishome' colspan="2">
        	<div id="estilos">              
              <ul class='stylos'>
				<?php
                    $sql_estilo = "SELECT * FROM estiloseccion WHERE cestsecestilo='1' AND ccodmodulo='1800' order by ccodsecestilo";
                    $res_estilo = db_query($sql_estilo);
                  
					while($rowestilo = db_fetch_array($res_estilo)) //inicio while 2
                    {
                     
					    if ($rowestilo['ccodsecestilo']==$row_contenido['ccodestilo']) { $check = " checked";} else { $check = "";}
                        echo "<li>\n";
                        echo "<img border='0' src=\"/webadmin/estilos/images/" . $rowestilo['cimgsecestilo'] . "\">	                                        <div style='clear:both;'>
                        <input type='radio' name='selectestilo' value='".$rowestilo['ccodsecestilo']."'".$check.">" . $rowestilo['cnomsecestilo'];
                        echo "</div></li>";
                        //$na++;									
                    }//fin while 2
                    ?>
                </ul>             
           </div>
        </td>
    </tr>
    </table>
	<?php
}

if($row_contenido['ctiphome'] == '5')  //Slider Imagenes (nivo-slider)
{
?>
    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
    <tr>
        <td width='150' class='colgrishome' align="right">Ancho</td>
        <td class="colblancoend">
		 <input type='text' name='anchoimagen' id='anchoimagen'  value="<?=$row_contenido['nancho']?>"> px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Alto</td>
        <td class="colblancoend">
        <input type='text' name='altoimagen' id='altoimagen' value="<?=$row_contenido['nalto']?>"> px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 1</td>
        <td class="colblancoend">
   <input type='text' name='imagen1' id='imagen1' size='80'  maxlength='150' value="<?=$row_contenido['cimagen1']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen1')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 1</td>
        <td class="colblancoend">
        <input type='text' name='url1' id='url1' size='80'  maxlength='150' value="<?=$row_contenido['curl1']?>">
        </td>
    </tr>
    
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 2</td>
        <td class="colblancoend">
    <input type='text' name='imagen2' id='imagen2' size='80'  maxlength='150' value="<?=$row_contenido['cimagen2']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen2')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 2</td>
        <td class="colblancoend">
        <input type='text' name='url2' id='url2' size='80'  maxlength='150' value="<?=$row_contenido['curl2']?>">
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 3</td>
        <td class="colblancoend">
  <input type='text' name='imagen3' id='imagen3' size='80'  maxlength='150' value="<?=$row_contenido['cimagen3']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen3')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 3</td>
        <td class="colblancoend">
        <input type='text' name='url3' id='url3' size='80'  maxlength='150' value="<?=$row_contenido['curl3']?>">
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 4</td>
        <td class="colblancoend">
          <input type='text' name='imagen4' id='imagen4' size='80'  maxlength='150' value="<?=$row_contenido['cimagen4']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen4')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 4</td>
        <td class="colblancoend">
        <input type='text' name='url4' id='url4' size='80'  maxlength='150' value="<?=$row_contenido['curl4']?>">
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 5</td>
        <td class="colblancoend">
          <input type='text' name='imagen5' id='imagen5' size='80'  maxlength='150' value="<?=$row_contenido['cimagen5']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen5')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 5</td>
        <td class="colblancoend">
        <input type='text' name='url5' id='url5' size='80'  maxlength='150' value="<?=$row_contenido['curl5']?>">
        </td>
    </tr>
    
    </table>
<?php } 
if($row_contenido['ctiphome'] == '6') //---------------- Ventana Popup
{
?>
    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
    <tr>
        <td width='150' class='colgrishome' align="right">Ancho</td>
        <td class="colblancoend">
        <input type='text' name='anchoimagen' id='anchoimagen' value="<?=$row_contenido['nancho']?>"> px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Alto</td>
        <td class="colblancoend">
        <input type='text' name='altoimagen' id='altoimagen' value="<?=$row_contenido['nalto']?>"> px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen </td>
        <td class="colblancoend">
          <input type='text' name='imagen' id='imagen' size='80'  maxlength='150' value="<?=$row_contenido['cimgpubli']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right" valign="top">Codigo HTML</td>
        <td class="colblancoend">
        <textarea name="htmlcodigo" id="htmlcodigo"  cols="90" rows="15"><?=$row_contenido['cadspubli']?></textarea>
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Ancho ventana</td>
        <td class="colblancoend">
        <input type='text' name='anchowin' id='anchowin' value="<?=$row_contenido['anchowin']?>"> px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Alto Ventana</td>
        <td class="colblancoend">
        <input type='text' name='altowin' id='altowin' value="<?=$row_contenido['altowin']?>"> px
        </td>
    </tr>
    
    </table>
<?php
}

if($row_contenido['ctiphome'] == '7') //-----------Slider Imagenes (jFlow)
{
?>
    <table cellpadding='0' cellspacing='0' border='0' width='100%'>
    <tr>
        <td width='150' class='colgrishome' align="right">Ancho</td>
        <td class="colblancoend">
		 <input type='text' name='anchoimagen' id='anchoimagen'  value="<?=$row_contenido['nancho']?>"> px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Alto</td>
        <td class="colblancoend">
        <input type='text' name='altoimagen' id='altoimagen' value="<?=$row_contenido['nalto']?>"> px
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 1</td>
        <td class="colblancoend">
   <input type='text' name='imagen1' id='imagen1' size='80'  maxlength='150' value="<?=$row_contenido['cimagen1']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen1')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 1</td>
        <td class="colblancoend">
        <input type='text' name='url1' id='url1' size='80'  maxlength='150' value="<?=$row_contenido['curl1']?>">
        </td>
    </tr>
    <!----Inicio alex-->
     <tr>
        <td width='150' class='colgrishome' align="right">titulo imagen 1</td>
        <td class="colblancoend">
        <input type='text' name='titulo_imagen1' id='titulo_imagen1' size='80'  maxlength='150' value="<?=$row_contenido['titulo_imagen1']?>">
        </td>
    </tr>
     <tr>
        <td width='150' class='colgrishome' align="right">Texto imagen1</td>
        <td class="colblancoend">        
        <textarea name="texto_imagen1" id="texto_imagen1" cols="50"  rows="10"><?=$row_contenido['texto_imagen1']?></textarea>        </td>
    </tr>
     <!----Fin alex-->
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 2</td>
        <td class="colblancoend">
    <input type='text' name='imagen2' id='imagen2' size='80'  maxlength='150' value="<?=$row_contenido['cimagen2']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen2')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 2</td>
        <td class="colblancoend">
        <input type='text' name='url2' id='url2' size='80'  maxlength='150' value="<?=$row_contenido['curl2']?>">
        </td>
    </tr>
    <!----Inicio alex-->
      <tr>
        <td width='150' class='colgrishome' align="right">titulo imagen 2</td>
        <td class="colblancoend">
        <input type='text' name='titulo_imagen2' id='titulo_imagen2' size='80'  maxlength='150' value="<?=$row_contenido['titulo_imagen2']?>">
        </td>
    </tr>
     <tr>
        <td width='150' class='colgrishome' align="right">Texto imagen2</td>
        <td class="colblancoend">        
        <textarea name="texto_imagen2" id="texto_imagen2" cols="50"  rows="10"><?=$row_contenido['texto_imagen2']?></textarea>        </td>
    </tr>
    <!----Fin alex-->
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 3</td>
        <td class="colblancoend">
  <input type='text' name='imagen3' id='imagen3' size='80'  maxlength='150' value="<?=$row_contenido['cimagen3']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen3')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 3</td>
        <td class="colblancoend">
        <input type='text' name='url3' id='url3' size='80'  maxlength='150' value="<?=$row_contenido['curl3']?>">
        </td>
    </tr>
   <!----Inicio alex-->
    <tr>
        <td width='150' class='colgrishome' align="right">titulo imagen 3</td>
        <td class="colblancoend">
        <input type='text' name='titulo_imagen3' id='titulo_imagen3' size='80'  maxlength='150' value="<?=$row_contenido['titulo_imagen3']?>">
        </td>
    </tr>
     <tr>
        <td width='150' class='colgrishome' align="right">Texto imagen3</td>
        <td class="colblancoend">        
        <textarea name="texto_imagen3" id="texto_imagen3" cols="50"  rows="10"><?=$row_contenido['texto_imagen3']?></textarea>        </td>
    </tr>
    <!----Fin alex-->
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 4</td>
        <td class="colblancoend">
          <input type='text' name='imagen4' id='imagen4' size='80'  maxlength='150' value="<?=$row_contenido['cimagen4']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen4')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 4</td>
        <td class="colblancoend">
        <input type='text' name='url4' id='url4' size='80'  maxlength='150' value="<?=$row_contenido['curl4']?>">
        </td>
    </tr>
      <!----ini alex-->
      <tr>
        <td width='150' class='colgrishome' align="right">titulo imagen 4</td>
        <td class="colblancoend">
        <input type='text' name='titulo_imagen4' id='titulo_imagen4' size='80'  maxlength='150' value="<?=$row_contenido['titulo_imagen4']?>">
        </td>
    </tr>
     <tr>
        <td width='150' class='colgrishome' align="right">Texto imagen 4</td>
        <td class="colblancoend">        
        <textarea name="texto_imagen4" id="texto_imagen4" cols="50"  rows="10"><?=$row_contenido['texto_imagen4']?></textarea>        </td>
    </tr>
    <!----Fin alex-->    
    <tr>
        <td width='150' class='colgrishome' align="right">Imagen 5</td>
        <td class="colblancoend">
          <input type='text' name='imagen5' id='imagen5' size='80'  maxlength='150' value="<?=$row_contenido['cimagen5']?>"><input type="button" value="Seleccionar" onClick="openAsset('imagen5')" id="btnAsset" name="btnAsset" > 
        </td>
    </tr>
    <tr>
        <td width='150' class='colgrishome' align="right">Url 5</td>
        <td class="colblancoend">
        <input type='text' name='url5' id='url5' size='80'  maxlength='150' value="<?=$row_contenido['curl5']?>">
        </td>
    </tr>
    
    </table>    
<?php } ?>

<script type="text/javascript">
$(document).ready(function(){
	$("#paginadinam").change(function(){
		$.post("jq_secciones.php",{ idopera:'1',idmodulo:$("#modulodinam").val(),idpage:$("#paginadinam").val()},function(data){$("#secciondinam").html(data);})
	});
	$("#modulodinam").change(function(){
		$.post("jq_secciones.php",{ idopera:'1',idmodulo:$("#modulodinam").val(),idpage:$("#paginadinam").val()},function(data){$("#secciondinam").html(data);})
	});

});
</script>
