<div class="ctn_contactos">
	<div class="iz_contac_container">
 	<div id="stylized" class="myform">
            <form id="frmcontactenos" name="frmcontactenos" method="POST" action="#">
            <h1><?php echo $webtituempre ?></h1>
            <p>Enviar un correo electrónico. Todos los campos con el asterisco ('*') son obligatorios.</p>
            <hr>
            <div class="spacer">
                <label>Nombre</label>
                <input name="nombre" type="text" required id="nombre" title="Se necesita un nombre" size="80"/>
                <script>document.getElementById('nombre').focus()</script>
            </div>
            <div class="spacer">
                <label>Correo electrónico</label>
                <input type="email_cliente" name="email_cliente" id="email_cliente"  size="80" required title="Ej: micorreo@hotmail.com" />
             </div>
             <div class="spacer">
                <label>Telefono:</label>
                <input type="telefono" name="telefono" id="telefono"  size="80"  title="" />
             </div>
            <div class="spacer">
                <label>Asunto</label>
                <input name="asunto" type="text" required id="asunto"  title="Ingrese el Asunto" size="80"/>
            </div>
            <div class="spacer">
                <label>Mensaje</label>
				<textarea cols="50" id="mensaje" name="mensaje" rows="10" required>
                </textarea>                
            </div>
            <button type='submit' name="submitbutton" id="submitbutton">Enviar</button>
            <div class="spacer"></div>
            </form>
            </div>
    </div>
    <div class="der-container">
    	<h2><?php echo $webtitu ?></h2>
        <div class="contenido">
            <ul class="lists">
                <li class="mail"><span class="icon"></span>Responsable:  
                    <a href="mailto:<?php echo $emailcontacto ?>"><?php echo $emailcontacto ?></a>
                </li>
            </ul>
            <h4><?php echo $cdistrito."  -  ". $cprovincia ?></h4>
            <ul class="lists">
                <li class="location"><span class="icon"></span>
                    <?php echo $cdirecempresa ?>  
                </li>
                  <li class="chart"><span class="icon"></span>
                  	<?php echo $chorarioatencion ?> 					 
                  </li>    

                <li class="iphone"><span class="icon"></span>
                    <?php echo $ctelefonopri ?>  
                </li>
                <?php if ($ctelefonosec !="") {	?>
                <li class="iphone"><span class="icon"></span>
                    <?php echo $ctelefonosec ?>  
                </li>
                <?php } ?>
            </ul>        
        </div>
    </div>
    <div style="clear:both"></div>
</div>
<div style="clear:both"></div>