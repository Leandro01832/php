<?php

print_r($_POST);

$nome =  trim($_POST["nome"]);
$numero1 =  trim($_POST["n1"]);
$numero2 = trim($_POST["n2"]);
$opera = trim($_POST["operacao"]);


if(!is_numeric($numero1))
echo "Preencha N1";
else if(!is_numeric($numero2))
echo "Preencha N2";


//https://www.php.net/is_numeric
if(!is_numeric($numero1)  || !is_numeric($numero2))
exit; //return; ->> mesmo resultado


$subtracao = $numero1 - $numero2;
$adicao = $numero1 + $numero2;
$multiplicacao = $numero1 * $numero2;
$divisao = $numero1 / $numero2;
$resultado = 0;

if($opera == "adicao")
$resultado  = $adicao;
else if($opera == "subtracao")
$resultado  = $subtracao;
else if($opera == "multiplicacao")
$resultado  = $multiplicacao;
else if($opera == "divisao")
$resultado  = $divisao;

echo "Calculo realizado com sucesso. Resultado: " . $resultado;


?>