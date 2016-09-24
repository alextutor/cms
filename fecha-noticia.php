<?php  
  /*if (!empty($_GET['idsec']) and empty($_GET['idsec2'])){$pagina =$_GET['idsec'];}
  if (!empty($_GET['idsec2'])){$pagina =$_GET['idsec2'];}	
  $ssql ="select dfeccontenido  from contenido where camicontenido='".$pagina."'";*/
  
$ssql = "SELECT SQL_CALC_FOUND_ROWS * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.ccodcontenido desc ";

	$respfecha = mysql_query($ssql) or die ("problema con query");
	$datosfecha = mysql_fetch_array($respfecha) ;
	if(mysql_num_rows($respfecha) != 0){
	   echo "<div class='ctn_fecha'>Fecha Publicación: <span class='fecha'> ".traducefecha($datosfecha["dfeccontenido"],"S"). "</span></div>";
	  // echo "<br>Colaborador<strong>:<font color='#FF0000'> " . $datosfecha["colaborador"] . "</font></strong>";
	}
 ?>	