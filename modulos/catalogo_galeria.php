<table border='0' width='400' cellspacing='0' cellpadding='0'>
<?php
$a = 1;
$sqlimages = db_query("SELECT * FROM contenidogaleria WHERE ccodcontenido = '" . $codcont . "'"); 
while ($rowimages = db_fetch_array($sqlimages))
 {
		if((($a % 5) == 1) or ($a == 1))
			echo '<tr><td width="20%" align="center" height="70">';	
		else
			echo "<td width='120'>"; 
		echo "<img src='".$rowimages['cimggaleria']."'><br><input name='radio' type='radio' value='".$rowimages[' ccodgaleria']."'>".$rowimages['cnomgaleria']."</td>";
		if($a % 5 == 0)
	 	{	
			echo '</td></tr>';
		}
		$a++;
}
?>
</table>