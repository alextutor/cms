<?php 
/*----Inicio Moneda */
	$sqlmoneda   = db_query("SELECT p.*,w.cnomparametro,w.cdesparametro FROM  page p, webparametros w where ccodpage ='".$_SESSION['scodpage ']."' AND p.ccodmoneda=w.cvalparametro");
	$rowMoneda=db_fetch_array($sqlmoneda);
	$cMoneda=$rowMoneda['cnomparametro']."&nbsp;&nbsp;";
	$cSimboloMoneda=$rowMoneda['cdesparametro']."&nbsp;&nbsp;";
	/*----Fin Moneda */
	
?>