<!DOCTYPE html>
<html lang="<?=$webidio?>">
<head>   
    <title><?=$webtitu?></title>
    <meta charset="utf-8">
    <base href="<?php //echo $ROOT_PATH ?>"> 
    <meta name="author" content="www.sisdatahost.com venta de Hosting-Dominios"/>
    <meta name="description"   content="<?=$webdesc?>"/>
    <meta name="keywords"      content="<?=$webtags?>"/>
    <meta name="Language"      content="<?=$webidio?>"/>
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
<?php if ($webanalytics<>"" ) {echo $webanalytics;	} ?>	
</head>
<body>
<div id="warp">         
   <header id="cabecera">   
	   <section class="top">   	
       <div></div>
   	   </section>
       <section class="main-header">          
                <?php  include_once($cRutaWeb.'/inccabecera.php');	?>         	           
            <div class="cabeceramenu">
                 <?php   include_once ($cRutaWeb .'/inccabeceramenu.php');
                 //include_once ($_SERVER['DOCUMENT_ROOT']. '/webadmin/menu/menuCs3.php');?>
                 <div style="clear:both"></div>
            </div>            
        </section>               
   </header>
   <div class="linea_separadora"></div>
   <div id="ctn_slider">   		     
        <div class="slider">
            <?php include_once($cRutaWeb.'/inccabeceracontenido.php'); ?> 
        </div>     
    </div>
    <hr>
     <div style="clear:both"></div>          
     	<!------------------------------ Inicio  Cuerpo ----------------------------------------------------->             
    <div id="cuerpo">
        <?php if ($totalpantalla=="Portada" and ($webestilo==1 or $webestilo==3)){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."incizquierda.php"?></div>                
        <?php } ?> 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="izqpantalla"){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."incizquierda.php"?></div>                
        <?php } ?>      
        
         <?php include "/columnacentro.php"?>		    
	 
        <?php if ($totalpantalla=="Portada" and ($webestilo==2 or $webestilo==3)){?> 
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."incderecha.php"?></div>
        <?php } ?>	 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="derepantalla"){?>    
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."incderecha.php"?></div>
        <?php } ?>      
    </div> 
	<!------------------------------ Fin  Cuerpo --------------------------------------------------------> 	
    	 <div style="clear:both"></div>    <br>
</div>  <!--- Fin  warp ----->
 <footer id="PiePrincipal">       	
	  <?php  include_once ($cRutaWeb . '/pie-abajo.php');  ?> 
 </footer>  
<script type="text/javascript" src="/include/js/jquery.js" ></script>

<link rel="stylesheet" href="/include/css/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="/include/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(window).load(function() {
        $('#slider1').nivoSlider({
			animSpeed:500,	
			pauseTime:5000
		});
        $('#slider2').nivoSlider({
			animSpeed:500,	
			pauseTime:5000
		});
        $('#slider3').nivoSlider({
			animSpeed:500,	
			pauseTime:5000
		});
        $('#slider4').nivoSlider({
			animSpeed:250,	
			pauseTime:2500
		});
        $('#slider5').nivoSlider({
			animSpeed:250,	
			pauseTime:2500
		});
	
    });
</script>
<script type="text/javascript" src="/webadmin/propaganda-cambiante/jFlow/js/jquery.flow.1.2.js"></script>
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

</body>
</html>