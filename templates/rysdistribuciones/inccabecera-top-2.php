<!-- Table: webparametros  filtrar por campo ccodparametro=0004 Cabecera TOP-2 valor cvalparametro=7
 Posicion = entre el logo y el menu en la tabla  pagehome   se graba con cubidestino =7 -->

<div id="cabecera_posicion4">
    <?php
	$webubica="7";
	if (empty($_GET['idsec'])){ //aqui entra pagina principal	
		/* $sqltop2="SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='9' and p.cesthome='1' order by p.cordpublica "; */
		
		//alex modifique pra que tomara estilos copiado de inccontenido.php
		$sqltop2="SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and  ( d.ccoddestino='D' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
		
	 }else{
		
		/* $sqltop2="SELECT p.*,d.ccoddestino,p.cordpublica FROM pagehome p, pagehomedet d where p.ccodinicio=d.ccodinicio and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='9' and p.cesthome='1' order by p.cordpublica ";		*/
	
	//alex modifique para que tomara estilos
	$sqltop2="SELECT p.*,d.ccoddestino,p.cordpublica,e.cdesclase FROM pagehome p, pagehomedet d ,estiloclases e where p.ccodinicio=d.ccodinicio and e.ccodclase = p.ccodclase and p.ccodpage ='".$codpage."' and ( d.ccoddestino='".$codsecc."' or d.ccoddestino='T') and p.cubidestino='".$webubica."' and p.cesthome='1' order by p.cordpublica ";
		 
	}	 
	$sqlc= db_query($sqltop2);
	 //echo $sqltop2;exit;
	while($rowc  = db_fetch_array($sqlc)) { ?>	
		<div id="<?=$rowc['cdesclase']?>">
			<?php	if ($rowc['mostrar_titulo']=='si') { ?><h3><?=$rowc['cnomhome']?></h3> <?php } ?> 	 
			<!--<div id="<?=$rowc['cdesclase'].'contenido'?>">-->
				<?php  contenidosweb($rowc['ccodinicio']);?>
			<!--</div> -->
		</div>
	<?php } /* fin while*/?>
</div>