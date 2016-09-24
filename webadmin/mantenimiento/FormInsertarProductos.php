<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php
 $imagen295x299=$_GET['imagen295x299'];   //recoje imagen del campo Imagen a Mostrar   
 $idcategoria=$_GET["idcategoria"];
 $idsudcategoria=$_GET["idsudcategoria"];
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
?>

<!--Inicio Calendario -->
<link rel="stylesheet" type="text/css" href="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/calendario_dw-estilos.css"/>
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/calendario_dw.js"></script>
<!--El último paso es colocar un script Javascript que invoque el plugin jQuery para hacer que el campo de texto se convierta en un calendario. -->
<script type="text/javascript">
$(document).ready(function(){
	$(".campofecha").calendarioDW();
})
</script>
<!--Fin Calendario -->


<!-- TinyMCE -->
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",
  width: 700,
    height: 600,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "detalle",
    theme_advanced_buttons1 : "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,link,unlink,pastetext,pasteword,selectall,cleanup,code",
    theme_advanced_buttons2 : "styleselect, formatselect,fontselect,fontsizeselect,separator,image,media,jfilebrowser,preview",
	
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

    theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false
	});
</script>
<!-- TinyMCE -->

<script type="text/javascript">
function componer_Centros(cod_area)
{
//alert(cod_area);
document.FormInsertar.idsudcategoria.length=0;
document.FormInsertar.idsudcategoria.options[0] = new Option("-- Seleccione --","","defaultSelected","");
var indice=1;
<?
$sql_depto = "SELECT * from subcategoria where borrado=0";
$rs_depto = mysql_query($sql_depto, $conexion);
if(mysql_num_rows($rs_depto)>0)
{
while($row_depto = mysql_fetch_assoc($rs_depto))
{
?>
if(cod_area=='<?=$row_depto["idcategoria"]?>')
{
document.FormInsertar.idsudcategoria.options[indice] = new Option("<?=$row_depto["descripSubcategoria"]?>","<?=$row_depto["idsubcategoria"]?>");
indice++;
}
<?
}
}
//mysql_close($conexion);
?>
}
</script>
<!--Inicio Para Cambiar estado enabled a subcategoria  -->
<script language="javascript" type="text/javascript"> 
                    //Activación y desactivación de Botón desde Checkbox 
                    function CambiaEstado(valor){ 
                    if (valor !=0){ 
                        document.FormInsertar.idsudcategoria.disabled = false; 
                    }else{ 
                        document.FormInsertar.idsudcategoria.disabled = true; 
                    } 
                    }
 </script>
 <!--Fin Para Cambiar estado enabled a subcategoria  -->  
<script>
	function esempio(str) {
			searchWin = window.open(str,'esempio','scrollbars=no,resizable=yes,width=300,height=200,status=no,location=no,toolbar=no');
	//        searchWin.refer = self;	
	}
</script>
<SCRIPT LANGUAGE="JavaScript"> 
	function Cancelar(){
		idcategoria = "<?=$idcategoria?>";
		idsudcategoria = "<?=$idsudcategoria?>";
		paginacion = "<?=$paginacion?>";
		ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/mantenimiento/contenedor_man_produ_admi.php?mensaje=Registro Actualizado' + '&paginacion='	+paginacion + '&idcategoria='	+idcategoria + '&idsudcategoria='	+idsudcategoria	
	}
</script> 

<script language="JavaScript" type="text/javascript">
function validar_form(val) {	
	cadena =document.getElementById("curso").value; 
	cadena= cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el Nombre del curso.");
		document.getElementById("curso").focus();
		return false;
	} 
	cadena =document.getElementById("idcategoria").value; 
	cadena= cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el campo Categoria.");
		document.getElementById("idcategoria").focus();
		return false;
	} 
	
	cadena =document.getElementById("idcampana").value; 
	cadena= cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el campo Campaña.");
		document.getElementById("idcampana").focus();
		return false;
	} 	
}

 </script>
    
