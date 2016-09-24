<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>
<?php //session_start();
$idsec1=$_GET["idsec1"];  
if ($idsec1=="") {
	$idsec1="presentacion";
}
?>
<style type="text/css">
	/*http://lineadecodigo.com/css/redondear-bordes-con-css/*/
	.imgredondearesq{
		border-radius: 20px 25px 0px 0px;
		-moz-border-radius: 20px 25px 0px 0px;
		-webkit-border-radius:20px 25px 0px 0px;
	}
	.fondocate {
		float: left;
		width: 220px;
		height: 260px;
		/*text-align: center;*/
		padding-top: 10px;
		color: #121212;
		background-color: #F9DDA4;
		opacity: 0.8;
		border-radius: 20px;	
		font-family:arial,helvetica,sans-serif;
	}
	.fondocate hr {
	background-color: #000000;
	border: none;
	color: #000000;
	height: 1px;
	width: 195px;
	}
	.curso{
		color:#F00;
		font-size:13px;
		font-weight:bold;
		text-align:center;
		margin:5px 0px; 		
	}
	.duracion{
	}
	.inicioclases{
	}
	.modalidad{
	}
	.preciosoles{
		color:#F00;
		font-weight:bold;		
		margin:5px 0px; 		
	}
	.tiCara{
		font-size:12px;
		font-weight:bold;
		color: #333;
		padding-right:10px;
		padding-left:10px;
		
		}	
	
   #contenedor_boton{ 
   width: 190px;
   margin:0 auto;
   margin-top:5px;
    }
   #col_izq_boton {float: left; width: 100px; text-align:center;}
   #col_der_boton {margin-left: 110px;text-align:center;}		
</style>

<style type="text/css">
#conte_paginacion {
	clear: both;
	width: 500px;
	text-align: center;	
	margin:0 auto;
	margin-top:40px;
}

.paginate {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
a.paginate {
	border: 1px solid #ee2f2c;
	padding: 2px 6px 2px 6px;
	text-decoration: none;
	color: #ee2f2c;
}
a.paginate:hover {
	background-color: #ee2f2c;
	color: #FFF;
	text-decoration: underline;
}
a.current {
	border: 1px solid #ee2f2c;
	font: bold 12px Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#ee2f2c;
	color: #FFF;
	text-decoration: none;
}
span.inactive {
	/* border: 1px solid #999;*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	padding: 2px 6px 2px 6px;
	color: #999;
	cursor: default;
}
.boton_desc_produ {
	/*color: white;*/
	font-size: 14px;
	font-family: "Trebuchet MS";
	padding: 10px 10px 3px 10px;
	width: 230px;
	height: 30px;
	text-align: center;
	border: 2px solid #e22f1c; 
	/*background-image: url(/imagen/boton_rojo_desc_produ.gif);*/
	cursor: pointer;
	margin-top:10px;   
	}
hr {
width: 100%;
border: 1px solid #e22f1c;
}	
</style>


<script>
function hilite(elem)
{
	elem.style.background = '#FFC';
}
function lowlite(elem)
{
	elem.style.background = '';
}
</script>
	
</head>
<?php
//<!--http://blog.timersys.com/php/paginacion-con-php-y-mysql-3-estilos/ -->
if (isset($_GET['idcategoria']));  {
 //categoria del producto pasado del menu
	$idcategoria=$_GET['idcategoria'];
}
if (isset($_GET['idsudcategoria']));  {
 //categoria del producto pasado del menu
$idsudcategoria=$_GET['idsudcategoria'];
}
//$idsudcategoria=isset($_GET['idsudcategoria']);    //sub categoria pasado del menu
$CateId=isset($_GET['CateId']);                     
if (isset($_GET['precio']));  {// filtramos por precio
 //categoria del producto pasado del menu
$precio=$_GET['precio'];
}
$CateId="1";   
$descrprodu=$_GET['descrprodu'];      //para poner descripcion producto al iniciar               
if ($descrprodu=="") {
	$descrprodu=DESCRPRODU;	
}	
include_once($_SERVER['DOCUMENT_ROOT'].'/include/configuration.php'); 
/////////////////////////////////////////////////////////////////////////////
//   http://blog.timersys.com/php/paginacion-con-php-y-mysql-3-estilos/   //
////////////////////////////////////////////////////////////////////////////
//INCLUYO LA HOJA DE ESTILOS
?>


<link href="galeria-productos/css/paginacion.css" type="text/css" rel="stylesheet">
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/galeria-productos/config/db.php'); 
//include_once($_SERVER['DOCUMENT_ROOT'].'/galeria-productos/config/db.php'); 
//AL PRINCIPIO COMPRUEBO SI HICIERON CLICK EN ALGUNA PÁGINA
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}
//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
//$consulta="SELECT * FROM ".$GLOBALS['DB_TBL'];
	 if ($idsec1 <> "presentacion") {  // si 4				
	    if ($idsudcategoria=="") {
		$consulta="select * from productos where idcategoria=".$idcategoria. " and mostrar='SI' and borrado=0";
		} else {
		 $consulta="select * from productos where idcategoria=".$idcategoria." and idsudcategoria=" .$idsudcategoria. " and mostrar='SI' and borrado=0";	
		}
     } else {
		//si se llama a galeria desde la idsec1 principal se muestran todos los producots de campana san valentin 
		 $consulta="select * from productos where idcampana=1 and mostrar='SI' and borrado=0" ;
      }
     // ----------------------Inicio Se filtra por precio
  	  $cFiltroPrecio="";
	  if ($precio <> "" and $precio <> "precio" ) {  // si 5
		switch ($precio)
		{
		case '50':
		    $cFiltroPrecio=" and preciosoles  <=50";
			break;
		case '50-100':
			$cFiltroPrecio=" and preciosoles  >=50 and preciosoles<=100  ";
		break;
		case '100-150':
			$cFiltroPrecio=" and preciosoles  >=100 and preciosoles<=150  ";
		break;
		case '150-200':
			$cFiltroPrecio=" and preciosoles  >=150 and preciosoles<=200  ";
		break;
		case '200-250':
			$cFiltroPrecio=" and preciosoles  >=200 and preciosoles<=250  ";
		break;
		case '250-MAS':
			$cFiltroPrecio=" and preciosoles  >=250";
		break;
		case 'Todos':
			$cFiltroPrecio="";
		break;
		default:
		// mala suerte :P
		}		
	   	$consulta="select * from productos where idcampana=2 and mostrar='SI' and borrado=0 " . $cFiltroPrecio ;
      }		 
	  

	//---------------------- Fin Se filtra por precio		
