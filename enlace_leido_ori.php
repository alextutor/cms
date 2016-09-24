<style type="text/css">
	.ctn_enlace{ width:99%;padding: 30px 10px; margin:0 auto; display:flex;justify-content: space-between;  }
	
	.leidas{width:30%; }
	.ctn_compartir{width:70%; display: flex; justify-content: space-between; }
	
	.img_compartir{ float:left; width:28px}
	.texto_compartir{ font-weight:bold; float:left; vertical-align:central }	
	.twitter{ width:70px; margin-right:10px;}
	
	@media all and (max-width:480px){   
		.ctn_enlace{flex-direction:column;}
		.leidas{ width:98%; margin:0 auto;display:none}
		.texto_compartir{display:none}
		.img_compartir{display:none}
	}
</style>
<!--http://twitter.com/about/resources/tweetbutton  -para twiter--- -->
<!--http://www.forosdelweb.com/f18/obtener-titulo-pagina-mediante-php-831352/-->  
<?php session_start();	
  if (!empty($_GET['idsec']) and empty($_GET['idsec2'])){$cenlacepagina =$_GET['idsec'];}
  if (!empty($_GET['idsec2'])){$cenlacepagina =$_GET['idsec2'];};	
  if (!empty($_GET['idsec3'])){$cenlacepagina =$_GET['idsec3'];};	
  if (!empty($_GET['idsec4'])){$cenlacepagina =$_GET['idsec4'];};	

 // $ssql ="SELECT SQL_CALC_FOUND_ROWS * FROM contenido where camicontenido='".$cenlacepagina."'";

$ssql ="SELECT SQL_CALC_FOUND_ROWS * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."'
 and c.estado=1";
 
/*$ssql = "SELECT SQL_CALC_FOUND_ROWS * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.ccodcontenido desc ";*/
$respleida = mysql_query($ssql) or die ("problema con query");
$nTotal = mysql_query("SELECT FOUND_ROWS()");   
$datosleidas = mysql_fetch_array($respleida) ;
//if(mysql_num_rows($respleida) != 0){
if ($nTotal<> 0)  /// Inicio Si 1
  {
	  
?>
<div class="ctn_enlace">
	<div class="leidas">Leidas :  <?=$datosleidas["nviscontenido"]?>  Veces</div>
    <div class="ctn_compartir">
        <div class="img_compartir">
        <img src='/imagen/redes-sociales/compartir-fondo-verde.png' width='25' height='25'  />
        </div>
        <?php // echo "enlcace:".$cenlacepagina ."--webnombre:" .$webnombre ?>
        <div class="texto_compartir">Compartir En : </div>
            <div class="twitter">
            <a href='http://twitter.com/share' class='twitter-share-button' data-text='<?=$cenlacepagina ?>' data-count='none' data-lang='es'>Tweet</a><script type='text/javascript' src='http://platform.twitter.com/widgets.js' ></script>
            </div>
            
            <!--<a name='fb_share' type='button_count' share_url="<?php echo $cenlacepagina ?>" href='http://www.facebook.com/sharer.php'>Compartir</a><script  src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script>-->
            <!--
           <div class="fb-send" data-href="<?="http://".dameURL2()?>"></div>
          -->
          <!--
          <div class="fb-like" data-href="<?="http://".dameURL2()?>" data-layout="button" data-action="recommend" data-show-faces="true" data-share="true"></div>  
          -->
          <div class="fb-like" data-href="<?="http://".dameURL2()?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
          
        
    </div>
</div>
<?php } ?> 