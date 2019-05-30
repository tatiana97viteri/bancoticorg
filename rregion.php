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

?>


<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Registrar Región</div>
            <div class="panel-body">
            <form class="form-signin" action="rregion.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            
            <label for="nit">* Codigo DANE de la región:</label>
            
            <input type="text" name="id_region" id="id_region" class="form-control" placeholder="" required autofocus maxlength="1">
            
            <label for="nit">* Nombre de la Región:</label>
            <input type="text" name="detalle" id="detalle" class="form-control" placeholder="" required autofocus>

            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>
            </form>
            <form class="form-signin" action="rregion.php" method="post">
            <button type="submit" class="btn btn-warning " name="consultar" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Consultar
            </button>
            <br/>
            </form>
          </div>
         </div>
        </div>
        <div class="col-md-5">
        <img src="images/A5.png" class="img-responsive"> 
        <br/>
        </div>
      </div>
<?php
if(isset($_POST['boton']))



{
  extract ($_POST);
  $sql="SELECT  id_region FROM region where id_region='$id_region'";

  $rs=$mysqli->query($sql);

  if($rs->num_rows==0)
  {
    $sql="INSERT INTO region (id_region,detalle) VALUES ('$id_region',  '$detalle')";

     if($rs=$mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha agregado una nueva Región');
      </script>

      <?php
     }
   }
  else
  {
    ?>
      <script type="text/javascript">
      alert('La Región ya existe');
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
                        <th colspan=3 class="text-center">REGIONES.</th>
                    </tr>
                    <tr>
                        <th>Codigo</th>
                        <th>Región</th>                      
                        <th class="text-center"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT id_region, detalle, int_region FROM region order by id_region";
                        $rs1=$mysqli->query($sql);
                        while($datos = $rs1->fetch_assoc())
                          {
                            $nombre = $datos['id_region']. "-" . $datos['detalle']. "-" . $datos['int_region'];

                    ?>
                    <tr class="clear-row">
                        <td class="text-left">
                            <?php echo $datos['id_region']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['detalle']; ?>
                        </td>
                                     
                        <td class="text-center">                            
                            <button type="button" class="btn btn-success open-Modal8" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" data-placement="left" data-id="<?php echo $nombre; ?>"  title="Modificar">
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
                <b><h4 class="modal-title" id="myModalLabel">Actualización de la Región</h4></b>
            </div>
            <div class="modal-body">
            <form class="form-signin" action="rregion.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Codigo DANE de la Región:</label>
            <input type="text" name="id_region1" id="id_region1" class="form-control">
            <input type="hidden" name="int_region1" id="int_region1" class="form-control" maxlength="2">
            <label for="nit">* Nombre de la Región:</label>
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

 $sql="UPDATE region SET detalle='$detalle1', id_region='$id_region1' WHERE int_region=$int_region1"; 
 
 
     if($rs1=$mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha modificado la Región exitosamente');
      </script>

      <?php
     }
     else
     {
      ?>
      <script type="text/javascript">
      alert('No se ha modificado la Región');
      </script>
      <?php
     }
}

}
include("plantilla.php");
?>