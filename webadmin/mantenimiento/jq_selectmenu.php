<?php
$sql_menuubi = mysql_query("select * from pagemenu where ccodpage='".$_SESSION['page']."' and cestmenu='1'");
while ($row_menuubi = mysql_fetch_array($sql_menuubi)) 
{	
	$check="";
	echo "<div style='width:150px; float:left;'><input type='checkbox' name='rdmenu".$row_menuubi['ccodmenu']."' ".$check.">".$row_menuubi['cnommenu']."</div>";
}
?>
