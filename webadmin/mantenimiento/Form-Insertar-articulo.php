<?Php  session_start(); ?><head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<?php
//var oEdit1 = new InnovaEditor("oEdit1");
//http://www.camera.org/siteadmin/Innova3/documentation/default_start.htm
//$cnameExcel=$_FILES['file']['name'] ;
include($_SERVER['DOCUMENT_ROOT']. '/config.php');
if($_SESSION['cNuevoNombreexcel']<>""){	
	//$_SESSION['cNuevoNombreexcel'  es creado en mantenimiento/Form-Leer-Excel.php
	//lee el contenido del archivo excel
	ini_set('default_charset', 'utf-8');
	$contenido_excel=file_get_contents($_SERVER['DOCUMENT_ROOT'].$_SESSION['cNuevoNombreexcel']);	
	
	//http://www.devnetwork.net/viewtopic.php?f=34&t=134899	
	$contenido_excel=mb_convert_encoding($contenido_excel, "UTF-8", true);				
	//$contenido_excel=mb_convert_encoding($contenido_excel, "ISO-8859-1", "UTF-8");		
	//$contenido_excel=htmlentities($contenido_excel, ENT_QUOTES,'UTF-8') ;
	
	//Extrae solo el contenido <style   del archivo excel
	$nInicio = strpos($contenido_excel, "<style"); // Desde PHP 5.3.0
	$nfin = strpos($contenido_excel, "</style>"); // Desde PHP 5.3.0
	$ccadenaCss =substr($contenido_excel, $nInicio,$nfin) ;  
	
	//Crea el archivo css para utilizarlo en actualizar y lo guarda en la base de datos excel_archivos
	$miarchivocss= $_SESSION['cCarpetadestino']
	.$_SESSION['cnombresinextension'].$_SESSION['cCodigoAzar'].".css";
	
	//abre 
	$file = fopen($_SERVER['DOCUMENT_ROOT'].$miarchivocss,'w+');	
	fwrite($file, $ccadenaCss);
	fclose($file);	
	
	$cNuevoNombreexcel=$_SESSION['cNuevoNombreexcel'];
	$cNombreoriginalexcel=$_SESSION['cNombreoriginalexcel'];
	
 	$pagew=$_SESSION['selectpage'];
	$new_cod_exel = $pagew.date('ymdHis').$_SESSION['cCodigoAzar']."-ex";
	//echo $new_cod_exel;exit;
	$save_contenido= "INSERT INTO excel_archivos 
						(cNuevoNombreexcel,
						cNombreoriginalexcel,
						archivocss,	
						contenido_excel,
						idexcel,
						dfeccontenido)
						values(
						'" . $cNuevoNombreexcel . "',
						'" . $cNombreoriginalexcel . "',
						'" . $miarchivocss."',
						'" . addslashes($contenido_excel) . "',
						'" . $new_cod_exel."',	
						now()
						)";
	//echo $save_contenido;exit;
	mysql_query("SET NAMES 'utf8'");							
   	$sqlcontenido =mysql_query($save_contenido,$conexion) or die ("problema con Insertar excel_archivos");
	//borra referencia 
	$_SESSION['cNuevoNombreexcel']="";
	
	//$sql_obtener = db_query("select * from excel_archivos order by idexcel asc limit 1");
	//$row_contenido = db_fetch_array($sql_obtener);	
	//$sContent=$row_contenido['contenido_excel'];	
	
	$sContent=$contenido_excel;
	
	/*
	ob_start(); 
	show_source($_SESSION['cNuevoNombreexcel']); 
	$t = ob_get_contents(); // lee el contenido del archivo $_SESSION['cNuevoNombreexcel']
	$sContent=$t;
	ob_end_clean();
	*/	
}	
//include_once ( $INC_DIR . '/webadmin/header.php');
//$modulo="1100"; lo elimine porque solo recogia de estiloseccion el modulo articulo=1100 mas no recogia Catalogo=12000 etc de webmodulos
//$modulo="1100";
$modulo=$_SESSION['modulo'];//alex lo defini en index del webadmin 
$stylo = "3";
$fechahoy= date("d-m-Y");

