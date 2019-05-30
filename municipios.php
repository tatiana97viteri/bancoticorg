 <?php
include("sesion.php");
extract ($_POST);
?>
<option value="X">Seleccione</option>
<?php
 $sql="SELECT int_municipio, detalle FROM municipios WHERE int_departamento=$int_departamento";
 $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['int_municipio'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
   ?>