<?php //echo $contenidoinc."config_style.php";exit;?>
<!DOCTYPE html>
<html lang="<?=$webidio?>">
<head>   
	  <?php  include_once($_SERVER['DOCUMENT_ROOT'].'/head-general.php');	?>    
</head>
<body>
<?php
	//echo "hola";exit;
//	//include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/css/mis-estilos-web.php');  
///* $webplan=000001  ya esta definido en index en la consultya a page*/
//$sql_website = "SELECT * FROM estilopagina where ccodplantilla='".$webplan."'";
//$res_website = db_query($sql_website);
//while ($row_website = db_fetch_array($res_website))
//{
//	$webestilo  	= $row_website['webestilo'];
//	$webancho  		= $row_website['webancho'];
//	$webalineahor 	= $row_website['webalineahor'];
//	$columnacenancho =$row_website['columnacenancho']-30;
//	$columnaizqancho =$row_website['columnaizqancho'];
//	$columnaderancho =$row_website['columnaderancho'];
//	$ampliarimagen_portada=$row_website['ampliarimagen_portada'];	//para saber si se amplia imagen en la portada o se muestra como una noticia	 
//}
?>
<div id="warp" class="redondeado-10px" >         
   <header id="cabecera">   
	    <?php  include_once($cRutaWeb.'/inccabecera-top-1.php');	?>
    	<div class="ctnlogo">
        	  <?php  include_once($cRutaWeb.'/inccabecera.php');?>         
        </div>        
        <div class="ctn-menu">        
              <input type="checkbox" id="btn-menu">
              <label for="btn-menu"  class="icon-menu">               
              <img src="/imagen/para-todos/icono-menu.jpg" width="30px" height="30px">                                         
              <span class="titulomenu">MENU</span>
              </label>
              <nav class="menu">
                <?php  include_once($cRutaWeb.'/inccabeceramenu.php');?>
             </nav>
             <div class="clear"></div>
          </div>
                
        <div id="ctn_slider">   		     
            <div class="slider">
                <?php include_once($cRutaWeb .'/inccabeceracontenido.php'); ?> 
            </div> 
   		</div>
         <?php  include_once($cRutaWeb.'/inccabecera-top-4.php');	?>           
  </header>     
    <div>
	  <?php 
		//if ($_SESSION['id_usu_web']<>""){
		 //include_once ($_SERVER['DOCUMENT_ROOT'] .'/include/control-usuario/barra-superior-usuario-activo.php');
		//}
		//echo $totalpantalla."----".$webestilo;exit;
	  ?>
    </div>  
            
     	<!-------------------- Inicio  Cuerpo ---------------------->             
       <div id="cuerpo">
		<!-- $webestilo = (1 Izquierda Pantalla)(2 Derecha Pantalla) (3 Ambos)(4 Total Pantalla)-->
        <?php if ($totalpantalla=="Portada" and ($webestilo==1 or $webestilo==3)){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."/incizquierda.php"?></div>        <?php } ?> 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="izqpantalla"){?> 
                <div id="columnaizquierda"><?php include $_SERVER['DOCUMENT_ROOT']."/incizquierda.php"?></div>        <?php } ?>      
         <?php include $_SERVER['DOCUMENT_ROOT']."/columnacentro.php"?>		    
	 
        <?php if ($totalpantalla=="Portada" and ($webestilo==2 or $webestilo==3)){?> 
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."/incderecha.php"?></div>
        <?php } ?>	 
        <?php if ($totalpantalla=="ambos" or $totalpantalla=="derepantalla"){?>    
            <div id="columnaderecha"><?php include $_SERVER['DOCUMENT_ROOT']."/incderecha.php"?></div>
        <?php } ?>      
    </div> 
	<!------------------------------ Fin  Cuerpo --------------------------------------------------------> 	
    <div id="piecontenido"><?php include $cRutaWeb."incpiecontenido.php"?></div>         
</div>  <!--- Fin  warp ----->
 <footer id="PiePrincipal" class="redondeado-10px" >       	
	  <?php  include_once (include $cRutaWeb. '/pie-abajo.php');  ?> 
</footer>  
</body>
</html>
<!--06-02-2016  se pasó todos los llamados de slider o jquery a index.php porque si se agregaba 
o quitaba un llamado se tendría que  reemplazar  a cada  config_style.php de cada plantilla -->