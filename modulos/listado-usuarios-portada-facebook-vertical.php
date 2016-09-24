<style type="text/css">	
	.celdatituloRojo{background-color: #b60002;color: #ffffff;font-weight: bold;font-size: 10pt;height: 25px;
	text-align: center; margin-bottom:2px;}

	.ctn_total_comen_post{background-color:ffffff;border-style:solid;border-color:#333333;border-width:1px;
	 margin:0 auto;width:100%; padding-top:10px;  }
	.ctn_comen_post{height:auto;width:99%; }
	.comen_post {width: 99%;padding: 0.1em; clear:both; border-bottom:1px solid rgba(0, 0, 0, 0.15);overflow:hidden; margin:0 auto;margin-bottom: .2em}
	.comen_post .image_post {float: left;width: 13%; margin-right:5px;}
	.comen_post .conteni_post {float: left;width: 77%;margin-left: 5px;}
	
	.comen_post .titulo_post {float:left; width:100%; color:#990048;font-weight: bold; margin-left:5px;
	}
	.comentario {margin-bottom: 2px;margin-top:5px;padding:3px; clear:both }
	.comen_post a:visited {text-decoration: none;color: #990048;font-weight: bold;}
	.comen_post:hover{background-color:#ff9900; cursor:pointer;}

	@media (max-width:481px) {/* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
		.ctn_comen_post{max-height:200px;}
	}
	@media (min-width:480px) {/* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
		.ctn_comen_post{max-height:630px;}
	}
</style>

<!--Inicio Para jScrollPane  lo pase a su config_style.php

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
</script>

</script>
<script src="/include/js/jScrollPane/jquery.jscrollpane.min.js"></script>
<script src="/include/js/jScrollPane/jquery.mousewheel.js"></script>
<link rel="stylesheet" type="text/css" href="/include/js/jScrollPane/jquery.jscrollpane.css">
<script>
var jsc = jQuery.noConflict();
	jsc(document).ready(function(){
		jsc('.ctn_comen_post').jScrollPane({ /*.Initialize jScrollPane to your selector.*/
		horizontalGutter:5,
		verticalGutter:12,
		'showArrows': false
		});
		
		jsc('.jspDrag').hide(); /*Barra de desplazamiento debe estar oculta si no hay ratón sobre en él.*/
		jsc('.jspScrollable').mouseenter(function(){
			jsc('.jspDrag').stop(true, true).fadeIn('slow');
		});
		jsc('.jspScrollable').mouseleave(function(){
			jsc('.jspDrag').stop(true, true).fadeOut('slow');
		});
	
	});
</script>
<!--Fin Para jScrollPane ---------->

<?php 
$resultComen = "SELECT * FROM usuarios order by imagenfoto<>'/modulos/comentario-combinado-multiple/usuario-anonimo.gif' desc  ";
//LIMIT 15 
$r = mysql_query($resultComen);        
echo "<div class='ctn_total_comen_post'>";
//echo "<div class='celdatituloRojo'>Comentarios</div>";
echo "<div class='ctn_comen_post'>";
while($row = mysql_fetch_assoc($r)):
$cnombre=ucwords(strtolower($row['nombre']));					 
?>
    <div class="comen_post" class-hover="comen_post" >
            <div class="image_post">
                <?php 
                if($row['imagenfoto']!=""){  ?>
                <a href="/usuario/<?=$row['nick']?>" title="<?=$cnombre?>" <?=$enlacedestino?>>
                    <img src="/timthumb.php?src=<?php echo $row['imagenfoto']; ?>&w=33&zc=0&q=100&s=1" border="0"                     title="<?=$cnombre?>"  alt="<?=$cnombre?>" width="33" height="33" align="left" >
                </a>    
                <?php } ?>             
            </div>      
            <div class="conteni_post">
            	<div>   
                   <a href="/usuario/<?=$row['nick']?>" title="<?=$cnombre?>" <?=$enlacedestino?>> 
                     <div class="titulo_post"><?=$cnombre?>        </div>
                   </a>  
               </div>                                                          
            </div>        
    </div>  

<?php 
endwhile;echo "</div></div>";
?>		 			 
<!--http://takien.com/blog/2011/12/30/styling-scrollbar-to-look-like-facebook-scrollablearea-using-jscrollpane/
http://demo.takien.com/index.php?page=scrollable_area 
http://www.agenciaweb.cl/blog/item/106-altura-minima  (crear bloques)-->
