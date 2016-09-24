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
    <meta property='fb:admins' content='<?=$fb_admins_facebook?>'/>
    <meta property='fb:app_id' content='<?=$fb_app_id_facebook?>'/>
    
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