<?php	session_start();
$sqlfoto_contenido = "SELECT * FROM  foto_contenido fc WHERE  fc.ccodcontenido='".$codcont ."'";
//echo $sqlfoto_contenido;exit;
$hometabla = db_query($sqlfoto_contenido);
$num_rows=mysql_num_rows($hometabla);
//echo $num_rows;exit;
/*$sqlstylo   = "Select s.ccodseccion,ec.cnomclase,ec.cdesclase  FROM seccion s,estiloclases ec  WHERE   s.ccodclase=ec.ccodclase and s.ccodseccion= '".$codsecc."'"; 
$rsstylo = db_query($sqlstylo);
$rowstylo  = db_fetch_array($rsstylo);*/
//echo $sqlstylo;exit;
?>
<?php if($num_rows > 0 ) {//inicio si 1	?>
    <div class='cong_lista'>
    <!--<ul class="<?=$rowstylo['cdesclase']?>">   -->
       <ul class="lista_hori_1">          
        <?php while($rowhome  = db_fetch_array($hometabla)){ ?>         
             <li>         
              <a rel="shadowbox[<?=$codcont?>]" href="<?=$rowhome['url_foto']?>"  title="<?=$rowhome['url_foto']?> " >
                 <div class="info-image">
                         <img src='<?php $_SERVER['DOCUMENT_ROOT']?>/timthumb.php?src=<?=$rowhome['url_foto'] ?>&h=90&w=110&zc=0&q=100&s=1' border=0 title='<?= $rowhome['url_foto']?>' />	                  															              </div>
                  <span class="titulo">
                      <?php echo $rowhome['cnomcontenido']?>
                    </span>                                  
               </a>     
            </li>                       
          <?php  } // Fin while  ?>
         </ul>
    </div><!-- Fin cong_lista -->
     <!--http://www.workmate.nu/cgi-sys/defaultwebpage.cgi  ejemplo de listta -->
<?php } //fin si 1 ?>     