<?php
  include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php');
	$getNews_sql = 'SELECT *  FROM NEWS  WHERE AVISFAIP=1 order by fechanoticia desc LIMIT 5';
	//$getNews_sql = "SELECT  id,img_link, news_title, news_summary, colaborador, news_link, principal, activo FROM NEWS  WHERE activo=1 order by fechacorta";	
	$getNews = mysql_query($getNews_sql,$conexion);
	$numero = mysql_num_rows($getNews); // obtenemos el número de filas 
	//echo 'El número de registros de la tabla es: '.$numero.'';  // imprimos en pantalla el número generado 
?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informacion para el Personal Discapacitado de las Fuerzas Armadas del Perú</title>
<meta name="description" content="infodisfap.com es un portal de interés sobre la discapacidad de las fuerzas armadas">
<meta http-equiv="Content-Type" content="text/html;">
<meta name="keywords" content="Discapacidad, down, sordo, sordera, problemas infantiles de salud, incapacidad ,discapacidad , fuerzas armadas , Fuerzas Armadas ,fap , ejercito,marina">
<meta name="language" content="Español">
<meta name="robots" content="ALL">
<meta name="Author" content="sisdataweb">
<meta name="URL" content="http://www.infodisfap.com">
<meta name="document-rights" content="Public Domain">
<meta name="cache-control" content="no-cache">
<!--
<script type="text/javascript" src="infinitecarousel2/jquery-1.4.min.js"></script>
 -->
 <script type="text/javascript" src="http://www.infodisfap.com/infinitecarousel2/jquery.infinitecarousel2-thumbmod-1.js"></script>
 
<script type="text/javascript">
$(function(){
	jQuery('#carousel').infiniteCarousel({
		displayTime: 6000,
		inView:1,
		advance:1,
		thumbnailWidth: '80px',
		thumbnailHeight: '60px',
		imagePath: 'http://www.infodisfap.com/noticia/imagen/infinitecarousel2/',
		textholderHeight : .20,
		padding:'10px'
	});
});
</script>
<style type="text/css">
#carousel {
	border: 2px solid #aaa;
}
.textholder {
	font: 11px Arial, Helvetica, sans-serif;
	background-color: #F5F5F5; 
color: #000000; 
	padding: 2px 4px 0 4px;
	-moz-border-radius: 4px 4px 0 0;
}
</style>
</head>
<div id="carousel">
	<ul>
		 <?php while ($row = mysql_fetch_array($getNews)) {?>         
        <li> 
	         <a href="http://www.infodisfap.com/enlaces.php?pagina=<?php echo trim($row['news_link']); ?>"> 	
			  <img alt="" src="<?php echo $row['img_link2']; ?>" width="412" height="280"/></a><br><br><p><strong><font color="#aa2303"> 
               <?php echo $row['news_title']; ?> </font></strong> <br> <?php echo '<strong> colaborador:  ' . $row['colaborador'] ."</strong>"; ?></p>                             
         </li>        
		<?php }?>
    </ul>
</div>
 <?php   include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); ?>