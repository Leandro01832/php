
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>cadastro</title>
	<script type="text/javascript" src="../javascript/logar.js"></script>
</head>
<body>

</body>
</html>




<?php 

require 'config.php';
	require 'database.php';


$nome = $_POST['_nome'];
$sobrenome = $_POST['_sobrenome'];
$email = $_POST['_email'];
$cpf = $_POST['_cpf'];
$senha = $_POST['senha'];

 $dados =  array(
 	"nome" =>  $nome,
 	"sobrenome" => $sobrenome,
 	"cpf" => $cpf, 	  
	"email" => $email,
	"senha" => $senha);


 	if ($nome == "" || $sobrenome == "" || $email == "" || $cpf == "" || $senha == ""){
 		echo "cadastro não foi concluido. Por favor preencher todos os campos do cadastro.";
 		echo "<script> login_falha() </script>";
 	}
 	else
 {

 		$verifica = dbler('cliente', "email = '$email'");

 		if ($verifica) 
 			{
 			echo "<center> <h1> O cadastro falhou.O Usuario já é existente. </h1> </center>";
 			echo "<script> login_falha() </script>";
 			} else 
 		{
 				$grava = dbcriar('cliente', $dados);
			if($grava)	
			{
			echo "<center> Cadastro efetuado com sucesso! </center>";
			echo "<script> login_falha() </script>";
			}	
			else
			{		
			echo ":/";
			}
 		}


 }

	
		
	

 ?>