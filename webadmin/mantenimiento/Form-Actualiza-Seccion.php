<?Php  session_start(); 
	//echo "asdasds";exit;
//-------para que nome muestre errores en desarollo xamp
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
$idedit=$_GET['ids'];

$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once($_SERVER['DOCUMENT_ROOT']. '/webadmin/recoger-valores.php');	
//echo $idedit ."hhhh";exit;
?>
<?php	
	require ($_SERVER['DOCUMENT_ROOT']. '/webadmin/xajax/xajax.inc.php');
	$xajax = new xajax();
	$xajax->setCharEncoding('ISO-8859-1');
	$xajax->decodeUTF8InputOn();	
	$xajax->registerFunction("procesar_estilos");
	$xajax->processRequests();	
	
	function procesar_estilos($form_entrada)
	{
		$mostrarsec = new xajaxResponse('ISO-8859-1');
		$opsec   = "<ul class='stylos'>";
		$sqlsec  = " SELECT * FROM estiloseccion WHERE ccodmodulo='".$form_entrada['selectmodulo']."' and cestsecestilo='1' order by ccodsecestilo";
		$sqlmsec = mysql_query($sqlsec);
		$na = 1;
		while ($rows = mysql_fetch_array($sqlmsec)) 
		{	
			if ($na==1) { $check = " checked";} else { $check = "";}
			$opsec .= '<li><img src="/webadmin/estilos/images/'.$rows[cimgsecestilo].'"><div style="clear:both;"><input type="radio"  name="selectestilo" value="'.$rows[ccodsecestilo].'" '.$check.'>'.$rows[cnomsecestilo].'</div></li>';
			$na++;
		}
		$opsec .= "</ul>";
		$mostrarsec->addAssign("estilos","innerHTML","$opsec");
		return $mostrarsec;
	}

?>
  <?php $xajax->printJavascript("/webadmin/xajax/");?>
<?php 
include_once ( $INC_DIR . '/webadmin/header.php');
//agregar esto para que funcione asset manager
include($_SERVER['DOCUMENT_ROOT']. '/webadmin/panel_html.php');	

?>
<style type="text/css">
	#estilos{
		clear:both;
	}
	ul.stylos
	{
		padding:0px;
		margin:5px 0px 5px 0px;
		list-style:none;
		overflow:auto;
	}	
	ul.stylos li
	{
		float:left;
		margin-bottom:5px;
		margin-right:1px;
		display:inline;
		width:100px;
		height:130px;	
	} 		
