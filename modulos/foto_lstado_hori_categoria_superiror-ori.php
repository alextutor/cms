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
<?php
//$nromenucab = db_num_rows($hometabla);echo $nromenucab;exit;	
	echo "<div class='ctn_lis_hori_cate_supe'>";	
	 $i=1;	
     $num_por_fila =3; 
     $contador= 0;	  		
	while($rowhome  = db_fetch_array($hometabla))
	{
		$nomurl   = crearurl_articulo($rowhome['ccodseccion']); //crearurl_articulo viene de include/funciones_web.php 
		//echo $nomurl;exit;
		$ruta     = "/".$nomurl."/".$rowhome['camiseccion'];							
		 if ($contador == 0) {  //si 1
		  	if ($num_rows==4 and $i==4 ) {  //si 1.1
				//echo "<div style='margin: 0 auto;width: 300px;'>";  //abre 1
			} ////fin si 1.1
			//echo "<div style='margin: 0 auto;'>";  //abre 1		  	 
		  }   //Fin Si 1
 	   if ($contador < $num_por_fila) {  //si 2 	   	
?>     
  <a href='<?=$ruta?>' title='<?=$rowhome[cnomcontenido]?>'>      
  <div id='<?=$rowstylo['cdesclase']?>'>  
      <div class='titulo'>
          <h4><?php echo $rowhome['cnomseccion']?></h4>
      </div>           
       <div class='imagen'> 						                                        
          <img src='/timthumb.php?src=<?=$rowhome['cimgseccion'] ?>&h=110&w=250&zc=0&q=100&s=1' 
          border=0 title='<?= $rowhome['cnomseccion']?>' />	                  															  
       </div>             
    </div>                 
  </a>      
  <?php   
  	      ++$i;			 				   	   
		   $contador++; 			
		}   //Fin Si 2					
		if ($contador == $num_por_fila) {  // si 3
			$contador=0;
   			   echo"<div style='clear:both'></div>";
			 // echo"</div>"; 			 
		}   //Fin Si 3		
		       
   } // Fin while 
   echo "</div>";/*Fin ctn_lis_hori_cate_supe*/
?>