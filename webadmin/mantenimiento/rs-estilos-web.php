<?php session_start(); 
	//include($_SERVER['DOCUMENT_ROOT']. '/config.php');
  $sqlestidata = "SELECT * FROM estilopagina WHERE ccodpage='".$_SESSION['selectpage']."'" ;
  $resestidata = db_query($sqlestidata);
  while($rowestidata = db_fetch_array($resestidata))
  {
	  $_SESSION['webestilo']  = $rowestidata['webestilo'];	
  }	
?>