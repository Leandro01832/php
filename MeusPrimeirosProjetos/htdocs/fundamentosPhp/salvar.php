


<?php

// ucfirst --> primeira letra da string maiuscula
// ucwords --> primeira letra de cada palavra maiuscula
// strtolower --> toda a string em minusculo
$nome =  ucwords(strtolower(trim($_POST["nome"])));



if($nome == "")
{
	echo "Preencha o campo nome.";
	exit;
}

// grava dados no txt

$file = "cliente.txt";

$arquivo = fopen($file, "a");
fwrite($arquivo, $nome."\n");
fclose($arquivo);


header("Location: listar.php");

?>