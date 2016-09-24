<style type="text/css">
 .con_menu_ubi{
	clear: both;
	width: 700px;¨	
   border: 3px solid #FF6600;
   border-radius: 5px;
   margin:0 auto;
   margin-top:30px;	
 }
 .distrito
 { 		
 width: 100%;
 color: #4ba541;
 font-weight: bold;
 border-bottom: 1px solid #D0D0D0;
 margin-bottom:30px;
}
 .Horario_Aten
 {
	width: 500px;
	height:30px;
	background:#49ac7b;	
	color:#FFF;
	text-align:center;
	-moz-border-radius: 11px;
	-webkit-border-radius: 11px;
	border-radius: 11px;
	behavior: url(../PIE.htc);	
	position: relative;
	z-index:1;
	padding-top:10px;
	margin:0 auto;
    margin-top:50px;	
}
</style>
</head>
<body>
 <div class="con_menu_ubi">
 <div class="distrito tex_Comfortaa size_14 bold"> Breña  Lima - Perú: </div>
 <span class="tex_Montserrat black  size_12"> <?php echo $cdirecempresa  ?><br />
       <?php echo $ctelefonopri  ?>  <br />
       </span>  
		<div class="Horario_Aten tex_Comfortaa size_14"><?php echo $chorarioatencion  ?></div>
</div> <!--Fin con_menu_ubi -->

</body>
</html>