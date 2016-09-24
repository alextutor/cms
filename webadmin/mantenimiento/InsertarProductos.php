<?php		
	$Title = "";
	$Description = "";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php'); 	
?> 
<?php    

   include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
   
  extract($_POST);
  if ($idsudcategoria=="--seleccione--") {
	 $idsudcategoria=0;
  } 
  $inicioclases=date("Y-m-d",strtotime($inicioclases));
      	 
   //---------------------Inicio Para Fecha----------------------------------------------------
   // Obtenemos y traducimos el nombre del día
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miércoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";

// Obtenemos el número del día
$dia2=date("d");

// Obtenemos y traducimos el nombre del mes
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";
// Obtenemos el año
$ano=date("Y");
$hora=date ( "h:i:s A") ;
// Imprimimos la fecha completa
//echo "$dia $dia2 de $mes de $ano";
$fecha=   "$dia $dia2 de $mes de $ano Hora: $hora" ;
$fechacorta=date("Y/m/d"); 

 //----------------Fin Para Fecha---------------------------------------------------	
   //$_POST['$nombre']
   // $persona=$_POST['$persona'];    
    //Generamos la ssql e insertamos el registro
    $ssql ="insert into productos(idcategoria,idsudcategoria,nombproductos,curso,duracion,inicioclases,modalidad,detalle,preciosoles,preciosolesoferta,idcampana,mostrar)  values
('$idcategoria','$idsudcategoria','$nombproductos','$curso','$duracion','$inicioclases','$modalidad','$detalle','$preciosoles','$preciosolesoferta','$idcampana','$mostrar')";
	
mysql_query($ssql,$conexion) or die ("problema con query");
    include_once($_SERVER['DOCUMENT_ROOT'].'/rutinas/cerrar_conexion.php'); 
   //header ("Location: EnvioCorreo.php");
?>


<script language='JavaScript'> 
    idcategoria = "<?=$idcategoria?>";
	idsudcategoria = "<?=$idsudcategoria?>";
	paginacion = "<?=$paginacion?>";
	ROOT_PATH = "<?=$ROOT_PATH?>";
	location.href= ROOT_PATH+ '/webadmin/mantenimiento/contenedor_man_produ_admi.php?mensaje=Registro Insertado' + '&paginacion='	+paginacion + '&idcategoria='	+idcategoria + '&idsudcategoria='	+idsudcategoria
</script> 
