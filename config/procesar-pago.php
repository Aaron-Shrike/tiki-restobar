<?php 
    // Cargamos Requests y Culqi PHP
    include_once '../libraries/Requests/library/Requests.php';
    Requests::register_autoloader();
    include_once '../libraries/culqi-php/lib/culqi.php';
    // Configurar tu API Key y autenticación
    $SECRET_KEY = "sk_test_fe3b958a879a5ddd";
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
    // Creamos Cargo a una tarjeta
    $charge = $culqi->Charges->create(
        array(
            "amount" => $_POST['precio'],
            "currency_code" => "PEN",
            "email" => $_POST['email'],
            "source_id" => $_POST['token']
        )
    );
    //Respuesta
    $array = json_decode(json_encode($charge->outcome), true);
    die(json_encode($array));
?>