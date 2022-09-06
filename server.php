<?php
require 'vendor/autoload.php';
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('Calculator App');
$server->wsdl->schemaTargetNamespace = $namespace;

// $server->wsdl->addComplexType(
//     'medicalpatient',
//     'complexType',
//     'struct',
//     'all',
//     '',
//     array(
//         'ID' => array('name' => 'ID', 'type' => 'xsd:string'),
//         'first_name' => array('name' => 'first_name', 'type' => 'xsd:string'),
//         'last_name' => array('name' => 'last_name', 'type' => 'xsd:string'),
//         'birthdate' => array('name' => 'birthdate', 'type' => 'xsd:date'),
//         'age' => array('name' => 'age', 'type' => 'xsd:number_format'),
//     ));

function get_greeting($name) {
    return "Halo $name selamat datang di Aplikasi Kalkulator Sederhana yang fixed by coding:)";
}

$server->register('get_greeting',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Greeting'
);

function get_plus($number1, $number2) {
    $result = $number1 + $number2;
    return "$number1 * $number2 = $result";
}

$server->register('get_plus',
    array(
        'number1' => 'xsd:int',
        'number2' => 'xsd:int'
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Get Diagnose Sederhana'
);

function get_multiple($number1, $number2) {
    $result = $number1 * $number2;
    return "$number1 * $number2 = $result";
}

$server->register('get_multiple',
    array(
        'number1' => 'xsd:int',
        'number2' => 'xsd:int'
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Get Diagnose Sederhana'
);

function get_divide($number1, $number2) {
    $result = $number1 / $number2;
    return "$number1 * $number2 = $result";
}

$server->register('get_divide',
    array(
        'number1' => 'xsd:int',
        'number2' => 'xsd:int'
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Get Diagnose Sederhana'
);

$server->service(file_get_contents("php://input"));
exit();
