<?php 
  include("../config/session.php");
  include("includes/header.php");
  include("includes/navbar.php");
  include("includes/asidebar.php");
  include("../config/conexion.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Panel de control</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Informacion general</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-6">
              <?php 
                include("../app/modelos/Pedido.php");
                $pedidos = new Pedido();
                $data = $pedidos->get_ventas_totales();
              ?>              
              <!-- small card -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo "S/. " . number_format((float)$data['total'], 2); ?></h3>
                  <p>Ganancias Totales</p>
                </div>
                <div class="icon">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="pedidos.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <?php 
                $data = $pedidos->get_cantidad_pedidos();
              ?>             
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $data['cantidad_pedidos']; ?></h3>
                  <p>Total de Pedidos</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                </div>
                <a href="pedidos.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <?php 
                $data = $pedidos->get_productos_totales();
              ?>              
              <!-- small card -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $data['total_productos']; ?></h3>
                  <p>Productos vendidos</p>
                </div>
                <div class="icon">
                  <i class="fas fa-utensils"></i>
                </div>
                <a href="pedidos.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <?php
                include("../app/modelos/Reserva.php");
                $reserva = new Reserva();
                $data = $reserva->get_cantidad_reservas();
              ?>              
              <!-- small card -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $data['cantidad_reservas']; ?></h3>
                  <p>Total de Reservas</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-calendar-check"></i>
                </div>
                <a href="reservas.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Adicional</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-6">
              <?php 
                $data = $pedidos->get_envio_totales();
              ?>              
              <!-- small card -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo "S/. " . number_format((float)$data['total_envio'], 2); ?></h3>
                  <p>Total en Envios</p>
                </div>
                <div class="icon">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="pedidos.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <?php 
                $data = $pedidos->get_propinas_totales();
              ?>              
              <!-- small card -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo "S/. " . number_format((float)$data['total_propina'], 2); ?></h3>
                  <p>Propinas Totales</p>
                </div>
                <div class="icon">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="pedidos.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Informacion de personas</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-6">
              <?php
                include("../app/modelos/Usuario.php");
                $usuario = new Usuario();
                $data = $usuario->get_cantidad_usuarios();
              ?>              
              <!-- small card -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $data['cantidad_usuarios']; ?></h3>
                  <p>Total de Usuarios</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-user-circle"></i>
                </div>
                <a href="usuarios.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <?php
                include("../app/modelos/Cliente.php");
                $cliente = new Cliente();
                $data = $cliente->get_cantidad_clientes();
              ?>              
              <!-- small card -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $data['cantidad_clientes']; ?></h3>
                  <p>Total de Clientes</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-user"></i>
                </div>
                <a href="clientes.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Informacion de contacto</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-6">
              <?php 
                include("../app/modelos/Contacto.php");
                $contacto = new Contacto();
                $data = $contacto->get_cantidad_contactos();
              ?>             
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $data['cantidad_contactos']; ?></h3>
                  <p>Total de Contactos</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-address-book"></i>
                </div>
                <a href="contactos.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <?php
                include("../app/modelos/Mensaje.php");
                $mensaje = new Mensaje();
                $data = $mensaje->get_cantidad_mensajes();
              ?>              
              <!-- small card -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $data['cantidad_mensajes']; ?></h3>
                  <p>Total de Mensajes</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-envelope"></i>
                </div>
                <a href="reservas.php" class="small-box-footer">
                  Mas info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
  include("includes/footer.php")
?>