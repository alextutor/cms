<?php
$hostname = 'localhost'; //it's localhost in all all cases
$db_username = 'info_info';
$db_password = '0403221757';
$dbname = 'info_infodisfap';
$link = mysql_connect($hostname, $db_username, $db_password) or die("Cannot connect to the database");
mysql_select_db($dbname) or die("Cannot select the database");
?>
