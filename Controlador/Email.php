<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreApellidos = $_POST["nombreApellidos"];
    $dni = $_POST["dni"];
    $asunto = $_POST["asunto"];
    $email = $_POST["email"];

    // Configura el correo electrónico
    $to = "espinozasmesii@gmail.com"; // Cambia "destinatario@gmail.com" al correo del destinatario
    $subject = "Solicitud: $asunto";
    $message = "Nombre y Apellidos: $nombreApellidos\n";
    $message .= "DNI: $dni\n";
    $message .= "Email: $email\n";

    // Cabeceras para el correo electrónico
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar el correo electrónico
    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado con éxito. Gracias por tu solicitud.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}
?>
