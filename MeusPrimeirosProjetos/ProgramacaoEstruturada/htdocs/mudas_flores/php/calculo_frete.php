<?php 
  ob_start();
  session_start();
 ?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Calcular distancia entre cidades (mapas e rotas)</title>
    <script src="http://code.jquery.com/jquery-1.8.1.js" type="text/javascript"></script>
     <script src="../javascript/cep.js" type="text/javascript"></script>
     <script src="../javascript/mapa.js" type="text/javascript"></script>
     
</head>
<body>
 <center> <a href="logout.php"> Sair  </a> </center> 
    <!-- Parâmetro sensor é utilizado somente em dispositivos com GPS -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
    

    <?php 



	require 'config.php';
	require 'database.php';	


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
	$valores = dbler('pedido', "senha = '$senha' and email = '$email' and status = 'nao_finalizado'");
	$valor_total = 0;

	foreach ($valores as $vl) 
	{
		$quantidade = $vl['quantidade'];
		$valor =  $vl['valor_muda'];
		$preco = $valor * $quantidade;
		$valor_total  += $preco;
	}
 ?>
 <label >Valor total das mudas:</label>
     <input type="text" id="valor_m" style="width: 400px" value="<?php echo $valor_total; ?>" readonly /><br>
             

     <p>O valor padrão de frete é 4 reais por kilometro mais o desconto que varia de acordo com o valor total das mudas.</p><br>
     <P>Veja a tabela:</P>

    <table width="50%" cellspacing="0" cellpadding="0" border="5" >
        <tbody>
            <tr>
                <td> valor total das mudas </td> <td> desconto no valor padrão do frete </td> <td> valor a pagar por Kilometro </td>
            </tr>
            <tr>
               <td> acima de 9000 reais </td>  <td>90% </td> <td> 0,40 R$ por KM </td>
            </tr>
            <tr>
              <td> acima de 8000 reais </td>  <td>80% </td> <td> 0,80 R$ por KM </td>
            </tr>
            <tr>
              <td> acima de 7000 reais </td> <td>70% </td> <td> 1,20 R$ por KM </td>
            </tr>

             <tr>
              <td> acima de 6000 reais </td> <td>60% </td> <td> 1,60 R$ por KM </td>
            </tr>

             <tr>
              <td> acima de 5000 reais </td> <td>50% </td> <td> 2,00 R$ por KM  </td>
            </tr>

            <tr>
              <td> acima de 4000 reais </td> <td>40% </td> <td> 2,40 R$ por KM </td>
            </tr>

            <tr>
              <td> acima de 3000 reais </td> <td>30% </td> <td> 2,80 R$ por KM </td>
            </tr>

            <tr>
              <td> acima de 2000 reais </td> <td>20% </td> <td> 3,20 R$ por KM </td>
            </tr>

            <tr>
              <td> acima de 1000 reais </td> <td>10% </td> <td> 3,60 R$ por KM </td>
            </tr>

            <tr>
              <td> abaixo de 1000 reais </td> <td>0% </td> <td> 4,00 R$ por KM </td>
            </tr>
            
        </tbody>
       
    </table><br><br>

     <form  action="enviar_endereco.php" method="post">

    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td>
                    <label for="txtOrigem"><strong>Endere&ccedil;o de origem</strong></label>
                    <input type="text" id="txtOrigem" class="field" style="width: 400px" value="Cataguases - MG" readonly />

                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtDestino"><strong>Endere&ccedil;o de destino</strong></label>
                    <input type="text" style="width: 400px" class="field" id="txtDestino" placeholder="Ex: (36774-000), Cataguases - MG" />
                   

                </td>
            </tr>
           
            <tr>
                <td>
                    <input type="button" value="Calcular dist&acirc;ncia" onclick="CalculaDistancia()" class="btnNew" />
                </td>
            </tr>

             <tr>
                <td>
                    <label for="txtDestino"><strong>Preço do frete:</strong></label>
                    <input type="text" style="width: 400px" class="f" id="valor_frete" value="0"  readonly />

                </td>
            </tr>

            <tr>
               
        <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label>IBGE:
        <input name="ibge" type="text" id="ibge" size="8" /></label><br />
      
        <p>Valor total a pagar pelas mudas e frete: <input type="text" id="total" value="" name="total" readonly> </p>

            </tr>

            
        </tbody>
    </table>

    <div><span id="litResultado">&nbsp;</span></div>
    <div style="padding: 10px 0 0; clear: both">
        <iframe width="750" scrolling="no" height="350" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=são paulo&daddr=rio de janeiro&output=embed"></iframe>
    </div><br>

<input  id="finalizar" type="submit"   value="finalizar pedido">
</form><br><br>

 <form action="refazer.php" method="post">
      <input type="submit" name="" value="refazer compras">
    </form>


</body>
</html>


<?php
ob_end_flush();
?>
