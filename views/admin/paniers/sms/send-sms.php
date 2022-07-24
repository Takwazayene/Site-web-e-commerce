<?php
require_once "vendor/autoload.php";
$basic  = new \Nexmo\Client\Credentials\Basic('cb928c7f', 'zjaLkqEVy28SEzTE');
$client = new \Nexmo\Client($basic);


try {
    $message = $client->message()->send([
        'to' => 21695322200,
        'from' => 'AcmeInc',
        'text' => 'Bonjour,vous avez gangé un coupon merci pour votre fidelié'
    ]);
    $response = $message->getResponseData();

    if($response['messages'][0]['status'] == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $response['messages'][0]['status'] . "\n";
    }
} catch (Exception $e) {
    echo "The message was not sent. Error: " . $e->getMessage() . "\n";
}
?>