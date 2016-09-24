<?php session_start();	?>
<style type="text/css">
/*------------ Inicio Formulario --------------------*/
#formul {  
    padding: 5px 0px 0px 10px;   /* margen con valores: arriba - derecha - abajo - izquierda */ 
    font-family:verdana,arial; 
    font-size:9pt; 
}  
.campos {  
    font-family:verdana,arial;     /* tipo de letra */  
    width: 500px;                 /* anchura de campos de formulario */
	height:20px;	  
    font-size:10pt;                /* tamaño de la letra*/   
    color:#d62020;                 /* color del texto */   
    border: solid 1px #d5d5d5;        /* color del borde puede ser solid ó dotted */ 
	border-radius: 3px; 
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.05) inset;	  
    background-color:#edf5ff;    /* color del fondo */   
}
.campos_mensaje {  
    font-family:verdana,arial;     /* tipo de letra */  
    width: 500px;                 /* anchura de campos de formulario */	  
    font-size:10pt;                /* tamaño de la letra*/   
    color:#333333;                 /* color del texto */   
	border-radius: 3px; 
    border: solid 1px #d5d5d5;        /* color del borde puede ser solid ó dotted */   
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.05) inset;
    background-color:#edf5ff;    /* color del fondo */   
}    

.boton{ 
    font-size:12px; 
    font-family:Verdana,Helvetica; 
    font-weight:bold; 
    color:#0000FF; 
    background:#A4C1FF; 
    border:0px; 
    width:120px; 
    height:25px; 
} 
#b_reset {  
    margin: 0px 0px 0px 0px;    /* margen con valores: arriba - derecha - abajo - izquierda */  
} 
#b_submit {  
    margin: -25px 0px 0px 380px;    /* margen con valores: arriba - derecha - abajo - izquierda */ 
}  
.nombre_comentar{
	margin-top: 10px;
	padding: 5px 5px;
	border: 1px solid transparent;
	border-radius: 2px;
	font-size: 14px;
	background-color: #faf8e8;
	/* border-color: #f3eab2; */
	border-color: #9eac91;
	color: #333333;
	clear:both;
	text-align:center;
}  
</style>
<script type="text/javascript">
function ponerfocus(){
	document.getElementById('titulo').focus() /* al presionar el boton reset*/
} 
</script>  
<?php 
	if ($_SESSION['id_usu_web']==""){
		echo "<br>";	    
		$_SESSION['pagina_retorno']=$_SERVER["HTTP_REFERER"];
		include_once($_SERVER['DOCUMENT_ROOT'].'/include/control-usuario/form-ingresa-registrate.php');			
	}else{ ?> 
        <!----------- Inicio por poner comentario  -->
		<?php if($_SESSION['titulo_comentario']<>"") { ?>	 
           <div class="nombre_comentar">Muchas Gracias:&nbsp; <?php echo "<span class='red bold'>". strtoupper($_SESSION['nombre_usu_web']) ."</span>"?> &nbsp;por su comentario con <span class="bold">Titulo:</span><span class="red">&nbsp;<?php echo $_SESSION['titulo_comentario'] ?></span></div>
          
        <?php 
		$_SESSION['titulo_comentario']="";
		 }else{ ?>
        	   <div class="nombre_comentar">Has un Comentario :&nbsp; <?php echo "<span class='red bold'>". strtoupper($_SESSION['nombre_usu_web']) ."</span>"?></div>		
        <?php } ?> 		    
     <!----------- Fin por poner comentario  -->
   <div id="formul">               		
      <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/modulos/comentario-combinado-multiple/post_comment.php" name="mensaje"  onSubmit="return validar_form(this)">              
        <p>Titulo: <br />  
          <input class="campos" type="text" id="titulo" name="titulo" required title="Se necesita un Titulo"></p>            
           <script>document.getElementById('titulo').focus()</script>
           
          <p>Comentarios:<br />  
          <textarea class="campos_mensaje" rows="10"  id="comentario" name="comentario" required title="Se necesita un  Comentario"></textarea></p>             
    
          <div id="b_reset">  
          <input class="boton" type="reset" value="Restablecer" name="B2" onclick="javascript:ponerfocus()";> 
          </div> 
           
          <div id="b_submit"> 
          <input class="boton" type="submit" value="Enviar mensaje" name="submitbutton" id="submitbutton"> 
          </div>
          <input type='hidden' name='parent_id' id='parent_id' value='0'/> 
          <input type='hidden' name='id_usuario' id='id_usuario' value='<?=$_SESSION['id_usu_web']?>'/>
          <input type='hidden' name='id_noticia' id='id_noticia' VALUE="<?php echo $subrowcomen['ccodcontenido']; ?>">                  
          <input type='hidden' name='procedencia' id='procedencia' value='comentario usuarios'/>
      </form>  
    </div>
<?php } ?>

