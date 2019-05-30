 <?php
include("sesion.php");
extract ($_POST);
echo $id_politica;
?>
<option value="X">Seleccione</option>
<?php
 $sql="SELECT id_programa, detalle FROM programab WHERE id_politica=$id_politica";
$rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_programa'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
   ?>