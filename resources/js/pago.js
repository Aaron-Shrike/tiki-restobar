const colorButtonAlert = "#e1c313";
var descripcion = '';
var precio = '';
var formData = '';
// Configura tu llave pública
Culqi.publicKey = 'pk_test_46504ddb7b1b7a3d';
//  +----- PAGO DE PEDIDO ----+ 
$("#form-registrar-pedido").submit(function(e){
    e.preventDefault();
    formData = $(this).serializeArray();
    precio = parseInt($('#monto-total').val() * 100);
    if(precio > 0){
        descripcion = "Pedido de " + $('#cantidad-productos').val() + " producto(s)";
        // Configura tu Culqi Checkout
        Culqi.settings({
            title: 'Tiki - Restobar',
            currency: 'PEN',
            description: descripcion,
            amount: precio
        });
        // Abre el formulario con las opciones de Culqi.settings
        Culqi.open();
    }else{
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Necesita calcular el monto total',
            confirmButtonColor: colorButtonAlert
        })
        $('#btn-calcular-resumen').focus();
    }
});
function culqi() {
    if (Culqi.token) { // ¡Objeto Token creado exitosamente!
        var token = Culqi.token.id;
        var email = Culqi.token.email;
        //En esta linea de codigo debemos enviar el "Culqi.token.id"
        var data = {precio: precio, token: token, email: email};
        //hacia tu servidor con Ajax
        $.post('config/procesar-pago.php', data, function(res){
            if(res.type == "venta_exitosa"){
                Swal.fire({
                    icon: 'success',
                    title: 'Gracias por su pedido',
                    text: 'Pago realizado correctamente',
                    confirmButtonColor: colorButtonAlert
                })
                registrarPedido(formData);
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al realizar el pago',
                    confirmButtonColor: colorButtonAlert
                })
            }
        }, "json");
    } else { // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log(Culqi.error);
        alert(Culqi.error.user_message);
    }
};
//registrar pedido en la BD
function registrarPedido(form) {
    $.ajax({
        url: 'app/controladores/PedidoController.php',
        type: 'POST',
        data: form,
        dataType: 'json',
        success: function(res) {
            if (res.respuesta = "exito") {
                $("#form-buscar-cliente")[0].reset();
                $("#form-registrar-cliente")[0].reset();
                $("#btn-registrar-cliente").attr("disabled", false);
                $("#form-registrar-pedido")[0].reset();
                $('div.listado-productos').empty();
                $('strong.cantidad-productos').text("0");
                $('p.monto-total').text("S/. 0.00");
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al registrar pedido',
                    confirmButtonColor: colorButtonAlert
                })
            }
        }
    });
}