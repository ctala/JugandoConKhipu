<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'header.php';

$configuration = new Khipu\Configuration();
$configuration->setReceiverId($receiverId);
$configuration->setSecret($secretKey);
// $configuration->setDebug(true);

$client = new Khipu\ApiClient($configuration);
$payments = new Khipu\Client\PaymentsApi($client);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $opts = array(
            "transaction_id" => $_POST['pf_order_id'],
            "return_url" => "http://f9757d39.ngrok.io/return.php",
            "cancel_url" => "http://f9757d39.ngrok.io/cancel.php",
//        "picture_url" => "http://mi-ecomerce.com/pictures/foto-producto.jpg",
            "notify_url" => "http://f9757d39.ngrok.io/notify.php",
            "notify_api_version" => "1.3"
        );
        $response = $payments->paymentsPost("Compra de prueba de la API" //Motivo de la compra
                , "CLP" //Moneda
                , $_POST['pf_monto'] //Monto
                , $opts //campos opcionales
        );

        print_r($response);

        $payment_url = $response['payment_url'];
        header("Location: $payment_url");
        exit;
    } catch (\Khipu\ApiException $e) {
        echo print_r($e->getResponseBody(), TRUE);
    }
} else {
    ?>

    <h1>Implementando Khipu</h1>

    <form method="POST">

        Monto <input type="text" name="pf_monto" value="100">
        <br>
        Id Orden <input type="text" name="pf_order_id" value="ID-PRUEBA">
        <br>
        <input type="submit" value="Iniciar Pago">

    </form>


    <?php
}

