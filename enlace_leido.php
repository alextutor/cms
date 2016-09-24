
<!-- fontawesome como usarlo en la siguiente direccion
http://fontawesome.io/get-started/ 
-->
<link rel="stylesheet" href="/imagen/para-todos/font-awesome-4.6.3/css/font-awesome.min.css">
<style type="text/css">
	.ctn_enlace{ width:60%;padding: 30px 10px; margin:0 auto; display:flex;
	justify-content: space-between;Align-items: center;}	
	.leidas{width:30%; }
	.redes-sociales{width:70%; display: flex; justify-content: center; }		
	
	/*
	.redes-sociales ul li .icon-twitter	    { background:#00abf0}
	.redes-sociales ul li .icon-facebook	{ background:#3b5998}
	.redes-sociales ul li .icon-whatsapp	{ background:#46C356}	
	*/
	.redes-sociales .whatsapp	{background:#46C356;padding:5px 10px;color:#FFF;margin-right:10px;}
	.redes-sociales .facebook	{background:#3b5998;padding:5px 10px;color:#FFF; margin-right:10px;}
	.redes-sociales .twitter	{background:#00abf0;padding:5px 10px;color:#FFF}				
	
	@media all and (max-width:480px){   
		.ctn_enlace{flex-direction:column;padding: 0px;margin-bottom: 20px; }
		.leidas{ width:98%; margin:0 auto;display:none}	
		.redes-sociales{width:99%;}			
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
 		<a  href="whatsapp://send?text=<?="http://".dameURL2()?>" data-action="share/whatsapp/share">   
    	<i class="whatsapp fa fa-whatsapp fa-2x" aria-hidden="true"></i>
        </a>       	
        
         <a class='icon-facebook' href="javascript: void(0);" 
         onclick="newWindow('http://www.facebook.com/sharer.php?u=<?php echo dameURL2() ?>', 
         'popup', 550, 500, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank">
         <i class="facebook fa fa-facebook fa-2x" aria-hidden="true"></i>
         </a>       
        
        <a href="javascript: void(0);" onclick="newWindow('http://twitter.com/share', 'popup',
         550, 500, 1, 1, 0, 0, 0, 1, 0); return false;" target="_blank" data-text='<?=$cenlacepagina ?>' 
        data-count='none' data-lang='es'>
        	<i class="twitter fa fa-twitter fa-2x" aria-hidden="true"></i>
          	 <script type='text/javascript' src='http://platform.twitter.com/widgets.js' ></script>
        </a>               
   </div>
</div>
<?php } ?>

<!-- muestra en ventana emergente pero no centrado
<li>               
  <a class='icon-facebook' href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo dameURL2() ?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"></a>
</li> 