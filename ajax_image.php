<?php  session_start();
include $_SERVER['DOCUMENT_ROOT']."/config.php";
$session_id="100";//$_SESSION['user']; // Or Session ID
$t_width = 100; // Maximum thumbnail width
$t_height = 100; // Maximum thumbnail height
$new_name = "small".$session_id.".jpg"; // Thumbnail image name
$path = "uploads/";
if(isset($_GET['t']) and $_GET['t'] == "ajax")
{
extract($_GET);
$ratio = ($t_width/$w); 
$nw = ceil($w * $ratio);
$nh = ceil($h * $ratio);
$nimg = imagecreatetruecolor($nw,$nh);
$im_src = imagecreatefromjpeg($path.$img);
imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w,$h);
imagejpeg($nimg,$path.$new_name,90);
mysql_query("UPDATE usuarios SET imagenfoto='$new_name' WHERE id_usuario='$session_id'");
echo $new_name."?".time();
exit;
}
?>