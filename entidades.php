 <?php
include("sesion.php");
extract ($_POST);

if($tipo=="5")
{
$tipo=4;
}

if($tipo=="6")
{
$tipo=4;
}

$usu=$_SESSION['usu'];
$tipou=$_SESSION['clasificacion'];

if($tipou=="5" || $tipou=="6")
{
$sql = "SELECT id_entidad, razon_social FROM entidades WHERE id_entidad in (select id_entidad from usuarios WHERE cedula=$usu)";
}
else
{
 $sql="SELECT id_entidad, razon_social FROM entidades WHERE tipo='$tipo'";
}
 $rs1=$mysqli->query($sql);
            while($datos = $rs1->fetch_assoc())
              {
                $valor=$datos['id_entidad'];
                $nombre=$datos['razon_social'];
                echo "<option value=\"$valor\">".$nombre."</option>";
              }
   ?>