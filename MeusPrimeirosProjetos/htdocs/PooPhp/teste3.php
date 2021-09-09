<?php

function __autoload($class_name)
{
    include $class_name."-class".".php";
}

//include 'ImpressoraClass.php';
$impressora = new Impressora();

$impressora->conecte();
$impressora->desconecte();
$impressora->verVersao();
