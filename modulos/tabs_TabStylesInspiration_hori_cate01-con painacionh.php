<?php	session_start();// viene de funciones_web.php  (Contenido Dinamico) $rowads['ctiphome']=='4'   
	$s1 = substr($rowads['ccodseccion'],0,12);
	//echo $s1 ;exit;
	$sqlhome   = "Select * FROM seccion where ccodseccion like '".$s1."%' and ccodmodulo='".$rowads['ccodmodulo'] ."' and cnivseccion='2' order by cordcontenido asc ";				  
	//echo $homesql;exit;
?>
<style type="text/css">
.post {width: 95%;margin-bottom: .5em;padding: 0.5em; clear:both;
border: 1px solid rgba(0, 0, 0, 0.15);border-radius: 5px;
box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1) inset;overflow:hidden;}
.post .image_post {float: left;width: 30%;}
.post .conteni_post {float: left;width: 65%;margin-left: 15px;}
.post .titulo_post {margin-bottom: 24px;margin-bottom: 5px; color:#006c97}
.post .titulo_post h1 { font-size:13px; text-align:left; font-weight:bold;margin-bottom: 2px;}
.post .titulo_post a:visited {color:#006c97}

.post .publicado_hace {font-size: 11px;font-weight: normal;line-height: 22px;float: left;width: 99%;
background: url(imagenes/icon-time.png) no-repeat top left;padding: 0px 0 0px 3px;}
.post .resumen { font-size:13px; text-align: left; margin-top:10px;}
.post .continua_leyendo {margin-bottom: 5px;float: right;margin-right: 15px; margin-top:5px; font-weight:bold; background-color:#EF8585; padding:5px 9px; border-radius:10px; font-size:13px;}
.post .continua_leyendo a:visited  {color: #FFF;}
.post a:visited {text-decoration: none;color: #1b0e05;font-weight: bold;}
.post:hover{background-color:#9eac91; cursor:pointer;}
</style>  
<!-- ver para que sirve 
<script src="/include/TabStylesInspiration/js/modernizr.custom.js"></script>
 -->
 
 <!-- modulo paginacion 
http://www.masquewordpress.com/paginacion-php-con-clase/
-->
<link  href="/templates/<?=$cnomplantilla?>/estilos/paginacion.css"	rel="stylesheet" type="text/css">   
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/paginator.class.php'); ?>
<style type="text/css">
	.barra_navegacion { width:50%; margin:10px auto}
</style>
<!-- modulo paginacion -->

<link href="/include/TabStylesInspiration/css/tabs.css" rel="stylesheet"/>
<link href="/include/TabStylesInspiration/css/tabstyles.css" rel="stylesheet"/>
<link href="/include/TabStylesInspiration/css/demo.css" rel="stylesheet"/>
<section>
<div class="tabs tabs-style-topline">
    <nav>
        <ul>
    <!--Inicio Aqui empieza la cebecera toma todo de seccion -->
       <?php 
		 $rstabla = db_query($sqlhome);	
		$sqlstylo   = "Select * FROM estiloclases  where ccodclase='".$rowads['ccodclase']."'";	
		$rsstylo = db_query($sqlstylo);
		$rowstylo  = db_fetch_array($rsstylo);
         $x=1;
         while($rowhome  = db_fetch_array($rstabla)) {	 //  while 1			 
            $vowels = array("Cursos", "de");
            $onlyconsonants = str_replace($vowels, "", $rowhome['cnomseccion']);
          ?>				
            <li><a href="#section-topline-<?=$x?>"><span><?=$x.")".$onlyconsonants ?></span></a></li>                
         <?php $x++;} // Fin while  1   ?>
        </ul>
    </nav>
   <!--Fin Aqui Termina la cebecera toma todo de seccion -->
   <!--Aqui ya termina cabecera aqui abajo solo se mostrara el contenido -->
   
     <!--Inicio Aqui empieza el contenido de cabecera toma todo de contenido segun cabecera-->
    <div class="content-wrap">
		<?php
		$xconte=1; 
		$rsconte = db_query($sqlhome);	
		// aqui vuelve a consultar cabecera y segun eso hace otra consulta de su contenido 
		// se repite la consulta de ariba
		while($rowconte  = db_fetch_array($rsconte)) { //  while 2										 
			?>            
             <section id="section-topline-<?=$xconte?>">
             <?php
			  $codsecc=$rowconte['ccodseccion']; 
			 $sqlcontenido1 = "SELECT * FROM  contenido c, seccioncontenido s WHERE c.ccodcontenido=s.ccodcontenido  and s.ccodseccion = '".$rowconte['ccodseccion']."' AND c.cestcontenido='1' and c.ccodcategoria='1' and c.estado='1' order by c.cordcontenido asc ";
			 
 //----------------- Inicio Paginacion de contenido de cabecera alex ----------------------
$rspaginacion = db_query($sqlcontenido1);
$num_rows=mysql_num_rows($rspaginacion);
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}
$pages = new Paginator;
$pages->items_total = $num_rows; //cuantos registros se mostraran
// Configuramos el total de links a mostrar. Por ejemplo el valor <br />
//por defecto es 7 . Si estamos en la pág 50 mostraria : 47 47 49 50 51 52 53 
$pages->mid_range = 3; 
$pages->items_per_page= $rowconte['cpagseccion']; // $pagsecc viene de index.php
$pages->paginate();
$tabcpagseccion=$rowconte['cpagseccion'];
 if($tabcpagseccion<$num_rows){?> <div class="barra_navegacion"><?=$pages->display_pages();?></div> <?php } 
//----------------- Fin Paginacion ----------------------
			 $rscontenido1 = db_query($sqlcontenido1 . " $pages->limit " );
			//$num_rows=mysql_num_rows($rscontenido1);
			while($rowcontenido1  = db_fetch_array($rscontenido1)) {
				//echo  $rowcontenido1['cnomcontenido']."<br><br>";
				
				//Inicio viene de articulo_estilo02.php
				if($rowcontenido1['curlcontenido']=="")
				{
					$nomurl        = crearurl_articulo($rowcontenido1['ccodseccion']);
					$enlaceurl     = "/".$nomurl."/".$rowcontenido1['camicontenido'];
					$enlacedestino = "";
			
				}
				else
				{
					$enlaceurl     = $row['curlcontenido'];
					$enlacedestino = "target='_blank'";
				}
				//Fin viene de articulo_estilo02.php
			?>	
     <!------------- Inicio viene de articulo_estilo02.php  ------------------>       
  <article class="post" class-hover="post" >
      <div class="image_post">
          <?php
          if($rowcontenido1['cimgcontenido']!=""){ ?>
          <a href="<?=$enlaceurl?>" title="<?=$rowcontenido1['cnomcontenido']?>" <?=$enlacedestino?>>
              <img src="/timthumb.php?src=<?php echo $rowcontenido1['cimgcontenido']; ?>&w=140&h=100&zc=0&q=100&s=1" border="0" 
              title="<?=$rowcontenido1['cnomcontenido']?>"  alt="<?=$rowcontenido1['cnomcontenido']?>" align="left" >
          </a>    
          <?php } ?>             
      </div>      
      <div class="conteni_post">
          <header class="titulo_post">
            <h1>
                <a href="<?=$enlaceurl?>" title="<?=$rowcontenido1['cnomcontenido']?>" <?=$enlacedestino?>>
                <?=$rowcontenido1['cnomcontenido']?></a>
            </h1>                       
          </header>        
           <div class="publicado_hace">Fecha de Publicación : <time datetime="<?=$rowcontenido1['dfeccontenido']?>"><?=traducefecha($rowcontenido1['dfeccontenido'],"N")?></time></div>                  
           <div class="resumen"><?=$rowcontenido1['crescontenido']?></div>       
            <div class="continua_leyendo">                      
             <a href="<?=$enlaceurl?>" title="<?=$rowcontenido1['cnomcontenido']?>" <?=$enlacedestino?> style="color:#FFF" >               Continúa Leyendo
             </a>
            </div>       
    </div>            
  </article>
       <!------------- Fin  viene de articulo_estilo02.php  ------------------>       
			<?php }  ?>
             </section>                   
        <?php $xconte++;
		 } // Fin while 2 ?>    
         		  
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