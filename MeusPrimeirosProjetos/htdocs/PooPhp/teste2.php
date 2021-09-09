<?php

include 'ContaCorrenteClass.php';
//include 'ContaPoupancaClass.php';

$conta1 = new ContaCorrente();
$conta1->setConta("1000");
$conta1->setDigito("12");
$conta1->depositar(300);
$conta1->sacar(350);

$conta1->verSaldo();

if($conta1 instanceof ContaPoupanca)
{
    echo "é uma conta poupança";
}

if($conta1 instanceof ContaCorrente)
{
    echo "é uma conta corrente";
}