$datos=mysql_query($consulta,$conexion);
//MIRO CUANTOS DATOS FUERON DEVUELTOS
$num_rows=mysql_num_rows($datos);
include($_SERVER['DOCUMENT_ROOT'].'/galeria-productos/paginator.class.php'); 
//http://www.catchmyfame.com/2007/07/28/finally-the-simple-pagination-class/ //
$pages = new Paginator;
$pages->items_total = $num_rows; //cuantos registros se mostraran
$pages->items_per_page= 6;
// Configuramos el total de links a mostrar. Por ejemplo el valor por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
$pages->mid_range = 3; 
$pages->paginate();
/*
paginate. Calcula las páginas a mostrar. 
display_pages. Devuelve la cadena HTML que muestra lás paginas  
display_jump_menu. Devuelve una cadena HTML para mostrar el salto de página
display_items_per_page. Devuelve una cadena HTML para mostrar items por página.
*/
$consulta= $consulta . " $pages->limit";
$datos = mysql_query($consulta) or die(mysql_error());
//aqui estaba paginacion de arriba
//<!--------------Inicio Listado de Productos----------------->      
      //SI ES CORRECTA MUESTRO LOS DATOS
      ?>       
      <!------------ Inicio Listado de Productos -------------------------->                  
   <table  border="0" cellspacing="0" cellpadding="6" width="100%" align="center">
    <tr>
     <td  align="center" width="100%">
     <hr>
      <div class="plomo bold">
       <?php echo $descrprodu ?>      
       </div>
     <hr> 
	</td>
    </tr>  
     <tr>
     <td  align="center" width="100%">
