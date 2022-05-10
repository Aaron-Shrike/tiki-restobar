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
            <h1>Listado de Contactos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mensajes.php">Listado de mensajes</a></li>
              <li class="breadcrumb-item active">Listado de contactos</li>
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
          <h3 class="card-title">Contactos registrados</h3>
        </div>
        <div class="card-body">
          <table id="registros-opciones" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include("../config/conexion.php");
                include("../app/modelos/Contacto.php");
                $contacto = new Contacto();
                $data = $contacto->get_contactos();
                foreach($data as $value){ ?>
                  <tr>
                    <td><?php echo $value['nombre']; ?></td>
                    <td><?php echo $value['correo']; ?></td>
                  </tr>
                <?php }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
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