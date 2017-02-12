<?php //if (isset($_POST)) print_r($_POST); 
//echo $_POST["idpadre"]."<br/>"; //Marca de Motor
///echo $_POST["idhijo"]; 	// Modelo de Motor
$cMarcaMotor=$_POST["idpadre"];
$cModeloMotor=$_POST["idhijo"];
//exit;
	
	//----------- Cuando se escoge Solo Marca de Motor -------------
	if($cMarcaMotor <>"" and $cModeloMotor==""){
		$sqlcMarcaMotor = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion ='".$cMarcaMotor."'  and estado='1' ORDER BY cordcontenido ASC";
	} // Fin si $cMarcaMotor <>"" and $cModeloMotor=""
	
	//----------- Cuando se escoge modelo -------------
	if($cModeloMotor<>""){
		$sqlcMarcaMotor = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion ='".$cModeloMotor."'  and estado='1' ORDER BY cordcontenido ASC";	
	}	// Fin si $cModeloMotor<>""		
	
	///echo $sqlcMarcaMotor ;exit;
	$rscMarcaMotor= mysql_query($sqlcMarcaMotor);		
	while($rowcMarcaMotor=mysql_fetch_array($rscMarcaMotor))
	{
		$cNombreSeccion=$rowcMarcaMotor["camiseccion"];
	 }

header('Location: /'.$cNombreSeccion);
?>
