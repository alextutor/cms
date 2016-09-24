<?php	session_start();
//echo "has entrado en foto_lstado_hori_categoria_superiror.php";exit;
//sacar de  foto_ctn_izq.php en enlace
$modulo=1400;//fotos webmodulos
$s1 = substr($codsecc,0,12);//substr($rowads['ccodseccion'],0,12);
$homesql   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$modulo ."' and cnivseccion='2' order by cordcontenido asc ";				  
//echo $homesql;exit;
$hometabla = db_query($homesql);
$num_rows=mysql_num_rows($hometabla);

$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$ccodclase ."'";	
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);
//echo $num_rows;exit;
?>

<div id='<?=$rowstylo['cdesclase']?>'> 
<?php
	//$nromenucab = db_num_rows($hometabla);echo $nromenucab;exit;	
	while($rowhome  = db_fetch_array($hometabla))
	{
		$nomurl   = crearurl_articulo($rowhome['ccodseccion']); //crearurl_articulo viene de include/funciones_web.php 
		//echo $nomurl;exit;
		//$ruta     = "/".$nomurl."/".$rowhome['camiseccion'];									
		$ruta     = "/".$nomurl;
?>     
	 <div class='detalle'>   
       <div class='titulo'>
          <h4><?php echo $rowhome['cnomseccion']?></h4>
       </div>           
       <a href='<?=$ruta?>' title='<?=$rowhome[cnomcontenido]?>'>
       <div class='imagen'> 						                                        
           <img src='<?=$rowhome['cimgseccion'] ?>'  width="90%" border=0 title='<?= $rowhome['cnomseccion']?>' />	 
           
           <!--
          <img src='/timthumb.php?src=<?=$rowhome['cimgseccion'] ?>&h=180&w=240&zc=0&q=100&s=1' border=0 title='<?= $rowhome['cnomseccion']?>' />	 
           -->
                           															  
       </div>             
       </a>      
  </div>        
<?php  } // Fin while  ?>
</div>