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
            <h1>Listado de planes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tipos-de-producto.php">Listado de tipos de productos</a></li>
              <li class="breadcrumb-item active">Listado de planes</li>
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
          <h3 class="card-title">Planes registrados</h3>
        </div>
        <div class="card-body">
          <table id="registros" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include("../config/conexion.php");
                include("../app/modelos/Plan.php");
                $plan = new Plan();
                $data = $plan->get_planes();
                foreach($data as $value){ ?>
                  <tr>
                    <td><?php echo $value['nombre']; ?></td>
                    <td>
                      <a href="plan.php?id=<?php echo $value['codigo'] ?>" class="btn bg-success btn-flat margin">
                        <i class="fa fa-pencil-alt"></i>
                      </a>
                      <a href="../app/controladores/PlanController.php?id=<?php echo $value['codigo'] ?>" class="btn bg-danger btn-flat margin borrar-registro">
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