 <?php
	if (empty($_GET['idsec']))
	{
		$seccionactiva ="inicio";
	}
	else
	{
		$seccionactiva = $_GET['idsec'];
	}

    $i=0;
	
	$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.estado='1'  ORDER BY s.cordcontenido";
	//echo $sqlmenucab;exit;
	$resmenucab = db_query($sqlmenucab);
	$nromenucab = db_num_rows($resmenucab);
	//------------------------1 nivel----------------------
	
	while ($rowmenucab = db_fetch_array($resmenucab)) //Inicio while 1	
	{
	  $i= $i+1;
	  if ($i==1) { //si 1 
	  ?>
	  <ul class='zetta-menu zm-response-switch zm-full-width zm-effect-fade'> <!-- Inicio Ul-->
	  <?php
	  ;} // fin si 1
	  $s1 = substr($rowmenucab['ccodseccion'],0,12);
	  $tipo_cabseccion = $rowmenucab['ctipseccion'];
		  switch($tipo_cabseccion) //Inicio switch 1
		  { 
		  case 1:
			  $enlacecab = "/".$rowmenucab['camiseccion'];
			  break;
		  case 2:
			  $enlacecab = $rowmenucab['curlseccion'];
			  break;
		  } //fin switch 2
	  $estactiva="";
	  if ($rowmenucab['camiseccion']==$seccionactiva){ $estactiva= " id='active'"; } //aqui termina si
	  ?>
	  <li <?php $estactiva ?> class="zm-left-align">        
		  <a href='<?php $enlacecab ?>' title='<?php $rowmenucab['cnomseccion'] ?>'>
			  <?=$rowmenucab['cnomseccion'] ?> 
		  </a>				
	  </li>            
	  <?php if ($i==$nromenucab) { // /* Inicio si 2  ?>
      	</ul>   <!-- Fin Ul-->
      <?php  } /* fin si 2 */  
	} /* fin while 1  */    
	 ?>  