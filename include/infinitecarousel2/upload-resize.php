<?php
 //http://www.weberdev.com/get_example-3938.html 
$idir = "/home/info/public_html/noticia/imagen/";   // Path To Images Directory
$tdir = "/home/info/public_html/noticia/imagen/infinitecarousel2/";   // Path To Thumbnails Directory
$twidth = "412";   // Maximum Width For Thumbnail Images
$theight = "280";   // Maximum Height For Thumbnail Images

if (!isset($_GET['subpage'])) {   // Image Upload Form Below   ?>
  <form method="post" action="upload-resize.php?subpage=upload" enctype="multipart/form-data">
   File:<br />
  <input type="file" name="imagefile" class="form">
  <br /><br />
  <input name="submit" type="submit" value="Sumbit" class="form">  <input type="reset" value="Clear" class="form">
  </form>
<p>
  <? } else  if (isset($_GET['subpage']) && $_GET['subpage'] == 'upload') {   // Uploading/Resizing Script
  $url = $_FILES['imagefile']['name'];   // Set $url To Equal The Filename For Later Use
  if ($_FILES['imagefile']['type'] == "image/jpg" || $_FILES['imagefile']['type'] == "image/jpeg" || $_FILES['imagefile']['type'] == "image/pjpeg" || $_FILES['imagefile']['type'] == "image/gif" ) {
    $file_ext = strrchr($_FILES['imagefile']['name'], '.');   // Get The File Extention In The Format Of , For Instance, .jpg, .gif or .php
    $copy = copy($_FILES['imagefile']['tmp_name'], "$idir" . $_FILES['imagefile']['name']);   // Move Image From Temporary Location To Permanent Location
    if ($copy) {   // If The Script Was Able To Copy The Image To It's Permanent Location
      print 'Image uploaded successfully.<br />';   // Was Able To Successfully Upload Image
      
	 /////-----------------------------------Inicio-----------------------------------------------------
	  if ($_FILES['imagefile']['type'] == "image/jpg" || $_FILES['imagefile']['type'] == "image/jpeg" || $_FILES['imagefile']['type'] == "image/pjpeg" ) {
	  $simg = imagecreatefromjpeg("$idir" . $url);   // Make A New Temporary Image To Create The Thumbanil From
	    }
		
	 if ($_FILES['imagefile']['type'] == "image/gif" ) {
	  $simg = imagecreatefromgif("$idir" . $url);   // Make A New Temporary Image To Create The Thumbanil From
	    }
		
	
  	 /////-----------------------------------FIn-----------------------------------------------------
	  
	  
	  
	  
      $currwidth = imagesx($simg);   // Current Image Width
      $currheight = imagesy($simg);   // Current Image Height
      if ($currheight > $currwidth) {   // If Height Is Greater Than Width   Si la altura es mayor que el ancho de
         $zoom = $twidth / $currheight;   // Length Ratio For Width Relación longitud Por Ancho
         $newheight = $theight;   // Height Is Equal To Max Height  La altura es igual a la altura máxima
         $newwidth = $currwidth * $zoom;   // Creates The New Width
      } else {    // Otherwise, Assume Width Is Greater Than Height (Will Produce Same Result If Width Is Equal To Height)De lo contrario, Asuma anchura es superior a la altura(Producirá el mismo resultado si el ancho es igual a la altura)
        $zoom = $twidth / $currwidth;   // Length Ratio For Height
        $newwidth = $twidth;   // Width Is Equal To Max Width
		
        //alex lo he modificado porque queria establecer el mismo alto que he mandado arriba no quiero que me pnga calculos es bueno pero en este caso no
		$newheight = $theight;  
	   // $newheight = $currheight * $zoom;   // Creates The New Height
      }
      $dimg = imagecreate($newwidth, $newheight);   // Make New Image For Thumbnail
      imagetruecolortopalette($simg, false, 256);   // Create New Color Pallete
      $palsize = ImageColorsTotal($simg);
      for ($i = 0; $i < $palsize; $i++) {   // Counting Colors In The Image
       $colors = ImageColorsForIndex($simg, $i);   // Number Of Colors Used
       ImageColorAllocate($dimg, $colors['red'], $colors['green'], $colors['blue']);   // Tell The Server What Colors This Image Will Use
      }
      imagecopyresized($dimg, $simg, 0, 0, 0, 0, $newwidth, $newheight, $currwidth, $currheight);   // Copy Resized Image To The New Image (So We Can Save It)
     imagejpeg($dimg, "$tdir" . $url);   // Saving The Image
	//  imagegif($dimg, "$tdir" . $url);   // Saving The Image
      imagedestroy($simg);   // Destroying The Temporary Image
      imagedestroy($dimg);   // Destroying The Other Temporary Image
      print 'Image thumbnail created successfully.';   // Resize successful
	  echo $dimg .'<br>';
  	  echo $tdir.'<br>';
  	  echo $url.'<br>';
	  echo "<a href='http://www.infodisfap.com/FormInsertarNoticia.php?imagen=$url&imagen108x96=$url'>volver</a>";

    } else {
      print '<font color="#FF0000">ERROR: Unable to upload image.</font>';   // Error Message If Upload Failed
    }
  } else {
    print '<font color="#FF0000">ERROR: Wrong filetype (has to be a .jpg or .jpeg. Yours is ';   // Error Message If Filetype Is Wrong
    print $file_ext;   // Show The Invalid File's Extention
    print '.</font>';
  }
} ?>
</p>
