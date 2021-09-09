<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../javascript/logar.js"></script>

	<title></title>
</head>
<body>

</body>
</html>

<?php 


 require 'config.php';
 	require 'database.php';


     session_start();
  if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"]))
  {
    header("Location: orcamento.php");
    exit;
  }
  else
  {
    echo "<center> Você esta logado. </center>";
  }

  $senha = $_SESSION["senha"];
  $email = $_SESSION["email"];  



	 if($_POST && $_POST['totalRegistros'] > 0){

     $valores = array ('email' => $email, 'senha' => $senha, 'status' => 'nao_entregue');

  $id = dbcriar('numero_pedido', $valores, true);
  $_SESSION['id'] = $id;
        
         for($i=1; $i<=$_POST['totalRegistros']; $i++ ){
             
            

             $quantidade[$i] = $_POST['qnt'.$i];
             $valor[$i] = $_POST['vlr'.$i];
             $nome[$i] = $_POST['nome'.$i];
             $tamanho[$i] = $_POST['tamanho'.$i];
             
             $dados[$i] = array (
             	"nome_muda" => $nome[$i],
             	"valor_muda" => $valor[$i],
             	"quantidade" => $quantidade[$i],
              "tamanho" => $tamanho[$i],
                "email" => $_SESSION["email"],
                "senha" => $_SESSION["senha"],
                "status" => "nao_finalizado",  
                "ped_numero" => $id             
             	);

             $pedido[$i] = dbcriar('pedido', $dados[$i]);

     if($pedido[$i])	
	{		
    if($i == $_POST['totalRegistros']){
      echo "<center> <h1> Os dados foram Cadastrados com sucesso! </h1> </center>";
      echo "<center> <h1> Você pode continuar fazendo suas compras. </h1>  </center>";      
      echo "<script> login_2() </script>";
    }
	}	
	else{
		
		echo ":/";
	}              
         }
    }

     
    

 ?>