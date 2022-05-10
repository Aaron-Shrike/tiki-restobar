<?php

    if(!empty($_POST)){
        $email_to = "pruebaprograavanzada@gmail.com";
        $email_subject = "Nuevo Contacto Tiki!";
        $email_message = "Detalles del formulario de contacto:\n\n";

        $email_message .= "Nombre: " . $_POST['nombre'] . "\n";
        $email_message .= "Correo: " . $_POST['correo'] . "\n";
        $email_message .= "Asunto: " . $_POST['asunto'] . "\n";
        $email_message .= "Mensaje: " . $_POST['mensaje'] . "\n\n";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $mail = $_POST['correo'];
        $header = 'From: ' . $mail . " \r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mime-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain";

        if(mail($email_to, $email_subject, $email_message,$header)){
            echo 'exito';
        }else{
            echo 'error';
        }
    }
?>