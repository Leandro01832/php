<?php 
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

 ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>compras</title>
	
	<script type="text/javascript" src="../javascript/valor.js"></script>
	
	<script type="text/javascript" src="../javascript/imagem.js"></script>	
	 <link rel="stylesheet" type="text/css" media="screen and (min-width: 0px)" href="../css/small.css">
  <link rel="stylesheet" type="text/css" media="screen and (min-width: 500px)" href="../css/medium.css">
 <link rel="stylesheet" type="text/css" media="screen and (min-width: 1050px)" href="../css/large.css">
	
	<link rel="stylesheet" type="text/css" href="../css/paragrafo.css">
	<link rel="stylesheet" type="text/css" href="../css/compras.css">
	
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
		<li> <a href=""><font >fotos de mudas</font></a> </li>
		<li> <a href=""><font >fotos de flores</font> </a> </li>
		<li> <a href="orcamento.php"><font >Orçamento</font> </a></li>
		</ul>		
</div>

<div id="boder">
	<img id="borda"  src="../imagens/borda.gif">
	<img id="borda2"  src="../imagens/borda.gif">
	<img id="borda3"  src="../imagens/ip.gif" >
	<img id="borda4"  src="../imagens/ip.gif" >
	<img id="borda5"  src="../imagens/borda.gif">
	<img id="borda6"  src="../imagens/borda.gif">
</div>

 
<div id="corpo_pagina">
<div id="sair"><a href="logout.php" > Sair da conta  </a> </div>
<form id="formulario"  method="post" name="formulario">
<p>Escolha o tipo: </p>
	 <select name="escolha" id="escolha">
  <option value="floricultura">floricultura</option>
  <option value="fruticultura">fruticultura</option> 
  <option value="Frutas exoticas">Frutas exóticas</option> 
  <option value="Arvore" selected>Árvore</option> 
</select><br>
<p>Escolha o tamanho: </p>
  <select name="porte" id="porte">
  <option value="pequeno">Pequeno</option>
  <option value="medio">Médio</option> 
  <option value="grande">Grande</option>
</select> <br><br>
<input type="submit" value="Fazer o orçamento">
</form>
<br><br>

<form action="envio_caminhao.php" method="post">


<div id="t">
<table id="tabela" class="tab" border="5">



<?php 


	require 'config.php';
	require 'database.php';

	$escolha = $_POST["escolha"];
	$tamanho = $_POST["porte"];
	$mudas = dbler('muda', "tipo = '$escolha' order by nome asc");
	$i = 0;
	
    foreach ($mudas as $md) {  $i = $i + 1;  ?> 

    
		

    <tr>

	<td>Nome</td>
	<td> Tamanho</td>
	<td> Quantidade</td>
	<td>Valor Unitario</td>
	<td>Total a pagar</td>
	<td>Foto</td>
	
    </tr>

	<tr>

		<td width="10"> <input type="text" value="<?php echo $md['nome']; ?>" name="nome<?php echo $i; ?>" readonly> </td>
		<td width="10"> <input type="text" name="tamanho<?php echo $i; ?>" class="tamanho" value="<?php echo $escolha; ?> - <?php echo $tamanho; ?>" readonly> </td>
		<td width="10"><input type="text" size="5" class="qnt" name="qnt<?php echo $i; ?>" value="0" autocomplete="off" > </td>
		
		<?php if ($tamanho == "pequeno"){$v1 = $md['preco'];} else if ($tamanho == "medio") {$v1 = $md['preco_muda_media'];} else if ($tamanho == "grande") {$v1 = $md['preco_muda_grande'];}
		if($v1 < 20) { $v2 = 2.2; } else { $v2 = 1.7;}
		  $v3 = ($v1 * $v2) - ($v1 * $v2 * $md['desconto'] / 100);  ?> 
		<td width="10"><input   type="text" size="5" class="vlr" name="vlr<?php echo $i; ?>"  value="<?php echo $v3; ?>"  readonly>   </td>
		<td width="10">  <input type="text" size="15" class="total" name="total<?php echo $i; ?>" value="0" readonly> </td>

		<td width="20">	

		<?php if($tamanho == "medio"){ $md['nome'] = $md['nome']."_media";} else if ($tamanho == "grande"){$md['nome'] = $md['nome']."_grande"; } else if ($tamanho == "pequeno") { $md['nome'] = $md['nome']; }					
			 ?>

		 <?php if ($md['desconto'] > 0){ echo "<img src='../imagens/promocao3.gif' width='175' height='75' class='promocao'>"; } ?>

		<ul>

    	<li><a href="#img<?php echo $i; ?>"><?php echo '<img  src="'.'../imagens/mudas/'. $md['nome'] .'.jpg'.'" class="min"  />';  ?></a></li>
    	</ul>

		<div id="fot">		
		<div class="lbox" id="img<?php echo $i; ?>">
  		<div class="box_img">
  		
  		<a href="#" class="btn" id="close">FECHAR(X)</a>
  		<?php echo '<img src="'.'../imagens/mudas/'. $md['nome'] .'.jpg'.'" />';  ?>
  		<a href="#img<?php echo $i + 1; ?>" class="btn" id="next">&#187;</a>
  		<a href="#img<?php echo $i - 1; ?>" class="btn" id="prev">&#171;</a>
  		</div>
  		</div>
  		</div>

						 
		  </td>
		
	</tr>	

	<?php } ?>

<tr> <td>  Valor total de todas as mudas: <input type="text" id="tudo"  value="0" readonly> </td> </tr>

</table>
</div>



<input type="hidden" name="totalRegistros" value="<?=$i;?>">
<input type="submit" name="" id="colocar" value="Colocar no caminhão" class="btn_caminhao">


</form><br><br><br>

<form action="calculo_frete.php">
	<input type="submit" id="calcular" name="" value="Calcular o frete">

</form>

<form action="refazer.php" method="post">
      <input type="submit" id="refazer" name="" value="Refazer compras">
    </form>  

    <input type="button" id="visualizar" value="visualizar o que esta no caminhão">
    <div id="resposta"></div>
	
</div>



</body>
</html>



