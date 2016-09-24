<style type="text/css">
.ctn_usuario{margin-top: 1px;
	padding: 5px 5px;
	border: 1px solid transparent;
	border-radius: 2px;
	font-size: 12px;
	background-color: #faf8e8;
	border-color: #9eac91;
	color: #333333;
	height:auto;
	clear:both;
	margin-bottom: 5px; 
}
.itemusuario{ 
	margin-right:5px;
	float:left;
	padding: 2px 2px;
	border: 1px solid transparent;
	background-color: #d62020;
	border-color: #d62020;
	color: #FFF;
	text-align:center;
	font-weight:bold;
}
.itemusuario:hover{background:#f35454; color:#FFF}
.itemusuario a:visited { text-decoration: none;color:#FFF;}
.itemusuario a:link {text-decoration: none;color:#FFF;}
.itemusuario a {text-decoration: none;color:#FFF;}
  
		       
</style>
<?php 
include_once($_SERVER['DOCUMENT_ROOT']. '/config.php');	
$sql="SELECT * FROM usuarios order by nombre asc";
$sqlc= db_query($sql); 
echo "<div class='ctn_usuario'>";
while($rowc  = db_fetch_array($sqlc)){ ?>
   <div class="itemusuario" >
       <a href="/usuario/<?=$rowc['nick']?>">
           <div><?=$rowc['nombre']?></div>			 	      	
       </a>
   </div>
<?php }	echo "<div class='clear'></div></div>";?>  
<!--se define aqui index.php /*------- Inicio Mostrar Usuario----------------*/ 
$contenidoinc = "modulos/form-perfil-usuario.php";		 
-->
