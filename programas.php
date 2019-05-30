 <?php
include("sesion.php");
extract ($_POST);

 $sql="SELECT id_programa, detalle FROM programas WHERE id_area='$id_area'";
 $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_programa'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
   ?>