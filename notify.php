<?php

include_once 'header.php';

$api_version = $_POST["api_version"];  // Parámetro api_version
$notification_token = $_POST['notification_token']; //Parámetro notification_token
$amount = "100";

try {
    if ($api_version == '1.3') {
        $configuration = new Khipu\Configuration();
        $configuration->setSecret($secret);
        $configuration->setReceiverId($receiver_id);
//        $configuration->setDebug(true);

        $client = new Khipu\ApiClient($configuration);
        $payments = new Khipu\Client\PaymentsApi($client);

        echo "Antes de paymentGet";
        $response = $payments->paymentsGet($notification_token);
        echo "Después de paymentGet";
        if ($response->getReceiverId() == $receiver_id) {
            if ($response->getStatus() == 'done' && $response->getAmount() == $amount) {
                // marcar el pago como completo y entregar el bien o servicio
                echo "PAGO ID Y MONTO CORRECTO";
            }
        } else {
            // receiver_id no coincide
            echo "NO COINCIDE";
        }
    } else {
        // Usar versión anterior de la API de notificación
    }
} catch (\Khipu\ApiException $exception) {
    print_r($exception->getResponseObject());
}
        