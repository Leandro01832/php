<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table id="tabela" class="tab" border="5">

 <tr>

	<td>Nome</td>
	<td> Tamanho</td>
	<td> Quantidade</td>
	<td>Valor Unitário</td>	
	
    </tr>
<?php 


	require 'config.php';
	require 'database.php';

	session_start();
	$email = $_SESSION["email"];
	$senha = $_SESSION["senha"];

	
	$mudas = dbler('pedido', "quantidade > 0 and status = 'nao_finalizado' and email = '$email' and senha = '$senha'");

	 if (is_array($mudas) || is_object($mudas)){
	
    foreach ($mudas as $md) {   ?> 
	<tr>

	<td> <?php echo $md['nome_muda']; ?> </td>
	<td> <?php echo $md['tamanho']; ?></td>
	<td> <?php echo $md['quantidade']; ?></td>
	<td> <?php echo $md['valor_muda']; ?></td>	
		
	</tr>	

	<?php } ?>
	<?php } ?>

	<?php 

	$valores = dbler('pedido', "senha = '$senha' and email = '$email' and status = 'nao_finalizado'");
	$valor_total = 0;

	if (is_array($valores) || is_object($valores)){

	foreach ($valores as $vl) 
	{
		$quantidade = $vl['quantidade'];
		$valor =  $vl['valor_muda'];
		$preco = $valor * $quantidade;
		$valor_total  += $preco;
	}
}

	 ?>

<tr> <td>  Valor total de todas as mudas: <input type="text" id="tudo"  value="<?php echo $valor_total; ?>" readonly> </td> </tr>

</table>



</body>
</html>

