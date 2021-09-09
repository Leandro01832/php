<?php
session_start();
/*REQUITE TODAS AS CLASSES NECESSARIAS*/
require './vendor/autoload.php';
require '../php/info_pagamento.php';
/*ABRE A CLASSE GERENCIANET*/
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
/*ADICIONA O JSON QUE CONTEM client_id & client_secret */
$file = file_get_contents('config.json');
$options = json_decode($file, true);
 
// $charge_id refere-se ao ID da transação gerada anteriormente
$params = [
  'id' => $_SESSION['COMPRA_ID']
];
 
$customer = [
  'name' => $nome . " " . $sobrenome, // nome do cliente
  'cpf' => $cpf, // cpf válido do cliente
  'phone_number' => '5144916523' // telefone do cliente
];



$data = date('Y-m-d');
$d = date('Y-m-d', strtotime('+5 days', strtotime($data)));
 
$bankingBillet = [
  'expire_at' => $d, // data de vencimento do boleto (formato: YYYY-MM-DD)
  'customer' => $customer
];
 
$payment = [
  'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
];
 
$body = [
  'payment' => $payment
];
 
try {
    $api = new Gerencianet($options);
    $charge = $api->payCharge($params, $body);
 
    print_r($charge);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}

?>
