<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../resources/img/logoTiki.png" alt="" class="logo-image">
      <span class="brand-text font-weight-light">Tiki - Restobar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="resources/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="usuario.php?id=<?php echo $_SESSION['codigo'] ?>" class="d-block"><?php echo $_SESSION['nombre'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="panel-de-control.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Panel de control</p>
            </a>
          </li>
          <li class="nav-header">RESTOBAR</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Carta
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cartas.php" class="nav-link">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Listar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="carta.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="productos.php" class="nav-link">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Listar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="producto.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clone"></i>
              <p>
                Tipos de producto
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tipos-de-producto.php" class="nav-link">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Listar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tipo-de-producto.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cloud-sun"></i>
              <p>
                Planes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="planes.php" class="nav-link">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Listar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="plan.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">ATENCION</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usuarios.php" class="nav-link">
                  <i class="nav-icon fas fa-list-ul"></i>
                  <p>Listar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="usuario.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="clientes.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pedidos.php" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Pedidos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reservas.php" class="nav-link">
            <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Reservas
              </p>
            </a>
          </li>
          <li class="nav-header">CONTACTOS</li>
          <li class="nav-item">
            <a href="contactos.php" class="nav-link">
            <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contactos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="mensajes.php" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mensajes
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>