<?php
include 'IUsb.php';
class Impressora Implements IUsb {
    //put your code here
    public function conecte() {
        echo 'Conectando a imperssora.'. "<br/>";
    }

    public function desconecte() {
        echo 'Desconectando a imperssora.'. "<br/>";
    }

    public function verVersao() {
        echo "Versão". self::versao. "<br/>";
    }

}
