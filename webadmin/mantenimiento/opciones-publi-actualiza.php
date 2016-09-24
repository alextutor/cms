<div class="panel">
  <h3 id="bobcontent1-title" class="handcursor">Otras Opciones</h3> 
  <div id="bobcontent1" class="switchgroup1" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: auto;" >             <fieldset class="panelform">
                    <ul class="adminformlist">
                       <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Pagina :</label>
                       <select name="selectpage" id="selectpage" style="width:240px">
						  <?php 
                            $webdefa = $row_contenido['ccodpage']; 
                            if ($_SESSION['webuser_nivel'] == '9')
                                $sql_page = db_query("select * from page  where  cestpage='1' and credpage='' order by cnompage");
                            else
                                $sql_page = db_query("select * from page p, personapage pp  where p.ccodpage=pp.ccodpage and pp.ccodpersona='".$_SESSION['webuser_id']."' and p.cestpage='1' and p.credpage='' order by p.cnikpage");
                          
                             while($row_page = db_fetch_array($sql_page)) 
                             {
                                if( $row_page['ccodpage']==$row_contenido['ccodpage'])
                                    echo '<option value="' . $row_page['ccodpage'] .'" selected>' . $row_page['cnikpage'] . '</option>';
                                else
                                    echo '<option value="' . $row_page['ccodpage'] .'">' . $row_page['cnikpage'] . '</option>';
                             }
                          ?>
                          </select>
    				   </li>						
                       <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Categoria :</label>	                    
                           <select name="selectcategoria" style="width:240px;">
								<?php 	$categoria_sql=db_query("SELECT * FROM webparametros where ccodparametro='0013' and ctipparametro='1'");
                                    while($row_categoria=db_fetch_array($categoria_sql))
                                    { 
                                        if( $row_categoria['cvalparametro']==$row_contenido['ccodcategoria']) 
                                            echo "<option value=".$row_categoria['cvalparametro']." selected>".$row_categoria['cdesparametro']."</option>";
                                        else
                                            echo "<option value=".$row_categoria['cvalparametro'].">".$row_categoria['cdesparametro']."</option>";
                                   
								    }
                                ?>
                           </select>  
                        </li>
                     
                    <li>
                    <label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Fecha Publicación : :</label>	 

              <input name="idfecha"  id="idfecha" type="text" value="<?= date("d-m-Y",strtotime($row_contenido['dfeccontenido']))?>" class="txtbox" size="11" maxlength="10">
                            <input type="button" id="fechabus" value="..." class="cssboton">
                            <script type="text/javascript"> 
                               Calendar.setup({ 
                                inputField     :  "idfecha",     // id del campo de texto 
                                ifFormat       :  "%d-%m-%Y",     // formato de la fecha que se escriba en el campo de texto 
                                button         :  "fechabus"     // el id del botón que lanzará el calendario 
                                }); 
                            </script> 		            
                      </li>                                            
                      <li> 
                        <input name="cestcomenface" type = "checkbox" id="cestcomenface" value="1"  
                        <?php if ($row_contenido['cestcomenface'] == 1) echo 'checked'; ?>/>
                        Habilitar Comentarios  Facebook                    
                     </li>                                         
  
                       <li>
                        <input name="cestcompartirredes" type = "checkbox" id="cestcompartirredes" value="1"  
                        <?php if ($row_contenido['cestcompartirredes'] == 1) echo 'checked'; ?>/>
                        Habilitar Compartir Redes Sociales          
                        </li>
                        <li> 
                        <input name="comenta" type = "checkbox" id="comenta" value="1"  
                        <?php if ($row_contenido['cestcomentario'] == 1) echo 'checked'; ?>/>
                        Habilitar Comentarios                      
                        </li>   
                        <br /> 
                        <li> 
                        <input name="articulosrelacionados" type = "checkbox" id="articulosrelacionados" value="1"  
                        <?php if ($row_contenido['articulosrelacionados'] == 1) echo 'checked'; ?>/>
                        Habilitar Articulos Relacionados                      
                        </li>   
                         <br /> <br />
                      <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Seleccione Seccion :</label>	  
                           <div style="border:1px #666666 solid; padding:5px; width:100%; height:400px; overflow:auto;background-color:#FFF;">          		    
                              <?php  include_once $_SERVER['DOCUMENT_ROOT']. "/webadmin/mantenimiento/jq_selectseccion.php" ?>
	                       </div> 
                       </li>                                                       
                        <li><label id="jform_published-lbl" for="jform_published" class="hasTip" title="" aria-invalid="false">Seo Palabras de Busqueda :</label>	                        
                        <textarea name="tags" style="width:100%;" rows="3"><?=$row_contenido['ctagcontenido']?></textarea>
                        </li>
					</ul>                   

				</fieldset>									
			</div> </div>      <!--Fin grupo1 -->      