<head>
<style>
	.ctn_gene{
		margin-left:5px;
	}
	
	.ctn_gene .side {
		width: 250px;
		border: 2px solid #cc3300;
		background-color: #F6FAFA;
		margin-top: 10px;		
		padding-bottom: 5px;
		font-size: 12px;
		color: #777777;
		text-align: center;
		box-shadow: #aaa 0 0 10px;
		border-radius: 10px;
		-moz-border-radius: 11px;
		-webkit-border-radius: 11px;
		-O-border-radius: 11px;	
	}
	.side h3 {
		border-bottom: 1px solid #DEEBEB;
		font-size: 16px;
		font-weight: bold;
		letter-spacing: -1px;
		color: #e73f3f;
	}
</style>

</head>    
   <link rel="stylesheet" type="text/css" href="include/Shadowbox/shadowbox.css"/>
	<script type="text/javascript" src="include/Shadowbox/shadowbox.js"></script>
    <script type='text/javascript'>
    Shadowbox.init({
		overlayColor: "#000",
		overlayOpacity: "0.6",		
    });	
   </script>      
<body>
<!--http://www.librebloguero.net/2012/08/shadowbox-ventanas-modales-video-imagen.html 
http://www.shadowbox-js.com/download.html  aqui deves especificar que videos deseas reproducir enmi caso flv
-->
<div class="ctn_gene">
    <div class="side">
    	<h3>Video</h3>
    	<a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/video.flv" rel="shadowbox;width=400;height=300" title="Nuestras Instalaciones">
        <img src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/estilos/images/video-imagen-portada.gif" style="border: 7px solid #1c1c1c; height: 148px; padding: 0px; width: 230px;" />
        </a>        
    </div>
    <div class="side">
    	<h3>Ofertas</h3>
        <?php 	include_once ($_SERVER['DOCUMENT_ROOT']. '/ofertas-repuestos-motores-cummins.php');    ?>    		    
    </div>
	<div class="side">
    	<h3>Pedidos y Consultas</h3>
        <a href="http://as00.estara.com/UI/gui.php?donotcache=1315265039252&accountid=200106283535&referrer=http%3A%2F%2Fguia.com.pe%2Festara%2Festara_popup_forward.asp%3Fco_avi%3D290007%26phone%3D51014520378&pagetitle=Yell+Per%FA+-+P%E1ginas+Amarillas&var1=290007&var2=&authorizeurl=http%3A%2F%2Fwww.guia.com.pe%2Festara_validar.asp%3Fphone%3D51014520378&template=73855&calltype=webvoicepop&guiid=43834a54eac25&timestamp=1315264775" rel="shadowbox;width=430;height=390" title="Pedidos y Consultas">
         <img src="<?php	$_SERVER['DOCUMENT_ROOT']?>/web/12172806/fotos/bannerllama.jpg" width="250" height="159" />         
        </a>              
    </div>    

       
    <div style="clear:both; margin-bottom:20px;"></div>
</div>
</body>