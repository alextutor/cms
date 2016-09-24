<?Php  session_start(); 
$Title = "";
$Description = "";
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/webadmin/header.php');
 include($_SERVER['DOCUMENT_ROOT']. '/config.php');
 
// alex lo implemente yo lo saque de la tabla page	
$_SESSION['page']="12172809";
?>
<!-- TinyMCE -->
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",					
  width: 849,
    height: 265,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "descripcion",
    theme_advanced_buttons1 : "mybutton,bold,italic,underline,forecolor,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,link,unlink,pastetext,pasteword,selectall,cleanup,code",
    theme_advanced_buttons2 : "styleselect, formatselect,fontselect,fontsizeselect,separator,image,media,jfilebrowser,preview",
	
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

    theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false,	
	});
</script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",
  width: 700,
    height: 100,	
	plugins : "jfilebrowser",      
	elements : "imagen",
    theme_advanced_buttons1 : "jfilebrowser",
	
      theme_advanced_toolbar_location : "top",
	//theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	plugin_preview_width : "900",
	plugin_preview_height : "600",
	paste_auto_cleanup_on_paste : true,
	relative_urls : false
	});
</script>			
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onclick="document.forms['adminForm'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_presentacion" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-category-add icon-48-content-category-add"><h2>Gestor de categorías: Añadir una nueva categoría de artículos</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
           <form name="form" id="form"> 
           <div class="width-60 fltlft"> <!------ Inicio Contendor lado izquierdo -->     

            <table border="0"  align="center" cellpadding="0" cellspacing="0" class="tableborder" >
            <tr>
                <td class='colgrishome' width="150"  height='30' align='right'>Nombre </td>
                <td class='colblancoend'>
                <input type="text" name="titulo" id='titulo'  size="90" maxlength="150" class="box500"  >
                </td>
            </tr> 	 
            <tr>
                <td class='colgrishome'  height='30' align='right'>Tipo Contenido </td>
                <td class='colblancoend'>
                  <select name="seltipo" id="seltipo" style="width:250px;" class="box">
                  <?php
                   $tipocontenido = db_query("select * from webparametros  where  ccodparametro='0014' and ctipparametro='1' order by cvalparametro asc");
                   while($tip = db_fetch_array($tipocontenido)) 
                   {	
                        echo '<option value="'.$tip['cvalparametro'].'" >'.utf8_encode($tip['cnomparametro']).'</option>';          
                   }
                  ?>
                  </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <div class="conten-tipo">
                <?php 	include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/tablero_control.php'); ?>
                </div>
                </td>
            </tr>
            <tr>
                <td class='titlesub' colspan="2">Publicacion</td>
            </tr>
            <tr>
                <td  class='colgrishome' align="right">Pagina</td>
                <td class="colblancoend">
                <select name="selectpage" id="selectpage" style="width:340px" class="box">
                <?php 
                   $webdefa = $_SESSION['page'];
                    if ($_SESSION['webuser_nivel'] == '9')
                        $sql_page = db_query("select * from page  where  cestpage='1' and credpage='' order by cnikpage");
                    else
                        $sql_page = db_query("select * from page p, personapage pp  where p.ccodpage=pp.ccodpage and pp.ccodpersona='".$_SESSION['webuser_id']."' and p.cestpage='1' and p.credpage='' order by p.cnikpage");
                     while($row_page = db_fetch_array($sql_page)) 
                     {
                         if( $row_page['ccodpage']==$_SESSION['page'])
                            echo '<option value="' . $row_page['ccodpage'] .'" selected>' . $row_page['cnikpage'] . '</option>';
                         else
                            echo '<option value="' . $row_page['ccodpage'] .'">' . $row_page['cnikpage'] . '</option>';
                     }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
              <td  class='colgrishome' align="right" valign="top">Secci&oacute;n </td>
              <td  class='colblancoend'>
                <button id="expand">+</button><button id="collapse">-</button><button id="default">::</button>
                <div id="cuadrobox"  style="border:1px #666666 solid; padding:5px; width:340px; height:200px; overflow:auto;background-color:#FFF;">
                <?php 
                //include "jq_selectseccion2.php";
                ?>
                </div>
              </td>
            </tr>
            <tr>
                <td  class='colgrishome' align="right">Ubicacion</td>
                <td class="colblancoend">
                <select name="selectubicacion" id="selectubicacion" style="width:340px" class="box">
                <?php
                $tipocontenido = db_query("select * from webparametros  where  ccodparametro='0004' and ctipparametro='1' order by cvalparametro asc");
                while($tip = db_fetch_array($tipocontenido)) 
                {	
                    echo '<option value="'.$tip['cvalparametro'].'">'.utf8_encode($tip['cnomparametro']).'</option>';
                }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td  class='colgrishome' align="right">Clase</td>
                <td class="colblancoend">
                <select name="selectclase" id="selectclase" style="width:340px" class="box">
                <?php
                $sqlclase = db_query("select * from estiloclases  where  ccodplantilla='".$_SESSION['plantilla']."' order by cnomclase");
                while($rowclase = db_fetch_array($sqlclase)) 
                {	
                    echo '<option value="'.$rowclase['ccodclase'].'">'.utf8_encode($rowclase['cdesclase']).'</option>';
                }
                ?>
                </select>
                </td>
            </tr>
            
            <tr>
                <td  class='colgrishome' align="right">Fecha Inicio</td>
                <td class="colblancoend">
                    <input type="text" name="fechaini" id="fechaini" size='18'  style="width:150px;" class="cuadrotexto" value="<?=fechahoy?>">
                    <input type="button" id="fechabus" value="" class="botonfecha">
                    <script type="text/javascript"> 
                       Calendar.setup({ 
                        inputField     :  "fechaini",     // id del campo de texto 
                        ifFormat       :  "%d-%m-%Y",     // formato de la fecha que se escriba en el campo de texto 
                        button         :  "fechabus"     // el id del botón que lanzará el calendario 
                        }); 
                    </script>
                
                </td>
            </tr>
            <tr>
                <td  class='colgrishome' align="right">Fecha Fin</td>
                <td class="colblancoend">
                    <input type="text" name="fechafin" id="fechafin" size='18'  style="width:150px;" class="cuadrotexto">
                    <input type="button" id="fechabus2" value="" class="botonfecha">
                    <script type="text/javascript"> 
                       Calendar.setup({ 
                        inputField     :  "fechafin",     // id del campo de texto 
                        ifFormat       :  "%d-%m-%Y",     // formato de la fecha que se escriba en el campo de texto 
                        button         :  "fechabus2"     // el id del botón que lanzará el calendario 
                        }); 
                    </script>
                
                </td>
            </tr>
            
            <tr>
                <td class='colgrishome'  colspan="2"><div id="mensaje"></div></td>
            </tr>  	   
            <tr>
                <td colspan="2" align="center" class='formpie' >
                <input type="hidden" name="IDpro" 		 id="IDpro" value="">
                <input type="button" value="Aceptar"   class='cssboton' onclick="xajax_procesar_formulario(xajax.getFormValues('form'))" />
                <input type="Button" value="Cancelar" onclick="javascript:window.location = '<?=$retorno?>'" class='cssboton'>
                </td>
            </tr>
            </table>           
            </div>  <!------ Fin Contendor lado izquierdo -->         
             
             
             
             
             
             <!----------  Inicio Lado derecho ---------------->
           <div class="width-40 fltrt">
           		<div id="categories-sliders-" class="pane-sliders">
                	<ul class="adminformlist">	
                	 <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Imagen</label>	
                     	<div><textarea name="imagen" id="imagen"></textarea></div>
                     </li>
                    </ul>    
                </div>
           </div>
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#seltipo').change(function(){
		$.post("tablero_control.php",{ idnew:'1','tipocontenido':$(this).val(),idpage:'<?=$_SESSION[page]?>'},function(data){ $('.conten-tipo').html(data);});	
	});
	$("#selectpage").change(function(){
		$.post("jq_selectseccion2.php",{ idopera:'1',iditem:$("#IDpro").val(),idpage:$("#selectpage").val()},function(data){$("#cuadrobox").html(data);})
	});

});
</script>>