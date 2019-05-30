<?php
  include("conexion.php");
  session_start();
  
  $usr=$_SESSION['usu'];
  $hash=$_SESSION['hash'];
  

   
  $sql="SELECT ses_usua FROM sesiones WHERE ses_usua='$usr' AND ses_hash='$hash'";

$rs=$mysqli->query($sql);
  
  
  if ($rs->num_rows==0)
  {
     header("Location: index.php?error=2");
  }

  $expirar=time()-60;
  setcookie("sql","",$expirar);
  
?>