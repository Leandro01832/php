<?php
session_start();
/*REQUITE TODAS AS CLASSES NECESSARIAS*/
require './vendor/autoload.php';
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
 
$paymentToken = $_SESSION['chave']; // payment_token obtido na 1ª etapa (através do Javascript único por conta Gerencianet)
 
$customer = [
  'name' => 'Gorbadoc Oldbuck', // nome do cliente
  'cpf' => '94271564656' , // cpf do cliente
  'email' => 'email_do_cliente@servidor.com.br' , // endereço de email do cliente
  'phone_number' => '5144916523', // telefone do cliente
  'birth' => '1990-05-20' // data de nascimento do cliente
];
 
$billingAddress = [
  'street' => 'Street 3',
  'number' => 10,
  'neighborhood' => 'Bauxita',
  'zipcode' => '35400000',
  'city' => 'Ouro Preto',
  'state' => 'MG',
];
 
$creditCard = [
  'installments' => 1, // número de parcelas em que o pagamento deve ser dividido
  'billing_address' => $billingAddress,
  'payment_token' => $paymentToken,
  'customer' => $customer
];
 
$payment = [
  'credit_card' => $creditCard // forma de pagamento (credit_card = cartão)
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

