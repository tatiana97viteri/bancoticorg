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
          <div class="panel-heading">Registrar Entidades</div>
            <div class="panel-body">
            <form class="form-signin" action="reg_entidades.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Nombre de la Entidad:</label>
            
            <input type="text" name="razon_social" id="razon_social" class="form-control" placeholder="" required autofocus>

            <label for="nit">* Tipo de Entidad:</label>
            <select name="tipo" id="tipo" class="form-control">
            <option value="1">TIC</option>
            <option value="2">Empresa</option>
            <option value="3">Universidad</option>
            <option value="4">Gobernación</option>
            </select>
         
            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>
            </form>
            <form class="form-signin" action="reg_entidades.php" method="post">
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
        <img src="images/A7.png" class="img-responsive"> 
        <br/><br/>
        </div>
      </div>
<?php
if(isset($_POST['boton']))
{
  extract ($_POST);
 

    $sql="INSERT INTO entidades (razon_social, tipo) VALUES ('$razon_social', $tipo)";

     if($rs=$mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha agregado una nueva Entidad');
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
                        <th colspan=4 class="text-center">ENTIDADES.</th>
                    </tr>
                    <tr>
                        <th>Codigo Entidad</th>
                        <th>Entidad</th>
                        <th>Tipo</th>
                        <th class="text-center"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="select id_entidad, razon_social,tipo, case when tipo='1' then 'TIC' when tipo='2' then 'Empresa' when tipo='3' then 'Universidad' when tipo='4' then 'Gobernación' else 'Otra' end as tipo1 from entidades"; 
                        $rs1=$mysqli->query($sql);

                        while($datos = $rs1->fetch_assoc())
                          {
                            $nombre = $datos['id_entidad']. "-" . $datos['razon_social']. "-" . $datos['tipo'];

                    ?>
                    <tr class="clear-row">
                        <td class="text-left">
                            <?php echo $datos['id_entidad']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['razon_social']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['tipo1']; ?>
                        </td>
                                     
                        <td class="text-center">                            
                            <button type="button" class="btn btn-success open-Modal7" aria-label="Left Align" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal" data-placement="left" data-id="<?php echo $nombre; ?>"  title="Modificar">
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
                <b><h4 class="modal-title" id="myModalLabel">Actualización De Entidades</h4></b>
            </div>
            <div class="modal-body">
            <form class="form-signin" action="reg_entidades.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Codigo de la Entidad:</label>
            <input type="number" name="id_entidades1" id="id_entidades1" class="form-control" readonly>

            <label for="nit">* Nombre Entidad:</label>
            <input type="text" name="razon_social1" id="razon_social1" class="form-control">
            
            <label for="nit">* Tipo de Entidad:</label>
            <select name="tipo1" id="tipo1" class="form-control">
            <option value="1">TIC</option>
            <option value="2">Empresa</option>
            <option value="3">Universidad</option>
            <option value="4">Gobernación</option>
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

 $sql="UPDATE entidades SET razon_social='$razon_social1', tipo=$tipo1 WHERE id_entidad=$id_entidades1"; 
  
     if($rs1=$mysqli->query($sql))
     {
  ?>
      <script type="text/javascript">
      alert('Se ha modificado la Entidad exitosamente');
      </script>

      <?php
     }
     else
     {
      ?>
      <script type="text/javascript">
      alert('No se ha modificado el Entidad');
      </script>
      <?php
     }
}

}
include("plantilla.php");
?>