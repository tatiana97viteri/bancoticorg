<?php
include("sesion.php");
function menu()
{
include("menu.php");
}

function contenido()
{
global $conexion, $_POST, $_REQUEST, $_GET, $_SESSION,$mysqli;
extract ($_POST);

$ced=$_SESSION['usu'];

?>


<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Cambiar Clave</div>
            <div class="panel-body">
            <form class="form-signin" action="cam_clave.php" name="myform" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Clave Anterior:</label>
            <input type="password" name="cam_clave" id="cam_clave" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Clave Nueva:</label>
            <input type="password" name="cam_clave1" id="cam_clave1" class="form-control" placeholder="" required>
            <label for="nit">* Confirme Clave Nueva:</label>
            <input type="password" name="cam_clave2" id="cam_clave2" class="form-control" placeholder="" required>

            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Cambiar
            </button>
            <br/>
            </form>
          </div>
         </div>
        </div>
        <div class="col-md-5">
        <img src="images/I6.png" class="img-responsive"> 
        </div>
      </div>
<?php
if(isset($_POST['boton']))
{
 extract ($_POST);
  $ced=$_SESSION['usu'];
  $clan=$cam_clave1;
  $sql="SELECT clave FROM usuarios WHERE cedula='$ced'";


  $resultado=$mysqli->query($sql);
  
  if($resultado->num_rows>0)
  {
    $datos = $resultado->fetch_assoc();
    if($datos['clave']==md5($cam_clave))
  {
      $sql="UPDATE usuarios SET clave=md5('$cam_clave1')  WHERE cedula='$ced'";
      
      if($resultado=$mysqli->query($sql))
        {
         ?>
       <script type="text/javascript">
      alert('Cambio exitosamente la Contraseña');
      </script>
      <?php
    }
      else
      {
        ?>
       <script type="text/javascript">
      alert('Error al cambiar contraseña');
      </script>
      <?php
    }
    }
   else
    {
      ?>
      <script type="text/javascript">
      alert('La contraseña actual no es correcta');
      </script>
      <?php
    }
  }
}

}
include("plantilla.php");
?>