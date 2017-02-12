<div class="ctn_buscador">
	<div class="select_seccion">
    	<h2>Filtrar por Seccion</h2>
        <?php 
			//ctipseccion= 1) Es una Seccion  2) Es un enlace o Link 
			$sqlfiltraseccionnivel1="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$_SESSION['page']."' and ccodmodulo='".$modulo."' and cnivseccion='1' and (ctipseccion='1' or ctipseccion='2') and estado=1 order by cordcontenido";
			//echo $sqlfiltraseccionnivel1;exit;		
		?>
    	<select name='selectseccion' id='selectseccion' style='font-size:12px;width:240px;' size='25' class="box" >";
            <option value='todas_secciones' selected>Todos las secciones</option>
            <?php			
            $sqlsec1 = db_query($sqlfiltraseccionnivel1);
            while($row1 = db_fetch_array($sqlsec1)) 
                    {
                        $cod1 = substr($row1['ccodseccion'],0,12);
						?>
                        <option value="<?=$cod1?>" class="color_seccion_1er_nivel"><?=$row1['cnomseccion']?></option>
                        <?php
						//------------- 2Nivel -----------------------
						$sqlfiltraseccionnivel2="SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod1."%' and ccodmodulo='".$modulo."' and cnivseccion='2'  and ctipseccion='1'  and estado=1 order by cordcontenido";
						//echo $sqlfiltraseccionnivel2;exit;	
                        $sqlsec2 = db_query($sqlfiltraseccionnivel2);
                        while($row2 = db_fetch_array($sqlsec2)) 
                        {
                            $cod2 = substr($row2['ccodseccion'],0,16);
                        ?>                            
						<option value="<?=$cod2?>" class="color_seccion_2do_nivel"> 
							<?php echo "&nbsp;-".$row2['cnomseccion']?>
                        </option>
                        <?php    
							//------------- 3Nivel -----------------------
                            $sqlsec3 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod2."%' and ccodmodulo='".$modulo."' and cnivseccion='3'  and ctipseccion='1' and estado=1   order by cordcontenido");
                            while($row3 = db_fetch_array($sqlsec3)) 
                            {
  								$cod3 = substr($row3['ccodseccion'],0,20);
                            ?>    
                              <option value="<?=$cod3?>" class="color_seccion_3er_nivel">
							  	<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;- ".$row3['cnomseccion'] ?> 
                              </option>;
                        <?php        
						  $sqlsec4 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod3."%' and ccodmodulo='".$modulo."' and cnivseccion='4'  and ctipseccion='1' and estado=1   order by cordcontenido");
                                while($row4 = db_fetch_array($sqlsec4)) 
                                {
                                  //  echo '<option value="' . $row4['ccodseccion'] . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-' . $row4['cnomseccion'] . '</option>';
                                }
                            }
                    }
                }
            ?>
        </select>
    </div>
    <div class="nombre_buscar">
    	<label>Buscar por Nombre:</label><br />
	    <input type="text" name="nombre" id="nombre"  size='22' style="width:230px;" class="cuadrotexto">
    </div>
    <div class="codigo_buscar">
	    <label>Buscar por Codigo:</label><br />
    	<input type="text" name="codigo" id="codigo"  size='22' style="width:230px;" class="cuadrotexto">
    </div>
    <div class="boton_buscar">
    	<input type="button" name="buscar" id="buscar" value="Buscar" class="btn" > 
    </div>
</div>
<style type="text/css">
	.select_seccion{font-weight:bold; font-size:14px;}		
	.select_seccion h2{font-size:12px; margin-left:35px;}
	.nombre_buscar	{font-weight:bold; font-size:14px;margin-top:15px;}		
	.codigo_buscar	{font-weight:bold; font-size:14px;margin-top:5px;}	
	.boton_buscar	{font-weight:bold; font-size:14px;margin-top:15px; margin-left:30px;}	
	
	.cuadrotexto {
	  background-color: #fff;
	  border-top: 1px solid #72b1e1;
	  border-left: 1px solid #72b1e1;
	  border-bottom: 1px solid #fff;
	  border-right: 1px solid #fff;
	  height: 25px;
	  padding: 3px;
	  font-weight: bold;
    }	
	/*http://css3buttongenerator.com/*/
	.btn {
	  background: #3498db;
	  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
	  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
	  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
	  background-image: -o-linear-gradient(top, #3498db, #2980b9);
	  background-image: linear-gradient(to bottom, #3498db, #2980b9);
	  -webkit-border-radius: 12;
	  -moz-border-radius: 12;
	  border-radius: 12px;
	  font-family: Arial;
	  color: #ffffff;
	  font-size: 14px;
	  padding: 5px 30px 5px 30px;
	  text-decoration: none;
	}
	
	.btn:hover {
	  background: #3cb0fd;
	  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
	  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
	  text-decoration: none;
	  cursor: pointer;
	}
</style>