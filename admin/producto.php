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
              include("../config/conexion.php");
              if(isset($_GET['id'])){
                include("../app/modelos/Producto.php");

                $id = $_GET['id'];
                $producto = new Producto();
                $data = $producto->get_producto($id);
              }
            ?>
            <h1><?php echo (isset($id)) ? "Actualizar" : "Registrar"; ?> Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="carta.php">Registrar carta</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($id)) ? "Actualizar" : "Registrar"; ?> producto</li>
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
          <h3 class="card-title">Producto</h3>
        </div>
        <!-- form start -->
        <form id="gestion-plan" method="POST" action="../app/controladores/ProductoController.php">
          <div class="card-body">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Ceviche" value="<?php echo (isset($_GET['id'])) ? $data['nombre'] : ""; ?>">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" cols="30" rows="3"><?php echo (isset($id)) ? $data['descripcion'] : ""; ?></textarea>
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Ej: 10.90" value="<?php echo (isset($id)) ? $data['precio'] : ""; ?>">
            </div>
            <div class="form-group">
              <label for="tipo-producto">Tipo de producto</label>
              <select class="form-control" name="tipo-producto" id="tipo-producto">
                <?php if(!isset($id)){ ?>
                    <option hidden selected>-- Seleccione --</option>
                <?php } ?>
                <?php 
                  include("../app/modelos/TipoProducto.php");
                  $tipo = new TipoProducto();
                  $data_tipo = $tipo->get_tipos_producto();
                  foreach($data_tipo as $value){ 
                    if($data['codigo_tipo'] != $value['codigo']){ ?>
                      <option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
                <?php }else{ ?>
                        <option value="<?php echo $value['codigo']; ?>" selected><?php echo $value['descripcion']; ?></option>
                <?php } 
                  } ?>
              </select>
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