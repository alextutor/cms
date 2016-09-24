<div class="container dura-container nav-container">
          <div class="row header-bottom-row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
     
              <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <!--a class="navbar-brand" href="#">Brand</a-->
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">                    	
 <!-- Aqui empieza los Hijos  --> 
 <?php
 	//echo "hola";exit;
	if (empty($_GET['idsec']))	{ $seccionactiva ="inicio";	}
	else {	$seccionactiva = $_GET['idsec'];}
    $i=0;		
	//Lista los Menus de 1Nivels
	//$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.multidrop,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.estado='1'  ORDER BY s.cordcontenido";
	
		$sqlmenucab = "SELECT 
	s.ccodsecestilo , 
	s.ccodseccion , 
	s.cnomseccion , 
	s.camiseccion, 
	s.curlseccion , 
	s.ctipseccion , 
	s.mostrarurlcatebase , 
	pm.cubimenu , 
	s.ccodpage , 
	s.cnivseccion , s.estado , sem.menuestilomenu , sem.ccodestilomenu , 
	sem.multidrop , s.cordcontenido FROM  seccion s   INNER JOIN seccionmenu  sm
	ON (s.ccodseccion = sm.ccodseccion) INNER JOIN seccionestilomenu sem 
	ON (s.ccodseccion = sem.ccodseccion) INNER JOIN pagemenu pm 
	ON (sm.ccodmenu = pm.ccodmenu) WHERE (pm.cubimenu =1 AND s.ccodpage=".$codpage."  
	 AND s.cnivseccion ='1' AND s.estado ='1' AND sem.menuestilomenu ='".$menuestilomenu."')
	  ORDER BY s.cordcontenido ASC";
	//echo $sqlmenucab;exit;	
	$resmenucab = db_query($sqlmenucab);
	$nromenucab = db_num_rows($resmenucab);
	//------------------------1 nivel----------------------
	
	while ($rowmenucab = db_fetch_array($resmenucab)) //Inicio while 1	
	{
	  $i= $i+1;
	  if ($i==1) { //si 1 
	  ?>
      <!-- 	  <ul class='zetta-menu zm-response-switch zm-full-width zm-effect-fade'> <!-- Inicio Ul Padre--> 
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
       <!-- Aqui Inicio Insertar Los hijos   -->
       
       <!---------------- Inicio Estilo Menu multidrop  ---------------------->
  <?php 
  //echo $rowmenucab['multidrop'];
  switch ($rowmenucab['multidrop']) {
	  case "4" &&  "1": // Duramenu-Categorias
	  	 ?>
          <!-- 1 Nivel multidrop -->
          <li class="dropdown">
              <a href="<?=$enlacecab?>"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bars" aria-hidden="true"></i>
                    <?=$rowmenucab['cnomseccion']?> <span class="caret"></span>
              </a>	             
                        
               <!---------------- Inicio 2  Menu ---------------------->			
                <?php				
				$i2=0;
              $sqlmenucab2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s1."%'  and cnivseccion=2 and  estado='1' ORDER BY  cordcontenido ASC";
			  //echo $sqlmenucab2 ;exit;
			$resmenucab2 = db_query($sqlmenucab2);
			$nromenucab2 = db_num_rows($resmenucab2);
			  ?>
             <ul class="dropdown-menu">
              <?php  
			while ($rowmenucab2 = db_fetch_array($resmenucab2)) //Inicio while 2
			{
				$s2 = substr($rowmenucab2['ccodseccion'],0,16);
				$tipo2 = $rowmenucab2['ctipseccion'];
				switch($tipo2)
				{
				case 1:
					$enlacecab2 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion'];							
					//indica si mostara url de la categoria padre
					if ($rowmenucab['mostrarurlcatebase']=="NO"){
						$enlacecab2 = "/".$rowmenucab2['camiseccion'];							
					}   					
					break;
				case 2:
					$enlacecab2 = $rowmenucab2['curlseccion'];
					break;
				}
				if ($i2==5 or $i2==10 or $i2==15) {					
				?>	                
                <?php } ?>
		  		<li><a href="<?=$enlacecab2 ?>"><i class="fa fa-home" aria-hidden="true"></i><?=$rowmenucab2['cnomseccion']?> </a>
                
              
                <!---------------- Inicio 3  Menu drop_right ----------------------> 
                 <div class="container-fluid dropdown-menu-shopping"> <!-- Inicio Contenedor 3Nivel -->
                  
                <?php   
			    $i3_2=0;           
               	$sqlmenucab3_2 = "SELECT ccodseccion,cnomseccion,camiseccion,curlseccion,ctipseccion FROM seccion  WHERE  ccodseccion like '".$s2."%'  and cnivseccion=3 and  estado='1' ORDER BY cordcontenido ASC   ";				
				$resmenucab3_2 = db_query($sqlmenucab3_2);
				$nromenucab3_2 = db_num_rows($resmenucab3_2);
				//echo $sqlmenucab3_2 ."<br/> Nro registros: ". $nromenucab3_2 ; exit;
				?>
				<?php if ($nromenucab3_2>0){?> <div class="row">	  <?php } ?>  <!-- Fin SI -->     
                <?php					
				while ($rowmenucab3_2 = db_fetch_array($resmenucab3_2)) 
				{
					$i3_2= $i3_2+1;
					$s3 = substr($rowmenucab3_2['ccodseccion'],0,20);
					$tipo3_2 = $rowmenucab3_2['ctipseccion'];
					switch($tipo3_2)
					{
					case 1:
						$enlacecab3_2 = "/".$rowmenucab['camiseccion']."/".$rowmenucab2['camiseccion']."/".$rowmenucab3_2['camiseccion'];
						break;
					case 2:
						$enlacecab3_2 = $rowmenucab3_2['curlseccion'];
						break;
					}
					//echo "<li><a href='".$enlacecab3."'>".$rowmenucab3[cnomseccion]."</a>";
				 ?> 
                 	 <!--
					<h3><a href='<?=$enlacecab3_2?>'><?=$rowmenucab3_2['cnomseccion']?></a></h3>  -->
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                      <h3><a href='<?=$enlacecab3_2?>'><?=$rowmenucab3_2['cnomseccion']?></a></h3>
                      <!--
                      <ul>
                        <li><a href="#">Caps</a></li>
                        <li><a href="#">Socks</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Suits &amp; Blazer</a></li>
                        <li><a href="#">Sweaters</a></li>
                      </ul>
                       -->
                    </div>
                                    
				<?php
				} //Fin  while  3er  Menu drop_right               
			   ?>
               <?php if ($nromenucab3_2>0){ ?> </div> <?php } ?>            
                  
            </div> <!-- Fin Contenedor 3Nivel -->
              <!---------------- Fin 3  Menu drop_right ---------------------->               
              
              
                            
          		</li> <!-- Fin Li 2Nivel -->
              <?php
 				} // Fin while 2 Menu Nivel2
 				?>      
             </ul>   <!-- Fin UL 2Nivel Multidrop -->            
            <!---------------- Fin 2  Menu ---------------------->                                 
            
            
             
		  </li>	 <!-- Fin Li 1Nivel Multidrop -->
	
   <?php
     } // Fin switch 
    ?>   

            <!-- Aqui Termina Insertar Los hijos   -->       
              
 <?php
 } // Fin while 1 Contenedor
 ?>           
                                                                
<!-- Aqui Termina los Hijos  y termina el contenedor-->                   
              </ul>
            </div><!-- /.navbar-collapse -->            
            
          </div><!-- /.container-fluid -->
        </nav>
      </div>
    </div>          
  </div>