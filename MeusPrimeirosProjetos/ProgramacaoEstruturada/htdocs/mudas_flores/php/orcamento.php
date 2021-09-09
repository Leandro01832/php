<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Orçamento</title>	
	<script type="text/javascript" src="../javascript/regexp.js"></script>	
	 <link rel="stylesheet" type="text/css" media="screen and (min-width: 0px)" href="../css/small.css">
  <link rel="stylesheet" type="text/css" media="screen and (min-width: 1000px)" href="../css/medium.css">
 <link rel="stylesheet" type="text/css" media="screen and (min-width: 1350px)" href="../css/large.css">
	<link rel="stylesheet" type="text/css" href="../css/paragrafo.css">
</head>
<body id="back2">
<div id="cabecalho">
	<img id="fundo"   src="../css/fundo.jpg">
	<img class="tarja" id="tarja1" src="../imagens/tarja.jpg" >
	<img class="tarja" id="tarja2" src="../imagens/tarja.jpg" >
	<img id="fruta" class="muda_fruta"  src="../imagens/fruta.gif">
	<img id="fruta2" class="muda_fruta" src="../imagens/flor5.png">	
	<img id="titulo"  src="../imagens/titulo.png">
	

</div>

<div id="menu">		
		<ul>
		<li> <a href="../html/index.html"><font >Pagiana principal</font> </a></li>
		<li> <a href="../html/empresa.html"><font >Empresa</font> </a></li>
		<li> <a href="../html/contato.html"> <font >Contato</font> </a></li> <br> <br>		
		<li> <a href="../html/foto_mudas.html"><font >fotos de mudas</font></a> </li>
		<li> <a href="../html/foto_flores.html"><font >fotos de flores</font> </a> </li>
		<li> <a href="orcamento.php"><font >Orçamento</font> </a></li>
		</ul>		
</div>


<div id="corpo_pagina">
<form name="formulario" action="envio.php" method="post" onsubmit="return validacao()" >   
	<h3>  Faça preenchimento do formulário para melhor atendimento. </h3>	
	<h6><label>Nome: <input type="text" id="nome" name="_nome"  ></label></h6>  	<br>

	<h6><label>Sobrenome: <input type="text" id="sobrenome" name="_sobrenome"  ></label></h6>    <br>	

	<h6> <label>CPF: <input type="text"  name="_cpf" id="cpf"  maxlength="11" ></label></h6> 	<br>

	<h6> <label>Email: <input type="text" name="_email" id="email"  required></label></h6> 	<br>

	<h6> <label>Senha: <input id="txtSenha" name="senha" id="_senha" type="password"  placeholder="Digite uma Senha" title="Senha"  /></label></h6> 	<br>

	<h6> <label>Repita a senha:  <input id="senha2" name="repetir_senha" type="password"   placeholder="Repetir Senha" title="Repetir Senha"   />  </label></h6> 	<br>

	<input id="botao1" type="submit" value="cadastrar" /> 	<br>
</form>
	
	<form action="logando.php" method="post">
		<h3>logue e faça boas compras. </h3>
	<h6><label>Email:<input type="text" id="email2" name="_email2"  autocomplete="off"></label></h6>  	<br>
	<h6> <label>Senha: <input type="password" name="_senha3" id="_senha2"  maxlength="18"></label></h6> 	<br>
	<input id="botao2" type="submit" value="entrar" /> 	
	</form>
	
</div>

<div id="boder">
	<img id="borda"  src="../imagens/borda.gif">
	<img id="borda2"  src="../imagens/borda.gif">
	<img id="borda3"  src="../imagens/ip.gif" width="200" height="200">
	<img id="borda4"  src="../imagens/ip.gif" width="200" height="200">
	<img id="borda5"  src="../imagens/borda.gif">
	<img id="borda6"  src="../imagens/borda.gif">
</div>

</body>
</html>

<?php 
	require 'config.php';
	require 'database.php';
	
	// $dados =  array('nome' =>  'leandro', 'sobrenome' => 'luis', 'cpf' => 08270839639,
	//	'email' => 'leandroleanleo@gmail.com', 'senha' => 'cardiologista');

	//$grava = dbcriar('cliente', $dados);
	//if($grava)
	//	echo "OK";
	//else
	//	echo ":/";



	// ler dados

	//$clientes = dbler('cliente', null, 'nome, email');
	//var_dump($clientes);

	//foreach ($clientes as $cl) {
	//	echo $cl['nome'].'<br>';
	//echo $cl['email'].'<br><br>';
	//}



	// atualizar

	// $dados =  array('nome' =>  'leandro', 'sobrenome' => 'luis', 'cpf' => 08270839639,
	//	'email' => 'leandroleanleo@gmail.com', 'senha' => 'cardiologista');

	//dbatualizar('clientes', $dados, 'id = 2');


	// deletar 

	//$dropcliente = dbdeletar('cliente', 'id = 3');
	//if ($dropcliente)
	//	echo 'ok';
	//else
	//	echo 'não';

 ?>