</style>
<link rel="stylesheet" type="text/css" href="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/calendario_dw-estilos.css"/>
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/calendario_dw/calendario_dw/calendario_dw.js"></script>
<!--El último paso es colocar un script Javascript que invoque el plugin jQuery para hacer que el campo de texto se convierta en un calendario. -->
<script type="text/javascript">
$(document).ready(function(){
	$(".campofecha").calendarioDW();
})
</script>
<script type="text/javascript" src="<?php ROOT_PATH?>/webadmin/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	//Metodo para iniciar tinyMCE mas propiedades
	tinyMCE.init({
	theme : "advanced",
	mode : "exact",					
	width: "100%",
    height: 265,	
	plugins : "inlinepopups,advimage,advlink,jfilebrowser,media,preview,paste,table",      
	elements : "txtdetalle",
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
<body>
<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="document.forms['form'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_categoria" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de Sección: Editar Sección</h2></div>
    </div>
<?php
$sql = db_query("SELECT * FROM seccion WHERE ccodseccion='".$_GET['id'] ."'");
while($row  =db_fetch_array($sql)) //----Inicio While 1
{ 
?>   
    <div id="element-box">
		<div class="m">        
            <form action="/webadmin/mantenimiento/Actualiza-seccion.php" method="post" name="form" id="form" >
            <input  name='id'   type='hidden' id='id' value='<?=$_GET['id']?>'>
            <input  name='selectnivel' id="selectnivel"   type='hidden' value='<?=$row['cnivseccion']?>'>
            <input  name='selectpage' id="selectpage"   type='hidden' value='<?=$row['ccodpage']?>'>
            
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Página<span class="star">&nbsp;*</span></label>
                    <?php
                    $sql_page = db_query("select * from page  where  ccodpage='".$row['ccodpage']."'");
                    	while($row_page = db_fetch_array($sql_page)) 
                     {
                        echo $row_page['cnompage'];
                     }
					 ?>
                     </li>
                    	<li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Título <span class="star">&nbsp;*</span></label>
                        <input type="text" name="titulo" id="titulo" value="<?=$row['cnomseccion']?>" class="inputbox required" size="70" aria-required="true" required>
                        </li>						
						<li>
                        <div id="mostrarmenu"style=" display:flex; clear:both ">
                        <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Menu</label>	
						<?php 	$sql_menuubi = db_query("select * from pagemenu where ccodpage='".$row['ccodpage']."' and cestmenu='1'");
                                    while ($row_menuubi = db_fetch_array($sql_menuubi)) 
                                    {	
                                        $sqlu = db_query("select * from seccionmenu where ccodseccion='".$row['ccodseccion']."' and ccodmenu='".$row_menuubi['ccodmenu']."'");
                                        $totu = db_num_rows($sqlu);
                                        if ($totu=='0')
                                            echo "<div style='width:150px; float:left;'>
									<input type='checkbox' name='rd".$row_menuubi['ccodmenu'].$row_menuubi['cordmenu']."' >".$row_menuubi['cnommenu']."</div>";
                                        else
                                            echo "<div style='width:150px; float:left;'><input type='checkbox' name='rd".$row_menuubi['ccodmenu'].$row_menuubi['cordmenu']."' checked>".$row_menuubi['cnommenu']."</div>";
                            }	?>
                          </div>
                        </li>
                      <li>
                        <div style=" display:flex; clear:both ">
                       <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" 
                       aria-invalid="false">Estilo Submenu</label>                                                       
                        <!-- variable $menu_estilo lo recoge de recoger-valores.php ver arriba -->
                        <?php 
						 $sqltipoenlace="select * from webparametros where ccodparametro='0021' and ctipparametro=".$menuestilomenu;			 
						$rstipo_enlace = db_query($sqltipoenlace);
						//echo $sqltipoenlace;exit;						
						$sql_seccionestilomenu="select * from seccionestilomenu   WHERE ccodseccion='".$row['ccodseccion']."' and ccodestilomenu ='".$ccodestilomenu."' and menuestilomenu ='".$menuestilomenu. "' and ccodpage='".$row['ccodpage']."'";			 
						//echo $sql_seccionestilomenu;exit;						
						$rs_seccionestilomenu = db_query($sql_seccionestilomenu);
						$row_seccionestilomenu = db_fetch_array($rs_seccionestilomenu)
						?>
                       <select name="multidrop" id="multidrop" style="width:190px" class="box">
						<?php  						
                            while ($row_enlace = db_fetch_array($rstipo_enlace)) 
                            {	
                             if($row_enlace['cvalparametro']==$row_seccionestilomenu['multidrop'])
                                echo '<option value='.$row_enlace['cvalparametro'].' selected>'.$row_enlace['cdesparametro'].'</option>';
                            else
                                echo '<option value='.$row_enlace['cvalparametro'].' >'.$row_enlace['cdesparametro'].'</option>';
                            }
                        ?>
                        </select>
                        
                       </div>
                      </li>
                      <hr>  
                      <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Tipo</label>	
                        <select name="selectenlace" id="selectenlace" style="width:190px" class="box">
						<?php  $tipo_enlace = db_query("select * from webparametros where ccodparametro='0005' and ctipparametro='1'");
                            while ($row_enlace = db_fetch_array($tipo_enlace)) 
                            {	
                             if($row_enlace['cvalparametro']==$row['ctipseccion'])
                                echo '<option value='.$row_enlace['cvalparametro'].' selected>'.$row_enlace['cdesparametro'].'</option>';
                            else
                                echo '<option value='.$row_enlace['cvalparametro'].' >'.$row_enlace['cdesparametro'].'</option>';
                            }
                        ?>
                        </select>
                        </li>
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">URL</label>                      <input type="text" name="rutaenlace" id="rutaenlace" size="60" value="<?=$row['curlseccion']?>" class="box400" />             </li>
                       <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Mostrar Url padre</label>					                       
                        <select id="mostrarurlcatebase" name="mostrarurlcatebase" class="inputbox" size="1" aria-invalid="false">
                            <option value="SI"<?php if( $row['mostrarurlcatebase']=="SI") echo " selected='selected'"  ?>>SI</option>                           
                            <option value="NO"  <?php if( $row['mostrarurlcatebase']=="NO") echo " selected='selected'"  ?>>NO</option>                           
                          </select>                                      	                      
                        </li>
                        <li>  Mostrar Url padre (Ya lo pase a Gestor de Estilos Web: Actualiza Estilos web)   </li>          
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Modulo</label>	
                       <select name="selectmodulo" style="width:190px" onChange="xajax_procesar_estilos(xajax.getFormValues('form'))" class="box">
                        <?php	$querysec = db_query("select * from webmodulos where cestmodulo='1'");
                            while($row_sec = db_fetch_array($querysec)) 
                            {	if( $row_sec['ccodmodulo']==$row['ccodmodulo'])
                                    echo '<option value="' . $row_sec['ccodmodulo'].'" selected>' . $row_sec['cnommodulo'] . '</option>';
                                else
                                    echo '<option value="' . $row_sec['ccodmodulo'].'" >' . $row_sec['cnommodulo'] . '</option>';
                            }
                        ?>
                            </select>
                        </li>                     
                   
                            <div id="estilos">
                            	<li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estilo Sección</label>	
                                <ul class='stylos'>
                               	<?php
									$sql_estilo = "SELECT * FROM estiloseccion WHERE cestsecestilo='1' AND ccodmodulo='".$row['ccodmodulo']."' order by ccodsecestilo";
									$res_estilo = db_query($sql_estilo);
									while($rowestilo = db_fetch_array($res_estilo)) 
									{
										if ($rowestilo['ccodsecestilo']==$row['ccodsecestilo']) { $check = " checked";} else { $check = "";}
										echo "<li>\n";
										echo "<img border='0' src=\"/webadmin/estilos/images/" . $rowestilo['cimgsecestilo'] . "\">	                                        <div style='clear:both;'>
										<input type='radio' name='selectestilo' value='".$rowestilo['ccodsecestilo']."'".$check.">" . $rowestilo['cnomsecestilo'];
										echo "</div></li>";
										$na++;
									}
									?>
                                </ul>
             	                </li>                                  
                             </div>                    
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="cordcontenido" id="cordcontenido" value="<?=$row['cordcontenido']?>" class="inputbox" size="40" aria-required="true" required></li>                
                         
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false"><strong>Pantalla Total</strong></label>	
                  <select id="totalpantalla" name="totalpantalla" class="inputbox" size="1" aria-invalid="false">
                    <option value="ambos" <?php if( $row['totalpantalla']=="ambos") echo " selected='selected'"  ?>>ambos</option>
                    <option value="totalpantalla" <?php if( $row['totalpantalla']=="totalpantalla") echo " selected='selected'"  ?>>Total Pantalla</option>
                     <option value="izqpantalla" <?php if( $row['totalpantalla']=="izqpantalla") echo " selected='selected'"?>>Izquierda Pantalla</option>
                     <option value="derepantalla" <?php if( $row['totalpantalla']=="derepantalla") echo " selected='selected'"?>>Derecha Pantalla</option>
                  </select>                      
                            
    	                </li>    
                        
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estado</label>	
                        
                  <select id="estado" name="estado" class="inputbox" size="1" aria-invalid="false">
                        <option value="1" <?php if( $row['estado']=="1") echo " selected='selected'"  ?>>Publicado</option>
                        <option value="2" <?php if( $row['estado']=="2") echo " selected='selected'"  ?>>Despublicado</option>
                        <option value="3" <?php if( $row['estado']=="3") echo " selected='selected'"  ?>>Archivado</option>
                        <option value="-2" <?php if( $row['estado']=="-2") echo " selected='selected'"  ?>>Movido a la papelera</option>                     
                  </select>
    	                </li>
                        <li><label id="mostrar_lbl" for="mostrar" class="hasTip" title="">Mostrar</label>	
                           <select name='mostrar' id='mostrar'>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>                           
                          </select>
                       </li>
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Descripción</label>	
                    
                      <textarea name="txtdetalle" id="txtdetalle" cols="68" rows="4" class="area600"><?=$row['cdesseccion']?></textarea>
                        
                    </ul> 
              </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                <div style="display:none;"><div>		</div></div>

		<!--Inicio grupo1 -->                   
   <div class="panel"><h3 id="bobcontent1-title" class="handcursor">Información para Buscadores (SEO)</h3> 
  <div id="bobcontent1" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >         
                <fieldset class="panelform">
                    <ul class="adminformlist">                       
                          <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo</label>
                        <input type="text" name="txttitulo" id="txttitulo" value="<?=$row['ctitseccion']?>" class="inputbox required" size="40" aria-required="true" required></li>

                          <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Titulo Amigable</label>
                        <input type="text" name="amigable" id="amigable" value="<?=$row['camiseccion']?>" class="inputbox required" size="40" aria-required="true" required></li>                      
                        
                         <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title="">Tags</label>
                        <textarea name="txttags" id="txttags" cols="68" rows="4" class="area600"><?=$row['ctagseccion']?></textarea></li>   
					</ul>
				</fieldset>									
			</div> </div>      

       <div class="panel"><h3 id="bobcontent2-title" class="handcursor">Opciones Adicionales</h3> 
  <div id="bobcontent2" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >            
               <fieldset class="panelform">
                	<ul class="adminformlist">	                	
                      
                      <li><span class="colgrishome">Imagen:</span>
                      <span class="colblancocen">
                          <input name="cimgseccion" type="text" class="box400" id="cimgseccion" value="<?=$row['cimgseccion']?>" size="60"  maxlength="150">
                       </span>
                       <span class="colblancocen">
                        <input type="button" value="Seleccionar" onClick="openAsset('cimgseccion')" id="btnAsset" name="btnAsset" >
                       </span>
                      </li>                  
                      
                       <li>
                     <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Paginacion Contenido</label>	
                     	<div><input type="text" name="txtpaginar"  size="5" value="<?=$row['cpagseccion']?>" class="box100"> Items</div>
                     </li>
                  
                   <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Clase</strong></label>
                     <select name="selectclase" id="selectclase" style="width:340px" class="box">						
						<?php
                        $sqlclase = db_query("select * from estiloclases  where  ccodplantilla='".$_SESSION['plantilla']."' order by cnomclase");
                        while($rowclase = db_fetch_array($sqlclase)) 
                        {                        
						 if($rowclase['ccodclase']==$row['ccodclase'])
                                    echo '<option value="' .utf8_encode($rowclase['ccodclase']).'" selected>' . $rowclase["cdesclase"].'</option>';
                           else
                                echo '<option value="' . $rowclase['ccodclase'].'" >' .utf8_encode($rowclase["cdesclase"]). '</option>';
                            }							
						   // echo '<option value="'.$rowclase['ccodclase'].'">'.utf8_encode($rowclase['cdesclase']).'</option>'		                 ?>                        
                        </select>
                    </li>
                        
                     <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Estilo Sub Secciónes</label>	
                     <div id="estilos">
                        <ul class="stylos">
                        <?php
                        $sql_subestilo = "SELECT * FROM estiloseccion WHERE cestsecestilo='1' AND ccodmodulo='1000' order by ccodsecestilo";
                        $res_subestilo = db_query($sql_subestilo);
                        while($rowsubestilo = db_fetch_array($res_subestilo)) 
                        {
                            if ($rowsubestilo['ccodsecestilo']==$row['ccodsubestilo']) { $check = " checked";} else { $check = "";}
                            echo "<li>\n";
                            echo "<img border='0' src=\"estilos/images/" . $rowsubestilo['cimgsecestilo'] . "\"><br><input type='radio' name='selectsub' value='".$rowsubestilo['ccodsecestilo']."'".$check.">" . $rowsubestilo['cnomsecestilo'];
                            echo "</li>";
                            $na++;
                        }
                        ?>
                        </ul>
                    </div>
                     
                     </li>
                     
                    </ul>
               </fieldset>	    
    </div></div> 

                </div>
           </div>
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>            
<div class="clr"></div>
      	  </div>
        <div class="clr"></div>
    </div>    
</div>
</body>
<?php } //----Fin While 1 ----- ?>
  <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/jsweb.js"></script>
	<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/js/core.js"></script>

<script>
$(document).ready(function(){

   $('#selectenlace').change(function() 
    {
	if($(this).attr('value') == '1')
	{ 
       $('#rutaenlace').attr('disabled','disabled');
	   $('#rutaenlace').val('');
	} 
	else
	{
       $('#rutaenlace').attr('disabled','');
	}
    }); 
	$('#titulo').keyup(function() 
    {
	   $('#amigable').val(convierteAlias($('#titulo').val()));
	   $('#txttitulo').val($('#titulo').val());
	});

})
</script>

<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchcontent.js"></script>
<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchicon.js"></script>
<script type="text/javascript">
	var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
	//bobexample.setStatus('<img src="imagen/selector_azul_vertical.gif" /> ', '<img src="imagen/selector-azul.gif" /> ')
	bobexample.setStatus('<img src="imagen/regular-dark.png" /> ', '<img src="imagen/regular-dark.png" /> ')
	bobexample.setColor('darkred', 'black')
	bobexample.defaultExpanded(0,1) //1=2st content expanded
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>