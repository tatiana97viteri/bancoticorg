 <?php
include("sesion.php");
extract ($_POST);
?>
<option value="X">Seleccione</option>
<?php
 $sql="SELECT id_politica, detalle FROM politica WHERE id_eje=$id_eje";
 $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_politica'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
?>