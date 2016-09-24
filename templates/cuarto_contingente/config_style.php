<?php //echo $contenidoinc."config_style.php";exit;?>
<!DOCTYPE html>
<html lang="<?=$webidio?>"><head>   
    <title><?=$webtitu?></title>
    <meta charset="utf-8">
    <base href="<?php echo $ROOT_PATH ?>"> 
    <meta name="author" content="www.sisdatahost.com venta de Hosting-Dominios"/>
    <meta name="description"   content="<?=$webdesc?>"/>
    <meta name="keywords"      content="<?=$webtags?>"/>
    <meta name="Language"      content="<?=$webidio?>"/>
    <meta name="Copyright"     content="Sisdatahost"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="robots" 	   content="all"/>
    <link rel="shortcut icon" href="<?=$cfavicon?>"/>
    <link rel="alternate" hreflang="es-pe" href="<?php echo "http://www.".$subdominio?>" >	   
	
    <!-- Begin Metadata Facebook -->
    <!--       
    <meta property="og:description" content="" />    
     -->    
     
    <meta property="og:url" content="<?=dameURL()?>" />
    <meta property="og:type"   content="website" /> 
    <meta property='fb:admins' content='100003877831120'/>
    <meta property='fb:app_id' content='411638279015357'/>
    <meta property="og:title" content="<?=$webtitu?>" /> 
    <meta property="og:site_name" content="<?=$webtituempre?>"/>
     <meta property="og:image" content="<?php echo "http://www.".$subdominio. $cimgcontenido?>" />
    <link rel="image_src" type="image/jpeg" href="<?=$cimgcontenido?>"  /> 
  <!--End Metadata Facebook -->
      
    <!--[if lt IE 9]>
        <script src="/include/js/html5shiv.js"></script>       
        <script src="/include/js/DD_roundies_0.0.2a-min.js"></script>
        <script>    
      /* Ahora solo necesitamos decirle a ddroundies sobre que class o id debe redondear y de cuanto es el radio de redondeo que debe aplicar */    
      //un redondeo de todos los bordes a 10 pixeles para todos los elementos HTML que lleven definida esta clase
      DD_roundies.addRule('.redondeado-10px', '30px');    
      /*
        Tambien se puede especificar un redondeo para cada una de las esquinas        
        5px para la esquina superior izquierda
        10px para la esquina superior derecha
        15px para la esquina inferior derecha
        20px para la esquina inferior izquierda
      */
      DD_roundies.addRule('.redondeado-popurri', '5px 10px 15px 30px');
</script>
  <![endif]-->   
       <!--Eliminate render-blocking CSS in above-the-fold content agragando media="none" onload="this.media='all';" acelera la carga del css   -->
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php //  include_once( "/templates/".$cnomplantilla."/estilos/style".$webplan.".php");	?>      
 <link  href="/templates/<?=$cnomplantilla?>/estilos/<?='style'.$webplan?>.css"  rel="stylesheet" type="text/css" >
   <?php //ponerlo aqui entre el head para que en el webmasters de Google	puedas validar el codigo por tu webanalytics
		if ($webanalytics<>"" ) {	echo  $webanalytics;} 
	?>
</head>
<body>

<?php
//	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/css/mis-estilos-web.php');  
///* $webplan=000001  ya esta definido en index en la consultya a page*/
//$sql_website = "SELECT * FROM estilopagina where ccodplantilla='".$webplan."'";
//$res_website = db_query($sql_website);
//while ($row_website = db_fetch_array($res_website))
//{
//	$webestilo  	= $row_website['webestilo'];
//	$webancho  		= $row_website['webancho'];
//	$webalineahor 	= $row_website['webalineahor'];
//	$columnacenancho =$row_website['columnacenancho']-30;
//	$columnaizqancho =$row_website['columnaizqancho'];
//	$columnaderancho =$row_website['columnaderancho'];
//	$ampliarimagen_portada=$row_website['ampliarimagen_portada'];	//para saber si se amplia imagen en la portada o se muestra como una noticia	 
//}
?>
<div id="warp" class="redondeado-10px" >         
   <header id="cabecera">   
    	<div class="ctnlogo">
        	  <?php  include_once($cRutaWeb.'/inccabecera.php');	?>         
        </div>        
        <div id="ctn_slider">   		     
            <div class="slider">
                <?php include_once($cRutaWeb .'/inccabeceracontenido.php'); ?> 
            </div> 
   		</div>
        <div class="ctn-menu">        
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu"  class="icon-menu">
             <img src="/imagen/para-todos/icono-menu.jpg" width="30px" height="30px"> 
            <span class="titulomenu">MENU</span>
            </label>
            <nav class="menu">
              <?php  include_once($cRutaWeb.'/inccabeceramenu.php');?>
           </nav>
        </div>
         
        <?php //include_once($_SERVER['DOCUMENT_ROOT'].'/modulos/form_buscador.php'); ?>              		                      
  </header>     
    <div>
	  <?php 
		//if ($_SESSION['id_usu_web']<>""){
		 //include_once ($_SERVER['DOCUMENT_ROOT'] .'/include/control-usuario/barra-superior-usuario-activo.php');
		//}
		//echo $totalpantalla."----".$webestilo;exit;
	  ?>
    </div>  
            
     	<!-------------------- Inicio  Cuerpo ---------------------->             
       <div id="cuerpo">
		<!-- $webestilo = (1 Izquierda Pantalla)(2 Derecha Pantalla) (3 Ambos)(4 Total Pantalla)-->
        <?php if ($totalpantalla=="Portada" and ($webestilo==1 or $webestilo==3)){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."/incizquierda.php"?></div>        <?php } ?> 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="izqpantalla"){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."/incizquierda.php"?></div>        <?php } ?>      
         <?php include $_SERVER['DOCUMENT_ROOT']."/columnacentro.php"?>		    
	 
        <?php if ($totalpantalla=="Portada" and ($webestilo==2 or $webestilo==3)){?> 
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."/incderecha.php"?></div>
        <?php } ?>	 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="derepantalla"){?>    
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."/incderecha.php"?></div>
        <?php } ?>      
    </div> 
	<!------------------------------ Fin  Cuerpo --------------------------------------------------------> 	
    <div id="piecontenido"><?php //include $cRutaWeb."incpiecontenido.php"?></div>         
</div>  <!--- Fin  warp ----->
 <footer id="PiePrincipal" class="redondeado-10px" >       	
	  <?php  include_once (include $cRutaWeb. '/pie-abajo.php');  ?> 
</footer>  
</body>
</html>

<!--06-02-2016  se pasó todos los llamados de slider o jquery a index.php porque si se agregaba 
o quitaba un llamado se tendría que  reemplazar  a cada  config_style.php de cada plantilla -->