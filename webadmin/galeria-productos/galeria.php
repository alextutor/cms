<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>
<?Php 
$CateId=$_GET["CateId"];
?>

<!--http://www.librebloguero.net/2012/08/shadowbox-ventanas-modales-video-imagen.html 
http://www.shadowbox-js.com/download.html  aqui deves especificar que videos deseas reproducir enmi caso flv
-->

 <link rel="stylesheet" type="text/css" href="<?php $_SERVER ["DOCUMENT_ROOT"] ?>/webadmin/include/Shadowbox/shadowbox.css"/>
	<script type="text/javascript" src="<?php $_SERVER ["DOCUMENT_ROOT"] ?>/webadmin/include/Shadowbox/shadowbox.js"></script>
    <script type='text/javascript'>
    Shadowbox.init({
		overlayColor: "#000",
		overlayOpacity: "0.6",		
    });	
   </script>      
   
<body>
<div class="ctn_galeria">
	<div class="iz-container">
    	<?php  include_once ($INC_DIR . '/webadmin/menu/menu-lateral-izq.php');  ?> 
    </div>
    <div class="der-container">
    	<?php  include_once ($INC_DIR . '/webadmin/galeria-productos/busquedas.php');  ?> 
    </div>
    <div style="clear:both"></div>
</div>	
<?php  include_once ($INC_DIR . '/footer.php');  ?> 