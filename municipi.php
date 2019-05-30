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
$sql= "select int_region, detalle from region";

?>


<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Registrar Municipios</div>
            <div class="panel-body">
            <form class="form-signin" action="municipi.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Región:</label>
            <select name="int_region" id="int_region" class="form-control">
            <option value="X">Seleccione</option>
            <?php
             $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['int_region'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            <label for="nit">* Departamento:</label>
            <select name="int_departamento" id="int_departamento" class="form-control">
            </select>
            <label for="nit">* Codigo del Municipio:</label>
            
            <input type="text" name="id_municipio" id="id_municipio" class="form-control" placeholder="" required autofocus>
            

            <label for="nit">* Nombre del Municipio:</label>
            
            <input type="text" name="detalle" id="detalle" class="form-control" placeholder="" required autofocus>


            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>
            </form>
            <form class="form-signin" action="municipi.php" method="post">
            <button type="submit" class="btn btn-warning " name="consultar" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Consultar
            </button>
            <br/>
            </form>
          </div>
         </div>
        </div>
        <div class="col-md-5">
        <br/>
        <img src="images/A6.png" class="img-responsive"> 
        <br/><br/>
        </div>
      </div>
<?php
if(isset($_POST['boton']))
{
  extract ($_POST);
 

    $sql="INSERT INTO municipios (detalle, int_departamento, id_municipio) VALUES ('$detalle', $int_departamento, $id_municipio)";

     if($rs1=$mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha agregado un nuevo Municipio');
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
                        <th colspan=4 class="text-center">MUNICIPIOS.</th>
                    </tr>
                    <tr>
                        <th>Codigo Municipio</th>
                        <th>Municipio</th>
                        <th>Departamento</th>
                        <th class="text-center"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="select a.id_municipio, a.detalle, b.detalle AS detalle1, b.int_departamento, a.int_municipio, b.int_region from municipios a, departamentos b where a.int_departamento=b.int_departamento"; 
                        $rs1=$mysqli->query($sql);
                        while($datos = $rs1->fetch_assoc())
                          {
                            $nombre = $datos['id_municipio']. "-" . $datos['detalle']. "-" . $datos['int_departamento']."-" . $datos['int_municipio']."-" . $datos['int_region'];

                    ?>
                    <tr class="clear-row">
                        <td class="text-left">
                            <?php echo $datos['id_municipio']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['detalle']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['detalle1']; ?>
                        </td>
                                     
                        <td class="text-center">                            
                            <button type="button" class="btn btn-success open-Modal6" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" data-placement="left" data-id="<?php echo $nombre; ?>"  title="Modificar">
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
                <b><h4 class="modal-title" id="myModalLabel">Actualización Del Municipio</h4></b>
            </div>
            <div class="modal-body">
            <form class="form-signin" action="municipi.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Región:</label>
            <select name="int_region1" id="int_region1" class="form-control">
            <option value="X">Seleccione</option>
            <?php
            $sql= "select int_region, detalle from region";
             $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['int_region'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            <label for="nit">* Departamento:</label>
            <select name="int_departamento1" id="int_departamento1" class="form-control">
            <?php
            $sql= "select int_departamento, detalle from departamentos";
             $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['int_departamento'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            <label for="nit">* Codigo del Municipio:</label>
            <input type="text" name="id_municipio1" id="id_municipio1" class="form-control">
            <input type="hidden" name="id_municipio2" id="id_municipio2" class="form-control">
            <label for="nit">* Nombre del Municipio:</label>
            <input type="text" name="detalle1" id="detalle1" class="form-control">
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

 $sql="UPDATE municipios SET id_municipio='$id_municipio1', detalle='$detalle1', int_departamento=$int_departamento1 WHERE int_municipio=$id_municipio2"; 
    if($rs1=$mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha modificado el Municipio exitosamente');
      </script>

      <?php
     }
     else
     {
      ?>
      <script type="text/javascript">
      alert('No se ha modificado el Municipio');
      </script>
      <?php
     }
}

}
include("plantilla.php");
?>