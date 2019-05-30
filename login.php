<?php
include ("conexion.php");
extract ($_POST);

$usuario=$usu_num;
$clave=$usu_clav;

$sql="SELECT cedula, nombre, tipo, clave, clasificacion FROM usuarios where cedula=$usuario AND clave=md5('$clave')";


$rs=$mysqli->query($sql);

if($rs->num_rows==0)
{
 header("Location: index.php?error=1");
}
else
{

$datos = $rs->fetch_assoc();
$tipo=$datos['tipo'];
$clasificacion=$datos['clasificacion'];

 session_start();
 
 $usuario = str_replace("'", "", $usuario);

 mt_srand((double)microtime()*10000);
 $hash = $usuario . md5(microtime());
 $hash = str_replace("/", "X", $hash);

 
 //session_register("hash");
 //session_register("usu");
 
 $_SESSION['hash']=$hash;
 $_SESSION['usu']=$usuario;
 $_SESSION['tipo']=$tipo; 
 $_SESSION['clasificacion']=$clasificacion; 
 
 $remip=$_SERVER['REMOTE_ADDR'];
 
 $sqli="INSERT INTO sesiones (ses_usua, ses_hash, ses_ip, ses_fech) VALUES ('$usuario', '$hash', '$remip', NOW())";
 
 

  $mysqli->query($sqli);
 
 
 
 header("Location: principal.php");
}

?>