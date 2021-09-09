<?php 

require 'config.php';
require 'database.php';



$peca = $_POST['produto'];

$buscar = dbler('peca', " nome LIKE '%{$peca}%' or nome LIKE '%{$peca}%'  ");







 ?>

 <!DOCTYPE html>
 <html>
 <head>
 
 <meta charset="utf-8">
 	<title>preço</title>
 	<link rel="stylesheet" type="text/css" media="screen and (min-width: 0px)" href="../css/small.css">
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 500px)" href="../css/medium.css">
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 1050px)" href="../css/large.css">
 	
 </head>
 <body>


<div id="conteudo2">

<?php echo $peca; ?>

 <table border="10">
	 

 	

 	<?php 

 	if(!$buscar){
 		echo "<center> <h1> não encontramos nenhum dado. por favor não digite a descrição do produto. Digite apenas o nome do produto. Aguarde um instante. </h1> </center>";
 	}
 	else{

 	 if (is_array($buscar) || is_object($buscar)){

	
    foreach ($buscar as $bc) {  
	  $nome = $bc['nome']; 
	 $preco = $bc['preco'];  ?>

	 <tr>
 			<td width="150" > Nome </td>
 			<td width="150"> preço </td>
 			<td width="150"> imagem </td>
 			
 	</tr>

	 <tr>

 			<td width="150" > <?php echo "<center> <h2> $nome </h2> </center>"; ?> </td>
 			<td width="150"> <?php echo "<center> <h2> $preco </h2> </center>"; ?> </td>
 			<td width="150"> <img class="imagem" src="../imagens/pecas/<?php echo $nome;?>.jpg" > </td>

 	</tr>

 	<?php } ?>
 	<?php } ?>
 	<?php } ?>	
 	
 	
 </table>

</div>
 
 </body>
 </html>