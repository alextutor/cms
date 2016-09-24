<style type="text/css">
#Error{
	background-image:url(/include/control-usuario/no.jpg);
	background-repeat:no-repeat;
	background-position:left; 
	color:#FF0000; 
	padding-left:33px; 
	height:19px; 
	padding-top:6px;
	padding-right:10px;
	float: left;	
	margin-left: 8px;
}
#Success{
	background-image: url(/include/control-usuario/yes.jpg);
	background-repeat: no-repeat;
	background-position: left;
	color: #669933;
	padding-left: 33px;
	height: 19px;
	padding-top: 6px;
	padding-right: 10px;
	float: left;	
	margin-left: 8px;
}
</style>
<?php
sleep(1);
include $_SERVER['DOCUMENT_ROOT']."/config.php";	       
if($_REQUEST) {
    $username = $_REQUEST['nick'];
    $query = "select * from usuarios where LOWER(nick) = '".strtolower($username)."'";
    $results = mysql_query( $query) or die('ok');

    if(mysql_num_rows(@$results) > 0) {
        echo '<div id="Error">Usuario ya existente</div>';
		echo "<script>
		document.getElementById('nick').value='',
		document.getElementById('nick').focus()</script>";	
    }else{
        echo '<div id="Success">Disponible</div>';
	}	
}
?>