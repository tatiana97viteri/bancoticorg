<?php
 include("conexion.php");
  session_start();
  
  $usr=$_SESSION['usu'];
  $hash=$_SESSION['hash'];


  $sql="DELETE FROM sesiones WHERE ses_usua='$usr' AND ses_hash='$hash'";
  $mysqli->query($sql);
  
  header("Location: index.php");

$_SESSION['usu'] = " ";
$_SESSION['hash']=" ";
$_SESSION['tipo']=" "; 
$_SESSION['clasificacion']=" "; 
?>