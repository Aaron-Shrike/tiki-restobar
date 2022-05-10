<?php 
    include("includes/header.php");
    require("config/conexion.php");
    include("app/modelos/Producto.php");
    $producto = new Producto();
?>
    <main class="pedido-reserva">
        <div class="contenedor contenedor-reserva">
            <h1>Realizar Pedido</h1>            
            <div class="seccion">
                <h2>Registrarse</h2>
                <small>para acumular puntos</small>
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
            <form action="" id="form-registrar-pedido">
                <div class="seccion">
                    <h2>Datos del pedido</h2>
                    <div class="seccion-form">
                        <div class="div-form">
                            <div class="campo-form">
                                <input type="hidden" name="codigo-cliente" id="codigo-cliente">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Pedrito Sola" required>
                            </div>
                            <div class="campo-form">
                                <label for="celular">Celular</label>
                                <input type="tel" name="celular" id="celular" placeholder="978488529" required>
                            </div>
                        </div>
                        <div class="div-form">
                            <div class="campo-form">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" id="direccion" placeholder="Av. taguan" required>
                            </div>
                            <div class="campo-form">
                                <label for="referencia">Referencia</label>
                                <input type="text" name="referencia" id="referencia" placeholder="Av. taguan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seccion">
                    <h2>Productos</h2>
                    <div class="seccion-form">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th class="oculto">Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = $producto->get_productos();
                                foreach ($data as $value) { ?>
                                    <tr class="fila-producto">
                                        <td class="nombre-producto"><?php echo $value['nombre']; ?></td>
                                        <td class="oculto"><?php echo $value['descripcion']; ?></td>
                                        <td><?php echo "S/. " . $value['precio']; ?></td>
                                        <td>
                                            <input type="hidden" name="productos[<?php echo $value['codigo']; ?>][codigo]" value="<?php echo $value['codigo']; ?>">
                                            <input type="hidden" name="productos[<?php echo $value['codigo']; ?>][precio]" value="<?php echo $value['precio']; ?>" class="precio-producto">
                                            <input type="number" name="productos[<?php echo $value['codigo']; ?>][cantidad]" class="cantidad-producto" min="0" max="20" placeholder="0">
                                        </td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="seccion">
                    <h2>Costos adicionales</h2>
                    <div class="seccion-form">
                        <div class="div-form">
                            <div class="campo-form">
                                <label for="propina">Propina</label>
                                <input type="number" name="propina" id="propina" min="0.00" step="0.01" placeholder="0">
                            </div>
                            <div class="campo-form">
                                <label for="costo-envio">Costo de envio</label>
                                <div class="campo">
                                    <input type="number" name="costo-envio" id="costo-envio-desactivado" step="0.01" disabled>
                                    <input type="hidden" name="costo-envio" id="costo-envio">
                                    <input type="button" value="Calcular" id="btn-calcular-envio">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seccion div-form">
                    <div class="campo-form">
                        <h2>Resumen</h2>
                        <div class="listado-productos">
                        </div>
                        <p>Cantidad de productos <strong class="cantidad-productos">0</strong></p>
                        <input type="hidden" name="cantidad-productos" id="cantidad-productos">
                        <input type="hidden" name="puntos" id="puntos">
                    </div>
                    <div class="campo-form">
                        <h3>Total</h3>
                        <p class="monto-total">S/. 00.00</p>
                        <input type="hidden" name="monto-total" id="monto-total">
                        <div class="campo campo-centro">
                            <input type="button" value="Calcular" class="btn" id="btn-calcular-resumen">
                            <input type="hidden" name="accion" value="registrar">
                            <input type="submit" value="Pagar" class="btn">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
<?php 
    include("includes/footer.php")
?>