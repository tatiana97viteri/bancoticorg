<?php
include("conexion.php");
function menu()
{
}

function contenido()
{
global $conexion, $_POST, $_REQUEST, $_GET, $_SESSION,$mysqli;
?>
<div class="container text-center col-lg-12">
  <br><br><br>
      <div class="col-md-1">       
        </div>
        <div class="col-md-6">
          
          <div class="panel panel-primary">
          <div class="panel-heading">Recuperar Contraseña</div>
            <div class="panel-body">
            <form class="form-signin" action="olvidoclave.php" name="myform" method="post">
            <h5 class=" text-danger">Campo obligatorio (*)</h5>
            <label for="nit">* Usuario:</label>
            <input type="text" name="usua" id="usua" class="form-control" required>           
            <br/>
            <button type="submit" class="btn btn-primary " name="boton" aria-label="Left Align" data-toggle="tooltip" data-placement="left" title="Registrar">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Recuperar
            </button>
            <br/>
            <br/>
            </form>
          </div>
         </div>
        </div>
        <div class="col-md-5">
          <img src="images/I7.png" class="img-responsive"> 
        </div>
    </div>
<?php
if(isset($_POST['boton']))
{
  ?>
   <div class="container text-center col-lg-12">
  <?php
     extract ($_POST);
     include ("correo.php");
     
     $clavenueva = generaPass();
     

     $sql="SELECT correo, nombre FROM usuarios WHERE cedula=$usua";
         

     if($rs1=$mysqli->query($sql))
     {
      $ban=0;
      while($datos = $rs1->fetch_assoc())
      {
        $ban++;
        $correo = $datos['correo'];
        $nombre = $datos['nombre'];

      }
      if($ban==0)
      {
         ?>
            <div class="alert alert-danger" role="alert">
             <?php
             echo "<p> El usuario no existe.</p>";      
             ?> 
            </div>
        <?php
      }
      else
      {
        $sql="UPDATE usuarios SET clave=md5('$clavenueva')  WHERE cedula=$usua";
  
      if($rs1=$mysqli->query($sql))
       {                
         $mail->Subject = 'Recuperacion clave BancoTIC';     

         $mail->Body='Usted a solicitado recuperar su contraseña, por lo tanto le enviamos una contraseña aleatoria con la cual podra iniciar sesión, se le recomienda cambiar la contraseña. <br><br> Contraseña Aleatoria: <br><b>'.$clavenueva.'</b> <br><br> Cordialmente, <br>Aplicaci&oacute;n Bancos de Proyecto TIC<br><br>Por favor no responda este mensaje por correo electr&oacute;nico';

         $mail->AltBody='Usted a solicitado recuperar su contraseña, por lo tanto le enviamos una contraseña aleatoria con la cual podra iniciar sesión, se le recomienda cambiar la contraseña. <br><br> Contraseña Aleatoria: <br><b>'.$clavenueva.'</b>. <br><br> Cordialmente, <br>Aplicaci&oacute;n Bancos de Proyecto TIC<br><br>Por favor no responda este mensaje por correo electr&oacute;nico';

         $mail->addAddress($correo, $nombre);

          if(!$mail->send()) {
          ?>
             <div class="alert alert-danger" role="alert">
             <?php
             echo "<p> El mensaje no pudo ser enviado. <br>Mailer Error: $mail->ErrorInfo </p>";      
             ?> 
             </div>
          <?php
          }
          else
          {
            ?>
             <div class="alert alert-success" role="alert">
              <?php
              echo "<p> Mensaje enviado correctamente con la recuperación de la contraseña. De clic en el siguiente enlace <a href='index.php'>Iniciar Sesión</a></p>";      
              ?> 
             </div>
            <?php
          }
       }
      }
     }
}
?>
</div>
<?php
}
include("plantilla.php");
?>