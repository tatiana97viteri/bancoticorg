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

$tipou=$_SESSION['clasificacion'];

$sql="SELECT id_sector, detalle FROM sectores";
$rs2=$mysqli->query($sql);

$sql="SELECT id_clasificacion, detalle FROM clasificaciones";
$rs3=$mysqli->query($sql);

$sql="SELECT int_region, detalle FROM region";
$rs4=$mysqli->query($sql);

$sql="SELECT id_areas, detalle FROM areas";
$rs5=$mysqli->query($sql);

$sql="SELECT id_eje, detalle FROM ejes";
$rs6=$mysqli->query($sql);

$sql="SELECT id_sectorg, detalle FROM sector_gober";
$rs7=$mysqli->query($sql);
?>

<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-10">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Registrar Proyectos</div>
            <div class="panel-body">
            <form class="form-signin" name="form1" action="reg_proy.php" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Tipo de Entidad:</label>
            <select name="ptipo" id="ptipo" class="form-control" autofocus>
            <option value="0">Seleccione</option>
            
            <?php

            if($tipou=="1")
            {
            ?>
            <option value="2">Empresa</option>
            <option value="3">Universidad</option>
            <option value="4">Gobernación</option>
            <option value="5">Idea</option>
            <option value="6">Metodología General Ajustada</option>
            <?php
            }
            ?>

            <?php
            if($tipou=="7")
            {
            ?>
            <option value="2">Empresa</option>
            <option value="3">Universidad</option>
            <option value="4">Gobernación</option>
            <option value="5">Idea</option>
            <option value="6">Metodología General Ajustada</option>
            <?php
            }
            ?>

            <?php
            if($tipou=="2")
            {
            ?>
            <option value="5">Idea</option>
            <option value="6">Metodología General Ajustada</option>
            <?php
            }
            ?>

            <?php
            if($tipou=="3")
            {
            ?>
            <option value="5">Idea</option>
            <option value="6">Metodología General Ajustada</option>
            <?php
            }
            ?>

             <?php
            if($tipou=="4")
            {
            ?>
            <option value="3">Universidad</option>
            <?php
            }
            ?>

             <?php
            if($tipou=="5")
            {
            ?>
            <option value="2">Empresa</option>
            <?php
            }
            ?>

             <?php
            if($tipou=="6")
            {
            ?>
            <option value="4">Gobernación</option>
            <?php
            }
            ?>
            
            </select>
            <label for="nit">* Titulo del proyecto:</label>
            <input type="text" name="ptitulo" id="ptitulo" class="form-control" placeholder="" required >
            <label for="nit">* Fecha:</label>
            <input type="text" name="pfecha" id="pfecha" class="form-control" placeholder="" required autofocus>
            <label for="nit">* Año:</label>
            <input type="text" name="pano" id="pano" class="form-control" placeholder="" required autofocus>
            <label for="nit">* N° Registro:</label>
            <input type="text" name="nume_regis" id="nume_regis" class="form-control" placeholder="" required autofocus>
            <label for="nit" id="nid_dnp">* Codigo DNP:</label>
            <input type="text" name="id_dnp" id="id_dnp" class="form-control" placeholder="" >  
             <label for="nit">* Entidad:</label>
            <select name="id_entidad" id="id_entidad" class="form-control">
           
            </select>    
            <label for="nit">* Sector:</label>
            <select name="id_sector" id="id_sector" class="form-control">
            <?php
            while($datos = $rs2->fetch_assoc())
              {
                $valor=$datos['id_sector'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>
            <label for="nit">* Clasificacion:</label>
            <select name="id_clasificacion" id="id_clasificacion" class="form-control">
            <?php
            while($datos = $rs3->fetch_assoc())
              {
                $valor=$datos['id_clasificacion'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>    
            <label for="nit">* Resumen:</label><br/>
            <textarea name="resumen" id="resumen" class="form-control" rows="10" required></textarea> 

            <label for="nit">* Tipo de Población:</label>
            <select name="poblacion" id="poblacion" class="form-control">
            <option value="1">Ninguno</option>
            <option value="2">Adulto Mayor</option>
            <option value="4">Mujer Cabeza de Hogar</option>
            <option value="5">Victima</option>
            <option value="6">Afrocolombianos</option>
            <option value="7">Indigenas</option>
            <option value="8">LGTBI</option>
            </select>

            <label for="nit">* Estado:</label>
            <select name="estado" id="estado" class="form-control">
            <option value="1">En curso</option>
            <option value="2">Terminado</option>
            <option value="4">Actualizado</option>
            <option value="5">Presentado</option>
            <option value="6">Aceptado</option>
            <option value="7">Inactivo</option>
            </select>
            <br/>

            <div id="universidad" class="hidden">
            <label for="nit">* Area de conocimiento:</label>
            <select name="pid_area" id="pid_area" class="form-control">
            <?php
            echo "<option value=0>Seleccione</option>";
            while($datos = $rs5->fetch_assoc())
              {
                $valor=$datos['id_areas'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
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
            <!--<label for="nit">* Proceso:</label>-->
            <input type="hidden" name="proceso" id="proceso" value="NA" class="form-control" placeholder="" >  

            <label for="nit">* Eje:</label>
            <select name="id_eje" id="id_eje" class="form-control">           
            <option value="X">Seleccione</option>
            <?php
            while($datos = $rs6->fetch_assoc())
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
            while($datos = $rs4->fetch_assoc())
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
            <label for="nit">* Municipio:</label>
            <select name="int_municipio" id="int_municipio" class="form-control">
            </select>  
            <label for="nit">* Unidad Ejecutora:</label>
            <input type="text" name="unidad_ejecutora" id="unidad_ejecutora" class="form-control" placeholder="" >
            <!--<label for="nit">* Codigo Sector :</label>
            <select name="id_sectorg" id="id_sectorg" class="form-control">  
            <option value="X">Seleccione</option>-->
            <?php
            /*while($datos = $rs7->fetch_assoc())
              {
                $valor=$datos['id_sectorg'];
                $nombre=$datos['detalle'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
              */
            ?>         
            <!--</select> 
            <label for="nit">* Programa Gobernacion :</label>
            <select name="id_programag" id="id_programag" class="form-control">           
            </select> -->
            </div>
            <label for="nit">* Desea ser contactado: </label>
            <br/>
            <input type="radio" name="contacto" id="contacto" value="S" checked>Si
            <input type="radio" name="contacto" id="contacto" value="N">No
            <br/><br/>

            <label for="nit">* Acepta Terminos y condiciones: </label>
             Al acceder, navegar o usar el sitio web BancoTIC (www.bancotic.co), (“el sitio”) el usuario admite haber leído y entendido los presentes términos y condiciones de uso ... <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">continuar</button>
            <br/>
            <input type="radio" name="terminos" id="terminos" value="S" checked>Si
            <input type="radio" name="terminos" id="terminos" value="N">No
            <br/><br/>
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

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">ACEPTACIÓN DE TÉRMINOS Y CONDICIONES DE USO Y DE TRATAMIENTO DE DATOS PERSONALES</h4>
                                    </div>
                                    <div class="modal-body text-justify">
                                         Al acceder, navegar o usar el sitio web BancoTIC (www.bancotic.co), (“el sitio”) el usuario admite haber leído y entendido los presentes términos y condiciones de uso (los “Términos y Condiciones de Uso”) y cumplir con todas las leyes y reglamentos aplicables que hagan parte de la legislación colombiana y las determinaciones que BancoTIC tengan al respecto de su uso. Además, cuando el usuario utilice cualquier servicio información suministrados en este sitio web, estará sujeto a las reglas, guías, políticas, términos y condiciones aplicables a dicho servicio. En el evento que el usuario no esté de acuerdo con estos términos y condiciones de uso, comedidamente le solicitamos el favor de abstenerse a navegar y usar el sitio web. Este sitio es controlado, operado y administrado por BancoTIC, por intermedio de las áreas encargadas de su administración y por los terceros vinculados al proyecto. Su objetivo es entregar información relacionada con el objeto del Sistema de Información para el Banco de Proyectos TIC del Departamento del Meta que Ayudan y permiten el uso transaccional de la plataforma para las personas que deseen consultar y cargar información de Proyectos TIC.  El sitio web de BancoTIC (www.bancotic.co) es un sitio digital de carácter público. Su función es prestar servicios informativos, de contenidos y transaccionales. Este sitio web puede contener vínculos a otros sitios que no están bajo su control y por eso no es responsable de los contenidos, cambios o actualizaciones en dichos sitios. Derechos de Autor Todo el material informático, gráfico, publicitario, fotográfico, de multimedia, audiovisual y de diseño, así como todos los contenidos, textos y bases de datos puestos a su disposición en este sitio son de propiedad exclusiva de BancoTIC. y de la Gobernación del Meta, o en algunos casos, de terceros que han autorizado a BancoTIC para su uso o explotación. Todos los contenidos publicados en el sitio están protegidos por las normas sobre Derechos de Autor y por todas las normas nacionales e internacionales que le sean aplicables. Queda prohibido todo acto de copia, reproducción, modificación, creación de trabajos derivados, venta o distribución, exhibición de los contenidos aquí publicados. En ningún caso estos Términos y Condiciones confieren derechos, licencias ni autorizaciones para realizar los actos anteriormente prohibidos. Cualquier uso no autorizado de los contenidos constituirá una violación a los presentes Términos y Condiciones y de las normas vigentes sobre derechos de autor y a cualquier otra que sea aplicable. <br>

Propiedad de marca e industrial Las marcas, logos, nombres y cualquier otro signo distintivo y demás elementos de propiedad industrial o intelectual insertados, usados o desplegados en este sitio, relacionados con BancoTIC son propiedad exclusiva de BancoTIC y Gobernación del Meta. Por su parte, los logos, marcas, nombres y demás elementos de propiedad industrial o intelectual insertados, usados o desplegados en este sitio y cualquier otro signo distintivo relacionados con la Gobernación del Meta, entidad que apoya el proyecto, pertenece a dicha entidad y ha autorizado expresamente a BancoTIC para su uso o explotación. Consultas El usuario se obliga a usar los contenidos de una manera diligente, correcta, lícita y, en especial, se compromete a no realizar las conductas descritas a continuación: (a) Utilizar los contenidos con fines o efectos contrarios a la ley, a la moral y a las buenas costumbres generalmente aceptadas. (b) Reproducir, copiar, representar, utilizar, distribuir, transformar o modificar los contenidos, por cualquier procedimiento o sobre cualquier soporte, total o parcial del Sitio o permitir el acceso de otras personas a través de cualquier modalidad de comunicación pública. (d) Utilizar el sitio web y sus servicios con fines o efectos ilícitos, contrarios a lo establecido en estos Términos y Condiciones o que de cualquier forma que pueda dañar, inutilizar, sobrecargar o deteriorare impedir su normal utilización por parte de los usuarios. Revisión de los Términos BancoTIC puede en cualquier momento revisar estos Términos y Condiciones de Uso aquí contenidos, por medio de la actualización de este anuncio. PROTECCIÓN DE DATOS PERSONALES-PRIVACIDAD EN EL MANEJO DE LA INFORMACIÓN En cumplimiento de lo establecido en la Ley 1581 de 2012 y el Decreto Reglamentario 1377 de 2013 les informamos sobre el tratamiento que se le dará a sus datos personales cuando los mismos son recolectados, utilizados, almacenados, transmitidos y transferidos por BancoTIC y la Gobernación del Meta dentro de su gestión de comunicaciones de productos y servicios relacionados con sus objetos  sociales. 1. Finalidades y Tratamiento al cual serán sometidos los Datos Personales: <br>

Cualquier persona que realice una consulta en el sitio www.bancotic.co, actuando libre y voluntariamente. Los datos recolectados en bases de datos serán utilizados con el fin de proporcionar información a las personas inscritas en éstas sobre los proyectos y servicios de BancoTIC. Los datos podrán también ser usados por BancoTIC y la Gobernación del Meta para el envío ocasional de información sobre temas relacionados. 2. En consecuencia, para las finalidades descritas, BancoTIC y la Gobernación del Meta  podrán: • Conocer, almacenar y procesar toda la información suministrada por los titulares en una o varias bases de datos, en el formato que se estime más conveniente y con los campos básicos de captación de datos (nombres y apellidos, correo electrónico, documento de identidad, dirección física, ciudad de residencia, teléfonos, aceptación de los términos de uso de la plataforma desde donde se tomarán los datos). • Ordenar, catalogar, clasificar, dividir o separar la información suministrada por los titulares. • Verificar, corroborar, comprobar, validar, investigar o comparar la información suministrada por los titulares, con cualquier información de que disponga legítimamente. • Acceder, consultar, comparar y evaluar toda la información que sobre los titulares se encuentre almacenada en las bases de datos. • Analizar, procesar, evaluar, tratar o comparar la información suministrada por los titulares. •En caso de que BancoTIC y la Gobernación del Meta no se encuentren en capacidad de realizar el tratamiento por sus propios medios o garantizar el respaldo de estos, podrán transferir los datos recopilados para que sean tratados y administrados por un tercero, previa notificación a los titulares de los datos recopilados, el cual será el encargado del tratamiento y deberá garantizar condiciones idóneas de confidencialidad y seguridad de la información transferida para el tratamiento. 3. Derechos de los Titulares: Los titulares de los datos tratados por Postobón S.A. y la Cruz Roja Colombiana: • Conocer, actualizar y rectificar los datos personales frente a BancoTIC y la Gobernación del Meta como responsables o encargado del tratamiento, o ejercer el derecho frente a quien haya recibido los datos como resultado de la transmisión de los mismos. Este derecho se podrá ejercer, entre otros, frente a datos parciales, inexactos, incompletos, fraccionados, que induzcan a error, o aquellos cuyo tratamiento esté expresamente prohibido o no haya sido autorizado. <br>

Ser informado por BancoTIC y la Gobernación del Meta como responsables del tratamiento, o por el encargado del tratamiento, previa solicitud, respecto del uso que le ha dado a los datos personales. <br>

• Presentar ante la Superintendencia de Industria y Comercio quejas por infracciones al régimen de protección de datos personales. <br>

Revocar la autorización y/o solicitar la supresión del dato personal cuando en el tratamiento no se respeten los principios, derechos y garantías constitucionales y legales. <br>

AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES De conformidad con la Ley de Protección de Datos Personales (Ley 1581 de 2012) autorizo a BancoTIC; y a la Gobernación del Meta con NIT 892-000148-8, en adelante “La Gobernación del Meta”, para que lleve a cabo el tratamiento de mis datos personales. Adicionalmente, manifiesto que he sido informado por BancoTIC y la Gobernación del Meta, por intermedio de la sección Términos y Condiciones del sitio web www.bancotic.co, que: 1. BancoTIC y la Gobernación del Meta actuarán como Responsables del Tratamiento de datos personales de los cuales soy titular y podrán recolectar, usar y tratar mis datos personales conforme con la Política de Tratamiento de Datos Personales. Los datos recolectados serán utilizados con el fin de proporcionar información a los usuarios sobre las actividades y servicios ofrecidos por ambas entidades. Igualmente, estas bases de datos se utilizarán para almacenar y mantener un registro de los usuarios de los sitios web que posee BancoTIC y la Gobernación del Meta (incluyendo el sitio web www.bancotic.co) con sus distintos programas e iniciativas. 2. Los datos podrán también ser usados por BancoTIC y la Gobernación del Meta, para el envío ocasional de información sobre temas relacionados. 3. Tengo derecho a revocar el consentimiento otorgado para el tratamiento de datos personales y/o solicitar la eliminación de la información. 4. El uso de los datos por BancoTIC perderá vigencia en el momento en que el titular solicite el retiro de las bases de datos para lo cual puede escribir para el caso de BancoTIC al correo electrónico: datospersonales@bancotic.co. 5. BancoTIC y la Gobernación del Meta garantizan la confidencialidad, seguridad, veracidad, transparencia, acceso y circulación restringida de mis datos. 6. BancoTIC y la Gobernación del Meta se reservan el derecho de modificar esta Política de Tratamiento de Datos Personales en cualquier momento. Cualquier cambio será informado y publicado oportunamente en la página web. Teniendo en cuenta lo anterior, autorizo de manera voluntaria, previa, explícita e informada a BancoTIC y la Gobernación del Meta para tratar mis datos personales y adicionalmente, autorizo a estas entidades llevar a cabo el tratamiento de la información sensible que les estoy suministrando, de acuerdo con la Política de Tratamiento de Datos Personales determinada y para los fines relacionados con su objeto. 

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


<?php
if(isset($_POST['boton']))
{
  extract ($_POST);

    $sql="INSERT INTO proyectos (nume_regis, ano, titulo, id_sector, id_clasificacion, resumen, fecha_regi, estado, tipo, id_entidad,id_dnp,tipopo,terminos,contacto) VALUES ('$nume_regis', '$pano', '$ptitulo', $id_sector, $id_clasificacion, '$resumen', '$pfecha', '$estado', '$ptipo', $id_entidad, '$id_dnp','$poblacion', '$terminos', '$contacto')";


    if($resultado=$mysqli->query($sql))
     {

   $sql="SELECT  id_proyecto FROM proyectos WHERE nume_regis='$nume_regis' AND ano='$pano' AND titulo='$ptitulo' AND id_sector = $id_sector AND id_clasificacion = $id_clasificacion AND resumen = '$resumen' AND  fecha_regi='$pfecha' AND estado='$estado' AND tipo='$ptipo' AND id_entidad=$id_entidad AND id_dnp='$id_dnp' AND tipopo='$poblacion'";
   
   

   $rs5=$mysqli->query($sql);
   $datos = $rs5->fetch_assoc();


   $id = $datos['id_proyecto'];

    if($ptipo == '2')
    {

        for ($i=0;$i<count($regalia);$i++)
          {

          $sql = "INSERT  INTO aportes (id_proyecto, regalias, descripcion, valor) VALUES ($id, '$regalia[$i]', '$descripcion[$i]', $valor[$i])";
          $mysqli->query($sql);

          }

    }

    if($ptipo == '3')
    {
        for ($i=0;$i<count($nombre);$i++)
          {

          $sql = "INSERT INTO autores (id_proyecto, nombre) VALUES ($id, '$nombre[$i]')";
          $mysqli->query($sql);
          
          }
          $sql = "INSERT INTO universidades (id_proyecto, nivel_academico, nivel_formacion, metodologia, id_programa) VALUES ($id, '$nivel_academico', '$nivel_formacion', '$metodologia', $pid_programa)";
          $mysqli->query($sql);


    }

    if($ptipo == '4')
    {
        $id_usuario=$_SESSION['usu'];
      for ($i=0;$i<count($regalia);$i++)
          {

          $sql = "INSERT INTO aportes (id_proyecto, regalias, descripcion, valor) VALUES ($id, '$regalia[$i]', '$descripcion[$i]', $valor[$i])";
          $mysqli->query($sql);
          
          }
          $sql = "INSERT INTO gobernacion (id_proyecto,  proceso, int_municipio, unidad_ejecutora, acepta_terminos, id_usuario, id_meta, id_programag) VALUES ($id, '$proceso', $int_municipio, '$unidad_ejecutora', 'S', $id_usuario, $id_meta, $id_programag)";
          $mysqli->query($sql);
          
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