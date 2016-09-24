<?php	//session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'
$s1 = substr($codsecc,0,12);
$sql_query   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$modsecc."' and cnivseccion='2' order by cordcontenido asc ";				  
//echo $sql_query;exit;
$hometabla = db_query($sql_query);
$num_rows=mysql_num_rows($hometabla);

?>
<?php		
	while($rowhome  = db_fetch_array($hometabla))
	{		
		$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$rowhome['ccodclase']."'";	
		$rsstylo = db_query($sqlstylo);
		$rowstylo  = db_fetch_array($rsstylo);
		
		$nomurl   = crearurl_articulo($rowhome['ccodseccion']);  
		//echo $nomurl;exit;
		//$ruta     = "/".$nomurl."/".$rowhome['camiseccion'];									
		$ruta     = "/".$nomurl;									
?>     
  <a href='<?=$ruta?>' title='<?=$rowhome[cnomcontenido]?>'>      
 <!-- <div class='<?=$rowstylo['cdesclase']?>'>   
   ya no se utilizara estilos porque es utilizado por varios mejor que sea uno independiente-->
    <!-- <div class='ctn_panel_izq'> 	 -->
      <div class='titulo'>
          <h4><?php echo $rowhome['cnomseccion']?></h4>
      </div>           
       <div class='imagen'> 						                                        
          <img src='/timthumb.php?src=<?=$rowhome['cimgseccion'] ?>&h=100&w=120&zc=0&q=100&s=1' border=0 title='<?= $rowhome['cnomcontenido']?>' />	                  															  
       </div>             
    <!--</div>           -->
  </a>      
 <?php  } // Fin while ?>
