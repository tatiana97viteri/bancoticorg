<?php
//session_start();
$tipo=$_SESSION['tipo'];

//Administrador
if($tipo==1)
{
  ?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span> 
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="principal.php"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> BancoTIC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Administración<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cla_proy.php">Clasificación de proyectos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="sec_eco.php">Sector Económico</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="are_con.php">Areas del conocimiento</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="reg_programas.php">Programas Universidad</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="reje.php">Ejes</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="reg_politca.php">Politicas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="reg_progob.php">Programas Gobernación</a></li>
            <li role="separator" class="divider"></li>
             <li><a href="reg_subprogob.php">Subprogramas Gobernación</a></li>
            <li role="separator" class="divider"></li>
             <li><a href="reg_metas.php">Metas Gobernación</a></li>             
            <li role="separator" class="divider"></li>
             <li><a href="rregion.php">Regiones</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="depart.php">Departamentos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="municipi.php">Municipios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="reg_entidades.php">Entidades</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="usuarios.php">Usuarios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="reg_proy.php">Registrar proyectos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="imp_arch.php">Cargar Archivos proyectos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="proyec.php">Consultar proyectos</a></li>
          </ul>
        </li>      
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Usuario<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="cam_clave.php">Cambiar contraseña</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
}
if($tipo==2)
{
  ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="principal.php"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> BancoTIC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
                
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="reg_proy.php">Registrar Proyecto</a></li>
          <li role="separator" class="divider"></li>
            <li><a href="imp_arch.php">Cargar Archivos proyectos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="proyec.php">Consultar</a></li>
          </ul>
        </li>
    
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Usuario<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="cam_clave.php">Cambiar contraseña</a></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
}
if($tipo==3)
{
  ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="principal.php"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> BancoTIC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">  
       <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Proyectos<span class="caret"></span></a>
          <ul class="dropdown-menu">          
            <li><a href="reg_proy.php">Registrar proyectos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="proyec1.php">Consultar</a></li>
          </ul>
        </li>       
              <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Usuario<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="cam_clave.php">Cambiar contraseña</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
          </ul>
        </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
}

?>

