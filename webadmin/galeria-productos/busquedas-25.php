<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>
<?php //session_start();
$idsec1=$_GET["idsec1"];  
$descrprodu=$_GET['descrprodu'];      //para poner descripcion producto al iniciar               
if ($idsec1=="") {
	$idsec1="presentacion";
}
if ($descrprodu=="") {
	$descrprodu=DESCRPRODU;	
}
?>
<style type="text/css">
  .cong_busque {
	margin:0 auto;
	margin-top:20px;
	clear: both;
   }
   .cong_lista {
	   width:800px;
		margin:0 auto;
		clear: both;
		text-align: center;
	}	
	.fondocate {
		float: left;
		width: 220px;
		height: 220px;
		color: #121212;
		background-color: #ffaf02;		
		border-radius: 15px;	
		font-family:arial,helvetica,sans-serif;
		margin: 0px 30px 10px 0;
	}
	.fondocate hr {
	background-color: #000000;
	border: none;
	color: #000000;
	height: 1px;
	width: 195px;
	}

	.fondocate .cabecera {	
		background-color: #F1F1F1;
		background: #eeeeee;
		background: -moz-linear-gradient(top, #eeeeee 0%, #eeeeee 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeeeee), color-stop(100%,#eeeeee));
		background: -webkit-linear-gradient(top, #eeeeee 0%,#eeeeee 100%);
		background: -o-linear-gradient(top, #eeeeee 0%,#eeeeee 100%);
		background: -ms-linear-gradient(top, #eeeeee 0%,#eeeeee 100%);
		background: linear-gradient(to bottom, #eeeeee 0%,#eeeeee 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eeeeee', endColorstr='#eeeeee',GradientType=0 );
		background-repeat: repeat-x;
		border: 1px solid #BDBDBD;
		border-radius: 15px 15px 0 0;
		height: 30px; /* h4 ver line-height*/
		margin: 0 auto;
		width: auto;
	}
	.fondocate h4 {
	  color: #333333;
	  font-size: 20px;
	  font-weight: 100;
	  line-height: 30px; /* cabecera ver height*/
	  margin: 0;
	  text-align: center;
	  text-shadow: 0 1px 0 #FFFFFF;
	}
	.fondocate img {
		border: 2px solid #ffffff;		
	}
	.fondocate .imagen{
		width:150px;
		margin:0 auto;
		margin-top:10px;
		

	}	
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
hr {
width: 100%;
border: 1px solid #e22f1c;
}	
</style>	
</head>
<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/include/configuration.php'); 
/////////////////////////////////////////////////////////////////////////////
//   http://blog.timersys.com/php/paginacion-con-php-y-mysql-3-estilos/   //
////////////////////////////////////////////////////////////////////////////
//INCLUYO LA HOJA DE ESTILOS
?>

<link href="galeria-productos/css/paginacion.css" type="text/css" rel="stylesheet">
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/galeria-productos/config/db.php'); 
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}
$consulta="select * from categoria where estado=1" ;
    	
$datos=mysql_query($consulta,$conexion);
$num_rows=mysql_num_rows($datos);
include($_SERVER['DOCUMENT_ROOT'].'/webadmin/galeria-productos/paginator.class.php'); 
//http://www.catchmyfame.com/2007/07/28/finally-the-simple-pagination-class/ //
$pages = new Paginator;
$pages->items_total = $num_rows; //cuantos registros se mostraran
$pages->items_per_page= 6;
// Configuramos el total de links a mostrar. Por ejemplo el valor por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
$pages->mid_range = 3; 
$pages->paginate();
$consulta= $consulta . " $pages->limit";
$datos = mysql_query($consulta) or die(mysql_error());
 ?>       
<div class="cong_busque">
	<div class="plomo bold">
       <?php echo $descrprodu ?>      
     </div>     
	<?php   				
      $i=1;	
      $num_por_fila =3; 
      $contador= 0;
	 ?> 		
     <div class="cong_lista">
     <?php   				
	  while( ($fila=mysql_fetch_array($datos)) ) { //al terminar while el puntero esta en el ultimo registro						
		  if ($contador == 0) {  //si 1
		  	if ($num_rows==4 and $i==4 ) {  //si 1.1
				echo "<div style='margin: 0 auto;width: 300px;'>";  //abre 1
			} ////fin si 1.1
			echo "<div style='margin: 0 auto;'>";  //abre 1		  	 
		  }   //Fin Si 1	
		  if ($contador < $num_por_fila) {  //si 2 				       			
			  $imagen='"' . primera_imagen($fila['imagen']);
			  $cadena = $imagen;
			  $buscar = "alt";
			  $resultado = strpos($cadena, $buscar);//ubica donde esta ubicado el alt
			  $imagen=substr($cadena,0, $resultado);//quita el alt de la imagen
			  $longitud=strlen($imagen); 	
			  $imagen=substr($imagen,1,$longitud-1); //sustrae la 1 comilla "
			  $imagen=substr($imagen,0,$longitud-3); //sustrae las ultimas comillas"						
		?>
          <div style='position: static' class=fondocate>
          	<div class="cabecera">
          		<h4><?php echo $fila['titulo']?></h4>
            </div>
             <div class="imagen"> 						
                <a href="index.php?idsec1=galeria-productos/view&CateId=<?php $fila['idcategoria']?>">						
                 <img src='timthumb.php?src=<?php echo $imagen ?>&h=150&w=140&zc=0&q=100&s=1' border=0 />	   
                </a>															  
              </div>
          </div>
        <?php
    	   ++$i;			 				   	   
		   $contador++; 			
		}   //Fin Si 2					
		if ($contador == $num_por_fila) {  // si 3
			$contador=0;
   			   echo"<div style='clear:both'></div>";
			  echo"</div>"; 
			 
		}   //Fin Si 3								
	}//Fin While        					      
    ?>          
   </div><!--Fin cong_lista--> 
	<?php        
        // echo "<div id='conte_paginacion'> " . $pages->display_pages()  . "</div>";
    ?>	
</div>