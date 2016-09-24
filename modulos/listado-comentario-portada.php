<style type="text/css">	
	.celdatituloRojo{background-color: #b60002;color: #ffffff;font-weight: bold;font-size: 10pt;height: 25px;
	text-align: center; margin-bottom:2px;}

	.ctn_total_comen_post{background-color:ffffff;border-style:solid;border-color:#333333;border-width:1px;
	 margin:0 auto;width:100%; }
	.ctn_comen_post{height:auto;max-height:400px;width:99%; }
	.comen_post {width: 99%;padding: 0.1em; clear:both; border-bottom:1px solid rgba(0, 0, 0, 0.15);overflow:hidden; margin:0 auto;margin-bottom: .2em}
	.comen_post .image_post {float: left;width: 13%;}
	.comen_post .conteni_post {float: left;width: 85%;margin-left: 3px;}
	.comen_post .titulo_post {float:left; width:100%; color:#990048;font-weight: bold;}
	.comentario {margin-bottom: 2px;margin-top:5px;padding:3px; clear:both }
	.comen_post a:visited {text-decoration: none;color: #990048;font-weight: bold;}
	.comen_post:hover{background-color:#ff9900; cursor:pointer;}

</style>

<!--Inicio Para jScrollPane ---------->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
</script>

<!--<script type="text/javascript" src="/include/js/jquery-1.7.1.min.js"> -->
</script>
<script src="/include/js/jScrollPane/jquery.jscrollpane.min.js"></script>
<script src="/include/js/jScrollPane/jquery.mousewheel.js"></script>
<link rel="stylesheet" type="text/css" href="/include/js/jScrollPane/jquery.jscrollpane.css">
<script>
var jsc = jQuery.noConflict();
	jsc(document).ready(function(){
		jsc('.ctn_comen_post').jScrollPane({ /*.Initialize jScrollPane to your selector.*/
		horizontalGutter:5,
		verticalGutter:3,
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
$resultComen = "SELECT * FROM doctorresponde WHERE mostrarportada=1 and parent_id=0 and aceptado=1 ORDER BY id desc   ";
//LIMIT 15 
$r = mysql_query($resultComen);        
echo "<div class='ctn_total_comen_post'>";
//echo "<div class='celdatituloRojo'>Comentarios</div>";
echo "<div class='ctn_comen_post'>";
while($row = mysql_fetch_assoc($r)):					 
?>
    <div class="comen_post" class-hover="comen_post" >
            <div class="image_post">
                <?php 
                if($row['imagenfoto']!=""){  ?>
                <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
                    <img src="/timthumb.php?src=<?php echo $row['imagenfoto']; ?>&w=25&zc=0&q=100&s=1" border="0" 
                    title="<?=$row['nombre']?>"  alt="<?=$row['nombre']?>" width="25" align="left" >
                </a>    
                <?php } ?>             
            </div>      
            <div class="conteni_post">
            	<div>                                  
                  <div class="titulo_post">
                     <a href="<?=$enlaceurl?>" title="<?=$row['titulo']?>" <?=$enlacedestino?>>
                        <?=$row['titulo']?>
                      </a>                                     
                 </div>
               </div>                         
                <div class="comentario"><?=nl2br(acortar($row['comentario'],50))?></div>                  
            </div>        
    </div>
    <div class="clear"></div>

<?php 
endwhile;echo "</div></div>";
?>		 			 
<!--http://takien.com/blog/2011/12/30/styling-scrollbar-to-look-like-facebook-scrollablearea-using-jscrollpane/
http://demo.takien.com/index.php?page=scrollable_area 
http://www.agenciaweb.cl/blog/item/106-altura-minima  (crear bloques)-->
