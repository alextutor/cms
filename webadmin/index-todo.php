<?Php  session_start();
	$_SESSION['option']=$_GET["option"];
	$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
	$id=$_GET['id'];	
	if ($_SESSION['option']!="com_seccion_new" and $_SESSION['option']!="com_sub_seccion_new" ){		
	 include ( $INC_DIR . '/webadmin/header.php');
	}
?>
    <?php if ($_GET["option"]!="com_seccion_new" and $_GET['option']!="com_sub_seccion_new"){	?>
    <link rel="stylesheet" type="text/css" href="estilos/estilo.css"/>
     <div id="border-top" class="h_blue">
    	 <span class="logo">
          <a href="http://www.sisdatahost.com" target="_blank">
            <img src="/webadmin/logo-sisdatahost.gif" alt="Venta-hosting-Dominio" width="210" height="35"></a>
      </span>
      <span class="title"><a href="/webadmin/index.php?option=pantallaprincipal">Administración</a></span>
    </div>  	
    <div id="header-box">
      <?php if ($_SESSION['permitido'] == "SI") {?>
    	<div id="module-status">
          <span class="logout">
          <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/webadmin/salir.php">Desconectar
          </a>
          </span>
        </div>
      <?php } ?>								   
      <div class="clr"></div> 
    </div> 	    
      <?php } ?>								   
       <?php if ($_GET["option"]!="com_seccion_new" and $_GET['option']!="com_sub_seccion_new"){	?>
       <div id="content-box">
             <?php } ?>								   
	 <?php 	  	
			 //include_once ( $INC_DIR . '/webadmin/seguridad/index.php'); 		  
			if (isset($_POST['username'])){
				//include_once ( $INC_DIR . '/header.php');
				//include($_SERVER['DOCUMENT_ROOT']. '/webadmin/rutinas/conexion.php');	
				//conexion a al data
				include($_SERVER['DOCUMENT_ROOT']. '/config.php');	
				$usuario=trim($_POST["username"]);
				$contrasena=trim($_POST["passwd"]);		
				//$contrasena = md5($contrasena);
				//Sentencia SQL para buscar un usuario con esos datos 
				$ssql = "SELECT * FROM usuarios WHERE nick='$usuario' and password='$contrasena' and eliminado<>'SI'"; 
				//Ejecuto la sentencia 
				$rs = db_query($ssql,$conexion); 
				$row = db_fetch_array($rs);
				
				if (mysql_num_rows($rs)!=0){ 
					//usuario y contraseña válidos 
					//defino una sesion y guardo datos 	
					//session_start(); 
					//session_register("permitido"); 
					$_SESSION['permitido']="SI";
					$_SESSION['nick']=$row["nick"] ;
					$_SESSION['id_usuario']=$row["id_usuario"] ;
					$_SESSION['alias']='' ;											
					$_SESSION['option']='pantallaprincipal';      
					//echo $_SESSION['permitido'];
					$_SESSION['selectpage']="12172806";				
					//$sqldata = "SELECT * FROM page WHERE ccodpage='12172806'";
					$sqldata = "SELECT * FROM page WHERE ccodpage=".$_SESSION['selectpage'];
					$resdata = db_query($sqldata);
					while($rowdata = db_fetch_array($resdata))
					{
						$_SESSION['webuser_aut'] = '1';
						$_SESSION['plantilla']   = $rowdata['ccodplantilla'];
						$_SESSION['page']        = $rowdata['ccodpage'];
						$_SESSION['rutaimages']  = "web/".$rowdata['ccodpage']."/fotos";						
					}	
					$_SESSION['webuser_nivel']      = "9";					
				 } else {
					$_SESSION['permitido']="NO";				
					$_SESSION['option']='';      
				}		  
			} // fin si post enviar	  			
		?>	          
       <?PHP if ($_SESSION['permitido'] != "SI") {		// INICIO SI 2 ?>     
		<div id="element-box" class="login">
              <div class="m wbg">
                <h1>Conexión a la administración de  sisdatahost.com</h1>
                <div id="system-message-container"></div>
                          <div id="section-box">
                <div class="m">
                    <form method="post" id="form-login" action="/webadmin/index.php" >
                    <fieldset class="loginform">        
                      <label id="mod-login-username-lbl" for="mod-login-username">Usuario</label>
                      <input name="username" id="mod-login-username" type="text" class="inputbox" size="15">
                    
                      <label id="mod-login-password-lbl" for="mod-login-password">Contraseña</label>
                      <input name="passwd" id="mod-login-password" type="password" class="inputbox" size="15">
                    
                      <label id="mod-login-language-lbl" for="lang">Idioma</label>
                      <select id="lang" name="lang" class="inputbox">
                    <option value="" selected="selected">Predeterminado</option>
                    <option value="en-GB">English (United Kingdom)</option>
                    <option value="es-ES">Spanish (español)</option>
                    </select>
                    
                      <div class="button-holder">
                          <div class="button1">
                              <div class="next">
                                  <a  onclick="document.getElementById('form-login').submit();">
                                      Conectar</a>
                              </div>
                          </div>
                      </div>                    
                    <div class="clr"></div>
                    <input type="submit" class="hidebtn" name='enviar' value="Conectar">
                    <input type="hidden" name="option" value="com_login">
                    <input type="hidden" name="task" value="login">
                    <input type="hidden" name="return" value="aW5kZXgucGhw">
                    <input type="hidden" name="8b29edb8587949cf49df451095aef192" value="1">	</fieldset>
                    </form>
                      <div class="clr"></div>
                </div>
            </div>
                  <p>Use un nombre de usuario y contraseña válidos para obtener acceso a la administración.</p>
                  <p style="font-size:12px;font-weight:bold; color:#F00"><a style="color: #F00" href="<?php $_SERVER['DOCUMENT_ROOT']?>/index.php">Ir a la página de inicio del sitio.</a></p>
                  <div id="lock"></div>
              </div>
            </div>

      <?php  			  
	  }	//fin si no esta permitido	    // FIN SI 2		    			  			
		if ($_SESSION['permitido'] == "SI") {
			switch ($_SESSION['option']) {
			 case "pantallaprincipal": 
			 	include_once ( $INC_DIR . '/webadmin/pantalla-principal.php'); 
				 break;				 
			case "com_articulos": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-articulos.php'); 
				 break;	
			case "com_articulos_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-articulo.php'); 
				 break;				
			case "com_articulos_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-articulo.php'); 
				 break;
				 
			case "com_categoria": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-seccion.php'); 
				 break;	
			case "com_seccion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-seccion.php'); 
				 break;				
			case "com_seccion_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-seccion.php'); 
				 break;	 				 				 	 	 				 					 	 							 				 break;	
			case "com_sub_seccion_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-subseccion.php'); 
				 break;		
				 
			 case "com_categories": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-categoria.php'); 
				 break;				
			 case "com_categories_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/FormInsertarCategoria.php'); 
				 break;
			 case "com_categories_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/FormActualizaCategoria.php'); 
				 break;			
			 case "com_sub_categories": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-sub-categoria.php'); 
				 break;				
			 case "com_sub_categories_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/FormInsertarSubCategoria.php'); 
				 break;
			 case "com_sub_categories_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/FormActualiza-Sub-Categoria.php'); 
				 break;
			case "com_cursos": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-cursos.php'); 
				 break;	
			case "com_cursos_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-cursos.php'); 
				 break;				
			case "com_cursos_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Actualiza-Cursos.php'); 
				 break;					 	 			 	 	
			 case "com_menus": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu.php'); 
				 break;
			 case "com_menus_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-Insertar-elemento-Menu.php'); 
				 break;
			 case "com_menus_editar": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-actualiza-menu.php'); 
				 break;					 	 			 	 				
			 case "com_menus_elemen": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu-elementos.php'); 
				 break;
			 case "com_menus_elemen_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-menu-elementos.php'); 
				 break;		
			 case "com_elementos_pie": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-elementos-pie.php'); 
				 break;				  					 	 			 	 				
			 case "com_elementos_pie_new": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/Form-insertar-elementos-pie.php'); 
				 break;				  	 				 
			 case "com_presentacion": 
			 	include_once ( $INC_DIR . '/webadmin/mantenimiento/gestor-presentacion.php'); 
				 break;				
			  case "com_presentacion_new": 
			 	include_once ( $INC_DIR . '/webadmin/tablero_new.php'); 
				 break;	
			 }	 			 			 			 	  		  	
		  }		  
	  ?>   
	<?php if ($_GET["option"]!="com_seccion_new" and $_GET['option']!="com_sub_seccion_new"){	?>
    	 <div class="clr"></div>
	  </div> <!--fin content-box -->
     <?php } ?>		
             
  <script type="text/javascript">
            try{document.getElementById('mod-login-username').focus();}catch(e){}
   </script>
            
  <script type="text/javascript" src="js/jsweb.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="/webadmin/js/core.js"></script>
 <?php     include_once ($INC_DIR . '/footer.php');  ?>