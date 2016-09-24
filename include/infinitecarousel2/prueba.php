<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>InfiniteCarousel jQuery Plugin Demo</title>
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery.infinitecarousel2_0_2.js"></script>
<script type="text/javascript">
$(function(){
	

	$('div.thumb').parent().css({'margin':'0 auto','width':'300px'});
});
</script>
<style type="text/css">
.textholder {
	font: 11px Arial, Helvetica, sans-serif;
	padding: 2px 4px 0 4px;
	-moz-border-radius: 4px 4px 0 0;
}
#carousel {

	-moz-box-shadow: 0px 0px 10px #333;
	-webkit-box-shadow:  0px 0px 10px #333;
	box-shadow:  0px 0px 10px #333;
	clear:right;
	margin: 40px auto 0 auto;
}
body {
	background: #ccc;
}
</style>

</head>

<body>
<div id="carousel">
	<ul>
		<li><img alt="" src="http://www.infodisfap.com/noticia/imagen/mil-her_108_96.gif" width="300" height="225" /><p>Hi there, I'm a caption.</p></li>
		<li><img alt="" src="http://www.infodisfap.com/noticia/imagen/mil-her_108_96.gif" width="300" height="225" /><p>This is the caption for the second image.</p></li>		
	</ul>
</div>
</body>
</html>