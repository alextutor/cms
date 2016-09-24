<?php 
/*$dasds = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.ccodcontenido desc ";
echo $dasds;exit;
$cRutapagina        = crearurl_articulo($codsecc);
echo $enlaceurl;exit;*/

$cruta=dameURL();?>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=411638279015357";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<div class="fb-comments" data-href="<?=$cruta?>" data-numposts="5" data-colorscheme="light">
</div>