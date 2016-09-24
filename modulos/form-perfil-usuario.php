<?php session_start(); 
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');
if (empty($_GET['idsec2'])){ 
	//echo "holasss";
	exit;
}
$sql_usuario = "SELECT nick,nombre,email,telefono,imagenfoto,patrulla,facebook,id_conpania,AES_DECRYPT(password,'$llavesita') as password FROM usuarios WHERE nick= '".$_GET['idsec2']."'";
$rs=db_query($sql_usuario); 
while ($row_usu = db_fetch_array($rs))
{
	//echo $row_usu['nombre']."ddd";exit;
?>
<style type="text/css">
.ctn_pefil_usuario {
  max-width:100%;
  margin: 0 auto; 
  color:#333;
}
#stylized .facebook{
		display:block;
		font-weight:bold;
		text-align:left;
		width:110px;
		float:left;
		margin-left: 10px;
		margin-top: 5px;
		margin-bottom:10px;
	}
	
	
form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; padding-bottom:1px;}
/* ———– My Form ———– */
.myform{
	margin:0 auto;
	max-width:580px;
	padding:14px;
}
	#stylized{ border:solid 1px #9eac91;background: #F2EFEE;}
	#stylized h1,h2,h3,h4 {	
		margin-bottom:8px;
		margin: 15px 0;
		line-height: 1.3em;
		padding-left: 5px;
	}
	#stylized h1 {font-size:22px;}
	#stylized h2 {color:#B3876A;font-size:14px;text-align:center;}	
	#stylized h4 {font-size: 22px;}
	#stylized p{font-size:11px;color:#666666;padding-bottom:10px;}
	#stylized label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:110px;
		float:left;
		margin-right: 0px;
		margin-top: 5px;
	}
	#stylized .imagen{float:left;margin:5px;width:20%;}
	#stylized .texto{float:left; margin-left:15px;width:75%; text-align: justify; color:#FFF; font-weight:bold}
	#stylized .small{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		max-width:140px;
	}
	#stylized input{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		max-width:360px;
		margin:2px 0 10px 10px;
		font-weight:bold;
		color:#F00;
	}
	#stylized textarea{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		max-width:360px;
		margin:2px 0 10px 10px;
		font-weight:bold;
	}
	#stylized .texcorto{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;
		max-width:200px;
		margin:2px 0 10px 10px;
		font-weight:bold;
	}		
	#stylized select{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #aacfe4;		
		margin:2px 0 5px 10px;
		font-weight:bold;
	}	
	#stylized button{
		clear:both;
		margin-left:290px;
		width:125px;
		height:31px;
		background:#666666 url(img/button.gif) no-repeat;
		text-align:center;
		line-height:31px;
		color:#FFFFFF;
		font-size:11px;
		font-weight:bold;
	}		
