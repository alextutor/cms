<?Php  session_start(); 
$option=$_GET["option"];
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
//$fechahoy= date("d-m-Y");

include($_SERVER['DOCUMENT_ROOT']. '/config.php');
//aqui hay dos funciones openAsset y sActiveAssetInput	
include($_SERVER['DOCUMENT_ROOT']. '/webadmin/panel_html.php');	
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
			$opsec .= '<li><img src="estilos/images/'.$rows[cimgsecestilo].'"><input type="radio"  name="selectestilo" value="'.$rows[ccodsecestilo].'" '.$check.'>'.$rows[cnomsecestilo].'</li>';
			$na++;
		}
		$opsec .= "</ul>";
		$mostrarsec->addAssign("estilos","innerHTML","$opsec");
		return $mostrarsec;
	}

?>
  <?php $xajax->printJavascript("xajax/");?>
<?php 
include_once ( $INC_DIR . '/webadmin/header.php');
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

<body>

<div id="toolbar-box">
	<div class="m">
        <div class="toolbar-list" id="toolbar">
            <ul>
            <li class="button" id="toolbar-apply">
	            <a onClick="document.forms['form'].submit();" class="toolbar"><span class="icon-32-apply"></span>Guardar</a>
            </li>
            <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=com_presentacion" onClick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>            
            </ul>
         </div>
         <div class="pagetitle icon-48-article-add">
           <h2>Gestor de Presentación: Actualiza  Presentación</h2></div>
    </div>
    
    <div id="element-box">
		<div class="m" style="height:600px;"> <!--Inicio m 2 -->        
        <?php $sql_contenido = db_query("SELECT * FROM pagehome WHERE ccodinicio = '" . $_GET['id'] . "'");
			while ($row_contenido = db_fetch_array($sql_contenido))
			{
			 $webdefa =$row_contenido['ccodpage']
			?>
            <form action="/webadmin/mantenimiento/Actualiza-presentacion.php" method="post" name="form" id="form" >
            <input type="hidden" name="idpro" id="idpro" value="<?=$_GET['id']?>">
			<div class="width-60 fltlft">
               <fieldset class="adminform">
				<legend>Detalles</legend>
					<ul class="adminformlist">	                    	
	                   <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false"><strong>Nombre</strong></label>	              
	                     <input type="text" name="titulo" id='titulo'  size="90" maxlength="150" class="box500" 
                         value="<?=$row_contenido['cnomhome']?>"  >    			
                        </li> 
                         <li><label id="jform_title-lbl" for="jform_title" class="hasTip" title="">Orden <span class="star">&nbsp;*</span></label>
                        <input type="text" name="cordpublica" id="cordpublica" value="<?=$row_contenido['cordpublica']?>" class="inputbox" size="40" aria-required="true" required></li>       
                       <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false"><strong>Tipo Contenido</strong></label>	          
                           <select name="seltipo" id="seltipo" style="width:340px;">
							  <?php
                               $tipocontenido = db_query("select * from webparametros  where  ccodparametro='0014' and ctipparametro='1' order by cvalparametro asc");
                               while($tip = db_fetch_array($tipocontenido)) 
                               {	
                                if($tip['cvalparametro']==$row_contenido['ctiphome']){
                                    echo '<option value="'.$tip['cvalparametro'].'" selected >'.utf8_encode($tip['cnomparametro']).'</option>';
                                }
                                else{
                                    echo '<option value="'.$tip['cvalparametro'].'" disabled >'.utf8_encode($tip['cnomparametro']).'</option>';
                                }
                                      
                               }
                              ?>
                          </select>                        
                        </li>                            
                    </ul> 
                    <div class="conten-tipo">
						<?php include "tablero_control_edit.php"?>
                    </div>
              </fieldset>       
             </div>
           <div class="width-40 fltrt">
           		<div id="content-sliders-" class="pane-sliders">
                <div style="display:none;"><div>		</div></div>

		<!--Inicio grupo1 -->                   
   <div class="panel"><h3 id="bobcontent1-title" class="handcursor">Publicacion</h3> 
  <div id="bobcontent1" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >         
                <fieldset class="panelform">
                    <ul class="adminformlist">                       
                       <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Pagina</strong></label>				
                        <select name="selectpage" id="selectpage" style="width:340px" >
						<?php 
                           $sql_page = db_query("select * from page  where  cestpage='1' order by cnompage");
                           while($row_page = db_fetch_array($sql_page)) 
                           {
                               if( $row_page['ccodpage']==$row_contenido['ccodpage'])
                               {
                                  echo '<option value="' . $row_page['ccodpage'] .'" selected>'.utf8_encode($row_page['cnompage']).'</option>';
                               }
                               else{
                                   if( $row_contenido['ctiphome']<>'4')  echo '<option value="' . $row_page['ccodpage'] .'">'.utf8_encode($row_page['cnompage']).'</option>';
                               }
                              
                           }
                        ?>
                        </select>
						
                        </li>                    
                        <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Sección</strong></label><button id="expand">+</button><button id="collapse">-</button><button id="default">::</button>
    <div id="cuadrobox"  style="border:1px #666666 solid; padding:5px; width:340px; height:200px; overflow:auto;background-color:#FFF;">
                            <?php 
                            include "jq_selectseccion2.php";
                            ?>
                            </div>
                        </li>
                       <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Ubicacion</strong></label>
                          <select name="selectubicacion" id="selectubicacion" style="width:340px" >
							<?php
                            $tipocontenido = db_query("select * from webparametros  where  ccodparametro='0004' and ctipparametro='1' order by cvalparametro asc");
                            while($tip = db_fetch_array($tipocontenido)) 
                            {	
                                if($tip['cvalparametro']==$row_contenido['cubidestino']){
                                    echo '<option value="'.$tip['cvalparametro'].'" selected >'.utf8_encode($tip['cnomparametro']).'</option>';
                                }
                                else{
                                    echo '<option value="'.$tip['cvalparametro'].'">'.utf8_encode($tip['cnomparametro']).'</option>';
                                }	  
                            }
                            ?>
                            </select>
                        </li>
                                                 
                       <li><label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Clase</strong></label>
                     <select name="selectclase" id="selectclase" style="width:340px" class="box">						
						<?php
                        $sqlclase = db_query("select * from estiloclases  where  ccodplantilla='".$_SESSION['plantilla']."' order by cnomclase");
                        while($rowclase = db_fetch_array($sqlclase)) 
                        {                        
						 if($rowclase['ccodclase']==$row_contenido['ccodclase'])
                                    echo '<option value="' .utf8_encode($rowclase['ccodclase']).'" selected>' . $rowclase["cdesclase"].'</option>';
                           else
                                echo '<option value="' . $rowclase['ccodclase'].'" >' .utf8_encode($rowclase["cdesclase"]). '</option>';
                            }							
						   // echo '<option value="'.$rowclase['ccodclase'].'">'.utf8_encode($rowclase['cdesclase']).'</option>'		                 ?>                        
                        </select>
                    </li>
                    
                         
                        <li>
                        <label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Fecha Inicio</strong></label>
                     
                     <input type="text" name="fechaini" id="fechaini" size='18'  style="width:150px;" class="cuadrotexto" value="<?=fechadmy($row_contenido['dfecinicio'])?>">
                        <input type="button" id="fechabus" value="" class="botonfecha">
                        <script type="text/javascript"> 
                           Calendar.setup({ 
                            inputField     :  "fechaini",     // id del campo de texto 
                            ifFormat       :  "%d-%m-%Y",     // formato de la fecha que se escriba en el campo de texto 
                            button         :  "fechabus"     // el id del botón que lanzará el calendario 
                            }); 
                        </script>                                         
                       
                        </li>
                         <li>
                        <label id="jform_title-lbl" for="jform_title" class="hasTip required" title=""><strong>Fecha Fin</strong></label>
                          <input type="text" name="fechafin" id="fechafin" size='18'  style="width:150px;" class="cuadrotexto" value="<?=fechadmy($row_contenido['dfecfinal'])?>">
                          
                        <input type="button" id="fechabus2" value="" class="botonfecha">
                        <script type="text/javascript"> 
                           Calendar.setup({ 
                            inputField     :  "fechafin",     // id del campo de texto 
                            ifFormat       :  "%d-%m-%Y",     // formato de la fecha que se escriba en el campo de texto 
                            button         :  "fechabus2"     // el id del botón que lanzará el calendario 
                            }); 
                        </script>
                        </li>
					</ul>

				</fieldset>									
			</div> </div>             

                </div>
           </div>      
            
                 <input type="hidden" name="enviar" value="Enviar" />
            </form>
                  
			<div style="clear:both"><br/></div>
      	  </div><!--fin m 2 -->
			<?php } // --------Fin While ---- ?>                 
        <div class="clr"></div>
    </div>  
