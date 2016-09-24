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
	.contenedor_boton{
		 border-radius: 20px 20px 20px 20px;
	   background-color:#333;
	   text-align:center;
	   color:#FFF;	
	   font-weight:bold;
	   width: 190px;
	   margin:0 auto;
   		margin-top:35px;
		font-size:12px;
	}
	h1	{
		text-align:center;
		margin:10px 0px;
	}
</style>
  <?php   
	include ($_SERVER['DOCUMENT_ROOT']. '/webadmin/rutinas/conexion.php');						  	 
			 $rsview=mysql_query("select * from productos where idproductos ='" .$CateId . "' and mostrar='SI'");
    		 $ntotal = mysql_num_rows($rsview); //Registros devueltos   		
	 	    
	$fila=mysql_fetch_array($rsview)  //al terminar while el puntero esta en el ultimo registro		
 	?>		  
<div class="redondear-esquinas contenedor_derecha">
      <div><h1><?php echo $fila['curso'] ?> </h1></div>	
      <div>Codigo:<?php echo htmlspecialchars ($fila['nombproductos']) ?></div>
      <div class="detalleproducto"><?php echo $fila['detalle'] ?></div>
      <div class="marco_botones">
          <a  style="color:#FFF" href="<?php $INC_DIR . "/index.php" ?>">
                <div class="contenedor_boton">            
                    Regresar              
                </div>  
           </a>     
      </div><br />
</div><!---fin marco_gene_view -->  