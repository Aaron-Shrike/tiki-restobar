var btnMenu = document.getElementById('menu-logo');
var menuCelular = document.getElementById('opciones-menu');
btnMenu.addEventListener("click", ()=>{
    menuCelular.classList.toggle("activo");
});
window.addEventListener("scroll",()=>{
    if(menuCelular.classList.contains("activo")){
        menuCelular.classList.remove("activo");
    }
});
//clicl al boton del formulario
$("#enviar").click(function(e){
    e.preventDefault();
    enviarFormulario();
});
//enviar email
function enviarFormulario() {
    var formData = new FormData($(".form-contacto")[0]);
    $.ajax({
        data: formData,
        url: 'mail.php',
        type: 'POST',
        contentType: false, // El tipo de contenido utilizado cuando se envían datos al servidor.
        cache: false, //Para no poder solicitar que las páginas se almacenen en la caché
        processData: false,
        success: function(response) {
            if (response == "exito") {
                $(".form-contacto")[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Mensaje enviado correctamente',
                    confirmButtonColor: colorButtonAlert
                })
            } else {
                alert(response);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El mensaje no pudo ser enviado',
                    confirmButtonColor: colorButtonAlert
                })
            }
        }
    });
}
/* +----- PEDIDO ----+ */
/* buscar cliente */
$("#form-buscar-cliente").submit(function(e){
    e.preventDefault();
    buscarCliente($(this));
});
function buscarCliente(form) {
    var formData = form.serializeArray();
    $.ajax({
        url: 'app/controladores/ClienteController.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(res) {
            if (res.respuesta == "encontrado") {
                $('#codigo-cliente').val(res.codigo);
                $('#dni').val(res.dni);
                $('#nombre-cliente').val(res.nombre);
                $('#celular-cliente').val(res.celular);
                $('#nombre').val(res.nombre);
                $('#celular').val(res.celular);
                $("#btn-registrar-cliente").attr("disabled", true);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Cliente no registrado, puedes registrarte o realizar el pedido sin registrarte',
                    confirmButtonColor: colorButtonAlert
                })
            }
        }
    });
}
/* REGISTRAR CLIENTE */
$("#form-registrar-cliente").submit(function(e){
    e.preventDefault();
    registrarCliente($(this));
});
function registrarCliente(form) {
    var formData = form.serializeArray();
    $.ajax({
        url: 'app/controladores/ClienteController.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(res) {
            if (res.respuesta = "exito") {
                $('#nombre').val($('#nombre-cliente').val());
                $('#celular').val($('#celular-cliente').val());
                $('#codigo-cliente').val(res.id_cliente);
                $("#btn-registrar-cliente").attr("disabled", true);
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Cliente registrado',
                    confirmButtonColor: colorButtonAlert
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al registrarse',
                    confirmButtonColor: colorButtonAlert
                })
            }
        }
    });
}
/*CALCULAR EL ENVIO */
$("#btn-calcular-envio").click(function(e){
    e.preventDefault();
    $('#costo-envio-desactivado').val("5.50");
    $('#costo-envio').val("5.50");
});
/*CALCULAR EL MONTO TOTAL */
$("#btn-calcular-resumen").click(function(e){
    if($('#costo-envio').val().length > 0){
        calcularTotal();
    }else{
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Deve calcular el monto de envio.',
            confirmButtonColor: colorButtonAlert
        })
        $('#btn-calcular-envio').focus();
    }
});
function calcularTotal() {
    var totalProductos = 0, total = 0;
    var precioPropina = parseFloat($('#propina').val()) || 0;
    var precioEnvio = parseFloat($('#costo-envio').val());
    var listNombres = $('td.nombre-producto');
    var listPrecios = $('input.precio-producto');
    var listCantidades = $('input.cantidad-producto');
    var divListado = $('div.listado-productos');
    total = precioEnvio + precioPropina;
    divListado.html("");
    for (let i = 0; i < listCantidades.length; i++) {
        const cantidad = parseInt(listCantidades[i].value) || 0;
        const nombre = listNombres[i].innerText;
        const precio = parseFloat(listPrecios[i].value);
        if(cantidad > 0){
            divListado.append("<p>("+cantidad+") "+nombre+"</p>");
            total += cantidad * precio;
            totalProductos += cantidad;
        }        
    }
    total = total.toFixed(2);
    $('strong.cantidad-productos').text(totalProductos);
    $('input#cantidad-productos').val(totalProductos);
    $('input#puntos').val(totalProductos*3);
    $('p.monto-total').text("S/. " + total);
    $('input#monto-total').val(total);
}
/* +----- RESERVA ----+ */
/* REGISTRAR RESERVA */
$("#form-registrar-reserva").submit(function(e){
    e.preventDefault();
    registrarReserva($(this));
});
function registrarReserva(form) {
    var formData = form.serializeArray();
    $.ajax({
        url: 'app/controladores/ReservaController.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(res) {
            if (res.respuesta = "exito") {
                $("#form-buscar-cliente")[0].reset();
                $("#form-registrar-cliente")[0].reset();
                $("#btn-registrar-cliente").attr("disabled", false);
                $('#form-registrar-reserva')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: 'Reserva registrada',
                    confirmButtonColor: colorButtonAlert
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al registrar la reserva',
                    confirmButtonColor: colorButtonAlert
                })
            }
        }
    });
}