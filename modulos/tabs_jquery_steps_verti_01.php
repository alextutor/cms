<?php	session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'
	$s1 = substr($rowads['ccodseccion'],0,12);
	//echo $s1 ;exit;
	$homesql   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$rowads['ccodmodulo'] ."' and cnivseccion='2' order by cordcontenido asc ";				  
	//echo $homesql;exit;
	$hometabla = db_query($homesql);	
	$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$rowads['ccodclase']."'";	
	$rsstylo = db_query($sqlstylo);
	$rowstylo  = db_fetch_array($rsstylo);

?>
 <div class="content">  
    <div id="wizard">
    <?php 
	   while($rowhome  = db_fetch_array($hometabla))
	    {
			$separar = array("", "");//poner que palabras se deve quitar 
 			$onlyconsonants = str_replace($separar, "", $rowhome['cnomseccion']);
		?>			 
        <h2><?=$onlyconsonants ?></h2>
        <section>
        <?php 
			$sql_query = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$rowhome['ccodseccion']."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.cordcontenido asc ";

		$rsquery = db_query($sql_query);
		$num_rows=mysql_num_rows($rsquery);
		while($rowitems  = db_fetch_array($rsquery)) {
			echo  $rowitems['cnomcontenido']."<br><br>";
		}
		 ?>
        </section>
    <?php } ?>    
    </div>
</div>
<link rel="stylesheet" href="/include/Tab_jquery_steps_v1/css/jquery.steps.css">
<script src="/include/js/jquery-1.9.1.js"></script>
<script src="/include/Tab_jquery_steps_v1/jquery.steps.js"></script>
<script>
  var tabs = jQuery.noConflict();
  tabs(function ()
  {
	tabs("#wizard").steps({
		headerTag: "h2",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		stepsOrientation: "vertical",
		enableAllSteps: true, 
		enablePagination: false, 
		enableContentCache: true,
		 title: "Step Title",
   content: "<p>Step Body</p>"
	});
  });
</script>
<!--
http://www.jquery-steps.com/Examples
eventos
https://github.com/rstaib/jquery-steps/wiki/Settings -->