 <?php
include("sesion.php");
extract ($_POST);
?>
<option value="X">Seleccione</option>
<?php
 $sql="SELECT id_meta, detalle FROM metas WHERE id_subprograma=$id_subprograma";
$rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_meta'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
   ?>