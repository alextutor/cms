<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php
 $imagen168x172=$_GET['imagen168x172'];   //recoje imagen del campo Imagen a Mostrar   
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');	         
 
   $Registro=$_GET['Registro'];
   $result=mysql_query("select * from productos  Where idproductos='$Registro' ",$conexion);    
   $rsContactos=mysql_fetch_array($result);     
   $page=trim($_GET['page']); 
   $idcategoria=trim($_GET['idcategoria']); 
   $idsudcategoria=trim($_GET['idsudcategoria']); 
   $Filtro_en_oferta=trim($_GET['Filtro_en_oferta']);  
   
?>
<?Php 
$Title = "Sistemas de Protección Eléctrica";
$Description = "Somos una empresa dedicada al diseño, asesoría y ejecución de Sistemas de Protección Eléctrica con POZOS DE PUESTAS A TIERRA Y MONTAJE DE PARARRAYOS";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
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

<script>
<!--******************************************************* -->
function CheckedMostrarProducto(){ 
	$valor=0;
	$lmostrarProducto = document.form1.mostrarProducto.checked ;	
    if($lmostrarProducto==true)
 	{$valor=1; }
	else 		
 	{$valor=0;	
	}
  document.form1.mostrarProductotext.value=$valor	;
} 
<!--******************************************************* -->

