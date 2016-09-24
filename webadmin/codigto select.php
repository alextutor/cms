<select name='selectseccion' id='selectseccion' style='width:190px;' class="box" >
	  <?php 
      $sqlsec1 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodpage= '".$_SESSION['page']."' and ccodmodulo='".$modulo."' and cnivseccion='1' and ctipseccion='1'  order by cnomseccion");
      while($row1 = db_fetch_array($sqlsec1)) 
              {
                  $cod1 = substr($row1['ccodseccion'],0,12);
                 echo '<option value="' . $row1['ccodseccion'] . '">'.$row1['cnomseccion'] . '</option>';								
          // Empieza  2da lista
            $sqlsec2 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod1."%' and ccodmodulo='".$modulo."' and cnivseccion='2'  and ctipseccion='1'  order by cnomseccion");
                  while($row2 = db_fetch_array($sqlsec2)) 
                  {
                      $cod2 = substr($row2['ccodseccion'],0,16);
                      echo '<option value="' . $row2['ccodseccion'] . '">&nbsp;- ' . $row2['cnomseccion'] . '</option>';
                      $sqlsec3 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod2."%' and ccodmodulo='".$modulo."' and cnivseccion='3'  and ctipseccion='1'  order by cnomseccion");
                      while($row3 = db_fetch_array($sqlsec3)) 
                      {
                          $cod3 = substr($row3['ccodseccion'],0,20);
                          echo '<option value="' . $row3['ccodseccion'] . '">&nbsp;&nbsp;&nbsp;- ' . $row3['cnomseccion'] . '</option>';
                          $sqlsec4 = db_query("SELECT ccodseccion, cnomseccion, cnivseccion FROM seccion WHERE ccodseccion like '".$cod3."%' and ccodmodulo='".$modulo."' and cnivseccion='4'  and ctipseccion='1'  order by cnomseccion");
                          while($row4 = db_fetch_array($sqlsec4)) 
                          {
                              echo '<option value="' . $row4['ccodseccion'] . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-' . $row4['cnomseccion'] . '</option>';
                          }
                      }
              }
              
          }
      ?>
</select>