<?php //echo "holafdsfsd";exit;
// viene de modulo/form_buscador.php
//Verificar si esta cambiado tabla estiloseccion 12-03-2016  8802  Buscador      
//buscador_estilo01.php cambiado por  buscador_01.php                           8800

if(isset($_POST['buscar'])) 
{
	//http://www.forosdelweb.com/f86/buscar-cadena-texto-base-datos-832955/ 
	$consulta= strtolower($_POST['buscar']);	
	//split — Divide una cadena en una matriz mediante una expresión regular
	//$consulta= split(' ',$consulta); //split quedo obsoleta ahora usaremos explode
	$consulta = explode(' ',$consulta);	 
	//echo var_dump($consulta);  // Imprime el resultado de $consulta que es un array 
	//ejemplo busque la palabra "serie 53" devuelve -----  array(2) { [0]=> string(5) "serie" [1]=> string(2) "53" }
	//Repuestos para Motor Caterpillar  ------array(2) { [0]=> string(9) "repuestos" [1]=> string(4) "para" [2]=> string(5) "motor" [3]=> string(11) "caterpillar" }
	include_once $_SERVER['DOCUMENT_ROOT']."/config.php";	
	//de un campo 
	/*$sql = "SELECT * FROM contenido WHERE ";
	for($a = 0; $a < count($consulta); $a++){
	   if($consulta[$a] != ''){
		  if($a != 0)$sql .= ' AND ';
		  $sql .= " cnomcontenido LIKE '%".$consulta[$a]."%'";
	   }
	}
	
	*/   
	//de varios campos
	//Buscamos tabla  contenido= aqui solo buscamos el cnomcontenido y camicontenido  
	//tabla contenidodetalle = lo que va dentro del articulo
	$sql_query = "SELECT c.curlcontenido,c.camicontenido,c.cimgcontenido,c.cnomcontenido,c.crescontenido 
	  FROM contenido c, contenidodetalle cd  WHERE c.ccodcontenido = cd.ccodcontenido 
	 and ";
	for($a = 0; $a < count($consulta); $a++)
	 {
	  if($consulta[$a] != '')
	   {
	   if($a != 0)
	   $sql_query .= 'AND ';
		   $sql_query .= "(c.cnomcontenido LIKE '%".$consulta[$a]."%' OR cd.cdetcontenido LIKE '%".$consulta[$a]."%')" ;
	   }
	 }
	 $sql_query .= "  and c.estado=1 order by c.dfeccontenido desc";
 	//echo  $sql_query;exit;	
	//Original 
	//$buscartexto = strtolower($_POST['buscar']);	
	/*	$sql_query  = "SELECT c.curlcontenido,c.camicontenido,c.cimgcontenido,c.cnomcontenido,c.crescontenido,sc.ccodseccion 
	 FROM contenido c, contenidodetalle cd  ,seccioncontenido sc WHERE c.ccodcontenido = cd.ccodcontenido 
	AND  c.ccodcontenido = sc.ccodcontenido and (c.cnomcontenido LIKE '%".$buscartexto."%'  or 
	 cd.cdetcontenido LIKE '%".$buscartexto ."%') order by c.dfeccontenido desc";	
	*/
	$rsbusContenido      = db_query($sql_query);
	$total      = db_num_rows($rsbusContenido);	
	//echo $sql_query;exit;
	//echo $total;
}
if ($total >0) 
{
?>
	<?php while ($rowlista=db_fetch_array($rsbusContenido)) 
	{ 
	//echo "entro";exit;
	if($rowlista['curlcontenido']=="")
	{		
		//echo "curlcontenido vacio";exit;
		$nomurl        = crearurl_articulo($rowlista['ccodseccion']);
		$enlaceurl     = $nomurl.$rowlista['camicontenido'];
		$enlacedestino = "";
	}
	else
	{
		$enlaceurl     = $rowlista['curlcontenido'];
		$enlacedestino = "target='_blank'";
	}

	?>
	<div class="seccionindex100">
		<dl class="seccionindex" >
			<dt>
			<?php
			if($rowlista['cimgcontenido']!="")
			{
			?>
			<img src="<?=$rowlista['cimgcontenido']?>" border="0" title="<?=$rowlista['cnomcontenido']?>"  width="140" height="140" alt="<?=$rowlista['cnomcontenido']?>" >
			<?php } ?>
            
            </dt>
			<dd>
            <a href="<?=$enlaceurl?>" title="<?=$rowlista['cnomcontenido']?>" <?=$enlacedestino?>><?=$rowlista['cnomcontenido']?></a><br />
			<?=$rowlista['crescontenido']?>
			</dd>
		</dl>
	</div>
	<?php } ?>
<?php
}
else 
{
?>
	<p>No se encontraron datos coincidentes con el criterio de busqueda </p>
<?php } ?>