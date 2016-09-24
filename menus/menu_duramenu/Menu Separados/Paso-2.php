<!--Aqui este paso 2 Se inserta El Menu 1Nivel pero estilo multidrop -->
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
	$sqlmenucab = "SELECT s.ccodseccion,s.cnomseccion,s.multidrop,s.camiseccion,s.curlseccion,s.ctipseccion,mostrarurlcatebase FROM  seccion s, seccionmenu  su, pagemenu pm WHERE s.ccodseccion=su.ccodseccion and su.ccodmenu = pm.ccodmenu and pm.cubimenu='1' and s.ccodpage='".$codpage."' and s.cnivseccion=1 and  s.estado='1'  ORDER BY s.cordcontenido";
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
	  case "multidrop":
	  	 ?>
         <!-- 1 Nivel multidrop -->
          <li class="dropdown">  <!-- Inicio Li 1Nivel Multidrop -->
              <a href="<?=$enlacecab ?>' title='<?php $rowmenucab['cnomseccion'] ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bars" aria-hidden="true"></i>
                    <?=$rowmenucab['cnomseccion']?> <span class="caret"></span>
              </a>	                                               
		  </li>	 <!-- Fin Li 1Nivel Multidrop -->
	
   <?php
     } // Fin case 
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

  <!-- BOOTSTRAP 3.3.6 -->
<link href="/menus/menu_estilo_03/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <!-- DURA MENU V1.0 -->
<link href="/menus/menu_estilo_03/css/dura-main.css" rel="stylesheet" type="text/css">
<link href="/menus/menu_estilo_03/css/dura-responsive.css" rel="stylesheet" type="text/css">
   <!-- FONT AWESOME -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- FONTS -->
<link href="css/font-arimo.css" rel="stylesheet" type="text/css">
<link href="css/font-notosans.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Khula:400,300' rel='stylesheet' type='text/css'> 

  <!-- DURAMENU V1.0 JAVASCRIPT FILES TO BE INCLUDED -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="/menus/menu_estilo_03/js/bootstrap.min.js"></script>
<script src="/menus/menu_estilo_03/js/dura-main.js"></script>