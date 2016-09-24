<style type="text/css">
	.estilotabla{background-color:ffffff;border-style:solid;border-color:#333333;border-width:1px;width:100%;} 
	.celdatituloRojo{background-color: #b60002;color: #ffffff;font-weight: bold;font-size: 10pt;height: 25px;
	text-align: center; margin-bottom:2px;}
	.titulo_preguntas {color : #0066ac;font-size : 12px;font-weight : bold; 
	font-family : Verdana, Helvetica, sans-serif;} 

.ctn_post{background-color:ffffff;border-style:solid;border-color:#333333;border-width:1px;
width:85%; margin:0 auto;margin-top:10px; margin-left:30px;}
.post {width: 96%;padding: 0.5em; clear:both;
border: 1px solid rgba(0, 0, 0, 0.15);overflow:hidden; margin:0 auto;margin-bottom: .2em}
.post .image_post {float: left;width: 10%;}
.post .conteni_post {float: left;width: 86%;margin-left: 3px;}
.post .titulo_post {margin-bottom: 24px; float:left; width:60%; color:#990048;font-weight: bold;}
.post .publicado_hace {font-size: 11px;font-weight: bold;float: right; width:35%;color:#990048;
background: url(imagenes/icon-time.png) no-repeat top left;}
.comentario {margin-bottom: 2px;margin-top:5px;padding:3px; clear:both }
.continua_leyendo {margin-bottom: 2px;float: right;margin-right: 15px; margin-top:2px; font-weight:bold; background-color:#FFF; padding:3px; border-radius:10px;}
.post a:visited {text-decoration: none;color: #990048;font-weight: bold;}
.post:hover{background-color:#ff9900; cursor:pointer;}

</style>
<?php 
$resultComen = "SELECT * FROM doctorresponde WHERE mostrarportada=1 and parent_id=0 and aceptado=1 ORDER BY RAND()  LIMIT 3 ";
$r = mysql_query($resultComen);        
echo "<div class='ctn_post'>";
echo "<div class='celdatituloRojo'>Consultas de Los Usuarios - Leer Mas</div>";
while($row = mysql_fetch_assoc($r)):					 
?>
    <div class="post" class-hover="post" >
            <div class="image_post">
                <?php
                if($row['imagenfoto']!=""){ ?>
                <a href="<?=$enlaceurl?>" title="<?=$row['cnomcontenido']?>" <?=$enlacedestino?>>
                    <img src="/timthumb.php?src=<?php echo $row['imagenfoto']; ?>&w=25&zc=0&q=100&s=1" border="0" 
                    title="<?=$row['nombre']?>"  alt="<?=$row['nombre']?>" width="25" align="left" >
                </a>    
                <?php } ?>             
            </div>      
            <div class="conteni_post">
            	<div>
                  <div class="publicado_hace">
                      <time datetime="<?=$row['fechacorta']?>"><?=traducefecha($row['fechacorta'],"N")?></time>
                  </div>                
                  <div class="titulo_post">
                     <a href="<?=$enlaceurl?>" title="<?=$row['titulo']?>" <?=$enlacedestino?>>
                        <?=$row['titulo']?>
                      </a>                                     
                 </div>
               </div>                         
                <div class="comentario"><?=nl2br($row['comentario'])?></div>
                  <a href="<?=$enlaceurl?>" title="<?=$row['comentario']?>" <?=$enlacedestino?> style="color:#d62020;">
                  <div class="continua_leyendo">                                
                      Continúa Leyendo
                  </div>        
                  </a>
            </div>        
    </div>
    <div class="clear"></div>

<?php 
endwhile;echo "</div>";
?>		 			 
