<?php session_start();
//http://www.9lessons.info/2011/06/image-upload-and-cropping-with-php-and.html
include_once $_SERVER['DOCUMENT_ROOT']."/config.php";
//-------para que nome muestre errores en desarollo xamp ejemplo inicializar valores
	ini_set('display_errors',0); 
	error_reporting(E_ALL);	
	//-------	 
$session_id='100'; //$session id
$path = $_SERVER['DOCUMENT_ROOT']."/include/cropimages/uploads/";
?>
<html>
<head>
<title>Image crop with jquery</title>
</head>
<link rel="stylesheet" type="text/css" href="/include/cropimages/css/imgareaselect-default.css" />
<script type="text/javascript" src="/include/cropimages/scripts/jquery.min.js"></script>
<script type="text/javascript" src="/include/cropimages/scripts/jquery.imgareaselect.pack.js"></script>
<script type="text/javascript">
function getSizes(im,obj)
	{
		var x_axis = obj.x1;
		var x2_axis = obj.x2;
		var y_axis = obj.y1;
		var y2_axis = obj.y2;
		var thumb_width = obj.width;
		var thumb_height = obj.height;
		if(thumb_width > 0)
			{
				if(confirm("Do you want to save image..!"))
					{
						$.ajax({
							type:"GET",
							url:"/include/cropimages/ajax_image.php?t=ajax&img="+$("#image_name").val()+"&w="+thumb_width+"&h="+thumb_height+"&x1="+x_axis+"&y1="+y_axis,
							cache:false,
							success:function(rsponse)
								{
								 $("#cropimage").hide();
								    $("#thumbs").html("");
									$("#thumbs").html("<img src='/include/cropimages/uploads/"+rsponse+"' />");
								}
						});
					}
			}
		else
			alert("Please select portion..!");
	}

$(document).ready(function () {
    $('img#photo').imgAreaSelect({
        aspectRatio: '1:1',
        onSelectEnd: getSizes
    });
});
</script>
<?php

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST['submit']))
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats) && $size<(1024*1024))
						{
							$actual_image_name = time().substr($txt, 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];														
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
							mysql_query("UPDATE usuarios SET imagenfoto='$actual_image_name' WHERE uid='$session_id'");
									$image="<h1>Please drag on the image</h1><img src='/include/cropimages/uploads/".$actual_image_name."' id=\"photo\" style='max-width:500px' >";
									
								}
							else
								echo "failed";
						}
					else
						echo "Invalid file formats..!";					
				}
			else
				echo "Please select image..!";
		}
?>
<body>
<div style="margin:0 auto; width:600px">
<?php echo $image; ?>
<div id="thumbs" style="padding:5px; width:600px"></div>
<div style="width:600px">

<form id="cropimage" method="post" enctype="multipart/form-data">
	Upload your image <input type="file" name="photoimg" id="photoimg" />
	<input type="hidden" name="image_name" id="image_name" value="<?php echo($actual_image_name)?>" />
	<input type="submit" name="submit" value="Submit" />
</form>

</div>
</div>
</body>
</html>