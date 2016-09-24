<div id="formul">            
  <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/modulos/comentario-combinado-multiple/post_comment.php" name="mensaje"  onSubmit="return validar_form(this)">      
      <p>Nombre: <br />  
      <input class="campos" type="text" id="nombre" name="nombre"></p>             
       <p>Titulo: <br />  
      <input class="campos" type="text" id="titulo" name="titulo"></p>            
       
      <p>Comentarios:<br />  
      <textarea class="campos_mensaje" rows="10"  id="comentario" name="comentario"></textarea></p>      
      
      <p>E-Mail:  &nbsp;&nbsp;<br />  
      <input class="campos" type="text" id="email" name="email"></p>
<br /> 
      <div id="b_reset">  
      <input class="boton" type="reset" value="Restablecer" name="B2"> 
      </div> 
       
      <div id="b_submit"> 
      <input class="boton" type="submit" value="Enviar mensaje" name="B1"> 
      </div> 
      <input type='hidden' name='parent_id' id='parent_id' value='0'/>
      <input type='hidden' name='id_noticia' id='id_noticia' VALUE="<?php echo $subrowcomen['ccodcontenido']; ?>">                  
      <input type='hidden' name='procedencia' id='procedencia' value='comentario usuarios'/>
  </form>  
</div>