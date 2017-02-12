<style type="text/css">	
  #ctn_buscador {display:flex;Justify-content:Flex-end; margin-left:10px;}
  #buscador {display:flex;overflow: hidden;/* border-style: solid; */border-width: 1px;
    border-color: #e0e0e0;border-radius: 4px;background: #f6f6f6;}
  #buscador input {float: left;width: 230px;padding: 13px 12px;
    border: 0;margin: 0;border: 1px solid #ccc; font-size: 13px;transition: 0.5s;box-shadow: inset 0 1px 1px rgba(0,0,0,.075); 
	}
   
  ::-webkit-input-placeholder { color:#555; }
	::-moz-placeholder { color:#555; } /* firefox 19+ */
	:-ms-input-placeholder { color:#555; } /* ie */
	input:-moz-placeholder { color:#555; }
	
	
  #buscador button {float: left;width: 42px;height: 42px;
    padding: 12px 0;border: 0;background-color:#C00;cursor: pointer;}
   /*------------para mobiles ----------*/
	@media only screen and (max-width:480px){
	 #ctn_buscador {display:flex;Justify-content:Flex-end; margin-bottom:10px;width:97%;margin-right: 5px; margin-left:4px; }
	 #buscador{ width:100%;}
	 #buscador input {width: 80%;}
	 #buscador button { float: right;}
	} 
</style>		
  <!--http://soporte.miarroba.es/17451/8257971-programar-buscador-para-php-mysql-tutorial/ -->  
<div id="ctn_buscador">
    <form id="buscador" name="buscador"  method="POST" action="/buscador">
        <input type="text"  id="buscar" name="buscar" placeholder="Buscador de Repuestos" value="" required>
        <button type="submit">
        <img src="/modulos/imagen/buscador.png" width="18" height="18" alt="Buscar">
        </button>
    </form>
</div>  