</style>
<div class="ctn_pefil_usuario">
    <div id="stylized" class="myform">
            <form id="frmcontactenos" name="frmcontactenos" method="POST" action="">          
            <!--<p>Enviar un correo electrónico. Todos los campos con el asterisco ('*') son obligatorios.</p> -->
            <div class="spacer">
             <label>Foto :</label>  
              <a class="grouped_elements" rel="<?=$_SESSION['id_usu_web']?>" href="<?=$row_usu['imagenfoto']?>"  title="<?=$row_usu['nombre']?> " />               					
        <img src='/timthumb.php?src=<?=$row_usu['imagenfoto'] ?>&h=200&w=250&zc=0&q=100&s=1' border=0 title="<?=$row_usu['nombre']?>" />         
                 </a>	         
    
           </div><br />
     <?php  if ($_SESSION['id_usu_web']==""){	//si esta vacio el codigo del usuario			
		$_SESSION['pagina_retorno']=$pagina_actual;
	?>	
    <a href="/iniciarsesion"><div class="upload"></div></a>
    <?php }else{?>
	  <a class="actualizarpadre" href="/modulos/form-actualiza-foto-balim-5.php"><div class="upload"></div></a>
    <?php }?>              
            <br />
              <div class="spacer">
                <label>Nombre :</label>
              <input name="nombre" type="text" required id="nombre" title="Se necesita un nombre" size="80" value="<?= "  ".$row_usu['nombre']?>" disabled="disabled"/>
              <script>document.getElementById('nombre').focus()</script>
            </div>                        
             <div class="spacer">
                <label>Facebook :</label>
                <a href="<?=$row_usu['facebook']?>" target="new"><div class="facebook"><?=$row_usu['facebook']?></div></a><br />
		    </div>                          
            <div class="spacer">
              <label>Compañia :</label>
              <select name="id_conpania" id="id_conpania" disabled="disabled">
                <?php  $sqlCompania= db_query("select * from compania order by orden");
                    while ($rowCompania = db_fetch_array($sqlCompania)) 
                    {	
                ?>
                <option value="<?=$rowCompania['id_conpania']?>" <?php if( $rowCompania['id_conpania']==$row_usu['id_conpania']) echo " selected='selected'"  ?>><?=$rowCompania['desc_compania']?></option>
                <?php
                   //echo '<option value='.$rowCompania['id_conpania'].'>'.$rowCompania['desc_compania'].'</option>';				                   
		   	   	}						
                ?>
                </select>
            </div>
            <div class="spacer">
                <label>Patrulla :</label>
              <input type="patrulla" name="patrulla" id="patrulla"  size="80"  title="" value="<?="  ".$row_usu['patrulla']?>" disabled="disabled"/>
             </div>
          <!--  <div class="spacer">
                <label>Facebook :</label>
                <input type="facebook" name="facebook" id="facebook"  size="80"  title="" />
            </div>
            <div class="spacer">
                <label>Patrulla :</label>
                <input type="patrulla" name="patrulla" id="patrulla"  size="80"  title="" />
            </div>
            <div class="spacer">
                <label>Fech. Nac. :</label>
                <input type="nacimiento" name="nacimiento" id="nacimiento"  size="80"  title="" />
            </div>-->
            <!-- <button type='submit' name="submitbutton" id="submitbutton">Actualizar</button>
            <div class="spacer">
            </div>-->
            </form>
            <div class="clear"></div>
            </div>
<?php } //  Fin While ?>
 <div style="clear:both"></div>
</div>

<style type="text/css">
.titulocomentario{margin:10px;clear:both;font-weight:bold;color:#ff0000;text-align:center;}
</style>
<?php 
$sql_comentario = "SELECT *  FROM doctorresponde d,usuarios u WHERE d.id_usuario=u.id_usuario and u.nick= '".$_GET['idsec2']."'";
$rscomentario=db_query($sql_comentario); 
echo "<div class='titulocomentario'>Comentarios Realizados</div>";
echo "<div class='ctn_total_comen_post'>";
//echo "<div class='celdatituloRojo'>Comentarios</div>";
echo "<div class='ctn_comen_post'>";
while($rowComenta = mysql_fetch_assoc($rscomentario)):					 
?>
    <div class="comen_post" class-hover="comen_post" >    	
            <div class="image_post">
                <?php 
                if($rowComenta['imagenfoto']!=""){  ?>
                  <img src="/timthumb.php?src=<?php echo $rowComenta['imagenfoto']; ?>&w=25&zc=0&q=100&s=1" border="0" 
                  title="<?=$rowComenta['nombre']?>"  alt="<?=$rowComenta['nombre']?>" width="25" align="left" >                <?php } ?>             
            </div>      
            <div class="conteni_post">
            	<div>                                  
                  <div class="titulo_post">                     
                     <?=$rowComenta['titulo']?>                  
                 </div>
               </div>                         
                <div class="comentario"><?=$rowComenta['comentario']?></div>                  
            </div>        
    </div>
    <div class="clear"></div>

<?php 
endwhile;echo "</div></div>";
?>		 			 

