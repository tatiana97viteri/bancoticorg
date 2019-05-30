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

$sql="SELECT id_proyecto, titulo FROM proyectos";
$rs1=$mysqli->query($sql);

?>
<div class="container text-center col-lg-12">
      <div class="col-md-1">
        <br/><br/><br/><br/>
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Cargar Archivo de Proyecto</div>
            <div class="panel-body">
            <form class="form-signin" action="imp_arch.php" method="post" enctype="multipart/form-data">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>           
            <label for="nit">* Proyecto:</label>
            <select name="id_proyecto" id="id_proyecto" class="form-control">
            <option value="0">No aplica</option>
            <?php

            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_proyecto'];
                $nombre=$datos['titulo'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
            ?>
            </select>   
            <label for="nit">* Seleccione Archivo:</label>
            <input type="file" name="archivo" class="form-control" accept="application/pdf">                                      
            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Cargar
            </button>
            <br/>
            </form>
          </div>
         </div>
         
        </div>
        <div class="col-md-5">
        
        <img src="images/A8.png" class="img-responsive"> 
        </div>
      </div>
<?php

///////////////////////////

if(isset($_POST['boton'])) 
{
	extract ($_POST);
	
	 // obtenemos los datos del archivo
	
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
    $estructura="archivos";
	$importar="2";
   
   $nombre=$estructura."_".$id_proyecto."_3_".$prefijo.".pdf";
   $status = 2;
   
    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "archivos/".$nombre;
        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
            $status = 1;
        } else {
            $status = 2;
        }
    } else {
        $status = 2;
    }
	
	//Esto sirve para visualizar los archivos
	//echo "<a href=\"http://localhost/BancoProyectos/anteproyecto/$nombre\">$nombre</a>";
	if($status==1)
	{
	$sql="INSERT INTO archivos (id_proyecto,nombre,ruta) 
        VALUES ($id_proyecto,'$nombre','$destino')";	 

     if($resultado=$mysqli->query($sql))
     {
		
	 }
	  else
	 {
		 ?>
      <script type="text/javascript">
      alert('Se ha agregado un nuevo archivo al proyecto');
      </script>

      <?php
	 }

	}
}	
////////////////////////////7

}
include("plantilla.php");
?>