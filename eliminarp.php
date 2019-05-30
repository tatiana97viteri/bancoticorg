<?php
include("sesion.php");
extract ($_REQUEST);

$sql="DELETE FROM autores WHERE id_proyecto=$id_proyecto";
$resultado = $mysqli->query($sql);
$sql="DELETE FROM universidades WHERE id_proyecto=$id_proyecto";
$resultado = $mysqli->query($sql);
$sql="DELETE FROM aportes WHERE id_proyecto=$id_proyecto";
$resultado = $mysqli->query($sql);
$sql="DELETE FROM gobernacion WHERE id_proyecto=$id_proyecto";
$resultado = $mysqli->query($sql);
$sql="DELETE FROM proyectos WHERE id_proyecto=$id_proyecto";

if(!$resultado = $mysqli->query($sql))
  {
?>
      <script type="text/javascript">
            alert('No se ha podido eliminar el proyecto.');
      </script>
      <?php
     }
    else
     {
     ?>
      <script type="text/javascript">
      alert('Se ha eliminado el proyecto.');
      location.href ="proyec.php";
      </script>
      <?php
     }

?>


