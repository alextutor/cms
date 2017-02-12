 <?php 
 // alex el $webestilo lo toma de  Gestor de Estilos Web: Empresa 
 //echo "totalpantalla==".$totalpantalla."----webestilo =". $webestilo ."--contenidoinc=". $contenidoinc;exit;
 //echo $contenidoinc."-----".$webestilo;exit; 
 //echo $codcont;exit;
if (!empty($_GET['idsec']) and empty($_GET['idsec2'])){  $pgncontenido =$_GET['idsec'];  }
if (!empty($_GET['idsec2'])){  $pgncontenido =$_GET['idsec2'];  }	


//Inicio alex lo agregue porque no jalaba $codcont y s necesita para la sentencia para quienes somos 
//de abajo $ssqluno
//$sqlarti_estilo="SELECT * FROM  contenido c, seccioncontenido s, estilocontenido e WHERE c.ccodcontenido=s.ccodcontenido and c.ccodestcontenido= e.ccodestcontenido and s.ccodpage='".$codpage. "' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1'  order by c.dfeccontenido asc LIMIT 0 , 1 ";
//echo $sqlarti_estilo;exit;

//$sqlpag   = db_query($sqlarti_estilo);
//while ($rowpag=db_fetch_array($sqlpag))
//{
//$codcont = $rowpag['ccodcontenido'];
//$webpag  = "modulos/".$rowpag['cincestcontenido'];
//}	
//Fin alex lo agregue porque no jalaba $codcont


//$codcont="12172810151210182835HXGP";

//$ssql ="SELECT SQL_CALC_FOUND_ROWS * FROM contenido where camicontenido='".$pgncontenido."' and estado=1";
$ssqluno ="SELECT SQL_CALC_FOUND_ROWS * FROM  contenido c, contenidodetalle  cd WHERE c.ccodcontenido=cd.ccodcontenido and c.ccodcontenido='".$codcont ."' and c.estado=1";
//echo $pgncontenido;exit;
//no funciona
/*$ssql = "SELECT SQL_CALC_FOUND_ROWS * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido and s.ccodpage='".$codpage."' and s.ccodseccion = '".$codsecc."' AND c.cestcontenido='1' and c.ccodcategoria='1' order by c.ccodcontenido desc ";
*/
//echo $ssql;exit;
//echo $contenidoinc;exit;

$rs_colcentro = mysql_query($ssqluno) or die ("problema con query");
$nTotal = mysql_query("SELECT FOUND_ROWS()");   
$rowcolcentro = mysql_fetch_array($rs_colcentro) ;

