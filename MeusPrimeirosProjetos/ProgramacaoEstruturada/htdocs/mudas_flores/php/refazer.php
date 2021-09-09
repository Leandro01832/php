<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../javascript/logar.js"></script>
</head>
<body>

</body>
</html>


<?php  

	require 'config.php';
 	require 'database.php';   

	session_start();
	$senha = $_SESSION["senha"];
  	$email = $_SESSION["email"];

      if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"]))
  {
    header("Location: ../php/orcamento.php");
    exit;
  }
  else
  {
    echo "<center> Você esta logado. </center>";
  }
      
      $deletar = dbdeletar('pedido', " email = '$email' and senha = '$senha' ");

      if($deletar){
      	echo "<center> Você agora pode fazer uma nova compra. aguarde um instante. </center>";
      	echo "<script> login() </script>";
      	
      }

 ?>