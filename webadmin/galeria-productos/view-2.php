<?php //session_start(); 
error_reporting(E_ALL);
@ini_set('display_errors', '0');
if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];else $carro=false;
?>
<?php
$CateId=$_GET['CateId'];   
if ($CateId  <> "") {  // si 3
	//alex programar regresar
} 
?>
<?Php 
	$Title = " Consultoría Geográfica - Soluciones Enterprice S.A.C. ";
	$Description = " Posee una amplia organización adecuada para desarrollar distintos tipos de consultorías, para lo cual cuenta con las siguientes áreas técnicas:Catastro,Topografía y Geodesia,Medio Ambiente,Sistemas de Información Geográfica y Sistemas,Ordenamiento del Territorio,Capacitación,Prevención de Riesgos";
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	include_once ( $INC_DIR . '/header.php');
?>
<style type="text/css">
	.detalleproducto{
		width:96%;
		margin:0 auto;
	}
	.marco_botones{
		width: 200px;
		margin:0 auto;
	}	
</style>
  <?php   
	include ($_SERVER['DOCUMENT_ROOT']. '/webadmin/rutinas/conexion.php');						  	 
			 $rsview=mysql_query("select * from productos where idproductos ='" .$CateId . "' and mostrar='SI'");
    		 $ntotal = mysql_num_rows($rsview); //Registros devueltos   		
	 	     $search = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,Ã¡,Ã©,Ã­,Ã³,Ãº,Ã±,ÃÃ¡,ÃÃ©,ÃÃ­,ÃÃ³,ÃÃº,ÃÃ±");
			 $replace = explode(",","á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ,á,é,í,ó,ú,ñ,Á,É,Í,Ó,Ú,Ñ");
			 $message= str_replace($search, $replace,isset($message)); 
	$fila=mysql_fetch_array($rsview)  //al terminar while el puntero esta en el ultimo registro		
 	?>		  
<div class="redondear-esquinas contenedor_derecha">
      <div><h1><?php echo $fila['curso'] ?> </h1></div>	
      <div>Codigo:<?php echo htmlspecialchars ($fila['nombproductos']) ?></div>
      <div class="detalleproducto"><?php echo $fila['detalle'] ?></div>
      <div class="marco_botones">
            <div align="center" class="botonfic">            
                <a href="<?php $INC_DIR . "/index.php" ?>">Regresar</a>              
            </div>  
      </div>
</div><!---fin marco_gene_view -->  