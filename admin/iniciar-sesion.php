<?php 
  session_start();
  if(isset($_GET['cerrar_sesion'])){
    $cerrar_sesion = $_GET['cerrar_sesion'];
    if($cerrar_sesion){
      session_destroy();
    }
  }
  if(isset($_SESSION['usuario'])){
    header('Location:panel-de-control.php');
    exit();
  }
  include("includes/header.php");
?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../index.php" class="h1"><b>Tiki</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicia sesión para administrar</p>

      <form action="../app/controladores/LoginController.php" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="hidden" name="accion" value="iniciar_sesion">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<?php include("includes/footer.php"); ?>  
