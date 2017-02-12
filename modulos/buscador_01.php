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
    <div class="titulo_list_buscar"> Listado de Productos que contienen el articulo <span><?=strtoupper($_POST['buscar']); ?></span> </div>
	<?php while ($rowlista=db_fetch_array($rsbusContenido)) 
	{ 
		
		//echo $rowlista['cimgcontenido']."dadasd";exit;
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
		} // Fin if $rowlista['curlcontenido']==""	
	?>
    <div class="portada_item"> 
	  <div class="portada_item_imagen"> 
         <a href="<?=$enlaceurl?>" title="<?=$rowlista['cnomcontenido']?>" <?=$enlacedestino?>>
              <?php if(!empty($rowlista['cimgcontenido'])) { ?>
              <img alt="<?=$rowlista['cnomcontenido']?>" src="/timthumb.php?src=<?php echo $rowlista['cimgcontenido']; ?>&h=60&w=80&zc=0&q=100&s=1" width="80px" height="60px" border="0"/>
              <?php
				}else {
			  ?>
               <img alt="<?=$rowlista['cnomcontenido']?>" src="/timthumb.php?src=/imagen/para-todos/imagen-no-disponible-2.png&h=60&w=70&zc=0&q=100&s=1" width="70px" height="60px" border="0"/>
              <?php } // Fin if(!empty($rowlista['cimgcontenido'])) ?>
         </a>       
   	  </div>      
      <div class="portada_item_contenido">
      	<div class="portada_item_contenido_titulo">     
          <a href="<?=$enlaceurl?>" title="<?=$rowlista['cnomcontenido']?>" <?=$enlacedestino?>>	
           <?php echo $rowlista['cnomcontenido']; ?>     
          </a>
      	</div>
        <div class="portada_item_contenido_detalle">                 
        	<?php echo $rowlista['crescontenido']; ?>     
        </div>      
      </div>                
    </div>
  <?php } // Fin while $rowlista=db_fetch_array($rsbusContenido) ?>  
	
<?php
}else {
?>
	<div class="noencontrado_buscar">No se encontraron datos coincidentes con el criterio de busqueda </div>
<?php } // Fin if $total >0 ?>
<style>
.titulo_list_buscar{ text-align:center;font-weight:bold; margin-bottom:10px;}
.titulo_list_buscar span{ font-size:14px; font-weight:bold; margin-left:5px; color:#FA811B}
.noencontrado_buscar{ }
</style>