<?php     //no desea paginacion parte arriba
//echo "<div id='conte_paginacion'> " . $pages->display_pages()  ."<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span></div>";
?>
</td>
    </tr>             
      <tr>
        <td width="100%">     
      <?php   				
  	 if ($CateId  <> "") {  // si 3
			   //include_once 'include/config_default.inc.php';
			   //include 'rutinas/conexion.php';		
				echo " <table width='100%' border='0'";									
				//$ntotal = mysql_num_rows($rs); //Registros devueltos   
				$i=1;	
				$num_por_fila =3; 
				$contador= 0;		
				//for ($i=1;$i<=2;$i++) {
					//echo "<tr>"; //tr1 							
						while( ($fila=mysql_fetch_array($datos)) ) { //al terminar while el puntero esta en el ultimo registro						
							if ($contador == 0) {  //si 1
								echo "<tr>";	   //abre 1
							}   //Fin Si 1	
							if ($contador < $num_por_fila) {  //si 2 				       
							   echo "<td width='180px' align='center'>" ;
							 
							 //----------------------------------inicio div cuadrado							   
							 //<img  src='".$fila['rutaimagen']."' width='170'  height='190' border=0  />
						$imagen='"' . primera_imagen($fila['detalle']);
						//   echo "<img src=$imagen/>" ;						
						$cadena = $imagen;
						$buscar = "alt";
						$resultado = strpos($cadena, $buscar);//ubica donde esta ubicado el alt
						$imagen=substr($cadena,0, $resultado);//quita el alt de la imagen
						$longitud=strlen($imagen); 	
						$imagen=substr($imagen,1,$longitud-1); //sustrae la 1 comilla "
						$imagen=substr($imagen,0,$longitud-3); //sustrae las ultimas comillas"						
					   //echo "<img src='timthumb.php?src=/tiny_mce/plugins/jfilebrowser/archivos/20140205210655_0.png'>"; 
					  // echo "<img src='timthumb.php?src=".$imagen. "'>"; 					   
							  // echo "</td>";				
						 echo "<div style='position: static' class=fondocate>"; //Inicio Marco Imagen
						 	echo "<div style='margin-top:-10px'"; 						
								  echo " <a href='index.php?idsec1=galeria-productos/view&CateId=".$fila['idproductos']."'>						
							   <img src='timthumb.php?src=" .$imagen. "&h=120&w=220&zc=0&q=100&s=1' border=0 class='imgredondearesq'  />	   
						   				</a>"; 
						   	echo "</div>";	
							?>                        
     					<?php						    	
				echo '<div class="curso">'. htmlspecialchars($fila['curso']) . '</div>';							   
   			    echo '<div  class="duracion"><span class="tiCara">Duración:</span>' .htmlspecialchars($fila['duracion']) . '</div>';  		
   			    echo '<div  class="inicioclases"><span class="tiCara">Inicio de clase:</span>' .htmlspecialchars($fila['inicioclases']) . '</div>';  		
				echo '<div  class="modalidad"><span class="tiCara">Modalidad:</span>' .htmlspecialchars($fila['modalidad']) . '</div>'; 
				echo '<hr>';
				echo '<div  class="preciosoles"><span class="tiCara">Precio:</span>S/.' .htmlspecialchars($fila['preciosoles']) . '</div>'; 
																	   
							    echo  "<div id='contenedor_boton'>";
						       echo "<div  id='col_izq_boton'>";
							   echo	"<a href='index.php?idsec1=galeria-productos/view&CateId=".$fila['idproductos']."'><img src='http://www.rosanet.com.pe/imagen/boton_ampliar_c.gif' border='0' width='75' height='18' /></a>";
							   echo '</div>';	
							   echo '</div>'; //----------------------------------fin contenedor boton	 
							   				   
						   	echo "</div>"; //Fin Marco Imagen			
						     echo "</td>";						   	   
							   $contador++; 			
							}   //Fin Si 2					
							if ($contador == $num_por_fila) {  // si 3
								$contador=0; 
								echo "</tr>"; //Cierra 1
								//echo '<br/>'; 
							}   //Fin Si 3								
						}//Fin While        					
				
			echo "</table>";						
			   //mysql_free_result($rs);			 
				//include 'rutinas/cerrar_conexion.php';		
		}   //Fin Si 3
	?>          
      </td>
      </tr>
    </table>
        <!------------Fin Listado de  productos------------->    
<?php        
     echo "<div id='conte_paginacion'> " . $pages->display_pages()  . "</div>";
?>	