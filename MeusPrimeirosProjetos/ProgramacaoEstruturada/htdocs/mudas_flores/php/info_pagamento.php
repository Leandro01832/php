<?php 

require 'config.php';
require 'database.php';


$email = $_SESSION["email"];
$senha = $_SESSION["senha"];
$id = $_SESSION["id"];


$informacao = dbler('cliente', " email = '$email' and senha = '$senha'");

foreach ($informacao as $info) {
	$nome = $info['nome'];
	$sobrenome = $info['sobrenome'];
	$email = $info['email'];
	$cpf = $info['cpf'];
}



$valores = dbler('pedido', "senha = '$senha' and email = '$email' and status = 'finalizado' and ped_numero = '$id'");
	$valor_total = 0;
	$quantidade = 0;

	foreach ($valores as $vl) 
	{
		$quanti = $vl['quantidade'];
		$quantidade += $quanti;
		$valor =  $vl['valor_muda'];
		$preco = $valor * $quantidade;
	}
	 
 
 $endereco = dbler('endereco', "senha = '$senha' and email = '$email' and ped_numero = '$id'");
 	foreach ($endereco as $end) 
	{
		$cep = $end['cep'];
		$rua =  $end['rua'];
		$cidade = $end['cidade'];
		$bairro = $end['bairro'];
		$estado = $end['estado'];
		$valor_cartao = $end['valor_total'] * 100;

	}

	
if ($valor_cartao == 0 ||  is_null($id)){
	header("Location: ../php/compras.php");

}


 ?>