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

$sql="SELECT id_entidad, razon_social FROM entidades";
$rs1=$mysqli->query($sql);
?>


<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Registrar Usuario</div>
            <div class="panel-body">
            <form class="form-signin" action="usuarios.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Numero de Identificación:</label>
            <input type="number" name="cedula" id="cedula" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Nombre Completo:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Tipo:</label>
            <select name="tipo" id="tipo" class="form-control">
            <option value="1">Administrador</option>
            <option value="2">Registrar Proyecto</option>
            <option value="3">Consulta</option>
            </select>
            <label for="nit">* Correo Electronico:</label>
            <input type="text" name="correo" id="correo" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Telefono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Clasificación:</label>
            <select name="clasificacion" id="clasificacion" class="form-control">
            <option value="1">Administrador</option>
            <option value="2">Estudiante</option>
            <option value="3">Ciudadano</option>
            <option value="4">Funcionario Universidad</option>
            <option value="5">Empresario</option>
            <option value="6">Funcionario Gobernacion</option>
            <option value="7">Funcionario Banco TIC</option>

            </select>
            <label for="nit">* Clave:</label>
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
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>
            </form>
            <form class="form-signin" action="usuarios.php" method="post">
            <button type="submit" class="btn btn-warning " name="consultar" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Consultar
            </button>
            <br/>
            </form>
          </div>
         </div>
         
        </div>
        <div class="col-md-5">
        <br/><br/><br/><br/><br/><br/><br/>
        <img src="images/I5.png" class="img-responsive"> 
        </div>
      </div>
<?php
if(isset($_POST['boton']))
{
  extract ($_POST);
  $sql="SELECT cedula FROM usuarios where cedula=$cedula";
  $rs=$mysqli->query($sql);

  if($rs->num_rows==0)
  {
    $sql="INSERT INTO usuarios (cedula, nombre, tipo, correo, telefono, clasificacion, clave, id_entidad) VALUES ( $cedula, '$nombre', '$tipo', '$correo', '$telefono', '$clasificacion', md5('$clave'), '$id_entidad')";

     if($rs2=$mysqli->query($sql))
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

if(isset($_POST['consultar']))
{
?>
<div class="row">
    <div class="col-lg-2 col-sm-12"></div>
    <div class="col-lg-8 col-sm-12" >
        <div class="table-responsive" style="max-height: 600px; overflow-y: auto; background-color: white;">
            <table border=1 align=center class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr >
                        <th colspan=4 class="text-center">USUARIOS</th>
                    </tr>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre Completo</th>                      
                        <th>Telefono</th>
                        <th class="text-center"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT cedula, nombre, tipo, correo, telefono, clasificacion, clave, id_entidad, id_usuario FROM usuarios";
                        $rs2=$mysqli->query($sql);

                        while($datos = $rs2->fetch_assoc())
                          {
                            $nombre = $datos['cedula']. "-" . $datos['nombre'] . "-" . $datos['tipo']. "-" . $datos['correo']. "-" . $datos['telefono']. "-" . $datos['clasificacion']. "-" . $datos['clave']. "-" . $datos['id_entidad']."-".$datos['id_usuario'];

                    ?>
                    <tr class="clear-row">
                        <td class="text-left">
                            <?php echo $datos['cedula']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['nombre']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['telefono']; ?>
                        </td>                       
                        <td class="text-center">                            
                            <button type="button" class="btn btn-success open-Modal" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" data-placement="left" data-id="<?php echo $nombre; ?>"  title="Modificar">
                                <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                            </button>
                        </td> 
                    </tr>
                    <?php
                            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-2 col-sm-12">  </div>                
</div>
<?php
}
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="btn close btn-danger" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <b><h4 class="modal-title" id="myModalLabel">Actualización de Usuarios</h4></b>
            </div>
            <div class="modal-body">
            <form class="form-signin" action="usuarios.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <input type="hidden" name="id_usuario" id="id_usuario" class="form-control" readonly>
            <label for="nit">* Numero de Identificación:</label>
            <input type="number" name="cedula1" id="cedula1" class="form-control" readonly>
            <label for="nit">* Nombre Completo:</label>
            <input type="text" name="nombre1" id="nombre1" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Tipo:</label>
            <select name="tipo1" id="tipo1" class="form-control">
            <option value="1">Administrador</option>
            <option value="2">Registrar Proyecto</option>
            <option value="3">Consulta</option>
            </select>
            <label for="nit">* Correo Electronico:</label>
            <input type="text" name="correo1" id="correo1" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Telefono:</label>
            <input type="text" name="telefono1" id="telefono1" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Clasificación:</label>
            <select name="clasificacion1" id="clasificacion1" class="form-control">
            <option value="1">Administrador</option>
            <option value="2">Estudiante</option>
            <option value="3">Ciudadano</option>
            <option value="4">Funcionario Universidad</option>
            <option value="5">Empresario</option>
            <option value="6">Funcionario Gobernacion</option>
            <option value="7">Funcionario Banco TIC</option>
            </select>
            <label for="nit">* Cambiar Clave:</label>
             Si <input type="radio"  name="verifica" id="ids" value="S" />
             No <input type="radio"  name="verifica" id="idn" value="N" checked/><br/>
            <input type="password" name="clave1" id="clave1" class="form-control" placeholder="" required disabled="disabled">
            <label for="nit">* Entidad:</label>
            <select name="id_entidad1" id="id_entidad1" class="form-control">
            <option value="0">No aplica</option>
            <?php
            $sql="SELECT id_entidad, razon_social FROM entidades";
            $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_entidad'];
                $nombre=$datos['razon_social'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>                                           
            <br/>
            <div class="row text-center">
            <button type="submit" class="btn btn-success " name="modificar" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Modificar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modificar
            </button>
            </div>                
            </div>
        </div>
    </div>
</div>


<?php
if(isset($_POST['modificar']))
{
  extract ($_POST);

if($verifica=="S")
{
  $sql="UPDATE usuarios SET cedula=$cedula1, nombre='$nombre1', tipo='$tipo1', correo='$correo1', telefono='$telefono1', clasificacion='$clasificacion1', clave=md5('$clave1'), id_entidad=$id_entidad1 WHERE id_usuario=$id_usuario";
}
else
{
 $sql="UPDATE usuarios SET cedula=$cedula1, nombre='$nombre1', tipo='$tipo1', correo='$correo1', telefono='$telefono1', clasificacion='$clasificacion1', id_entidad=$id_entidad1 WHERE id_usuario=$id_usuario"; 
} 
     if($rs1=$mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha modificado el usuario exitosamente');
      </script>
      <?php
     }
     else
     {
      ?>
      <script type="text/javascript">
      alert('No se ha modificado el usuario');
      </script>
      <?php
     }
}
}
include("plantilla.php");
?>