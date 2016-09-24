<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
?>
<?php //session_start();
$idsec1=$_GET["idsec1"];  
if ($idsec1=="") {
	$idsec1="presentacion";
}
?>
<style type="text/css">
	#home {
		width: 660px;
		margin:0 auto;
		margin-top:20px;
	}
	#homecontenido {
		/*padding: 5px;*/
		margin: 0px auto 0px auto;
		float: left;
		border: #e6e6e6 1px solid;
		margin-bottom: 10px;
		width: 100%;
		clear:both;
	}
	#hometitulo {
		background-color: #cc3535;
		color: #ffffff;
		font-weight: bold;
		margin-bottom: 5px;
		float: left;
		height: 35px;
		width: 100%;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
		line-height: 35px;
		text-align: center;
	}
	
	/***************  Estilo contenidos ********************/
	
	.seccionindex100 {
		width: 100%;
		border-bottom: #999 dashed 1px;
		clear: both;		
		padding-top: 7px;
		padding-bottom: 7px;
		height:135px;
	}
	.seccionindex100 .imagen {
		float:left;
		width:135px;
	}
	.seccionindex100 .contenido {
		float:left;
		width:500px;
		margin-left:10px;
	}
	.seccionindex100 .titulo_conte {
		text-align:left;		
		color: #ff6600;
		font-size: 14px;
		font-family: Verdana, Helvetica, sans-serif;
		font-weight: bold;		
	}
	.seccionindex100 .detalle_conte {
		margin-top:5px;
		margin-left: 12px;
		color: #333333;
		font-family: Verdana, Helvetica, sans-serif;
		font-size: 12px;
	}
	.seccionindex100 .precio_conte {
		margin-top:5px;
		text-align:right;
		clear:both;
	}

	/*************** Fin Estilo contenidos ********************/
	
	.tituloCara{
	  font-size:12px;
	  font-weight:bold;
	  color: #333;	  
	  float:left;
	  width:100px;
	  margin-left:10px;
	}
	.detatituloCara{
	  font-size:12px;
	  font-weight:bold;
	  color: #333;
	  float:left;
	  margin-left:20px;
	  width:150px;
	}	
</style>	
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
//conexion bd
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php');  	

//include_once($_SERVER['DOCUMENT_ROOT'].'/galeria-productos/config/db.php'); 
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


$consulta="SELECT * FROM  productos p, categoria  cate WHERE p.idcategoria=cate.idcategoria and cate.titu_cate='boxes' and p.estado='1'";
     
	//---------------------- Fin Se filtra por precio		
$datos=mysql_query($consulta,$conexion);
//MIRO CUANTOS DATOS FUERON DEVUELTOS
$num_rows=mysql_num_rows($datos);
include($_SERVER['DOCUMENT_ROOT'].'/include/paginator.class.php'); 
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
     <?php   				
  	 if ($CateId  <> "") {  // si 3	
	 			echo "<div id='home'>";
	 			echo "<div id='hometitulo'>"."Productos"."</div>";	 			
				echo "<div id='homecontenido'>";												
				$i=1;	
				$num_por_fila =1; 
				$contador= 0;		
						while( ($fila=mysql_fetch_array($datos)) ) { //al terminar while el puntero esta en el ultimo registro						
							if ($contador == 0) {  //si 1
								echo "<div class='seccionindex100'>";	   //abre 1
							}   //Fin Si 1	
							if ($contador < $num_por_fila) {  //si 2 				       
							   //echo "<td width='180px' align='center'>" ;							 
						$imagen='"' . primera_imagen($fila['imagen']);
						$cadena = $imagen;
						$buscar = "alt";
						$resultado = strpos($cadena, $buscar);//ubica donde esta ubicado el alt
						$imagen=substr($cadena,0, $resultado);//quita el alt de la imagen
						$longitud=strlen($imagen); 	
						$imagen=substr($imagen,1,$longitud-1); //sustrae la 1 comilla "
						$imagen=substr($imagen,0,$longitud-3); //sustrae las ultimas comillas"	
						
					?>
                       <div class="imagen">                        
						   <?php				   
                             echo "<a href='/cursos/".$fila['amigable']."'>						
                           <img src='/timthumb.php?src=" .$imagen. "&h=130&w=130&zc=0&q=100&s=1' border=0 class='imgredondearesq'  />	   
                                    </a>";  ?>                                                                   
                            <?php  echo "<a href='/cursos/".$fila['amigable']."'>".htmlspecialchars($fila['curso'])."</a>";  ?>             								
                        </div>
                        <div class="contenido"> 
                        	<div class="titulo_conte">
                            	<?php  echo "<a href='/cursos/".$fila['amigable']."'>".htmlspecialchars($fila['titulo'])."</a>";  ?> 
                            </div> 
                           	<div class="detalle_conte">
                            	<?php  echo $fila['detalle_articulo'];  ?> 
                            </div>
                           	<div class="precio_conte">
                            	<?php  echo " Precio $ ".$fila['preciosoles'] ."  USD";  ?> 
                            </div>                          
                                                                               
						</div>					
					<?php	 			   
					
						     echo "</div>";						   	   
							   $contador++; 			
							}   //Fin Si 2					
							if ($contador == $num_por_fila) {  // si 3
								$contador=0; 
								//echo "</tr>"; //Cierra 1

							}   //Fin Si 3								
						}//Fin While        									
			echo "<div style='clear:both'></div>";		
			echo "</div>";		// Fin homecontenido
			echo "</div>";		// Fin home				
		}   //Fin Si 3
	?>          
      </td>
      </tr>
    </table>
        <!------------Fin Listado de  productos------------->    
<?php        
   //  echo "<div id='conte_paginacion'> " . $pages->display_pages()  . "</div>";
?>	