
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
  $email = $_SESSION["email"];
  $senha = $_SESSION["senha"];
  $id = $_SESSION["id"];


  $cep = $_POST['cep'];
  $rua = $_POST['rua'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['uf'];
  $bairro = $_POST['bairro'];
  $valor_total = $_POST['total'];
  $data = date("Y-m-d");

  $valores = array ('email' => $email, 'senha' => $senha);

 

if(is_null($cep) || is_null($rua) || is_null($cidade) || is_null($estado) || is_null($valor_total) || is_null($data)){
  echo "informe os dados de endereço para melhor o atendimento.";
  echo "<script> login() </script>";
}
else
{
  $dados = array(
    "cep" => $cep,
    "rua" => $rua,
    "bairro" => $bairro,
    "cidade" => $cidade,
    "estado" => $estado,
    "valor_total" => $valor_total,
    "email" => $email,
    "senha" => $senha,
    "data_pedido" => $data,
    "ped_numero" => $id
    );

  $endereco = dbcriar('endereco', $dados);
  if($endereco) 
  {
    echo "<center> Pedido finalizado com sucesso! </center>". "<br/><br/>";
    echo "<script type='text/javascript'> pagar() </script>";
    
    
  } 
  else
  {   
    echo ":/";
  }
}




$da = array ('status' => 'finalizado');


dbatualizar('pedido', $da, "email = '$email' and senha = '$senha'");





?>

















