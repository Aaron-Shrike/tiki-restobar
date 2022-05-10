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
                include("../app/modelos/Usuario.php");

                $id = $_GET['id'];
                $usuario = new Usuario();
                $data = $usuario->get_usuario($id);
              }
            ?>
            <h1><?php echo (isset($id)) ? "Actualizar" : "Registrar"; ?> Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="plan.php">Registrar plan</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($id)) ? "Actualizar" : "Registrar"; ?> usuario</li>
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
          <h3 class="card-title">Usuario</h3>
        </div>
        <!-- form start -->
        <form id="gestion-plan" method="POST" action="../app/controladores/UsuarioController.php">
          <div class="card-body">
            <div class="form-group">
              <label for="tipo-usuario">Tipo de usuario</label>
              <select class="form-control" name="tipo-usuario" id="tipo-usuario">
                <?php if(!isset($id)){ ?>
                    <option hidden selected>-- Seleccione --</option>
                <?php } ?>
                <?php 
                  include("../app/modelos/TipoUsuario.php");
                  $tipo = new TipoUsuario();
                  $data_tipo = $tipo->get_tipos_usuario();
                  foreach($data_tipo as $value){ 
                    if($data['codigo_tipo'] != $value['codigo']){ ?>
                      <option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
                <?php }else{ ?>
                        <option value="<?php echo $value['codigo']; ?>" selected><?php echo $value['descripcion']; ?></option>
                <?php } 
                  } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: admin" value="<?php echo (isset($_GET['id'])) ? $data['nombre'] : ""; ?>">
            </div>
            <div class="form-group">
              <label for="contrasenia">Constraseña</label>
              <input type="text" class="form-control" id="contrasenia" name="contrasenia" value="<?php echo (isset($id)) ? $data['contrasenia'] : ""; ?>">
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