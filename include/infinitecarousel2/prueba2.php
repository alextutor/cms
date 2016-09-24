<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>InfiniteCarousel jQuery Plugin Demo</title>
<script type="text/javascript" src="jquery-1.4.min.js"></script>
<script type="text/javascript" src="jquery.infinitecarousel2-thumbmod-1.js"></script>
<script type="text/javascript">
$(function(){
	$('#carousel').infiniteCarousel({
		displayTime: 6000,
		inView:1,
		advance:1,
		thumbnailWidth: '80px',
		thumbnailHeight: '60px',
		imagePath: '/jquery/infinitecarousel2/images/',
		textholderHeight : .25,
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
	padding: 2px 4px 0 4px;
	-moz-border-radius: 4px 4px 0 0;
}
</style>
</head>
<body>

<div id="carousel">
	<ul>
		<li><a href="/anuncio-sorteo-pavo.php"><img alt="Sillas de Ruedas para personal discapacitado de las FFAA" src="http://www.infodisfap.com/noticia/imagen/mil-her_108_96.gif" width="300" height="225" /></a><p><strong> Sillas de Ruedas para personal discapacitado de las FFAA </strong><br>
        			San Borja, Nov. 13 (EP).- El personal discapacitado recibe donación de la Fundación Weelchair Foundation y Fundación Carlos Slim.  </p></li>
		<li><img alt="" src="http://www.infodisfap.com/noticia/imagen/mil-her_108_96.gif" width="300" height="225" /><p>This is the caption for the second image.</p></li>
		<li><img alt="" src="http://www.infodisfap.com/noticia/imagen/mil-her_108_96.gif" width="300" height="225" /></li>
		<li><img alt="" src="http://www.infodisfap.com/noticia/imagen/mil-her_108_96.gif" width="300" height="225" /><p><strong>You can</strong> <i>use HTML in</i> <span style="color:#f00">captions</span>.</p></li>
	</ul>
</div>

</body>
</html>