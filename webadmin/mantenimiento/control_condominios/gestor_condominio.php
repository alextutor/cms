<?Php session_start(); 	
	//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 	
	
	include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');		
	include_once($_SERVER['DOCUMENT_ROOT'].'/webadmin/mis-funciones.php');
	$modulo=$_SESSION['modulo'];//alex lo defini en index del webadmin 
	$pagew=$_SESSION['selectpage'];
	
	$mensaje=$_GET['mensaje']; 
	
?>
<SCRIPT LANGUAGE="JavaScript"> 
	function EliminaRegistro() { 
		document.forms["adminForm"].submit();
	} 
	/*para el boton buscar*/
	function validacion() {
		valor = document.getElementById("filter_search").value;
		if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		  return false;
		}
	} 
	
	function limpiar() {
		location.href='/webadmin/index.php?option=com_articulos';
	}
	function filtrar_seccion(idSelectOrigen) {
		cseccion = "<?=$idSelectOrigen?>";
		location.href='/webadmin/index.php?option=com_articulos&cBuscaporidSeccion='+idSelectOrigen;
	} 		
</SCRIPT>
<!--las imagenes estan en mis-estilos-webadmin.php 
el css esta en webadmin/css/mis-estilos-webadmin.php-->
<div id="toolbar-box">
	<div class="m">
    	<div class="pagetitle icon-48-article">
           <h2>Gestor de Condominios: Condominios.</h2>
         </div>
    	<div class="toolbar-list" id="toolbar">
            <ul>       
            
            <li class="button" id="toolbar-new">
            <a href="/webadmin/index.php?option=com_condominio_new" onclick="" class="toolbar"><span class="icon-32-new"></span>Nuevo</a>
            </li>           
                                   
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_articulos_editar',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Editar</a></li>              
            <li class="button" id="toolbar-edit">
            <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{ 
            document.forms['adminForm'].task.value='com_fotos_insertar',
            document.forms['adminForm'].submit() }" class="toolbar"><span class="icon-32-edit"></span>Insertar Fotos</a></li>
            
            <li class="divider"></li>
            <li class="button" id="toolbar-trash">
                <a  onclick="if (document.adminForm.boxchecked.value==0){alert('Por favor, primero haga una selección desde la lista');}else{
                document.forms['adminForm'].task.value='com_articulos_eliminar',
                 document.forms['adminForm'].submit() }" class="toolbar">
                <span class="icon-32-trash">
                </span>
                Papelera
                </a>
            </li>
            <li class="divider"></li>
             <li class="button" id="toolbar-cancel">
          <a href="/webadmin/index.php?option=pantallaprincipal" onclick="Joomla.submitbutton('article.cancel')" class="toolbar"><span class="icon-32-cancel"></span>Cancelar</a>
            </li>
            
            </ul>
         </div>
                     
    </div>
</div>
<div id="system-message-container">
	<?php 
		if($mensaje!="") { 
		?>
    <dl id="system-message">
        <dt class="message">Mensaje</dt>
        <dd class="message message">
            <ul>
                <li><?php echo $mensaje ?></li>
            </ul>
        </dd>
    </dl>
	<?php	   
		} 
	?>	
</div>
<div id="element-box">
	<div class="m">       
        <!---------------  Inicio lado Izquierda------------------->    
        <div class="lado_izquierda">
        	<?php include $_SERVER['DOCUMENT_ROOT']."/webadmin/mantenimiento/control_condominios/form_buscador_departamento.php";	?>              	
        </div>    
        <!---------------  Fin lado Izquierda ------------------->    
        
       <!---------------  Inicio lado Derecha------------------->    
       <div class="lado_derecha">
	   	 <div id="listado">
			<?php include $_SERVER['DOCUMENT_ROOT']."/webadmin/mantenimiento/control_condominios/gestor_condominio_listado.php";	?>           
         </div>
      </div> <!-- Fin clase lado derecha -->
</div>  <!-- Fin clase m -->

<!--
http://www.forosdelweb.com/f18/faqs-php-530600/index3.html#post518710
http://www.blogdephp.com/foro/topic/eliminacion-multiple-de-registros-en-un-listado-con-php-y-mysql-utilizando-checkbox -->
<style type="text/css">
	.art_borrado{font-weight:bold;text-decoration: line-through;color:#F00;}
	.art_normal{font-weight:bold;}
	
	.m{width:100%;display: flex;justify-content: space-between;box-sizing:border-box;Flex-wrap:wrap; }	
	.lado_izquierda{width:17%}
	.lado_derecha{width:83%}	
		
</style>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> <!-- usado tambien por #tituloel scrip de abajo-->
<script>
	$(document).ready(function(){	
		$("#selectseccion").change(function(){
			$.post("/webadmin/mantenimiento/gestor_articulo_listado.php",
			{idbuscar:'1',idseccion:$("#selectseccion").val(),nombre:$("#nombre").val(),codigo:$("#codigo").val()},
			function(data){$("#listado").html(data);})
	    });	
		
		$("#buscar").click(function(){
		  $.post("/webadmin/mantenimiento/gestor_articulo_listado.php",
		  {idbuscar:'1',idseccion:$("#selectseccion").val(),nombre:$("#nombre").val(),codigo:$("#codigo").val()},
			function(data){$("#listado").html(data);})
	    });	
	});	
</script>
