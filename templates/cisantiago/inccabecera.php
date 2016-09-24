<?php 
$sql = "SELECT  * FROM page WHERE ccodpage= '".$codpage."'"; 
$rsPagina = db_query($sql);
$rowpagina  = db_fetch_array($rsPagina);	
?>

<div class="izqlogo">
     <img src="<?php echo $logoweb ?>" width="330" height="110" alt="logo-gis" />
</div>
<div class="derelogo">
  <div class="atencioncli"><?php  echo $ccontacto;  ?></div>
  <div class="redes">
  	<div class="textoredes">	Siguenos en:</div>
	<?php if($rowpagina['credYoutube']<>""){  ?> 
    <a href="<?=$rowpagina['credYoutube']?>" target="_blank">
    <img src="/imagen/redes-sociales/youtube.png" width="32" height="32" alt="youtube" border="0"/> </a>&nbsp;&nbsp;
    <?php }?>
    <?php if($rowpagina['credTwitter']<>""){  ?> 
    <a href="<?=$rowpagina['credTwitter']?>" target="_blank">
    <img src="/imagen/redes-sociales/twitter.png" width="32" height="32" alt="twitter" border="0"/></a>&nbsp;&nbsp;
    <?php }?>
    <?php if($rowpagina['credFacebook']<>""){  ?> 
    <a href="<?=$rowpagina['credFacebook']?>" target="_blank">
    <img src="/imagen/redes-sociales/facebook.png" width="32" height="32" alt="facebook" border="0"/></a>        
    <?php }?>
</div>                    
</div>