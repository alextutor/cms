<!DOCTYPE html>
<html lang="<?=$webidio?>">
<head>   
    <title><?=$webtitu?></title>
    <meta charset="utf-8">
    <base href="<?php echo $ROOT_PATH ?>"> 
    <meta name="author" content="www.sisdatahost.com venta de Hosting-Dominios"/>
    <!--
    <meta name="description"   content="<?=$webdesc?>"/>
    <meta name="keywords"      content="<?=$webtags?>"/>
      <meta name="Language"      content="<?=$webidio?>"/>
     -->
    <meta name="Copyright"     content="Sisdatahost"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="robots" 	   content="all"/>
    <link rel="shortcut icon" href="<?=$cfavicon?>"/>      
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
   <link  href="/templates/<?=$cnomplantilla?>/estilos/<?='style'.$webplan?>.css"	rel="stylesheet" type="text/css">   
    <?php //ponerlo aqui entre el head para que en el webmasters de Google	puedas validar el codigo por tu webanalytics
		if ($webanalytics<>"" ) {	echo  $webanalytics;} 
	?>
	<link href="<?=$cimgcontenido?>" rel="image_src" / > 
</head>
<body>
<?php
	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/css/mis-estilos-web.php');  
/* $webplan=000001  ya esta definido en index en la consultya a page*/
$sql_website = "SELECT * FROM estilopagina where ccodplantilla='".$webplan."'";
$res_website = db_query($sql_website);
while ($row_website = db_fetch_array($res_website))
{
	$webestilo  	= $row_website['webestilo'];
	$webancho  		= $row_website['webancho'];
	$webalineahor 	= $row_website['webalineahor'];
	$columnacenancho =$row_website['columnacenancho']-30;
	$columnaizqancho =$row_website['columnaizqancho'];
	$columnaderancho =$row_website['columnaderancho'];	 
}
?>
<div id="warp" class="redondeado-10px" >         
   <header id="cabecera">   
    	<div class="ctnlogo">
        	  <?php  include_once($cRutaWeb.'/inccabecera.php');	?> 
          <div class="clear"></div> 
        </div>
        <div id="ctn_slider">   		     
            <div class="slider">
                <?php  include_once($cRutaWeb.'/inccabeceracontenido.php');?> 
            </div>     
	    </div>
        <div class="menu">
           <nav><?php include_once ($cRutaWeb .'/inccabeceramenu.php');?>
           </nav>
        </div>        		         
        <div class="clear"></div>       
   </header>    
    <div>
	  <?php 
		//if ($_SESSION['id_usu_web']<>""){
		 include_once ($_SERVER['DOCUMENT_ROOT'] .'/include/control-usuario/barra-superior-usuario-activo.php');
		//}
	  ?>
    </div>  
    <hr>      
     <div style="clear:both"></div>          
     	<!------------------------------ Inicio  Cuerpo ----------------------------------------------------->             
       <div id="cuerpo">
        <?php if ($totalpantalla=="Portada" and ($webestilo==1 or $webestilo==3)){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."/incizquierda.php"?></div>                
        <?php } ?> 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="izqpantalla"){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."/incizquierda.php"?></div>                
        <?php } ?>      
        
         <?php include $_SERVER['DOCUMENT_ROOT']."/columnacentro.php"?>		    
	 
        <?php if ($totalpantalla=="Portada" and ($webestilo==2 or $webestilo==3)){?> 
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."/incderecha.php"?></div>
        <?php } ?>	 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="derepantalla"){?>    
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."/incderecha.php"?></div>
        <?php } ?>      
    </div> 
	<!------------------------------ Fin  Cuerpo --------------------------------------------------------> 	
    <div id="piecontenido"><?php include $cRutaWeb."incpiecontenido.php"?></div>
     <div class="clear"></div> 
</div>  <!--- Fin  warp ----->
 <footer id="PiePrincipal" class="redondeado-10px" >       	
	  <?php  include_once (include $cRutaWeb. '/pie-abajo.php');  ?> 
 </footer>  

<!-- Inicio Para slider deslizante---------->
<!--
slider3=cuando se presenta en el centro 
slider1=cuando se presenta Cabecera 
-->
<script src="/include/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<script src="/include/js/jquery.nivo.slider.pack-v23.js" type="text/javascript" ></script>
<script type="text/javascript">
$(window).load(function() {
        $('#slider1').nivoSlider({
			animSpeed:500,	
			pauseTime:5000
		});	
		 $('#slider3').nivoSlider({
			animSpeed:500,	
			pauseTime:5000
		});	
    });
</script>


<script type="text/javascript" src="/include/js/jquery.flow.1.2.js"></script>
<script type="text/javascript">// <![CDATA[
$(document).ready(function(){
	$("#myController").jFlow({
		slides: "#slides",
		controller: ".jFlowControl", // must be class, use . sign
		slideWrapper : "#jFlowSlide", // must be id, use # sign
		selectedWrapper: "jFlowSelected",  // just pure text, no sign
		auto: true,		//auto change slide, default true
		width: "100%",
		height: "235px",
		duration:500,
		prev: ".jFlowPrev", // must be class, use . sign
		next: ".jFlowNext" // must be class, use . sign
	});
});
</script>

<!--INICIO SEO: Atributos Alt y Title Automáticos en las Imágenes 
PROBLEMAS en el slider le pone caption -->
<script type='text/javascript'>
//	$(document).ready(function() {
//	$('img').each(function(){
//	var $img = $(this);
//	var filename = $img.attr('src')
//	$img.attr('title', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
//	$img.attr('alt', filename.substring((filename.lastIndexOf('/'))+1, filename.lastIndexOf('.')));
//	});
//	});
//</script>

<!--Utilizado por art_stylo_galeria.php -->
<link rel="stylesheet" type="text/css" href="/include/Shadowbox/shadowbox.css"/>
<script type="text/javascript" src="/include/Shadowbox/shadowbox.js"></script>
<script type='text/javascript'>
    Shadowbox.init({
        overlayColor: "#000",
        overlayOpacity: "0.6",		
    });	
</script>   

<!--viene de infinitecarousel2.php cuando se escoge en presentacion  -->
<script type="text/javascript" src="/include/infinitecarousel2/jquery.infinitecarousel2-thumbmod-1.js"></script>
<script type="text/javascript">
$(function(){
	jQuery('#infinitecarousel2').infiniteCarousel({
		displayTime: 6000,
		inView: 1,
		advance:1,
		autoPilot: false,
				internalThumbnails: false,

		thumbnailWidth: '80px',
		thumbnailHeight: '60px',
		thumbnailFontSize: '1 em', 
		imagePath: '/include/infinitecarousel2/images/',
		textholderHeight : .10,
		padding:'10px',		
		//displayThumbnails: 0,
	  displayThumbnailBackground: 0, 
	});
});
</script>

<!--------------------- Inicio Para visualizar Formularios Modales ----------------------->
<!--http://www.paginaswebynnova.com/web/descargas-y-script/formulario-de-contacto-en-ventana-modal-mejorado.html -->
<!-- <script type="text/javascript" src="/include/modal/jquery-1.8.3.min.js"></script> -->
<script type="text/javascript" src="/include/modal/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="/include/modal/js-contacto-modal-ynnova.js"></script>
<link href="/include/modal/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css"/>
<!--------------------- Fin Para visualizar Formularios Modales ----------------------->





</body>
</html>