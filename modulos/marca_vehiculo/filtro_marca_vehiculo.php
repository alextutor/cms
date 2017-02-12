<?php //if (isset($_POST)) print_r($_POST); 
//echo $_POST["idpadre"]."<br/>"; //Marca de Motor
///echo $_POST["idhijo"]; 	// Modelo de Motor

// idpadre=idMarcaVehiculo  ; idhijo =idModeloVehiculo ; pidhijo = pModeloVehiculo ; idhijo  = idModeloVehiculo ;
$cMarcaVehiculo=$_POST["idMarcaVehiculo"];
$cModeloVehiculo=$_POST["idModeloVehiculo"];
//exit;

	
	//----------- Cuando se escoge Solo Marca de Motor -------------
	if($cMarcaVehiculo <>"" and $cModeloVehiculo==""){
		$sqlcMarcaMotor = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion ='".$cMarcaVehiculo."'  and estado='1' ORDER BY cordcontenido ASC";
	} // Fin si $cMarcaMotor <>"" and $cModeloVehiculo=""
	
	//----------- Cuando se escoge modelo -------------
	if($cModeloVehiculo<>""){
		$sqlcMarcaMotor = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion ='".$cModeloVehiculo."'  and estado='1' ORDER BY cordcontenido ASC";	
	}	// Fin si $cModeloVehiculo<>""		
	
	///echo $sqlcMarcaMotor ;exit;
	$rscMarcaMotor= mysql_query($sqlcMarcaMotor);		
	while($rowcMarcaMotor=mysql_fetch_array($rscMarcaMotor))
	{
		$cNombreSeccion=$rowcMarcaMotor["camiseccion"];
	 }

header('Location: /'.$cNombreSeccion);
?>