//echo $codsecc;exit;
//echo $rowcolcentro['cestcompartirredes'];exit;
//  $webestilo =1 Izquierda Pantalla  //  $webestilo =2 Derecha Pantalla  
//   $webestilo =3 Ambos  //   $webestilo =4 Total Pantalla
 
  if ($totalpantalla=="Portada" and ($webestilo==1)){ ?> 
      <div id="ladocentro_soloizqui">
            <?php if (!empty($_GET['idsec'])) {    ?>        		
                <div id="webencabezado">
                <?php //esto es menu de cada seccion migaja de pan
                     //include "modulos/seccion_ruta.php" 
					 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); 
					 ?>
                </div>
            <?php } ?>
                <div id="webcontenido">
                 <?php				 
					include_once($_SERVER['DOCUMENT_ROOT']."/".$contenidoinc);					
					//include_once ( $_SERVER['DOCUMENT_ROOT']. '/prueba.php');	
				 ?>
                </div>
      </div>        
  <?php }  
  if ($totalpantalla=="Portada" and ($webestilo==2)){?> 
      <div id="ladocentro_solodere">
            <?php if (!empty($_GET['idsec'])) {    ?>        		
                <div id="webencabezado">
                <?php //esto es menu de cada seccion migaja de pan
                     //include "modulos/seccion_ruta.php" 
					 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); ?>
                </div>
            <?php } ?>
                <div id="webcontenido">
                 <?php				 
					include_once($_SERVER['DOCUMENT_ROOT']."/".$contenidoinc);		 					
				 ?>
                </div>
      </div>        
  <?php }  
 if ($totalpantalla=="Portada" and ($webestilo==3)){ 
 	//echo "has entrado a $totalpantalla==Portada y $webestilo==3 en columnacentro" ;exit; ?> 
      <div id="ladocentro">
            <?php if (!empty($_GET['idsec'])) {    ?>        		
                <div id="webencabezado">
                <?php //esto es menu de cada seccion migaja de pan
                     //include "modulos/seccion_ruta.php" 
					 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); ?>
                </div>
            <?php } ?>
            <div id="webcontenido">            
             <?php	include_once($contenidoinc);?>
            </div>
      </div>        
 <?php } ?> 
  
   <?php   
	 if ($totalpantalla=="Portada" and ($webestilo==4)){?> 
		  <div id="ladocentro">
				<?php if (!empty($_GET['idsec'])) {    ?>        		
					<div id="webencabezado">
					<?php //esto es menu de cada seccion migaja de pan
						 //include "modulos/seccion_ruta.php" 
						 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); ?>
					</div>
				<?php } ?>
				<div id="webcontenido">
				 <?php	include_once($contenidoinc);?>
				</div>
		  </div>        
	 <?php } ?> 
 
 <?php  //---------------Ver esto  agregue $webestilo==2  porque al poner lado derecho el estilo pagina aqui no entra
  if ($totalpantalla=="izqpantalla" and ($webestilo==1 or $webestilo==2 or  $webestilo==3  or $webestilo==4)){?> 
      <div id="ladocentro_soloizqui">
            <?php if (!empty($_GET['idsec'])) {    ?>        		
                <div id="webencabezado">
                <?php //esto es menu de cada seccion migaja de pan
                     //include "modulos/seccion_ruta.php" 
					 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); 				     
				?>
                </div>
            <?php } ?>
            <div id="webcontenido">
                 <?php								 
				if ($nTotal<> 0 and $rowcolcentro['cestcompartirredes']==1){ // para fecha
					   include_once($_SERVER['DOCUMENT_ROOT']. "/fecha-noticia.php");			 
				   }	
				include_once($_SERVER['DOCUMENT_ROOT']."/".$contenidoinc);	
				?>	 											 			
            </div>
      </div>        
 <?php } ?> 
 
  <?php
 // echo $nTotal ."##". $rowcolcentro['cestcompartirredes'];exit; 
  if ($totalpantalla=="derepantalla" and ($webestilo==1 or $webestilo==2 or $webestilo==3  or $webestilo==4)){
	 // echo "derepantalla y webestilo" ;exit;?> 
      <div id="ladocentro_solodere">
            <?php if (!empty($_GET['idsec'])) {    ?>        		
                <div id="webencabezado">
                <?php //esto es menu de cada seccion migaja de pan
                     //include "modulos/seccion_ruta.php" 
					 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); ?>
                </div>
            <?php } ?>
                <div id="webcontenido">
					 <?php				 
                      if ($nTotal<> 0 and $rowcolcentro['cestcompartirredes']==1){ // para fecha
                           include_once($_SERVER['DOCUMENT_ROOT']. "/fecha-noticia.php");			 
                       }	
                     //echo $_SERVER['DOCUMENT_ROOT']."/".$contenidoinc;exit;
                     //include_once ($_SERVER['DOCUMENT_ROOT']."/modulos/foto_album_photoswipe.php");
                     
                    // echo $_SERVER['DOCUMENT_ROOT']."/".$contenidoinc;exit;
                     include_once($_SERVER['DOCUMENT_ROOT']."/".$contenidoinc);	 		
					 ?>           			
                </div>
      </div>        
 <?php } ?> 

 <?php
  if ($totalpantalla=="ambos" and ($webestilo==2  or $webestilo==3)){?> 
      <div id="ladocentro">
            <?php if (!empty($_GET['idsec'])) {    ?>        		
                <div id="webencabezado">
                <?php //esto es menu de cada seccion migaja de pan
                     //include "modulos/seccion_ruta.php" 
					 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); ?>
                </div>
            <?php } ?>
                <div id="webcontenido">
					 <?php
                       if ($nTotal<> 0 and $rowcolcentro['cestcompartirredes']==1){ // para fecha
                           include_once($_SERVER['DOCUMENT_ROOT']. "/fecha-noticia.php");			 
                       }				  	
					  // echo $contenidoinc;exit;
                      include_once($_SERVER['DOCUMENT_ROOT']."/".$contenidoinc);									
                	  ?>	                     
                </div>
      </div>        
 <?php } ?>

 <!-- Alex Agregre $webestilo==1 para gesterritorial -->
<?php if ($totalpantalla=="totalpantalla" and ($webestilo==1 or $webestilo==2 or $webestilo==3)){ ;?> 
	<div id="ctn_gral_columnacentro" > 
    	 <?php if (!empty($_GET['idsec'])) {    ?>        		
                <div id="webencabezado">
                <?php //esto es menu de cada seccion migaja de pan
                     //include "modulos/seccion_ruta.php" 
					 include_once ( $_SERVER['DOCUMENT_ROOT']. '/include/breadcrumbs.php'); ?>
                </div>
            <?php } ?>        	 
		<?php 						  			   	
		//echo $contenidoinc;exit;		  				 
          include_once($_SERVER['DOCUMENT_ROOT']."/".$contenidoinc);
          //$idsec= "/" . $_SESSION['directorio'] . $idsec.".php";				
         // include_once($_SERVER['DOCUMENT_ROOT']. "/".$idsec) ;    		
          ?>               	    				 	      
    </div>
 <?php } ?>    
 <?php // include_once ($_SERVER['DOCUMENT_ROOT']. '/cabeceraenlace.php');  ?> 