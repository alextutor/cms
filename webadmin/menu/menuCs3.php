<link rel="stylesheet" href="/webadmin/menu/css/megamenu.css" type="text/css" media="screen" />
<style type="text/css" >
	.tituloempresa{
		color:#da8a00;
		padding-top:8px;
		text-align:center;
		
		font-size: 21px;
		font-weight: 400;
		letter-spacing: -1px;		
	}
</style>
<body> 
<!--<div id="wrapper_menu">  BEGIN MENU WRAPPER -->
    <ul class="menu menu_red"><!-- BEGIN MENU -->    
        <li><a href="../index.php" class="drop">Inicio</a><!-- Begin Home Item -->        
            <div class="dropdown_2columns"><!-- Begin 2 columns container -->        
                <div class="col_2 firstcolumn">
                 <div class="tituloempresa">Bienvenidos a </div>
                  <div style="margin-top:5px;"><h2 style="text-align:center"><a href="../index.php"><?php echo $webtitu ?></a></h2></div>
                  <div style="width:80px; float:left; margin-left:10px;" >                  	
                  	<?php if ($logoweb !="") {	?>	
                    <img src="<?php echo $logoweb ?>" width="60" height="60" alt="" />
					<?php }else { ?>
                    <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/webadmin/menu/imagen/logo-alternativo.gif" width="70" height="70" alt="" />
                    <?php } ?>
                </div>            
                <div style="width:210px;float:left; ">
                    <p style="font-size:14px; text-align:justify"><?php echo $webdesc ?></p>
                </div>                         

</div>
     </div><!-- End 2 columns container -->       
        </li><!-- End Home Item -->
        <!----------------------------------------------------------------------> 
      <li><a href="/quienes-somos" >Quienes Somos</a></li>                   
        
        <!---------------------------------------------------------------------->
        <li><a href="/servicios" class="drop">Servicios</a><!-- Begin 1 column Item -->       
            <div class="dropdown_1column"><!-- Begin 1 column container -->               
                <div class="col_1 firstcolumn">                
                    <ul class="levels">                                     
                        <li><a href="/servicios/reparaciones-de-celulares-chinos" class="parent">
                        1) Reparación Celulares Chinos.</a>                           
                        </li>                                               
                       <li><a href="/servicios/profesor-de-reparaciones-de-celulares" class="parent"
                       >2) Profesor de Reparaciones de Celulares.</a>
                        </li>                                               
                       <li><a href="/servicios/desbloqueo-celulares" class="parent">
                       3) Desbloqueo Celulares.</a>                            
                        </li>                            
                    </ul>                        
                </div>           
            </div><!-- End 1 column container -->       
        </li>
        <!----------------------------------------------------------------------------------->
          <li><a href="/cursos">Productos</a></li> 
     <li><a href="/mapa-ubicacion">Mapa Ubicación</a></li>          
     <li><a href="/contactenos">Contactenos</a></li>     

  </ul><!-- END MENU -->
<!-- </div> END MENU WRAPPER -->
</body>
</html>
