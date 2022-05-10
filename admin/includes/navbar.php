<body class="hold-transition sidebar-mini layout-navbar-fixed sidebar-collapse">
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../resources/img/logoTiki.png" alt="Tiki - Restobar" width="120">
</div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="panel-de-control.php" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.php" class="nav-link">Pagina Web</a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="nav-item dropdown user user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="resources/img/avatar.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['nombre'] ?></span>
          </a>
          <div class="dropdown-menu">
            <!-- User image -->
            <div class="card-header text-center">
              <img src="resources/img/avatar.png" class="img-circle" alt="User Image">
              <p>
                <?php echo $_SESSION['nombre'] ?> - 
                <small><?php echo $_SESSION['tipo_usuario'] ?></small>
              </p>
            </div>
            <!-- Menu Footer-->
            <div class="card-footer">
              <div class="row justify-content-between">
                <a href="usuario.php?id=<?php echo $_SESSION['codigo'] ?>" class="btn btn-success btn-flat">Perfil</a>
                <a href="iniciar-sesion.php?cerrar_sesion=true" class="btn btn-danger btn-flat">Cerrar Sesion</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
  </nav>
  <!-- /.navbar -->