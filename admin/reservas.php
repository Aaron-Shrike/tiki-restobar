<?php 
  include("../config/session.php");
  include("includes/header.php");
  include("includes/navbar.php");
  include("includes/asidebar.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Reservas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pedidos.php">Listado de pedidos</a></li>
              <li class="breadcrumb-item active">Listado de reservas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Reservas registradas</h3>
        </div>
        <div class="card-body">
          <table id="registros-opciones" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>DNI</th>
                <th>Comensales</th>
                <th>Fecha</th>
                <th>Hora</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include("../config/conexion.php");
                include("../app/modelos/Reserva.php");
                $reserva = new Reserva();
                $data = $reserva->get_reservas();
                foreach($data as $value){ ?>
                  <tr>
                    <td><?php echo $value['dni']; ?></td>
                    <td><?php echo $value['nombre']; ?></td>
                    <td><?php echo $value['numero_comensales']; ?></td>
                    <td><?php echo $value['fecha']; ?></td>
                    <td><?php echo $value['hora']; ?></td>
                  </tr>
                <?php }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Cliente</th>
                <th>DNI</th>
                <th>Comensales</th>
                <th>Fecha</th>
                <th>Hora</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
  include("includes/footer.php")
?>