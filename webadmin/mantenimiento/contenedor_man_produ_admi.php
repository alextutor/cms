<?php  session_start(); ?>
<?Php 
$Title = "";
$Description = "";
$INC_DIR = $_SERVER ["DOCUMENT_ROOT"];
include_once ( $INC_DIR . '/header.php');
?>

<style type="text/css">
.marco_gene {
clear: both;
width: 950px;
height:500px;
}
.marco_iz {
width: 200px;
float:left;
height:500px;
}
.marco_dere {
width: 750px;
margin-left:205px;
height:500px;
}
</style>
</head>
<body>
<div class="marco_gene">
      <div class="marco_iz">
        <p>
     	<?php   include_once ($_SERVER['DOCUMENT_ROOT']. '/webadmin/mantenimiento/menu_mant_produ.php');	 ?>
     	</p>
        <p><br />
          <a href="<?php $ROOT_PATH?>/webadmin/mantenimiento/contenedor_man_produ_admi.php?Filtro_en_oferta=SI">Productos en Oferta</a><br/>
        </p>
      </div>
        <div class="marco_dere">
     <?php   include_once ($_SERVER['DOCUMENT_ROOT']. '/webadmin/mantenimiento/mantProductosAdmi.php');?>
      </div>
</div>
</body>
</html>
