<?php
	/* Include BD class */
	require_once 'classes/DB.class.php';
	
/* DB config */
	$db_config = array("db_name" => 'info_infodisfap',
					   "db_user" => 'info_info',
					   "db_pass" => '0403221757',
					   "db_host" => 'localhost' );

	$db = new DB($db_config);
	$db->connect();
	
	/* Check if the form has been submitted */
	if(isset($_POST['accion'])){
		
		/* Setup some variables/arrays */
		$action['result'] = null;
		$comments = $_POST['comment'];
		
		/* Quick/simple validation */
		if(empty($_POST['dropdown']))
			$action['result'] = 'error';
		if(empty($comments))
			$action['result'] = 'error';
		
		if($action['result'] != 'error'){
			$n = count($comments);
			for($i=0; $i < $n; $i++)
			{
				if($_POST['dropdown'] == "accept")
					/* Accept the comment */
					mysql_query("UPDATE doctorresponde SET aceptado=1 WHERE id = '".$comments[$i]."'");
				if($_POST['dropdown'] == "delete")
					/* Delete the comment */
					mysql_query("DELETE FROM doctorresponde WHERE id = ".$comments[$i] );
			}
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
	<title>Moderación Doctor Responde</title>
	
	<style>
	body {
		font-family:Arial, Helvetica, sans-serif;
		background-color:#111111;
		height:100%;
		text-align:center;
		margin:0 auto;
	}
	
	#center {
		margin: 0 auto;
		text-align: left;
		width: 800px;
	}
	</style>
	
	<link rel="stylesheet" href="styles/moderation.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.check-all').click(
		function(){
			$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
		}
		)
	});
	</script>
	
	<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
    </style>
</head>
	
	<body>
	
	<div id="center">
	
	<form action="" method="post">
	<table>
	
	<thead>
	<tr>
	   <th><input class="check-all" type="checkbox" /></th>
	   <th>Autor</th>
       <th>E-mail</th>	  
       <th>Fecha</th>
       <th>Aceptado</th>
	   <th>Comentario</th>
	</tr>
	</thead>
	
	<tfoot>
	<tr>
		<td colspan="5">
			<div class="bulk-actions">
				<select name="dropdown">
					<option value="">Escoge una Opcion...</option>
					<option value="accept">Aceptar</option>
					<option value="delete">Eliminar</option>
				</select>
				<input type="submit" value="Apply to selected" name="accion" />
			</div>
			<div class="clear"></div>		</td>
	</tr>
	</tfoot>
	
	<tbody>
	
<?php
$result = mysql_query("SELECT * FROM doctorresponde  ORDER BY fechacorta DESC");
while ($row = mysql_fetch_assoc($result)) {
?>
	<tr id="comment<?php echo $row['id'] ?>">
		<td valign="top"><input type="checkbox" name="comment[]" value="<?php echo $row['id'] ?>" /></td>
		<td valign="top"><?php echo trim($row['nombre']) ?></td>
        <td valign="top"><?php echo $row['email'] ?></td>		
        <td valign="top"><?php echo date('F j, Y', strtotime($row['fechacorta'])) ?></td>
        <td valign="top"><?php echo $row['aceptado'] ?></td>
		<td><?php echo nl2br($row['comentario']) ?></td>
	</tr>
	
<?php } ?>
	</tbody>
	</table>
	</form>
	
	<p align="center" class="style1">This Template was Downloaded From GrabTemplates.com</p>
	<p align="center" class="style1"><font face="verdana" size="4"><a class="p" href="http://www.infodisfap.com/index.php">::Inicio::</a></font> <font face="verdana" size="4"><a class="p" href="http://www.infodisfap.com/mainadministrador.php">: :Administrador::</a></font></p>
	</div>

</body>
	
</html>