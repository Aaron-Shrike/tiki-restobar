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
            <?php
              if(isset($_GET['id'])){
                include("../config/conexion.php");
                include("../app/modelos/TipoProducto.php");

                $id = $_GET['id'];
                $tipo = new TipoProducto();
                $data = $tipo->get_tipo_producto($id);
              }
            ?>
            <h1><?php echo (isset($id)) ? "Actualizar" : "Registrar"; ?> Tipo de producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="producto.php">Registrar producto</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($id)) ? "Actualizar" : "Registrar"; ?> tipo de producto</li>
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
          <h3 class="card-title">Tipo de producto</h3>
        </div>
        <!-- form start -->
        <form id="gestion-plan" method="POST" action="../controladores/PlanController.php">
          <div class="card-body">
            <div class="form-group">
              <label for="decripcion">Decripcion</label>
              <input type="text" class="form-control" id="decripcion" name="decripcion" placeholder="Ej: Platillos" value="<?php echo (isset($_GET['id'])) ? $data['descripcion'] : ""; ?>">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <input type="hidden" name="accion" value="<?php echo (isset($id)) ? "actualizar" : "registrar"; ?>">
            <?php if (isset($id)) { ?>
              <input type="hidden" name="codigo" value="<?php echo $id; ?>">
            <?php } ?>
            <button type="submit" class="btn btn-primary"><?php echo (isset($id)) ? "Actualizar" : "Registrar"; ?></button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
  include("includes/footer.php")
?>