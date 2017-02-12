<div class="ctn_buscador">
	<div class="select_seccion">
    	<h2></h2>    	
    </div>
    <div class="nombre_buscar">
    	<label>Buscar por Nombre:</label><br />
	    <input type="text" name="nombre" id="nombre"  size='22' style="width:230px;" class="cuadrotexto">
    </div>
    <div class="codigo_buscar">
	    <label>Buscar por Departamento:</label><br />
    	<input type="text" name="departamento" id="departamento"  size='22' style="width:230px;" class="cuadrotexto">
    </div>
    <div class="boton_buscar">
    	<input type="button" name="buscar" id="buscar" value="Buscar" class="btn" > 
    </div>
</div>
<style type="text/css">
	.select_seccion{font-weight:bold; font-size:14px;}		
	.select_seccion h2{font-size:12px; margin-left:35px;}
	.nombre_buscar	{font-size:12px;margin-top:15px;}		
	.codigo_buscar	{font-size:12px;margin-top:5px;}	
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