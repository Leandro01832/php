
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>autenticando</title>
	<script type="text/javascript" src="../javascript/logar.js"></script>
</head>
<body>

</body>
</html>





<?php 
require 'config.php';
	require 'database.php';

	$email = $_POST["_email2"];
	$senha = $_POST["_senha3"];

	$clientes = dbler('cliente', "email = '$email' and senha = '$senha'" );
	if ($clientes == false){		
		echo "<h1><center> Nome de usuario ou senha inválidos. Aguarde um instante para tentar novamente. </center></h1>";
		echo "<script> login_falha() </script>";
	}
	else 
	{
		session_start();
		$_SESSION['email']=$_POST['_email2'];
		$_SESSION['senha']=$_POST['_senha3'];
		
		echo "<h1> <center> Você foi autenticado com sucesso! Aguarde um instante. </center></h1> ";
		echo "<script> login() </script>";
	}



 ?>