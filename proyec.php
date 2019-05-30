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
$sql= "select id_areas, detalle from areas";
$rs1=$mysqli->query($sql);
?>


<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Consultar Proyecto</div>
            <div class="panel-body">
            <form class="form-signin" action="proyec.php" method="post">
            <label for="nit">Titulo:</label>
            
            <input type="text" name="detalle" id="detalle" class="form-control" placeholder="" autofocus>

            <label for="nit">Tipo de Entidad:</label>
            <select name="tipo" id="tipo" class="form-control">
            <option value="5">Todos</option>
            <option value="2">Empresa</option>
            <option value="3">Universidad</option>
            <option value="4">Gobernación</option>
            </select>


            <label for="nit">Estado del Proyecto:</label>
            <select name="estado" id="estado" class="form-control">
            <option value="5">Todos</option>
            <option value="1">En curso</option>
            <option value="2">Terminado</option>
            <option value="4">Actualizado</option>
            <option value="5">Presentado</option>
            <option value="6">Aceptado</option>
            <option value="7">Inactivo</option>
            </select>
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
        <img src="images/A9.png" class="img-responsive"> 
        <br/><br/>
        </div>
      </div>
<?php

if(isset($_POST['consultar']))
{

extract ($_POST);

$condicion = " AND titulo like '%$detalle%'";

if($tipo<>5)
{
    $condicion = $condicion." AND b.tipo='$tipo'";
}

if($estado<>5)
{
    $condicion = $condicion." AND b.estado='$estado'";
}

?>
<div class="row">
    
    <div class="col-lg-12 col-sm-12" >
        <div class="table-responsive" style="max-height: 600px; overflow-y: auto; background-color: white;">

            <table border=1 align=center class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr >
                        <th colspan=9 class="text-center">PROYECTOS.</th>
                    </tr>
                    <tr>
                        <th>Entidad</th>
                        <th>Año</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Resumen</th>
                        <th class="text-center"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></th>
                        <th class="text-center"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span></th>
                        <th class="text-center"><span class="glyphicon glyphicon-cloud-download" aria-hidden="true"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="select a.razon_social, b.ano, b.titulo, d.detalle, c.detalle as detalle1, case when b.estado='1' then 'En Curso' when b.estado='2' then 'Terminado' when b.estado='3' then 'No Terminado' else 'Otra' end as estado, case when b.tipo='1' then 'TIC' when b.tipo='2' then 'Empresa' when b.tipo='3' then 'Universidad' when b.tipo='4' then 'Gobernación' else 'Otra' end as tipo, b.resumen, b.id_proyecto FROM entidades a, proyectos b, sectores c, clasificaciones d where b.id_entidad=a.id_entidad and b.id_sector=c.id_sector and b.id_clasificacion=d.id_clasificacion".$condicion; 

                        $rs2=$mysqli->query($sql);

                        while($datos = $rs2->fetch_assoc())
                          {
                            $nombre = $datos['razon_social']. "-" . $datos['ano']. "-" . $datos['detalle'];

                    ?>
                    <tr class="clear-row">
                        <td class="text-left">
                            <?php echo $datos['razon_social']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['ano']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['titulo']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['estado']; ?>
                        </td>
                        <td class="text-left">
                            <?php echo $datos['resumen']; ?>
                        </td>
                        <td class="text-left">
                        <a href="eliminarp.php?id_proyecto=<?php echo $datos['id_proyecto']; ?>"><button type="button" class="btn btn-danger " name="descargar" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Anular">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button></a>
                        </td>
                        <td class="text-left">
                        <a href="mod_proy.php?id_proyecto=<?php echo $datos['id_proyecto']; ?>"><button type="button" class="btn btn-success " name="descargar" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Anular">
                        <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
                        </button></a>
                        </td>
                                     
                        <td class="text-center">                            
                        <?php
                        $sql="select nombre from archivos where id_proyecto=".$datos['id_proyecto'];
                        $rs1=$mysqli->query($sql);
                        while($datos1 = $rs1->fetch_assoc())
                          {
                            $nombre=$datos1['nombre'];
                            ?>
                             <a href="http://localhost/BancoTIC/archivos/<?php echo $nombre;?>" target="_blank"><?php echo $nombre; ?>                                 
                             </a>
                             <?php
                          } 
                          ?>
                        </td> 
                    </tr>
                    <?php
                            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
                
</div>
<?php
}
}
include("plantilla.php");
?>