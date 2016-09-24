<style type="text/css">
	.cont_redes_sociales{
		clear:both;
		width:90%;
		margin:0 auto;
		margin-top:50px;		
	}
	.cont_redes_sociales .izq{
		
	}	
</style>
<?php 
if (!empty($idsec1) and empty ($idsec2)) {
	$tituredes=$idsec1; 	
}	
if (!empty($idsec1) and !empty ($idsec2)) {
	$tituredes=$idsec1 . " de " .$idsec2; 	}	

?>
<div class="cont_redes_sociales">
	<img src='/imagen/redes-sociales/compartir-fondo-verde-separado.png' width='25' height='25' />
    <strong>Compartir En:</strong>
    <a href='http://twitter.com/share' class='twitter-share-button' data-text='<?php echo $tituredes ?>' 
    data-count='none' data-via='<?php echo $webnombre ?>' data-lang='es'>Tweet</a>
	<script type='text/javascript' src='http://platform.twitter.com/widgets.js'></script>   
    
    
    
      
<!--http://stivengordillo.com/todo-lo-que-debe-saber-de-open-grahp-para-publicar-contenido-en-facebook/
http://megazona.com/seo/metatags/metatags_og_las_metas_para_el_facebook
http://www.lostiemposcambian.com/blog/facebook/compartir-urls-en-facebook/#facebook-opengraph
https://developers.facebook.com/tools/debug
 -->
    <a href="	
http://www.facebook.com/sharer.php?s=100&p[url]=url_contenido&p[title]=titulo_compartido&p[summary]=
2descripcion&p[images][0]=thumbnail_image_url"> Compartir en Facebook</a>

    
</div>