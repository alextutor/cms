<?php
//echo $submenu;
switch ($totalpantalla) {
    case "Portada":
        $cCondicion=" and mostrarportada='SI'";
        break;
    default:
		$cCondicion="";
        break;    
}
//echo $cCondicion;exit;
$sql_query ="SELECT * FROM  pagemenu  WHERE ccodpage='".$codpage."' and cubimenu='".$MenuLateralUbubica."' and cestmenu='1' ".$cCondicion." ORDER BY cmenuorden";
$rsmizq = db_query($sql_query);
$total = db_num_rows($rsmizq );
///echo $totalpantalla;exit;
//echo $total;exit;
//echo $sql_query;exit;
if ($total>0){ // si 1 , si estamos en portada y el menu se desea mostrar en portada devolvera mas de un registro sino devolvera  0
?>
<div id="menuvertical"> 
   <ul> <!--Inicio Ul Menu Principal-->  
<?php while ($rowmizq = db_fetch_array($rsmizq)){  // while 1 ?>
	<li id='menuizqtitulo'><p><?php echo $rowmizq['cnommenu']?></p></li> 
<?php	
	$sqlsubmenu="SELECT s.ccodseccion,s.cnomseccion,s.camiseccion,s.curlseccion,s.ctipseccion FROM  seccion s, seccionmenu  sm WHERE s.ccodseccion=sm.ccodseccion  and sm.ccodmenu='".$rowmizq['ccodmenu']."' and s.ccodpage='".$codpage."'   and  s.cestseccion='1'  ORDER BY s.cordcontenido";
	//echo $sqlsubmenu;exit;
	$rssubmenu = db_query($sqlsubmenu);
	$num_rows1 = db_num_rows($rssubmenu);
	//echo $num_rows1;exit;
	while ($rows_submenu = db_fetch_array($rssubmenu)) { //Inicio while 2
		$tipo_seccion = $rows_submenu['ctipseccion'];
		$subcat   = substr($rows_submenu['ccodseccion'],0,12);
		switch($tipo_seccion)
		{
			case 1:
				$enlacemenu = "/".$rows_submenu['camiseccion'];
				break;
			case 2:
				$enlacemenu = $rows_submenu['curlseccion'];
				break;
		}
	?>		
    <!-- Inicio li nivel1    
      <li class="nivel1"><a href="<?=$enlacemenu?>"><?=$rows_submenu['cnomseccion']?></a>  
    -->         
             <!----------------------------- Inicio Submenu  -------------->
             <ul>  <!--Inicio Ul Submenu -->        
            <?php
               $sqlmenu2 ="SELECT ccodseccion,cnomseccion,camiseccion,curlseccion, ctipseccion FROM  seccion WHERE ccodseccion like '".$subcat."%' and cnivseccion=2 and  cestseccion='1'  ORDER BY ccodseccion";
			//echo $sqlmenu2;exit;
				$rsmenu2 = db_query($sqlmenu2);
				$num_rows2 = db_num_rows($rsmenu2);											
               while ($rows_submenu2 = db_fetch_array($rsmenu2 )) {			
               	  //echo $num_rows2;exit;
				  $tipo_seccion2 = $rows_submenu2['ctipseccion'];
				  $subcat2   = substr($rows_submenu2['ccodseccion'],0,16);
				  switch($tipo_seccion2)
				  {
					  case 1:					  
						  $enlacemenu2 = "/".$rows_submenu['camiseccion']."/".$rows_submenu2['camiseccion'];
						  if ($_SESSION['mostrarurlcatebase']	=="NO"){						
								$enlacemenu2 = "/".$rows_submenu2['camiseccion'];							
				        	}   										
						  break;
					  case 2:
						  $enlacemenu2 = $rows_submenu2['curlseccion'];
					  break;
				  }   
            ?>      
                <li><a href="<?=$enlacemenu2?>"><?=$rows_submenu2['cnomseccion']?></a></li>         
               <?php } // fin while Submenu ?>
            
            </ul> <!--Fin Ul Submenu -->
            <!----------------------------- Fin Submenu  -------------->
      <!--
      </li> <!-- Fin li nivel1 -->             
        
	<?php	
	} // in while 2	
	?>                 
         
 <?php  }// Fin while 1 ?>
  </ul> <!--Fin Ul Menu Principal-->
</div>

<?php } // fin si 1 ?>

