<?php
include("sesion.php");
function menu()
{
include("menu.php");
}

function contenido()
{
global $conexion, $_POST, $_REQUEST, $_GET, $_SESSION;
extract ($_POST);



$sql="SELECT id_sector, detalle FROM sectores";
$rs2=$conexion->Execute($sql);

$sql="SELECT id_clasificacion, detalle FROM clasificaciones";
$rs3=$conexion->Execute($sql);

$sql="SELECT int_region, detalle FROM region";
$rs4=$conexion->Execute($sql);

$sql="SELECT id_areas, detalle FROM areas";
$rs5=$conexion->Execute($sql);

$sql="SELECT id_eje, detalle FROM ejes";
$rs6=$conexion->Execute($sql);

$sql="SELECT id_sectorg, detalle FROM sector_gober";
$rs7=$conexion->Execute($sql);

?>


<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-10">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Registrar Proyectos</div>
            <div class="panel-body">
            <form class="form-signin" name="form1" action="reg_proy1.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Tipo de Entidad:</label>
            <select name="ptipo" id="ptipo" class="form-control" autofocus>
            <option value="0">Seleccione</option>
            <option value="5">Idea</option>
            <option value="6">Metodología General Ajustada</option>
            </select>
            <label for="nit">* Titulo del proyecto:</label>
            <input type="text" name="ptitulo" id="ptitulo" class="form-control" placeholder="" required >
            <label for="nit">* Fecha:</label>
            <input type="text" name="pfecha" id="pfecha" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Año:</label>
            <input type="text" name="pano" id="pano" class="form-control" placeholder="" required autofocus>
            <label for="nit">* N° Registro:</label>
            <input type="text" name="nume_regis" id="nume_regis" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Codigo DNP:</label>
            <input type="text" name="id_dnp" id="id_dnp" class="form-control" placeholder="" >  
             <label for="nit">* Entidad:</label>
            <select name="id_entidad" id="id_entidad" class="form-control">
           
            </select>    
            <label for="nit">* Sector:</label>
            <select name="id_sector" id="id_sector" class="form-control">
            <?php
            while(!$rs2->EOF)
              {
                $valor=$rs2->fields[0];
                $nombre=$rs2->fields[1];
                echo "<option value=\"$valor\">".$nombre."</option>";
                $rs2->moveNext();
              }
            ?>
            </select>
            <label for="nit">* Clasificacion:</label>
            <select name="id_clasificacion" id="id_clasificacion" class="form-control">
            <?php
            while(!$rs3->EOF)
              {
                $valor=$rs3->fields[0];
                $nombre=$rs3->fields[1];
                echo "<option value=\"$valor\">".$nombre."</option>";
                $rs3->moveNext();
              }
            ?>
            </select>    
            <label for="nit">* Resumen:</label><br/>
            <textarea name="resumen" id="resumen" class="form-control" rows="10" required></textarea>            
            <label for="nit">* Estado:</label>
            <select name="estado" id="estado" class="form-control">
            <option value="1">En curso</option>
            <option value="2">Terminado</option>
            <option value="3">No terminado</option>
            </select>
            <br/>

            <div id="universidad" class="hidden">
            <label for="nit">* Area de conocimiento:</label>
            <select name="pid_area" id="pid_area" class="form-control">
            <?php
            while(!$rs5->EOF)
              {
                $valor=$rs5->fields[0];
                $nombre=$rs5->fields[1];
                echo "<option value=\"$valor\">".$nombre."</option>";
                $rs5->moveNext();
              }
            ?>
            </select>  
            <label for="nit">* Programa:</label>
            <select name="pid_programa" id="pid_programa" class="form-control">
            
            </select>  
            <label for="nit">* Nivel Academico:</label>
            <select name="nivel_academico" id="nivel_academico" class="form-control">
            <option value="1">Pregrado</option>
            <option value="2">Posgrado</option>
            </select>
            <label for="nit">* Nivel Formación:</label>
            <select name="nivel_formacion" id="nivel_formacion" class="form-control">
            <option value="1">Especialización Tecnológica</option>
            <option value="2">Especialización Universitaria</option>
            <option value="3">Maestría</option>
            <option value="4">Universitaria</option>
            <option value="5">Tecnologica</option>
            </select>
            <label for="nit">* Metodología:</label>
            <select name="metodologia" id="metodologia" class="form-control">
            <option value="1">Distancia</option>
            <option value="2">Presencial</option>
            <option value="3">Virtual</option>
            </select>
            </div>

            <div id="autores" class="hidden">
            <label for="nit">* Registrar Autores:</label>
            <table name="tab1" id="tablanom" align=center class="table table-bordered table-striped table-condensed">
<thead>
<tr>
    <th><input type="checkbox"  class="form-control" name="chex" id="chex" onClick="ChequearTodos(this)" ></th>
    <th>Nombre Completo</th>
    <th class="text-right">
    <button type="button" class="btn btn-success btn-circle" aria-label="Left Align"  data-toggle="tooltip" data-placement="right" id="agregar" title="Agregar">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger btn-circle" aria-label="Left Align" data-toggle="tooltip" data-placement="right" id="eliminar" title="E">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
            </button></th>
</tr>
</thead>
<tbody name="tablebody" id="rowcont"> 
</tbody> 
</table>
<input type="hidden" id=contador  name="contador"  value="1"/>
            </div>

            <div id="aportes" class="hidden">
            
                        <label for="nit">* Registrar Aportes:</label>
            <table name="tab1" id="tablanom" align=center class="table table-bordered table-striped table-condensed">
<thead>
<tr>
    <th><input type="checkbox"   name="chex" id="chex" onClick="ChequearTodos(this)" ></th>
    <th>Descripción</th>
    <th>¿Pertenece a Regalia?</th>
    <th>Valor</th>
    <th class="text-right">
    <button type="button" class="btn btn-success btn-circle" aria-label="Left Align"  data-toggle="tooltip" data-placement="right" id="agregar1" title="Agregar">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger btn-circle" aria-label="Left Align" data-toggle="tooltip" data-placement="right" id="eliminar1" title="E">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
            </button></th>
</tr>
</thead>
<tbody name="tablebody" id="rowcont1"> 
</tbody> 
</table>
<input type="hidden" id=contador1  name="contador1"  value="1"/>



            </div>


            <div id="gobernacion" class="hidden">
            <label for="nit">* Proceso:</label>
            <input type="text" name="proceso" id="proceso" class="form-control" placeholder="" >  

            <label for="nit">* Eje:</label>
            <select name="id_eje" id="id_eje" class="form-control">           
            <option value="X">Seleccione</option>
            <?php
            while(!$rs6->EOF)
              {
                $valor=$rs6->fields[0];
                $nombre=$rs6->fields[1];
                echo "<option value=\"$valor\">".$nombre."</option>";
                $rs6->moveNext();
              }
            ?>
            </select> 
            <label for="nit">* Politica:</label>
            <select name="id_politica" id="id_politica" class="form-control">
            </select>  
            <label for="nit">* Programa:</label>
            <select name="id_programa" id="id_programa" class="form-control">           
            </select> 
            <label for="nit">* Subprograma:</label>
            <select name="id_subprograma" id="id_subprograma" class="form-control">
            </select>  
            <label for="nit">* Meta:</label>
            <select name="id_meta" id="id_meta" class="form-control">           
            </select> 
            

            <label for="nit">* Región:</label>
            <select name="int_region" id="int_region" class="form-control">
            <option value="X">Seleccione</option>
            <?php
            while(!$rs4->EOF)
              {
                $valor=$rs4->fields[0];
                $nombre=$rs4->fields[1];
                echo "<option value=\"$valor\">".$nombre."</option>";
                $rs4->moveNext();
              }
            ?>
            </select>  
            <label for="nit">* Departamento:</label>
            <select name="int_departamento" id="int_departamento" class="form-control">           
            </select> 
            <label for="nit">* Municipio:</label>
            <select name="int_municipio" id="int_municipio" class="form-control">
            </select>  
            <label for="nit">* Unidad Ejecutora:</label>
            <input type="text" name="unidad_ejecutora" id="unidad_ejecutora" class="form-control" placeholder="" >
            <label for="nit">* Codigo Sector :</label>
            <select name="id_sectorg" id="id_sectorg" class="form-control">  
            <option value="X">Seleccione</option>
            <?php
            while(!$rs7->EOF)
              {
                $valor=$rs7->fields[0];
                $nombre=$rs7->fields[1];
                echo "<option value=\"$valor\">".$nombre."</option>";
                $rs7->moveNext();
              }
            ?>         
            </select> 
            <label for="nit">* Programa Gobernacion :</label>
            <select name="id_programag" id="id_programag" class="form-control">           
            </select> 
            </div>
            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Registrar
            </button>         
            </form>
          </div>
         </div>
         
        </div>
        <div class="col-md-1">
        </div>
      </div>
<?php
if(isset($_POST['boton']))
{
  extract ($_POST);

    $sql="INSERT INTO proyectos (nume_regis, ano, titulo, id_sector, id_clasificacion, resumen, fecha_regi, estado, tipo, id_entidad,id_dnp) VALUES ('$nume_regis', '$pano', '$ptitulo', $id_sector, $id_clasificacion, '$resumen', '$pfecha', '$estado', '$ptipo', $id_entidad, $id_dnp)";


    if($conexion->Execute($sql))
     {

   $sql="SELECT  id_proyecto FROM proyectos WHERE nume_regis='$nume_regis' AND ano='$pano' AND titulo='$ptitulo' AND id_sector = $id_sector AND id_clasificacion = $id_clasificacion AND resumen = '$resumen' AND  fecha_regi='$pfecha' AND estado='$estado' AND tipo='$ptipo' AND id_entidad=$id_entidad";
   
   

   $rs5=$conexion->Execute($sql);


   $id = $rs5->fields[0];

    if($ptipo == '2')
    {

        for ($i=0;$i<count($regalia);$i++)
          {

          $sql = "INSERT  INTO aportes (id_proyecto, regalias, descripcion, valor) VALUES ($id, '$regalia[$i]', '$descripcion[$i]', $valor[$i])";
          $conexion->Execute($sql);

          }

    }

    if($ptipo == '3')
    {
        for ($i=0;$i<count($nombre);$i++)
          {

          $sql = "INSERT INTO autores (id_proyecto, nombre) VALUES ($id, '$nombre[$i]')";
          $conexion->Execute($sql);
          
          }
          $sql = "INSERT INTO universidades (id_proyecto, nivel_academico, nivel_formacion, metodologia) VALUES ($id, '$nivel_academico', '$nivel_formacion', '$metodologia')";
          $conexion->Execute($sql);


    }

    if($ptipo == '4')
    {
        $id_usuario=$_SESSION['usu'];
      for ($i=0;$i<count($regalia);$i++)
          {

          $sql = "INSERT INTO aportes (id_proyecto, regalias, descripcion, valor) VALUES ($id, '$regalia[$i]', '$descripcion[$i]', $valor[$i])";
          $conexion->Execute($sql);
          
          }
          $sql = "INSERT INTO gobernacion (id_proyecto,  proceso, int_municipio, unidad_ejecutora, acepta_terminos, id_usuario, id_meta, id_programag) VALUES ($id, '$proceso', '$int_municipio', '$unidad_ejecutora', 'S', $id_usuario, $id_meta, $id_programag)";
          $conexion->Execute($sql);
          
    }

    
  ?>
      <script type="text/javascript">
      alert('Se ha agregado un nuevo proyecto exitosamente');
      </script>

      <?php
     }
}


}
include("plantilla.php");
?>