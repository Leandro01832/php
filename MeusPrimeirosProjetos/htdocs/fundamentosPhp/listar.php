<?php

$file = "cliente.txt";
$arquivo = fopen($file, "r");
?>


<table width="100%" style="background-color: #c0c0c0;">
	<tr>
		<td>Nome</td>
	</tr>

	<?php while(!feof($arquivo)){ ?>
	<tr>
		<td>
			<?php echo fgets($arquivo); ?>
		</td>
		
	</tr>
	<?php } ?>

</table>

<a href="novo.php">Cadastrar novo cliente</a>

<?php fclose($arquivo); ?>