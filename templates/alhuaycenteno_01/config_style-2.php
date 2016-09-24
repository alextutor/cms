<!DOCTYPE html>
<html lang="<?=$webidio?>"><head>   
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
    <link rel="alternate" hreflang="es-pe" href="<?php echo "http://www.".$subdominio?>" >	   	
    <!-- Begin Metadata Facebook -->
    <!-- <meta property="og:description" content="" />       -->         
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
     <!-- <link  href="/templates/<?=$cnomplantilla?>/estilos/<?='estilos_movil_'.$webplan?>.css"  rel="stylesheet" type="text/css"  media="handheld, only screen and (max-device-width: 480px)"> 
             
   <link  href="/templates/<?=$cnomplantilla?>/estilos/<?='style'.$webplan?>.css"  rel="stylesheet" type="text/css" media="screen and (min-width:481px)" >   -->
   
   <link  href="/templates/<?=$cnomplantilla?>/estilos/<?='style'.$webplan?>.css"  rel="stylesheet" type="text/css">
   
   <link  href="/templates/<?=$cnomplantilla?>/estilos/ed-grid.css"  rel="stylesheet" type="text/css">     
          
    <?php //ponerlo aqui entre el head para que en el webmasters de Google	puedas validar el codigo por tu webanalytics
		if ($webanalytics<>"" ) {	echo  $webanalytics;} 
	?>      

</head>
<body class="">
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
<div id="warp" >         
   <header id="cabecera" class="grupo total">  	
      <div class="caja movil-70 centrar-caja">
        <div class="ctnlogo">
              <?php  include_once($cRutaWeb.'/inccabecera.php');	?> 
          <div class="clear"></div> 
        </div>
        <div id="ctn_slider">   		     
            <div class="slider">
              <?php include_once ($cRutaWeb .'/inccabeceracontenido.php');?>  
            </div>     
        </div>
      </div>        
      <div class="clear"></div>                    
   <div class="grupo total">
        <div class="menu caja">
           <?php  include_once($cRutaWeb.'/inccabeceramenu.php');?>
           <div class="clear"></div>
        </div>  
   </div>    
   <div class="clear"></div>   
  </header>        
    <div>
	  <?php 
		//if ($_SESSION['id_usu_web']<>""){
		 //include_once ($_SERVER['DOCUMENT_ROOT'] .'/include/control-usuario/barra-superior-usuario-activo.php');
		//}
		//echo $totalpantalla."----".$webestilo;exit;
	  ?>
    </div>  
     <div style="clear:both"></div>          
     	<!--Inicio  Cuerpo ->             
       <div id="cuerpo" class="grupo">
		<!- $webestilo = (1 Izquierda Pantalla)(2 Derecha Pantalla) (3 Ambos)(4 Total Pantalla)-->
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
	<!-- Fin  Cuerpo --> 	
    <div id="piecontenido"><?php //include $cRutaWeb."incpiecontenido.php"?></div>
     <div class="clear"></div> 

     <footer id="PiePrincipal" class="grupo total" >       	
          <?php  include_once (include $cRutaWeb. '/pie-abajo.php');  ?> 
     </footer>
      <div class="clear"></div>  
 </div>  <!--- Fin  warp ->
 
<!- Inicio Para slider deslizante ->
<!-
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
		height: "180px",
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
<!--usado por videos-slider-portada-infinitecarousel2.php -->
<script type="text/javascript">
$(function(){
	jQuery('#infinitecarousel3').infiniteCarousel({
	transitionSpeed : 1800,
	displayTime : 5500,
	textholderHeight : .2,
	displayProgressBar : 1, /* valor 0 no se muestra barra progreso*/
	displayThumbnails: 1, /* valor 0 no se muestra Thumbnails debajo */
	displayThumbnailNumbers:0,
	displayThumbnailBackground: 1,	
	   
	});
});
</script>
<!--usado por fotos-slider-portada-infinitecarousel2.php -->
<script type="text/javascript">
$(function(){
	jQuery('#infinitecarousel4').infiniteCarousel({
	transitionSpeed : 1000,
	displayTime : 3000,
	textholderHeight : .2,
	displayProgressBar : 0, /* valor 0 no se muestra barra progreso*/
	displayThumbnails: 0, /* valor 0 no se muestra Thumbnails debajo */
	displayThumbnailNumbers:0,
	displayThumbnailBackground: 1,	
	   
	});
});
</script>
<!--usado por fotos-slider-portada-Thumbnails-infinitecarousel2.php -->
<script type="text/javascript">
$(function(){
	jQuery('#infinitecarousel5').infiniteCarousel({
	transitionSpeed : 1000,
	displayTime : 2900,
	textholderHeight : .2,
	displayProgressBar : 1, /* valor 0 no se muestra barra progreso*/
	displayThumbnails: 1, /* valor 0 no se muestra Thumbnails debajo */
	displayThumbnailNumbers:0,
	displayThumbnailBackground: 1,		   
	});
});
</script>
<!-- Inicio Para visualizar Formularios Modales->
<!- http://www.paginaswebynnova.com/web/descargas-y-script/formulario-de-contacto-en-ventana-modal-mejorado.html -->
<!-- <script type="text/javascript" src="/include/modal/jquery-1.8.3.min.js"></script> -->
<script type="text/javascript" src="/include/modal/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="/include/modal/js-contacto-modal-ynnova.js"></script>
<link href="/include/modal/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">	
   $(document).ready(function() {	
    $("a#open_video").fancybox();
	$("a.grouped_elements").fancybox({
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'titlePosition'  : 'over'		
	});/* fotos-slider-portada-infinitecarousel2.php*/			
	$("a.actualizarpadre").fancybox({
	  /*'width': 800,
	  'height': 450,*/
	  'type'	: 'iframe',
	  "hideOnOverlayClick" : false, // Evita cerrar cuando se hace click fuera de  fancybox
	  closeClick: false,
	  'onClosed': function() {
		parent.location.reload(true);
	  }
	});/*-- fin actualizarpadre - */	
});
</script>
<!--Fin Para visualizar Formularios Modales ->
<!- 
 <link rel="stylesheet" href="/include/Menu-Responsive/responsive-mobile-menu/responsivemobilemenu.css" type="text/css"/>
<script type="text/javascript" src="/include/Menu-Responsive/responsive-mobile-menu/responsivemobilemenu.js"></script> -->
<!-- <link  href="/include/Menu-Responsive/SlickNav-master/slicknav.scs"  rel="stylesheet" type="text/css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>

<script type="text/javascript" src="/include/Menu-Responsive/SlickNav-master/jquery.slicknav.js"></script>
<script>
	$('#cabmenu').slicknav({
	label: '',
	duration: 1000,
	easingOpen: "easeOutBounce", //available with jQuery UI
	prependTo:'#demo2'
});

</script>-->

</body>
</html>