//agregar esto para que funcione asset manager
include($_SERVER['DOCUMENT_ROOT']. '/webadmin/panel_html.php');	

?>

<style type="text/css">
<style type="text/css">
#estilos{margin-top:10px;clear:both;}
ul.stylos{padding:0px;	margin:5px 0px 5px 0px;list-style:none;overflow:auto;}
ul.stylos li{float:left;margin-bottom:5px;margin-right:1px;display:inline;width:100px;height:130px;} 
</style>

<script type="text/javascript">
    function actu_arti()
    {
	   document.getElementById('edi_contenido').value = oEdit12.getHTMLBody();
	   document.getElementById('edi_resumen').value = oEdit1.getHTMLBody();
       document.forms['adminForm'].submit();
    }
</script>
<body>	
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="actu_arti();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_articulos" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add"><h2>Gestor de artículos: Añadir un nuevo artículo</h2></div>
    </div>
    <div id="element-box">
		<div class="m">
        	<!--Inicio Formulario -->
            <form action="/webadmin/mantenimiento/Insertar-Articulo.php" method="post" name="adminForm" id="adminForm" class="form-validate" onSubmit="return validar_form(this)">
               <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="selectmodulo" id="selectmodulo" value="<?=$modulo?>" />
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título <span class="star">&nbsp;*</span></label>
       <input type="text" name="titulo" id="titulo" value="<?=$_SESSION['cnombresinextension'];?>" class="inputbox required" size="60" aria-required="true" required></li>
    <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo Amigable<span class="star">&nbsp;*</span></label>
        <input type="text" name="amigable" id="amigable" value="" class="inputbox required" size="60" aria-required="true" required></li>                        
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Resumen</label>
     	<?php $sResumen=""; ?>
		<textarea id="resumen" name="resumen" >
		<?php
		function encodeHTMLre($sHTMLre)
			{
			$sHTMLre=ereg_replace("&","&amp;",$sHTMLre);
			$sHTMLre=ereg_replace("<","&lt;",$sHTMLre);
			$sHTMLre=ereg_replace(">","&gt;",$sHTMLre);
			return $sHTMLre;
			}
		if(isset($sResumen)) echo encodeHTMLre($sResumen);
		?>
		</textarea>
        <!------------- Inicio para resumen -------------->                              
		<script>
		var oEdit1 = new InnovaEditor("oEdit1");
	   	oEdit1.width=680;
		oEdit1.height=100;

	    /*Set toolbar mode: 0: standard, 1: tab toolbar, 2: group toolbar */
	    oEdit1.toolbarMode = 0;
	    oEdit1.features=[
	    "Cut","Copy","Paste","PasteWord","PasteText","Undo","Redo","Hyperlink", "Table","Guidelines","Absolute", "Characters", "Numbering","Bullets","Indent","Outdent", "RemoveFormat","Preview","XHTMLSource","ClearAll","BRK",
	    "StyleAndFormatting","TextFormatting","ListFormatting","BoxFormatting","ParagraphFormatting","CssText","Styles","CustomTag","Paragraph","FontName","FontSize","Bold","Italic","Underline","JustifyLeft","JustifyCenter","JustifyRight","JustifyFull","Strikethrough", "Superscript","Subscript",
	    "ForeColor","BackColor"
	    ];
		oEdit1.css="../estilos/contenido.css";//Specify external css file here
		oEdit1.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors
		oEdit1.mode="HTMLBody"; //Editing mode. Possible values: "HTMLBody" (default), "XHTMLBody", "HTML", "XHTML"
		oEdit1.useDIV=false;
	    oEdit1.useBR=true;
	

		oEdit1.REPLACE("resumen");//Specify the id of the textarea here
		</script>        
	<!------------- Fin para resumen -------------->                              
                                                
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="orden" id="orden" value="" class="inputbox" size="40" aria-required="true" required></li>                
                         
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
                        <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                            <option value="1" selected="selected">Publicado</option>
                            <option value="0">Despublicado</option>
                            <option value="2">Archivado</option>
                            <option value="-2">Movido a la papelera</option>
	                    </select>
    	                </li>
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Mostrar</label>	
                           <select name='mostrar' id='mostrar'>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>                           
                          </select>
                       </li>
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Descripción</label>	
     	<?php //$sContent=""; ?>
		<textarea id="contenido" name="contenido" >
		<?php
		function encodeHTML($sHTML)
			{
			$sHTML=ereg_replace("&","&amp;",$sHTML);
			$sHTML=ereg_replace("<","&lt;",$sHTML);
			$sHTML=ereg_replace(">","&gt;",$sHTML);		
			$sHTML=ereg_replace("Ñ","N",$sHTML);		
			
			return $sHTML;
			}			
			if(isset($sContent)) echo encodeHTML($sContent);	
			//if(isset($sContent)) echo convertir_especiales_html($sContent);	
	
		?>
		</textarea>
    <!------------- Inicio para Contenido -------------->           
		<script>
			var oEdit12 = new InnovaEditor("oEdit12");
			oEdit12.cmdAssetManager = "modalDialogShow('/webadmin/editor/assetmanager/assetmanager.php',640,465)";
			oEdit12.width=680;
			oEdit12.height=700;
	
			/*Set toolbar mode: 0: standard, 1: tab toolbar, 2: group toolbar */
			oEdit12.toolbarMode = 0;
			oEdit12.features=[
			"Cut","Copy","Paste","PasteWord","PasteText","Undo","Redo","Hyperlink","Image", "Table","Guidelines","Absolute", "Flash","Media","Characters", "Numbering","Bullets","Indent","Outdent", "RemoveFormat","Preview","XHTMLSource","ClearAll","BRK",
			"StyleAndFormatting","TextFormatting","ListFormatting","BoxFormatting","ParagraphFormatting","CssText","Styles","CustomTag","Paragraph","FontName","FontSize","Bold","Italic","Underline","JustifyLeft","JustifyCenter","JustifyRight","JustifyFull","Strikethrough", "Superscript","Subscript",
			"ForeColor","BackColor"
			];
			oEdit12.css="<?=$miarchivocss ?>";//Specify external css file here
			oEdit12.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors
			oEdit12.mode="HTMLBody"; //Editing mode. Possible values: "HTMLBody" (default), "XHTMLBody", "HTML", "XHTML"
			oEdit12.useDIV=false;
			oEdit12.useBR=true;	
			
		/* oEdit12.cmdInternalLink = "modelessDialogShow('links.htm',365,270)"; //Command to open your custom link lookup page.
		oEdit12.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)"; //Command to open your custom content lookup page.
		oEdit12.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];//predefined custom colors
		*/
			
			oEdit12.REPLACE("contenido");//Specify the id of the textarea here
		</script>                            
  <!------------- Fin para Contenido --------------> 
     </li>                        
                    </ul> 
                </fieldset>       
             </div>
           
            <div class="fltrt" style="border:1px #666666 solid; padding:0px;background-color:#FFF; width:38%">
             <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" 
              aria-invalid="false"><strong>Seleccione Seccion :</strong></label><br><br>                
			<?php include_once $_SERVER['DOCUMENT_ROOT']. "/webadmin/mantenimiento/jq_selectseccion.php" ?>      
           </div>
           
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                <div style="display:none;"><div>		</div></div>
                <!-------------------------------------------------->
		<!--Inicio grupo1 --> 
                       
        	<?php include_once $_SERVER['DOCUMENT_ROOT']. "/webadmin/mantenimiento/opciones-publi.php" ?>                          	
        <!--Fin grupo1 -->            
                <!-------------------------------------------------->
       <div class="panel"><h3 id="bobcontent2-title" class="handcursor">Opciones de Imágenes</h3> 
  <div id="bobcontent2" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
	                    <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estilo de Presentación del Contenido</label>	
                         <div id="estilos">
						    <ul class="stylos">
                			<?php 
							//$modulo=1100							
							$i='1';
							$estilo_query = db_query("select * from estilocontenido where ccodmodulo='".$modulo."' and cestestcontenido = '1' order by ccodestcontenido"); 
							
							while ($estilo = db_fetch_array($estilo_query))
							 {
								if ($i=='1') 
									echo "<li><img src='estilos/images/".$estilo['cimgestcontenido']."'>
								<div style='clear:both'><input name='selectestilo' type='radio' value='".$estilo['ccodestcontenido']."' checked>".$estilo['cnomestcontenido']."<div></li>";
								else
									echo "<li><img src='estilos/images/".$estilo['cimgestcontenido']."'>
									<div style='clear:both'><input name='selectestilo' type='radio' value='".$estilo['ccodestcontenido']."' >".$estilo['cnomestcontenido']."<div></li>";
								$i++ ;
							}
						  ?>
                          
                          </ul></div>
                        </li> 
                         <li><span class="colgrishome">Imagen:</span><span class="colblancocen">
                          <input name="imagen" type="text" class="box400" id="imagen" value="" size="60"  maxlength="150">
                        </span><span class="colblancocen">
                        <input type="button" value="Seleccionar" onClick="openAsset('imagen')" id="btnAsset" name="btnAsset" >
                        </span></li>
                         <li><span class="colblancocen">Tamaño de la Imagen 
                       <select id="tamano_cimgcontenido" name="tamano_cimgcontenido">
                <option value="30" <?php if( $row_contenido['tamano_cimgcontenido']=="30") echo " selected='selected'"  ?>>30</option> 
                <option value="40" <?php if( $row_contenido['tamano_cimgcontenido']=="40") echo " selected='selected'"  ?>>40</option> 
    		    <option value="50" <?php if( $row_contenido['tamano_cimgcontenido']=="50") echo " selected='selected'"  ?>>50</option>
                <option value="60" <?php if( $row_contenido['tamano_cimgcontenido']=="60") echo " selected='selected'"  ?>>60</option>
                <option value="70" <?php if( $row_contenido['tamano_cimgcontenido']=="") echo " selected='selected'"  ?>>70</option>
                <option value="80" <?php if( $row_contenido['tamano_cimgcontenido']=="80") echo " selected='selected'"  ?>>80</option>
                <option value="100" <?php if( $row_contenido['tamano_cimgcontenido']=="100") echo " selected='selected'"  ?>>100</option>
                      </select></span></li>            
                    </ul>
               </fieldset>	    
    </div></div> 
             <!-----------------Inicio Precios--------------------------------->  
             <div class="panel"><h3 id="bobcontent3-title" class="handcursor">Precio y Otras Opciones</h3> 
  <div id="bobcontent3" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                      <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Precio</label>	
                     <input name="precio" type="text"   class="box500" id="precio" value='' size="10" maxlength="10" >
                     <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Precio Oferta</label>	
                     <input name="precio_oferta" type="text"   class="box500" id="precio_oferta" value='' size="10" maxlength="10" >                      
                      </li> 
                       <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Garantia</label>	          
                      <select name="garantia" id="garantia">
                        <option value="6">6 Meses</option>
                        <option value="3">3 Meses</option>
	                  </select>                               
                        </li>                        
                    </ul>
               </fieldset>	    
    </div></div>       
    
    
   <!----------------Inicio Curso---------------------------------->  
             <div class="panel"><h3 id="bobcontent4-title" class="handcursor">Opciones de Curso</h3> 
  <div id="bobcontent4" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	
                       <li><label id="codigo_curso_lbl" for="codigo_curso" class="hasTip" title="">Codigo Curso</label>	
                         	<input type="text" name="codigo_curso" id="codigo_curso" value="" class="inputbox" size="20">
                       </li> 
                       
                       <li><label id="duracion_lbl" for="duracion" class="hasTip" title="">Duración</label>	
                           <select name="duracion_curso" id="duracion_curso">
                              <option value="1 Mes">1 Mes</option>
                              <option value="2 Meses">2 Meses</option>
                              <option value="3 Meses">3 Meses</option>
                              <option value="6 Meses">6 Meses</option>
                           </select>                        
                       </li>  
                        <li>
                       	<div style="clear:both;">
                        	  <label id="inicio_clases_lbl" for="inicioclases" class="hasTip" title="">Inicio de Clases</label>	
	                          <input name="inicioclases" type="date"  class="campofecha" size="12" id="inicioclases" 
                              value="<?php echo date("Y-m-d");?>">
                        </div>    
                       </li>
                       <li><label id="modalidad_lbl" for="modalidad" class="hasTip" title="">Modalidad</label>	
                          <select id="modalidad_curso" name="modalidad_curso" class="inputbox" size="1" aria-invalid="false">                      <?php 
                                 $rsmodacurso = db_query("select * from webparametros where ccodparametro='0019' and ctipparametro='1'");
                               while($rowmodacurso = db_fetch_array($rsmodacurso)) 
                                    {					                                    								                                 echo '<option value="'.$rowesweb['cvalparametro'].'" '. $selected .' >'.$rowmodacurso['cnomparametro'].'</option>';		 
                                    }//fin while						
                                 ?>                                 
                            </select> 
                    	
                       </li> 
                    </ul>
               </fieldset>	    
    </div></div>
                     <!----------------Fin Curso---------------------------------->  
                     
           
                </div><!--fin content-sliders--->
           </div><!--fin width-40 fltrt--->
    	       <input type="hidden" id="edi_contenido" name="edi_contenido" />
	           <input type="hidden" id="edi_resumen" name="edi_resumen" /> 
               <input type="hidden" id="edi_resumen" name="edi_resumen" /> 
               <input type="hidden" id="idexcel" name="idexcel" value="<?=$new_cod_exel?>" /> <!-- de la tabla excel_archivos -->  
            </form>
           	<!--FIN Formulario -->
            <div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
