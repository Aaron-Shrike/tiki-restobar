<?php 
    include("includes/header.php")
?>
    <main class="pedido-reserva">
        <div class="contenedor contenedor-reserva">
            <h1>Reserva</h1>            
            <div class="seccion">
                <h2>Registrarse</h2>
                <form action="" id="form-buscar-cliente">
                    <div class="seccion-form">
                        <div class="campo campo-centro">
                            <label for="buscar-dni">Buscar Cliente</label>
                            <input type="number" name="buscar-dni" id="buscar-dni" placeholder="Ingrese su DNI" min="11111111">
                            <input type="hidden" name="accion" value="buscar-cliente">
                            <input type="submit" value="Buscar" id="btn-buscar-cliente">
                        </div>
                    </div>
                </form>
                <form action="" id="form-registrar-cliente">
                    <div class="seccion-form">
                        <div class="div-form">
                            <div class="campo-form">
                                <label for="dni-cliente">DNI</label>
                                <input type="number" name="dni" id="dni" placeholder="73947582" min="11111111" required>
                            </div>
                            <div class="campo-form">
                                <label for="nombre-cliente">Nombre</label>
                                <input type="text" name="nombre-cliente" id="nombre-cliente" placeholder="Aarón Rojas" required>
                            </div>
                            <div class="campo-form">
                                <label for="celular-cliente">Celular</label>
                                <input type="tel" name="celular-cliente" id="celular-cliente" placeholder="978488529" required>
                            </div>
                        </div>
                        <div class="campo-form">
                            <input type="hidden" name="accion" value="registrar">
                            <input type="submit" value="Registrar" class="btn btn-centro" id="btn-registrar-cliente">
                        </div>
                    </div>
                </form>
            </div>
            <form id="form-registrar-reserva">
                <div class="seccion">
                    <h2>Datos de la reserva</h2>
                    <div class="seccion-form">
                        <div class="div-form">
                            <div class="campo-form">
                            <input type="hidden" name="codigo-cliente" id="codigo-cliente">
                                <label for="numero-comensales">Numero de comensales</label>
                                <input type="number" name="numero-comensales" id="numero-comensales" placeholder="6" min="1" required>
                            </div>
                            <div class="campo-form">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" placeholder="23/12/2021" min="<?php echo date("Y-m-d") ?>" required>
                            </div>
                            <div class="campo-form">
                                <label for="hora">Hora</label>
                                <input type="time" name="hora" id="hora" placeholder="16:00" min="18:00:00" max="03:00:00" required>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="registrar">
                        <input type="submit" value="Reservar" class="btn btn-centro">
                    </div>
                </div>
            </form>
        </div>
    </main>
<?php 
    include("includes/footer.php")
?>