<style type="text/css">
	.contenido	{		
		margin-right:10px;		
	}
  .areas li 
	{ 
	display: inline; 
	padding-right: 20px;
  } 
</style> 
<?php 
//echo "hola";exit;
$webubica ="3"; // Columna Central
//$codsecc  cadena vacia
if (empty($_GET['idsec'])){	//aqui entra pagina principal	
	//$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and  p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");	
		
	//alex modifique pra que tomara estilos
	$sql="SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
	$sqlc= db_query($sql);	
  //echo $sql;exit;
}else{	

	//aqui NO entra pagina principal
	//$sqlc= db_query("SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ");
	
	//alex modifique para que tomara estilos
	$sql="SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
	$sqlc= db_query($sql); 
 	
}	

while($rowc  = db_fetch_array($sqlc))
{	
	if ($rowc['ctiphome']=='4') //contenido dinamico aqui entra a repuestos,productos en home
	{			
		//cclase sustituito por cdesclase
		//echo $sql;
		//echo $rowc['cnomhome']."---".$sql;exit;
?>		
	<!--<div id='<?=$rowc['cdesclase']?>'> -->
    <div id="ctn_conte_dinamico_<?=$rowc['cdesclase']?>">	
		<?php
            if ($rowc['mostrar_titulo']=='si'){
                    echo "<h2>".$rowc['cnomhome']."</h2>";
            }
            /* fue quitado porque se en stilo-lis-hori-img-01.php se repetia y alli se puso el detalle dentro de while*/	
            //echo "<div class='".$rowc['cdesclase']."_detalle'>"; 
               contenidosweb($rowc['ccodinicio']);				
             //echo "</div>";		
        ?>   
    </div>			 
    <?php    
	}
	else
	{		
		// pasa aqui cuando muestra central
		contenidosweb($rowc['ccodinicio']);
	}
	//echo $rowc['ctiphome'];
}
?>