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
            <h1>Listado de cartas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="productos.php">Listado de productos</a></li>
              <li class="breadcrumb-item active">Listado de cartas</li>
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
          <h3 class="card-title">Cartas registradas</h3>
        </div>
        <div class="card-body">
          <table id="registros" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th>Plan</th>
                <th>Imagen</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include("../config/conexion.php");
                include("../app/modelos/Carta.php");
                $carta = new Carta();
                $data = $carta->get_cartas();
                foreach($data as $value){ ?>
                  <tr>
                    <td><?php echo $value['nombre']; ?></td>
                    <td><?php echo "S/. " . $value['precio']; ?></td>
                    <td><?php echo $value['nombre_tipo']; ?></td>
                    <td><?php echo $value['nombre_plan']; ?></td>
                    <td><img src="../resources/img/carta/<?php echo $value['url_imagen']; ?>" alt="<?php echo $value['url_imagen']; ?>" class="imagen-tabla"></td>
                    <td>
                      <a href="carta.php?id=<?php echo $value['codigo'] ?>" class="btn bg-success btn-flat margin">
                        <i class="fa fa-pencil-alt"></i>
                      </a>
                      <a href="../app/controladores/CartaController.php?id=<?php echo $value['codigo'] ?>" class="btn bg-danger btn-flat margin borrar-registro">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th>Plan</th>
                <th>Imagen</th>
                <th>Acciones</th>
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