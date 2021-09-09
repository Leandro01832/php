
<?php
session_start();
if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"]))
    {
        header("Location: ../php/orcamento.php");
        exit;
    }
    else
    {
        echo "<center> Voc� esta logado. </center>";
    }
/*REQUITE TODAS AS CLASSES NECESSARIAS*/
require './vendor/autoload.php';
require '../php/info_pagamento.php';
/*ABRE A CLASSE GERENCIANET*/
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
/*ADICIONA O JSON QUE CONTEM client_id & client_secret */
$file = file_get_contents('config.json');
$options = json_decode($file, true);

$v =   $valor_cartao - ($valor_cartao * 0.1);
 
$item_1 = [
    'name' => 'Mudas em geral', // nome do item, produto ou serviço
    'amount' => 1, // quantidade
    'value' => $v // valor (1000 = R$ 10,00)
];

 
$items =  [
    $item_1    
];

//Exemplo para receber notificações da alteração do status da transação.
//$metadata = ['notification_url'=>'sua_url_de_notificacao_.com.br']
//Outros detalhes em: https://dev.gerencianet.com.br/docs/notificacoes

//Como enviar seu $body com o $metadata
//$body  =  [
//    'items' => $items,
//    'metadata' => $metadata
//];

$body  =  [
    'items' => $items
];

try {
    $api = new Gerencianet($options);
    $charge = $api->createCharge([], $body);
    $_SESSION['COMPRA_ID'] = $charge['data']['charge_id'];
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}

if(isset($_POST['boleto'])):
header('Location: boleto.php');
endif;
if(isset($_POST['cartao'])):
header('Location: ./teste/cartao/index.php');//
endif;
?>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/59e101d2b985fef37ec67f0df2acd71f/'+v;s.async=false;s.id='59e101d2b985fef37ec67f0df2acd71f';if(!document.getElementById('59e101d2b985fef37ec67f0df2acd71f')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script>

<div style="width: 80%; margin: 20px auto; text-align:center;">
<form method="post" action="">
<input type="submit" name="boleto" value="Pagar com Boleto" class="btn btn-success">
<input type="submit" name="cartao" id="pay"  payment="card" value="Pagar com Cartão" class="btn btn-warning">
</form>
