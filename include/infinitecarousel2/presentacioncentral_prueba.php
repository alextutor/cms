<?php

  include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/conexioninfodisfap.php');
	$getNews_sql = 'SELECT *  FROM NEWS  WHERE activo=1 order by fechanoticia desc LIMIT 5';
	//$getNews_sql = "SELECT  id,img_link, news_title, news_summary, colaborador, news_link, principal, activo FROM NEWS  WHERE activo=1 order by fechacorta";	

	$getNews = mysql_query($getNews_sql,$conexion);
	$numero = mysql_num_rows($getNews); // obtenemos el número de filas 
	//echo 'El número de registros de la tabla es: '.$numero.'';  // imprimos en pantalla el número generado 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>InfiniteCarousel jQuery Plugin Demo</title>
<!--
<script type="text/javascript" src="http://www.infodisfap.com/infinitecarousel2/jquery-1.4.min.js"></script>
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
		imagePath: 'http://www.infodisfap.com/infinitecarousel2/images/',
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
<body>

<div id="carousel">
	<ul>
		 <?php while ($row = mysql_fetch_array($getNews)) {?>         
        <li> 
	         <a href="http://www.infodisfap.com/enlaces.php?pagina=<?php echo trim($row['news_link']); ?>"> 	
			  <img alt="" src="<?php echo $row['img_link2']; ?>" width="412" height="280"/></a><br><br><p><strong><font color="#aa2303">  <?php echo $row['news_title']; ?> </font></strong></p>              
                 
         </li>        

		<?php }?>
    </ul>
</div>

  <?php   include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); ?>
</body>
</html>