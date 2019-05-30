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
$sql= "select id_eje, detalle from ejes";
$rs1 = $mysqli->query($sql);
?>


<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Registrar Subprograma Gobernacion</div>
            <div class="panel-body">
            <form class="form-signin" action="reg_subprogob.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Eje:</label>
            <select name="id_eje" id="id_eje" class="form-control">
            <option value="X">Seleccione</option>
            <?php
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_eje'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            <label for="nit">* Politica:</label>
            <select name="id_politica" id="id_politica" class="form-control">
            </select>


            <label for="nit">* Programa Gobernacion:</label>
            <select name="id_programa" id="id_programa" class="form-control">
            </select>
                        

            <label for="nit">* Nombre del Subprograma:</label>
            
            <input type="text" name="detalle" id="detalle" class="form-control" placeholder="" required autofocus>


            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>
            </form>
            <form class="form-signin" action="reg_subprogob.php" method="post">
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
        <img src="images/11.jpg" class="img-responsive"> 
        <br/><br/>
        </div>
      </div>
<?php
if(isset($_POST['boton']))
{
  extract ($_POST);
 

    $sql="INSERT INTO subprogramas (detalle, id_programa) VALUES ('$detalle', $id_politica)";

     if($resultado = $mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha agregado un nuevo Subprograma Gobernacion');
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
                        <th colspan=4 class="text-center">SUBPROGRAMAS GOBERNACION.</th>
                    </tr>
                    <tr>
                        <th>Codigo</th>
                        <th>Subprograma Gobernacion</th>
                        <th>Programa</th>
                        <th class="text-center"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="select a.id_programa, a.detalle, b.id_politica, b.detalle as detalle1, c.id_eje,d.detalle as detalle2, d.id_subprograma from programab a, politica b, ejes c, subprogramas d where a.id_politica=b.id_politica  and b.id_eje=c.id_eje and a.id_programa=d.id_programa"; 
                        $resultado = $mysqli->query($sql);
                        while($datos = $resultado->fetch_assoc())
                          {
                            $nombre = $datos['id_politica']. "-" . $datos['id_eje']. "-" . $datos['detalle2']. "-" . $datos['id_programa']. "-" . $datos['id_subprograma'];
                    ?>
                        
                    <tr class="clear-row">
                    <td class="text-left">
                            <?php echo $datos['id_subprograma']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['detalle2']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['detalle']; ?>
                        </td>
                                     
                        <td class="text-center">                            
                            <button type="button" class="btn btn-success open-Modal12" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" data-placement="left" data-id="<?php echo $nombre; ?>"  title="Modificar">
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
                <b><h4 class="modal-title" id="myModalLabel">Actualización Del Subprograma Gobernacion</h4></b>
            </div>
            <div class="modal-body">
            <form class="form-signin" action="reg_subprogob.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Eje:</label>
            <select name="id_eje1" id="id_eje1" class="form-control">
            <option value="X">Seleccione</option>
            <?php
            $sql= "select id_eje, detalle from ejes";
            $resultado = $mysqli->query($sql);
            while($datos = $resultado->fetch_assoc())
              {
                $valor=$datos['id_eje'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            <label for="nit">* Politica:</label>
            <select name="id_politica1" id="id_politica1" class="form-control">
            <?php
            $sql= "select id_politica, detalle from politica";
            $resultado = $mysqli->query($sql);
            while($datos = $resultado->fetch_assoc())
              {
                $valor=$datos['id_politica'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            <label for="nit">* Programa:</label>
            <select name="id_programa1" id="id_programa1" class="form-control">
            <?php
            $sql= "SELECT id_programa, detalle FROM programab";
            $resultado = $mysqli->query($sql);
            while($datos = $resultado->fetch_assoc())
              {
                $valor=$datos['id_programa'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>

            <label for="nit">* Codigo del Subprograma Gobernacion:</label>
            <input type="text" name="id_subprograma1" id="id_subprograma1" class="form-control"readonly>
            <label for="nit">* Nombre del Subprograma Gobernacion:</label>
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

 $sql="UPDATE subprogramas SET id_programa='$id_programa1', detalle='$detalle1' WHERE id_subprograma=$id_subprograma1"; 
    if($resultado = $mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha modificado el Subprograma Gobernacion exitosamente');
      </script>

      <?php
     }
     else
     {
      ?>
      <script type="text/javascript">
      alert('No se ha modificado el Subprograma Gobernacion');
      </script>
      <?php
     }
}

}
include("plantilla.php");
?>