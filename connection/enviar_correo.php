<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $to = "dressrentcorporative@gmail.com";  
        $subject = "Nuevo mensaje de $name: $subject";
        $message = "Nombre: $name\nCorreo electrónico: $email\nMensaje: $message";

        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo "El mensaje se ha enviado correctamente. Gracias por ponerte en contacto con nosotros.";
        } else {
            echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo.";
        }
    }
?>
