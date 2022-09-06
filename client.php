<?php
require 'vendor/autoload.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('get_greeting', array(
    'name' => 'Bagus'
));
echo $response;

echo '<br>';
$response = $client->call('get_plus', array(
    'number1' => 134,
    'number2' => 98
));
echo $response;

echo '<br>';
$response = $client->call('get_multiple', array(
    'number1' => 3,
    'number2' => 4
));
echo $response;

echo '<br>';
$response = $client->call('get_divide', array(
    'number1' => 454,
    'number2' => 23
));
echo $response;