<?php
function getComments($row) {
 echo "<li class='comment'>";
 echo "<div class='aut'>".$row['nombre']."</div>";
 echo "<div class='comment-body'>".$row['comentario']."</div>";
 echo "<div class='timestamp'>".$row['fechacorta']."</div>";
 echo "<a href='#comment_form' class='reply' id='".$row['id']."'>Reply</a>";
 /* The following sql checks whether there's any reply for the comment */
 $q = "SELECT * FROM comentarios WHERE parent_id = ".$row['id']."";
 $r = mysql_query($q);
 if(mysql_num_rows($r)>0) // there is at least reply
  {
  echo "<ul>";
  while($row = mysql_fetch_assoc($r)) {
    //getComments($row);
  }
  echo "</ul>";
  }
 echo "</li>";
}
?>
