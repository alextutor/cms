<?php
//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 	
class wurflCommunicator {
	public function doWurflCloudRequest() {
		$capabilities = array();
		
		try {
			$wurflConfig = new WurflCloud_Client_Config();
			// Constante definida en otro lado, se las dan cuando se suscriben
			$wurflConfig->api_key = WURFL_APIKEY;
			
			$wurflClient = new WurflCloud_Client_Client($wurflConfig);
			$wurflClient->detectDevice();
			
			$capabilities = $wurflClient->capabilities;
		} catch (Exception $e) {
			// Logear el problema si ocurre alguno, en la empresa lo hacemos así:
			//$sistProblemIdentifier = new sistProblemIdentifier();
			//$sistProblemIdentifier->addProblem('wurflCloudRequestProblem: '.get_class($e), $e->getMessage());
		}
		
		if (!empty($capabilities)) {
			foreach($capabilities AS $key => $capability) {
				$this->{'wurfl_'.$key} = $capability;
			}
		}
	}
}

// Acceder a las variables como sigue:

$wurflDetection = new wurflCommunicator();
$wurflDetection->doWurflCloudRequest();

if ($wurflDetection->wurfl_is_wireless_device) {
	echo 'You are using a '.$wurflDetection->wurfl_brand_name.' '.$wurflDetection->wurfl_model_name;
}