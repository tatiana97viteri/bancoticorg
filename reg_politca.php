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
          <div class="panel-heading">Registrar Politica</div>
            <div class="panel-body">
            <form class="form-signin" action="reg_politca.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Nombre de la Politica:</label>
            
            <input type="text" name="detalle" id="detalle" class="form-control" placeholder="" required autofocus>

            <label for="nit">* Eje:</label>
            <select name="id_eje" id="id_politica" class="form-control">
            <?php
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_eje'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            
            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>
            </form>
            <form class="form-signin" action="reg_politca.php" method="post">
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
        <img src="images/12.jpg" class="img-responsive"> 
        <br/><br/>
        </div>
      </div>
<?php
if(isset($_POST['boton']))
{
  extract ($_POST);
 

    $sql="INSERT INTO politica (detalle,id_eje) VALUES ('$detalle', $id_eje)";

     if($resultado = $mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha agregado una nueva politica');
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
                        <th colspan=4 class="text-center">POLITICAS.</th>
                    </tr>
                    <tr>
                        <th>Codigo</th>
                        <th>Politica</th>
                        <th>Eje</th>
                        <th class="text-center"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="select a.id_politica, a.detalle, b.detalle as detalle1, b.id_eje from politica a, ejes b where a.id_eje=b.id_eje"; 
                        $rs2 = $mysqli->query($sql);

                        while($datos = $rs2->fetch_assoc())
                          {
                            $nombre = $datos['id_politica']. "-" . $datos['detalle']. "-" . $datos['id_eje'];

                    ?>
                    <tr class="clear-row">
                        <td class="text-left">
                            <?php echo $datos['id_politica']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['detalle']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['id_eje']; ?>
                        </td>
                                     
                        <td class="text-center">                            
                            <button type="button" class="btn btn-success open-Modal10" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" data-placement="left" data-id="<?php echo $nombre; ?>"  title="Modificar">
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
                <b><h4 class="modal-title" id="myModalLabel">Actualización De La Politica</h4></b>
            </div>
            <div class="modal-body">
            <form class="form-signin" action="reg_politca.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Codigo de la Politica:</label>
            <input type="number" name="id_politica1" id="id_politica1" class="form-control" readonly>
            <label for="nit">* Nombre de la Politica:</label>
            <input type="text" name="detalle1" id="detalle1" class="form-control">
            <label for="nit">* Eje:</label>
            <select name="id_eje1" id="id_eje1" class="form-control">
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

 $sql="UPDATE politica SET id_eje=$id_eje1, detalle='$detalle1'  WHERE id_politica=$id_politica1"; 
  
     if($resultado = $mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha modificado la Politica exitosamente');
      </script>

      <?php
     }
     else
     {
      ?>
      <script type="text/javascript">
      alert('No se ha modificado la Politica');
      </script>
      <?php
     }
}

}
include("plantilla.php");
?>