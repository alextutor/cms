<style type="text/css">
	.foto_ctn {display:flex;width:99%; margin:0 auto;Justify-content:Space-between   }
	.foto_ctn .izq {display:flex; width:20%;border: 2px solid #008FC9;  border-radius: 5px; margin-bottom:10px;padding-bottom: 15px;flex-wrap:wrap;justify-content: Space-around; text-align: center;}
	.foto_ctn .dere{ display:flex; width:78%; }	
	/*.ctn_panel_izq { display:flex; flex-wrap:wrap ;Flex-direction: column;  }	*/
	@media all and (max-width: 768px){
		.foto_ctn{Flex-direction: column;width:95%}	
		.foto_ctn .izq {display:flex; flex-grow:1;width:100%;border: 2px solid #008FC9;  border-radius: 5px; margin-bottom:10px;padding-bottom: 15px;}
		.foto_ctn .dere{ display:flex; flex-wrap:wrap; width:100%;}	
		
    } 

</style>
<div class="foto_ctn">
	<div class="izq">
		  <?php include_once($_SERVER['DOCUMENT_ROOT']. "/modulos/foto_ctn_izq.php"); ?>
    </div>
    <div class="dere">
    	 <?php include_once($_SERVER['DOCUMENT_ROOT']. "/modulos/foto_ctn_dere.php"); ?>
    </div>
</div>  
