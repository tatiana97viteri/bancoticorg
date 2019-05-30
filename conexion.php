<?php
ini_set("display_errors", 1);
/*include("adodb/adodb.inc.php");
$conexion=&ADONewConnection("postgres");
$servidor="localhost";
$usuario="root";
$password="";
$bd="bancotic";
$conexion->PConnect($servidor,$usuario,$password,$bd);

function variable($var)
{

  global $conexion;
  $resultado=$conexion->qstr($var, get_magic_quotes_gpc());
  $resultado=str_replace(";", "", $resultado);
  $resultado=str_replace("--", "", $resultado);  
  $resultado=str_ireplace("DELETE", "", $resultado);  
  $resultado=str_ireplace("UPDATE", "", $resultado);  
  $resultado=str_ireplace("INSERT", "", $resultado);      
  $resultado=str_ireplace("DROP", "", $resultado);    
  return $resultado;  
}

function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=6;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

function variable1($var)
{

  global $conexion;
  $var="%".$var."%";
  $resultado=$conexion->qstr($var, get_magic_quotes_gpc());
  $resultado=str_replace(";", "", $resultado);
  $resultado=str_replace("--", "", $resultado);  
  $resultado=str_ireplace("DELETE", "", $resultado);  
  $resultado=str_ireplace("UPDATE", "", $resultado);  
  $resultado=str_ireplace("INSERT", "", $resultado);      
  $resultado=str_ireplace("DROP", "", $resultado);    
  return $resultado;  
}
*/



$mysqli = new mysqli('localhost', 'root', '', 'tuxston3_bancotic');
if ($mysqli->connect_errno) {    
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";  
    exit;
}
?>
