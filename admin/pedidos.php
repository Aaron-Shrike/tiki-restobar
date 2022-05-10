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
            <h1>Listado de Pedidos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="clientes.php">Listado de clientes</a></li>
              <li class="breadcrumb-item active">Listado de pedidos</li>
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
          <h3 class="card-title">Pedidos registrados</h3>
        </div>
        <div class="card-body">
          <table id="registros-opciones" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Celular</th>
                <th>Direccion</th>
                <th>Propina</th>
                <th>Envio</th>
                <th>Productos</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include("../config/conexion.php");
                include("../app/modelos/Pedido.php");
                $pedidos = new Pedido();
                $data = $pedidos->get_pedidos();
                foreach($data as $value){ ?>
                  <tr>
                    <td><?php echo (isset($value['dni'])) ? $value['dni'] : "none"; ?></td>
                    <td><?php echo $value['nombre']; ?></td>
                    <td><?php echo $value['celular']; ?></td>
                    <td><?php echo $value['direccion']; ?></td>
                    <td><?php echo "S/. " . $value['propina']; ?></td>
                    <td><?php echo "S/. " . $value['costo_envio']; ?></td>
                    <td><?php echo $value['cantidad_productos']; ?></td>
                    <td><?php echo "S/. " . $value['monto_total']; ?></td>
                  </tr>
                <?php }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Celular</th>
                <th>Direccion</th>
                <th>Propina</th>
                <th>Envio</th>
                <th>Productos</th>
                <th>Total</th>
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