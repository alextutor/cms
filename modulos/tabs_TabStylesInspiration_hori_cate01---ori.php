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
<!-- ver para que sirve 
<script src="/include/TabStylesInspiration/js/modernizr.custom.js"></script>
 -->
<link href="/include/TabStylesInspiration/css/tabs.css" rel="stylesheet"/>
<link href="/include/TabStylesInspiration/css/tabstyles.css" rel="stylesheet"/>
<link href="/include/TabStylesInspiration/css/demo.css" rel="stylesheet"/>
<section>
	<div class="tabs tabs-style-line">
        <nav>
            <ul>
	         <?php 
			 $x=1;
			 while($rowhome  = db_fetch_array($hometabla)) {
				 // Produce: Hll Wrld f PHP
				$vowels = array("Cursos", "de");
				$onlyconsonants = str_replace($vowels, "", $rowhome['cnomseccion']);
			  ?>				
                <li><a href="#section-line-<?=$x?>"><span><?=$onlyconsonants ?></span></a></li>                
             <?php $x++;} // Fin while    ?>
            </ul>
        </nav>
        <div class="content-wrap">
            <section id="section-line-1"><p>1</p></section>
            <section id="section-line-2"><p>2</p></section>
            <section id="section-line-3"><p>3</p></section>
            <section id="section-line-4"><p>4</p></section>
            <section id="section-line-5"><p>5</p></section>
            <section id="section-line-5"><p>5</p></section>
        </div><!-- /content -->
   </div><!-- /tabs -->
</section>
<script src="/include/TabStylesInspiration/js/cbpFWTabs.js"></script>
<script>
  (function() {

	  [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
		  new CBPFWTabs( el );
	  });

  })();
</script>