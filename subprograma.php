 <?php
include("sesion.php");
extract ($_POST);
?>
<option value="X">Seleccione</option>
<?php
 $sql="SELECT id_subprograma, detalle FROM subprogramas WHERE id_programa=$id_programa";
$rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_subprograma'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
   ?>