<style type="text/css">
.ctn_barra_sup_usu {
	margin-top:1px;
	padding: 5px 5px;
	border: 1px solid transparent;
	border-radius: 2px;
	font-size: 14px;	
	background-color: #faf8e8;
	/*border-color: #f3eab2;*/
	border-color: #9eac91;	
	color: #333333;
}
.bs_nomb_usuario{ font-weight:bold; float:right; margin-right:70px; }
.bs_salir{font-weight:bold; float: right;margin-right:70px;}
</style>
<div class="ctn_barra_sup_usu">
   <?php if ($_SESSION['id_usu_web']<>""){ ?>
    <div class="bs_salir"><a href="/include/control-usuario/salir.php">Salir</a></div>
    <div class="bs_salir"><a href="/configuracion">Configuracion</a></div>
     <div class="bs_salir"><a href="/comenta">Comenta</a></div>
     <div class="bs_salir"><a href="/publica">Publica</a></div>
	<div class="bs_nomb_usuario">
    	 Bienvenido:  <?php echo "<span class='red bold'>". $_SESSION['nombre_usu_web'] ."</span>"?>     
    </div>
    <?php }else{ ?>
    	<div class="bs_nomb_usuario">
   		<span class='red bold'>Bienvenido(a),</span> <span class='verde_mar bold'>Visitante </span>, Por favor , <a href="/iniciarsesion">ingresa</a> o <a href="/registrate">regístrate</a> </div>
    <?php }?>
  
    
    <div class="clear"></div>
</div>