function componer_Centros(cod_area)
{
//alert(cod_area);
document.form1.idsudcategoria.length=0;
document.form1.idsudcategoria.options[0] = new Option("-- Seleccione --","","defaultSelected","");
var indice=1;
<?php
$sql_depto = "SELECT * from subcategoria";
$rs_depto = mysql_query($sql_depto, $conexion);
if(mysql_num_rows($rs_depto)>0)
{
while($row_depto = mysql_fetch_assoc($rs_depto))
{
?>
if(cod_area=='<?=$row_depto["idcategoria"]?>')
{
document.form1.idsudcategoria.options[indice] = new Option("<?=$row_depto["descripSubcategoria"]?>","<?=$row_depto["idsubcategoria"]?>");
indice++;
}
<?php
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
                        document.form1.idsudcategoria.disabled = false; 
                    }else{ 
                        document.form1.idsudcategoria.disabled = true; 
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

<script language='JavaScript'>
function Cancelar(){ 
    idcategoria = "<?=$idcategoria?>";
	idsudcategoria = "<?=$idsudcategoria?>";
	Filtro_en_oferta = "<?=$Filtro_en_oferta ?>";
	page = "<?=$page?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/mantenimiento/contenedor_man_produ_admi.php?mensaje=Registro cancelado' + '&page='	+ page + '&idcategoria='	+idcategoria + '&idsudcategoria='	+idsudcategoria + '&Filtro_en_oferta='	+Filtro_en_oferta    
	}
</script> 

<script language="JavaScript" type="text/javascript">
function validar_form(val) {
	cadena =document.getElementById("rutaimagen").value; 
	cadena = cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el campo Imagen.");
		document.getElementById("rutaimagen").focus();
		return false;
	} 
	cadena =document.getElementById("nombproductos").value; 
	cadena= cadena.replace(/(^\s*)|(\s*$)/g,"");
	if (cadena.length==0) {
		alert("Debe rellenar el Nombre del Articulo.");
		document.getElementById("nombproductos").focus();
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
<table width="80%" height="84%" border="0" align="center" class="estilotabla">  
  <tr>
    <td height="391" valign="top" >    
    <form id="form1" name="form1" method="POST" action="<?php echo $ROOT_PATH ?>/webadmin/mantenimiento/ActualizaFormProductos.php" onSubmit="return validar_form(this)">
    	<table width="93%" border="0">
        <tr>
          <td>Codigo</td>
          <td><input name="id"  type="hidden"  id="id" value=" <?php echo trim($rsContactos["idproductos"]); ?> " size="70" /></td>         
        </tr>
         <tr>
          <td>paginacion</td>
          <td><input name="page"  type="hidden"  id="page" value=" <?php echo $page; ?> " size="70" /></td>
         </tr>
        
         <tr>
           <td>Filtro_en_oferta</td>
           <td><input name="Filtro_en_oferta"  type="hidden"  id="Filtro_en_oferta" value="<?php echo $Filtro_en_oferta;?>" size="70" /></td>
         </tr>
         <tr>
          <td width="24%">Categoria</td>
          <td width="76%">         
         <!------------------Inicio  Combo  año y mes ---------------------------------------------------->
         <select name="idcategoria" id="idcategoria" onChange="componer_Centros(this.value)">
          <option></option>
                      <?php                
                          $resultcate=mysql_query("SELECT * FROM categoria where borrado=0 order by idcategoria ", $conexion);    
                                while ($row = mysql_fetch_array($resultcate)) 	
									{                                 
                                   // echo '<option value="'.$row["idcategoria"]. '" ' . $selected. '>'.$row["descripcion"]. '   </option>';                     	   
								   echo '<option value="'.$row['idcategoria'].'"';
								if($row['idcategoria']==$rsContactos['idcategoria'])
								{
									echo ' selected';
								}
								echo '>'. $row['descripcion'] . '</option>'."\n";											
								    } 
                                mysql_free_result($resultcate); 	                    
                        ?>          
           </select>           
                 
                                
                                
         <!------------------Fin  Combo  año y mes ---------------------------------------------------->                    
                     
          
            <a href="javascript:esempio('/webadmin/mantenimiento/FormInsertarCategoria.php');return true">
        <IMG SRC="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/imagen/hoja.gif" WIDTH=21 HEIGHT=20 BORDER=0></A>

            </td>
        </tr>
        <tr>
          <td>Subcategoria</td>
          <td>
          <select name="idsudcategoria" id="idsudcategoria">
            <option>--seleccione--</option>
            
             <?php                
                          $rssubcate=mysql_query("SELECT * FROM subcategoria  where  borrado=0 and idcategoria=" .$rsContactos['idcategoria'], $conexion);    
                                while ($rowsub = mysql_fetch_array($rssubcate)) 	
									{                                 
                                   // echo '<option value="'.$row["idcategoria"]. '" ' . $selected. '>'.$row["descripcion"]. '   </option>';                     	   
								   echo '<option value="'.$rowsub['idsubcategoria'].'"';
								if($rowsub['idsubcategoria']==$rsContactos['idsudcategoria'])
								{									 
									echo ' selected';
								}
								echo '>'. $rowsub['descripSubcategoria'] . '</option>'."\n";											
								    } 
                                mysql_free_result($rssubcate); 	                    
                        ?>                            
          </select>       
           
            <a href="javascript:esempio('/webadmin/mantenimiento/FormInsertarSub-Categoria.php');"onmouseover="window.status='Clicca qui per visualizzare una Ventana independiente'; return true"><img src="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/imagen/hoja.gif"  alt="Nueva" width="21" height="20" border="0" /></a></tr>
        <tr>
          <td>Codigo</td>
          <td><input name="nombproductos" type="text" class="text" id="nombproductos" value="<?php echo trim($rsContactos["nombproductos"]); ?> " size="60" /></td>
        </tr>
        <tr>
          <td>Curso</td>
          <td><input name="curso" type="text" class="text" id="curso" value="<?php echo trim($rsContactos["curso"]); ?>" size="60" /></td>
        </tr>
        <tr>
          <td>Duración</td>
          <td><select name="duracion" id="duracion">
            <option value="1 Mes">1 Mes</option>
            <option value="2 Meses">2 Meses</option>
            <option value="3 Meses">3 Meses</option>
            <option value="6 Meses">6 Meses</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>Inicio de Clases</td>
          <td><table width="100%" border="0">
            <tr>
                <td width="50%">
                <input name="inicioclases" type="text"    value="<?php echo trim($rsContactos["inicioclases"]); ?> "  class="campofecha" size="12" id="inicioclases">
                </td>              
              </tr>
          </table></td>
        </tr>
        <tr>
          <td>Modalidad</td>
          <td><select name="modalidad" id="modalidad">
            <option>Virtual</option>
            <?php                
                          $resultCampa=mysql_query("SELECT * FROM campana  order by idcampana", $conexion);    
                                while ($rowCampa = mysql_fetch_array($resultCampa)) 							{                                 
                                    echo '<option value="'.$rowCampa["idcampana"]. '" ' . $selected. '>' .htmlentities($rowCampa["descripcampana"]). '   </option>';                        		    } 
                                mysql_free_result($resultCampa); 	                    
                        ?>
          </select></td>
        </tr>
        <tr>        
          <td>Detalle</td>
          <td><textarea name="detalle" id="detalle" > <?php 
		  $contents = $rsContactos['detalle'];
		  echo $contents ?> </textarea>         
		</td>
        </tr>
        <tr>
          <td>Precio Soles</td>
          <td><input name="preciosoles" type="text" class="text" id="preciosoles" value="<?php echo trim($rsContactos["preciosoles"]); ?>" size="10" /></td>
        </tr>
        <tr>
          <td>Precio Oferta</td>
          <td><table width="100%" border="0">
            <tr>
                <td width="35%"><input name="preciosolesoferta" type="text" class="text" id="preciosolesoferta" value="<?php echo trim($rsContactos["preciosolesoferta"]); ?>" size="10" /></td>
                <td width="65%">En Oferta                  
                <select name='en_oferta' id='en_oferta'>
                   <?php 
				   if ($rsContactos["en_oferta"]=="SI") { 
                     echo "<option value='SI' SELECTED >SI</option>";
					 echo "<option value='NO'>NO</option>";       
                    } else  {  
                     echo "<option value='SI'>SI</option>";              
					 echo "<option value='NO' SELECTED>NO</option>";       
					} 
					?>                     
                  </select>
                 </td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Campaña</td>
          <td><select name="idcampana" id="idcampana" >
            <option></option>
            <?php                
                          $resultCampa=mysql_query("SELECT * FROM campana  order by idcampana", $conexion);    
                                while ($rowCampa = mysql_fetch_array($resultCampa)) 							{                                 
                               //     echo '<option value="'.$rowCampa["idcampana"]. '" ' . $selected. '>' .htmlentities($rowCampa["descripcampana"]). '   </option>';                        		    
							   
							      echo '<option value="'.$rowCampa['idcampana'].'"';
								if($rowCampa['idcampana']==$rsContactos['idcampana'])
								{
									echo ' selected';
								}
								echo '>' .htmlentities($rowCampa['descripcampana']) . '</option>'."\n";							   
							   } 
                                mysql_free_result($resultCampa); 	            
                        ?>
          </select>      
                                    
                                    
            <a href="javascript:esempio('/webadmin/mantenimiento/FormInsertarCampana.php');"onmouseover="window.status='Clicca qui per visualizzare una Ventana independiente'; return true">
            <img src="<?php echo $ROOT_PATH?>/webadmin/mantenimiento/imagen/hoja.gif" alt="" width="21" height="20" border="0" /></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Mostrar Producto</td>
          <td>
             <select name='mostrar' id='mostrar'>
                   <?php 
				   if ($rsContactos["mostrar"]=="SI") { 
                     echo "<option value='SI' SELECTED >SI</option>";
					 echo "<option value='NO'>NO</option>";       
                    } else  {  
                     echo "<option value='SI'>SI</option>";              
					 echo "<option value='NO' SELECTED>NO</option>";       
					} 
					?>                     
                </select>                 
             </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><table  align="center" width="64%" border="0">
            <tr>
              <td><input type="submit" name="submit" id="button" value="Enviar" /></td>
              <td><input type="button" class="cancelar" name="cancelar" id="cancelar" value="Cancelar" onClick="Cancelar()" /></td>
            </tr>
          </table></td>
          </tr>
        <tr>
          <td align="center" colspan="2">&nbsp;</td>
        </tr>
        </table>        
    </form>
    </td>
  </tr>
  <tr>
  </tr>
</table>
<?php
mysql_free_result($result); 
//include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
?>
 <?php  include_once ($INC_DIR . '/footer.php');  ?> 
