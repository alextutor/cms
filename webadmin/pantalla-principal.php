<?php  
  //echo $_SESSION['nick'] . $_SESSION['nivel'];exit; 
?>
<!--webadmin/css/mis-estilos-webadmin.php -->
<div id="element-box">
      	<div class="m">
         <div class="adminform">
            <div class="cpanel-left">
              <div class="cpanel">  
              	 <?php 
				// echo $_SESSION['nivel']."---------------";exit;
				 if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>              
                 <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_articulos_new">
	                <img src="/webadmin/imagen/header/icon-48-article-add.png" width="48" height="48" alt=""/><span>Añadir Nuevo Artículo</span></a>
                  </div></div> 
                 <?php } ?>     
                  <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>            
                  <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_articulos_Excel_new">
	                <img src="/webadmin/imagen/header/icon-48-new-excel.png" width="48" height="48" alt=""/>
                    <span>Añadir Artículo Excel</span></a>
                  </div></div>                  
	             <?php } ?>     
                <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>            
                  <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_articulos&ipp=25">
                  <img src="/webadmin/imagen/header/icon-48-article.png" alt=""><span>Gestor de artículos</span></a></div></div>
                <?php } ?>      
                <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>            
                  <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_categoria">
	                <img src="/webadmin/imagen/header/icon-48-article.png" width="48" height="48" alt=""/><span>Gestor de Categorias</span></a>
                  </div></div>   
                <?php } ?> 
                 <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>      
                    <div class="icon-wrapper"><div class="icon">
                        <a href="/webadmin/index.php?option=com_empresa">
                       <img src="/webadmin/imagen/header/icon-48-article.png" width="48" height="48" alt=""/>
                       <span>Gestor de Empresas</span></a>                               
                    </div></div>   
                 <?php } ?>    
                 <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>      
                    <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_estilos_web">
                       <img src="/webadmin/imagen/header/icon-48-article.png" width="48" height="48" alt=""/>
                       <span>Gestor de Estilos Web</span></a>                               
                    </div></div>                    
                 <?php } ?>   
                 <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>      
                      <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_agencia">
                        <img src="/webadmin/imagen/header/icon-48-article.png" width="48" height="48" alt=""/><span>Gestor de Agencias</span></a>
                      </div></div>                                                                                               
				 <?php } ?> 
                 <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>                   
                    <div class="icon-wrapper">
                        <div class="icon"><a href="/webadmin/index.php?option=com_menus">
                         <img src="/webadmin/imagen/header/icon-48-menumgr.png" alt=""><span>Gestor Menús</span></a></div>
                   </div> 
  				 <?php } ?> 
                 <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>                   
                 <div class="icon-wrapper">
                   <div class="icon"><a href="/webadmin/index.php?option=com_usuario">
	                 <img src="/webadmin/imagen/header/icon-48-menumgr.png" alt=""><span>Gestor Usuarios</span></a></div>
                 </div>              
                 <?php } ?> 
                 <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>                   
                      <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_videos">
                          <img src="/webadmin/imagen/header/icon-48-article.png" alt=""><span>Gestor videos</span></a></div>
                      </div>
				<?php } ?>               
                <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>                   
                   <div class="icon-wrapper"><div class="icon"><a href="/webadmin/index.php?option=com_fotos_album">
                      <img src="/webadmin/imagen/header/icon-48-article.png" alt=""><span>Gestor Fotos Album</span></a></div>
                  </div>
				<?php } ?>   
                <?php if ($_SESSION['nivel'] == "ADMINISTRADOR") { ?>                               
                  <div class="icon-wrapper">
                  	<div class="icon"><a href="/webadmin/index.php?option=com_presentacion">
                      	<img src="/webadmin/imagen/header/icon-48-article.png" alt=""><span>Presentacion</span></a>
                    </div>
                  </div>             
				<?php } ?>  
                 
				 <!----------------------- Inicio GALOP Condominio ---------------------------->
				 
				 <?php if ($_SESSION['nivel'] == "ADMIN_CONDOMINIO") { ?>              
                   <div class="icon-wrapper">
                  	<div class="icon"><a href="/webadmin/index.php?option=com_gestor_condominio">
                      	<img src="/webadmin/imagen/header/icon-48-article.png" alt="">
                        <span>Condominio</span></a>
                    </div>
                  </div>     
                 <?php } ?>    
                 
                 <?php if ($_SESSION['nivel'] == "ADMIN_CONDOMINIO") { ?>              
                   <div class="icon-wrapper">
                  	<div class="icon"><a href="/webadmin/index.php?option=com_gestor_secciones_condominio">
                      	<img src="/webadmin/imagen/header/icon-48-article.png" alt="Las secciones se refieren a Torres, Clusters, Sectores, Calles, etc.">
                        <span>Sección</span></a>
                    </div>
                  </div>     
                 <?php } ?>     
                 
                  <?php if ($_SESSION['nivel'] == "ADMIN_CONDOMINIO") { ?>              
                   <div class="icon-wrapper">
                  	<div class="icon"><a href="/webadmin/index.php?option=com_gestor_departamentos">
                      	<img src="/webadmin/imagen/header/icon-48-article.png" alt=""><span>Departamentos</span></a>
                    </div>
                  </div>     
                 <?php } ?>   
                 
                 <?php if ($_SESSION['nivel'] == "ADMIN_CONDOMINIO") { ?>              
                   <div class="icon-wrapper">
                  	<div class="icon"><a href="/webadmin/index.php?option=com_gestor_propietarios">
                      	<img src="/webadmin/imagen/header/icon-48-article.png" alt=""><span>Propietarios</span></a>
                    </div>
                  </div>     
                 <?php } ?>                      
                                  
             </div>                    
            </div>
            <div class="cpanel-right">
            	<!-- Lado Derecho -->
            </div>
         </div>
         <div class="clr"></div>
      </div>
  </div>