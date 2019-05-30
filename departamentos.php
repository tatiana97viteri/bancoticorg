 <?php
include("sesion.php");
extract ($_POST);
?>
<option value="X">Seleccione</option>
<?php
 $sql="SELECT int_departamento, detalle FROM departamentos WHERE int_region=$int_region";
 $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['int_departamento'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
   ?>