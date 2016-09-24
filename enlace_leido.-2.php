<style type="text/css">
	.ctn_enlace{ width:60%;padding: 30px 10px; margin:0 auto; display:flex;
	justify-content: space-between;Align-items: center;}	
	.leidas{width:30%; }
	.redes-sociales{width:70%; display: flex; justify-content: space-between; }		
	.redes-sociales ul{ list-style:none;}
	.redes-sociales ul li{ display: inline; margin-left:10px}	
	.redes-sociales ul li a{ display: inline-block; color:#FFF; background:#000; 
	padding:10px 10px; text-decoration:none; font-size:22px; border-radius: 50%;}
	
	.redes-sociales ul li .icon-twitter	    { background:#00abf0}
	.redes-sociales ul li .icon-facebook	{ background:#3b5998}
	.redes-sociales ul li .icon-whatsapp	{ background:#46C356}			
	.redes-sociales ul li .icon-16-whatsapp {background-image: url(/imagen/para-todos/icono-redes-sociales/whatsapp.png);}
	
	@media all and (max-width:480px){   
		.ctn_enlace{flex-direction:column;}
		.leidas{ width:98%; margin:0 auto;display:none}	
		.redes-sociales{width:99%;}
		.redes-sociales ul li a{font-size:28px;padding:20px 20px}	
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
	  //$cenlacepagina = urlencode(dameURL2()); //era para redes sociales	  
?>
<div class="ctn_enlace">
	<div class="leidas">Leidas :  <?=$datosleidas["nviscontenido"]?>  Veces</div>
    <div class="redes-sociales">       
        <ul>
        	<li>         
               <a class='icon-twitter' href="javascript: void(0);" onclick="newWindow('http://twitter.com/share', 'popup', 550, 500, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank" data-text='<?=$cenlacepagina ?>' data-count='none' data-lang='es'></a>               
			   <script type='text/javascript' src='http://platform.twitter.com/widgets.js' ></script>
            </li>                 
            
            <li>
            <a class='icon-facebook' href="javascript: void(0);" onclick="newWindow('http://www.facebook.com/sharer.php?u=<?php echo dameURL2() ?>', 'popup', 550, 500, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank"></a>
            
            </li>
            <li>
           	 <a  class='icon-16-whatsapp' href="whatsapp://send?text=<?="http://".dameURL2()?>" data-action="share/whatsapp/share">            
             </a> 
            </li>
        </ul>        
   </div>
</div>
<?php } ?>

<!-- muestra en ventana emergente pero no centrado
<li>               
  <a class='icon-facebook' href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo dameURL2() ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"></a>
</li> 