</body>
<?php 
   //Limpia Variables de excel
    $_SESSION['cNuevoNombreexcel']=""; 
	$_SESSION['cCarpetadestino']=""; 
	$_SESSION['cNombreoriginalexcel']=""; 
	$_SESSION['cnombresinextension']=""; 
	$_SESSION['cCodigoAzar']=""; 
?>

  <script type="text/javascript" src="js/jsweb.js"></script>
  <!-- alex no sacar jquery-1.7.1.min.js sirve para el titulo amigable -->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> <!-- usado tambien por #tituloel scrip de abajo-->
  
  <script type="text/javascript" src="/webadmin/js/core.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	$('#titulo').keyup(function() 
    {
      $('#amigable').val(convierteAlias($('#titulo').val()));		  
	  $('#txttitulo').val($('#titulo').val());
	});
	$("#selectpage").change(function(){
		$.post("jq_selectseccion.php",{ idopera:'1',idmodulo:$("#selectmodulo").val(),iditem:$("#IDpro").val(),idpage:$("#selectpage").val()},function(data){$("#cuadrobox").html(data);})
	});	
})
</script>

<!--http://www.dynamicdrive.com/dynamicindex17/switchcontent.htm -->
<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchcontent.js"></script>
<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchicon.js"></script>
<script type="text/javascript">
// MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
// Call Instance.init() at the very end. REQUIRED
	var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
	//bobexample.setStatus('<img src="imagen/selector_azul_vertical.gif" /> ', '<img src="imagen/selector-azul.gif" /> ')
	bobexample.setStatus('<img src="imagen/regular-dark.png" /> ', '<img src="imagen/regular-dark.png" /> ')
	bobexample.setColor('darkred', 'black')
	bobexample.defaultExpanded(0,1,2) //expande el 0 y el 1
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>

