<?php
include("conexion.php");
function menu()
{
// include("menu.php");
}

function contenido()
{
global $conexion, $_POST, $_REQUEST, $_GET, $_SESSION,$mysqli;
$sql="SELECT id_entidad, razon_social FROM entidades";
$rs1=$mysqli->query($sql);

$error=$_REQUEST["error"];
?>
<div class="container text-center col-lg-12">
<div id="myCarousel" class="carousel" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="images/Slice1.png" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
              <p>"La mejor manera de empezar algo es dejar de hablar de ello y empezar a hacerlo."</p>
              <p>Walt Disney</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="images/I2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
              <p>"Allí donde hay una empresa de éxito alguien tomó alguna vez una decisión valiente."</p>
              <p>Peter Drucker</p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="images/Slice1.png" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
              <p>"El pensamiento positivo te dejará hacer todo mejor que el negativo."</p>
              <p>Zig Ziglar</p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
    <div class="col-md-6">
    <div class="panel panel-primary">
          <div class="panel-heading">Registrarte</div>
            <div class="panel-body text-left">
            <form class="form-signin" action="index.php" method="post">
            <div class="text-center">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            </div>
            <label class="control-label">* Numero de Identificación:</label>
            <input type="number" name="cedula" id="cedula" class="form-control" placeholder="" required autofocus>
            <label class="control-label">* Nombre Completo:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required autofocus>
            <label  class="control-label">* Tipo:</label>
            <select name="tipo" id="tipo" class="form-control">
            <option value="3">Consulta</option>
            </select>
            <label for="nit">* Correo Electronico:</label>
            <input type="text" name="correo" id="correo" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Telefono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Clasificación:</label>
            <select name="clasificacion" id="clasificacion" class="form-control">
            <option value="2">Estudiante</option>
            <option value="3">Ciudadano</option>
            <option value="4">Funcionario</option>
            <option value="5">Empresario</option>
            </select>
            <label for="nit">* Contraseña:</label>
            <input type="password" name="clave" id="clave" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Entidad:</label>
            <select name="id_entidad" id="id_entidad" class="form-control">
            <option value="0">No aplica</option>
            <?php
             while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_entidad'];
                $nombre=$datos['razon_social'];
                echo "<option value=\"$valor\">".$nombre."</option>";
  
              }
            ?>
            </select>                                           
            <br/>
            <div class="text-center">
            <button type="submit" class="btn btn-warning " name="boton1" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>
            </div>
            <br/>            
            </form>
          </div>
         </div>
    </div>
        <div class="col-md-6">      
         	<div class="panel panel-primary">
  				<div class="panel-heading">Iniciar Sesión</div>
  					<div class="panel-body">
    				<form class="form-signin" action="login.php" method="post">
            
    				<button type="button" class="btn btn-warning btn-circle btn-lg" aria-label="Left Align" data-toggle="tooltip" data-placement="right" title="Iniciar Sesión">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </button>
            <br/>
            <label for="nit">Usuario:</label>
            <input type="number" name="usu_num" id="usu_num" class="form-control" placeholder="" required autofocus>
            <label for="clave">  Contraseña:</label>
            <input type="password" name="usu_clav" id="usu_clav" class="form-control" placeholder="" >
            <a href="olvidoclave.php">¿Olvidaste tu clave?</a>
           <br/>
            <button type="submit" class="btn btn-success " name="Iniciar" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Iniciar">
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Iniciar
            </button>            
            <?php
            if(empty($error)<>'1')
            {
              ?>
            <div class="alert alert-danger" role="alert">
             <?php
             if ($error==1) echo "<p> El usuario o la contrase&ntilde;a son incorrectas. Vuelva a intentarlo.</p>"; 
            if ($error==2) echo "<p>Permiso denegado, Usted no ha iniciado sesión</p>";
             if ($error==3) echo "<p>Se ha cerrado la sesión</p>";
             ?> 
            </div>
            <?php
          }
            ?>
            </form>                                          
  				</div>

</div>
<img align="center" src="images/bancoTIC.svg" class="img-responsive"> 

        </div>
      </div>
<?php
if(isset($_POST['boton1']))
{

  extract ($_POST);
  $sql="SELECT cedula FROM usuarios where cedula=$cedula";
  $rs=$mysqli->query($sql);

  if($rs->num_rows==0)
  {
    $sql="INSERT INTO usuarios (cedula, nombre, tipo, correo, telefono, clasificacion, clave, id_entidad) VALUES ($cedula, '$nombre', '$tipo', '$correo', '$telefono', '$clasificacion', md5('$clave'), '$id_entidad')";

     if($resultado = $mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha agregado un nuevo usuario exitosamente');
      </script>

      <?php
     }
   }
  else
  {
    ?>
      <script type="text/javascript">
      alert('Usuario ya existe');
      </script>
    <?php
  }

}
}
include("plantilla.php");
?>