<body onLoad="cargarTinyMCE();">
<table align="center" class="estilotabla" width="80%" border="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <form id="FormInsertar" name="FormInsertar" method="POST" action="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/InsertarProductos.php" onSubmit="return validar_form(this)">
    	<table width="93%" border="0">
        <tr>
          <td width="24%">Categoria</td>
          <td width="76%">         
            <!------------------Inicio  Combo  año y mes ---------------------------------------------------->
            <select name="idcategoria" id="idcategoria" onChange="componer_Centros(this.value)">
              <option></option>
              <?php                
                          $resultcate=mysql_query("SELECT * FROM categoria where borrado=0 order by idcategoria ", $conexion);    
                                while ($row = mysql_fetch_array($resultcate)) 							{                                 
                                    echo '<option value="'.$row["idcategoria"]. '" ' . $selected. '>'.$row["descripcion"]. '   </option>';                        		    } 
                                mysql_free_result($resultcate); 	                    
                        ?>          
              </select>
            <!------------------Fin  Combo  año y mes ---------------------------------------------------->                    
            
            
            <a href="javascript:esempio('/webadmin/mantenimiento/FormInsertarCategoria.php');">
              <IMG SRC="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/imagen/hoja.gif" WIDTH=21 HEIGHT=20 BORDER=0></a>
            </td>
        </tr>
        <tr>
          <td>Subcategoria</td>
          <td><select name="idsudcategoria" id="idsudcategoria">
            <option>--seleccione--</option>
          </select>
            <a href="javascript:esempio('/webadmin/mantenimiento/FormInsertarSub-Categoria.php');"><img src="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/imagen/hoja.gif"  alt="Nueva" width="21" height="20" border="0" /></a></tr>
        <tr>
          <td>Codigo</td>
          <td><input name="nombproductos" type="text" class="text" id="nombproductos" size="60" /></td>
        </tr>
        <tr>
          <td>Curso</td>
          <td><input name="curso" type="text" class="text" id="curso" size="60" /></td>
        </tr>
        <tr>
          <td>Duración</td>
          <td>
                <select name="duracion" id="duracion">
                  <option value="1 Mes">1 Mes</option>
                  <option value="2 Meses">2 Meses</option>
                  <option value="3 Meses">3 Meses</option>
                  <option value="6 Meses">6 Meses</option>
                </select>
           </td>
        </tr>
        <tr>
          <td>Inicio de Clases</td>
          <td><input name="inicioclases" type="text"    class="campofecha" size="12" id="inicioclases"></td>
        </tr>
        <tr>
          <td>Modalidad</td>
          <td><select name="modalidad" id="modalidad">
            	<option>Virtual</option>          
          	</select>
          </td>
        </tr>
        <tr>
          <td>Detalle</td>
          <td><textarea name="detalle" id="detalle"></textarea>        
          </td>
        </tr>
        <tr>
          <td>Precio Soles</td>
          <td><input name="preciosoles" type="text" class="text" id="preciosoles" size="10" /></td>
        </tr>
        <tr>
          <td>Precio Oferta</td>
          <td><input name="preciosolesoferta" type="text" class="text" id="preciosolesoferta" size="10" /></td>
        </tr>
        <tr>
          <td>Campaña</td>
          <td><select name="idcampana" id="idcampana">
            <option></option>
            <?php                
                          $resultCampa=mysql_query("SELECT * FROM campana  order by idcampana", $conexion);    
                                while ($rowCampa = mysql_fetch_array($resultCampa)) 							{                                 
                                    echo '<option value="'.$rowCampa["idcampana"]. '" ' . $selected. '>' .htmlentities($rowCampa["descripcampana"]). '   </option>';                        		    } 
                                mysql_free_result($resultCampa); 	                    
                        ?>
            </select>
            <a href="javascript:esempio('/webadmin/mantenimiento/FormInsertarCampana.php');">
            <img src="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/imagen/hoja.gif" alt="" width="21" height="20" border="0" /></a></td>
        </tr>
        <tr>
          <td>Mostrar</td>
          <td>
          <select name='mostrar' id='mostrar'>
            <option value="SI">SI</option>
            <option value="NO">NO</option>
           
          </select>
          </td>
        </tr>
        <tr>
          <td colspan="2"><table  align="center" width="64%" border="0">
            <tr>
              <td><input type="submit" name="submit" id="button" value="Enviar" /></td>
              <td><input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onClick="Cancelar()" /></td>
            </tr>
          </table></td>
          </tr>
        </table>
        
    </form>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
	//include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
 <?php  include_once ($INC_DIR . '/footer.php');  ?> 