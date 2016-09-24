<?php session_start();
session_destroy();?> 
<?php		
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/webadmin/header.php'); 	
?> 
<script language='JavaScript'> 
    ROOT_PATH = "<?=$ROOT_PATH?>";
    location.href= ROOT_PATH +"/webadmin/index.php"
</script> 