</div>

</body>

  <script type="text/javascript" src="js/jsweb.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="/webadmin/js/core.js"></script>
  
<script type="text/javascript">

$(document).ready(function(){
	$("#selectpage").change(function(){
		$.post("jq_selectseccion2.php",{ idopera:'1',iditem:$("#idpro").val(),idpage:$("#selectpage").val()},function(data){$("#cuadrobox").html(data);})
	});
	$("#paginadinam").change(function(){
		$.post("jq_secciones.php",{ idopera:'1',idmodulo:$("#modulodinam").val(),idpage:$("#paginadinam").val()},function(data){$("#secciondinam").html(data);});
		$.post("jq_selectpage.php",{ idopera:'1',idpage:$("#paginadinam").val()},function(data){$("#selectpage").html(data);});
		$.post("jq_selectseccion2.php",{ idopera:'1',iditem:$("#idpro").val(),idpage:$("#paginadinam").val()},function(data){$("#cuadrobox").html(data);});
	});
	$("#modulodinam").change(function(){
		$.post("jq_secciones.php",{ idopera:'1',idmodulo:$("#modulodinam").val(),idpage:$("#paginadinam").val()},function(data){$("#secciondinam").html(data);})
	});

});
function relleno(ass){
	
		aa = eval(ass);
		var num_asign = aa.length;
		document.getElementById(ass).length = num_asign;
		for(i=0;i<document.getElementById(ass).length;i++){
			if(document.getElementById(ass).options[i].selected){
				document.getElementById('selectpage').options[i].value= document.getElementById(ass).options[i].value;
				document.getElementById('selectpage').options[i].text = document.getElementById(ass).options[i].text;
			}
      	}
		
	}
</script>


<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchcontent.js"></script>
<script type="text/javascript" src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/js/switchcontent/switchicon.js"></script>
<script type="text/javascript">
	var bobexample=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
	//bobexample.setStatus('<img src="imagen/selector_azul_vertical.gif" /> ', '<img src="imagen/selector-azul.gif" /> ')
	bobexample.setStatus('<img src="imagen/regular-dark.png" /> ', '<img src="imagen/regular-dark.png" /> ')
	bobexample.setColor('darkred', 'black')
	bobexample.defaultExpanded(0) //1=2st content expanded
	bobexample.setPersist(false)
	bobexample.collapsePrevious(true) //Only one content open at any given time
	bobexample.init()
</script>