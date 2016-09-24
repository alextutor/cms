 <?php
	/*if (empty($_GET['idsec']))
	{
		$seccionactiva ="inicio";
	}
	else
	{
		$seccionactiva = $_GET['idsec'];
	}

    $i=0;
	
	$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.estado='1'  ORDER BY s.cordcontenido";
	$resmenucab = db_query($sqlmenucab);
	$nromenucab = db_num_rows($resmenucab);
	//------------------------1 nivel----------------------
	
	
	while ($rowmenucab = db_fetch_array($resmenucab)) 
	{
		$i= $i+1;
		if ($i==1) { //si 1 
	?>
     <ul class='zetta-menu zm-response-switch zm-full-width zm-effect-fade'> <!-- Inicio Ul-->
    <?php
	    ;} // fin si 1
		$s1 = substr($rowmenucab['ccodseccion'],0,12);
		$tipo_cabseccion = $rowmenucab['ctipseccion'];
		switch($tipo_cabseccion)
		{ 
		case 1:
			$enlacecab = "/".$rowmenucab['camiseccion'];
			break;
		case 2:
			$enlacecab = $rowmenucab['curlseccion'];
			break;
		} //fin switch
		$estactiva="";
		if ($rowmenucab['camiseccion']==$seccionactiva){ $estactiva= " id='active'"; }
		?>
		<li <?php $estactiva ?>>        
            <a href='<?php $enlacecab ?>' title='<?php $rowmenucab['cnomseccion'] ?>'>
                <?=$rowmenucab['cnomseccion'] ?> 
            </a>				
        </li>            
		<?php        	
		if ($i==$nromenucab) echo "</ul>\n"; //fin UL				
	}	//fin while		
			
exit;*/?>			
<!doctype html>
<html>
<body>
	<!-- Zetta Menu 1 -->
	<ul onClick="" class="zetta-menu zm-response-switch zm-full-width zm-effect-fade">
		<!-- Simple Item -->
		<li><a href="/index.php">Inicio</a></li>
		<!-- /Simple Item -->
		<!-- Multicolumn Dropdown Menu -->
		<li class="zm-left-align"><a href="/repuestos/por-marca-de-vehiculo">
        			Repuestos por Marca de Vehiculo<i class="zm-caret fa fa-angle-down"></i>
						        </a>        
			<div class="zm-multi-column w-600">
				<ul class="w-200">
					<li><a href="/repuestos/por-marca-de-vehiculo/camc">CAMC</a></li>                           
					<li><a href="/repuestos/por-marca-de-vehiculo/changan">CHANGAN</a></li>
	                <li><a href="/repuestos/por-marca-de-vehiculo/shenglong">SHENGLONG</a></li>
                    <li><a href="/repuestos/por-marca-de-vehiculo/chunzhou">CHUNZHOU</a></li>                                    
                    <li><a href="/repuestos/por-marca-de-vehiculo/dongfeng">DONGFENG</a></li> 
                    <li><a href="/repuestos/por-marca-de-vehiculo/foton">FOTON</a></li> 
                    <li><a href="/repuestos/por-marca-de-vehiculo/golden-dragon">GOLDEN DRAGON</a></li> 
                    <li><a href="/repuestos/por-marca-de-vehiculo/higer">HIGER</a></li>   				</ul>
   				<ul class="w-200">
	                <li><a href="/repuestos/por-marca-de-vehiculo/jac">JAC</a></li>                    <li><a href="/repuestos/por-marca-de-vehiculo/jiangnan">JIANGNAN</a></li>                   
					<li><a href="/repuestos/por-marca-de-vehiculo/kingstar">KINGSTAR</a></li>
					<li><a href="/repuestos/por-marca-de-vehiculo/mudan">MUDAN</a></li>
					<li><a href="/repuestos/por-marca-de-vehiculo/mudi">MUDI</a></li>
   					<li><a href="/repuestos/por-marca-de-vehiculo/neptune">NEPTUNE</a></li>
                    <li><a href="/repuestos/por-marca-de-vehiculo/seung-hwa">SEUNG HWA</a></li>
                    <li><a href="/repuestos/por-marca-de-vehiculo/sitom">SITOM</a></li>
				</ul>

				<ul class="w-200">
					<li><a href="/repuestos/por-marca-de-vehiculo/volkswagen">
                    	<i class="zm-caret fa fa-angle-right"></i>VOLKSWAGEN</a>						
					</li>					
                    <li><a href="/repuestos/por-marca-de-vehiculo/wings">WINGS</a></li>
                    <li><a href="/repuestos/por-marca-de-vehiculo/youyi">YOUYI</a></li>
                    <li><a href="/repuestos/por-marca-de-vehiculo/yutong">YUTONG</a></li>
                    <li><a href="/repuestos/por-marca-de-vehiculo/zhongtong">ZHONGTONG</a></li>
				</ul>
			</div>
		</li>
		<!-- /Multicolumn Dropdown Menu -->
        
        <!-- Simple Item -->
		<li><a href="/servicios">Servicios</a></li>
		<!-- /Simple Item -->
        
         <!-- Simple Item -->
		<li><a href="/cotizar">Cotizar</a></li>
		<!-- /Simple Item -->
        
        <!-- Simple Item -->
		<li><a href="/ofertas">Ofertas</a></li>
		<!-- /Simple Item -->
        
        <!-- Simple Item -->
		<li><a href="/ubicacion">Ubicacion</a></li>
		<!-- /Simple Item -->
        <!-- Simple Item -->
		<li><a href="/galeria">Galeria</a></li>
		<!-- /Simple Item -->
        
	</ul>
	<!-- /Zetta Menu 1 -->	
</body>
</html>


<!-- direccion de los submenus
<li>
<a><i class="zm-caret fa fa-angle-left"></i>Level One</a>
  <ul class="zm-drop-left w-200">
      <li><a href="#">Level Two</a></li>
      <li><a href="#">Level Two</a></li>
      <li><a href="#">Level Two</a></li>
      <li><a href="#">Level Two</a></li>
      <li><a href="#">Level Two</a></li>
      <li><a href="#">Level Two</a></li>
  </ul>
</li>
 -->