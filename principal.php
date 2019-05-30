<?php
include("sesion.php");

function menu()
{
include("menu.php");
}

function contenido()
{
global $conexion, $_POST, $_REQUEST, $_GET, $_SESSION;
?>
<div class="col-lg-12">
<div class="jumbotron">
  <img src="images/I4.jpg" class="img-thumbnail">
</div>
</div>
<?php
} 
include("plantilla.php");
?>
