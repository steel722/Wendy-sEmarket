<?php
// Configura los encabezados para permitir solicitudes POST
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recolecta y limpia los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Validar los datos (básico)
    if (!empty($nombre) && !empty($email) && !empty($mensaje) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Configura el correo electrónico
        $to = "wilmin.cris04@gmail.com"; // Cambia esto a tu dirección de correo electrónico
        $subject = "NUEVO PEDIDO DE LA TIENDA";
        $body = "Nombre: $nombre\nCorreo Electrónico: $email\n\nMensaje:\n$mensaje";
        $headers = "From: $email";

        // Enviar el correo electrónico
        if (mail($to, $subject, $body, $headers)) {
            echo "¡Gracias por tu mensaje! Te responderemos pronto.";
        } else {
            echo "Lo siento, hubo un problema al enviar tu mensaje. Inténtalo de nuevo más tarde.";
        }
    } else {
        echo "Por favor, completa todos los campos y asegúrate de que tu dirección de correo electrónico sea válida.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
