<?php

  abstract class  Conta {
    
    private $conta;
    private $digito;
    private $saldo;
    
    public function Conta()
    {
        
    }
    
    public function getConta()
    {
        return $this->conta;
    }
    
    public function setConta($param) {
        if($param != "")
        $this->conta = $param;
        else
            echo "erro na conta. " . "<br/>";
    }
    
    public function getDigito() {
        return $this->digito;
    }
    
    public function setDigito($param) {
        if($param != "")
        $this->digito = $param;
        else
            echo "erro no digito. " . "<br/>";
    }


    public function depositar($valor)
    {
        $this->saldo += $valor;
        echo "Foi depositado o seguinte valor: " . $valor . " na conta ".
         $this->conta . "-" . $this->digito . "<br/>";
    }
    
    public function sacar($valor)
    {
        if($valor > $this->saldo)
        {
            echo "saldo insuficiente. " . "<br/>";
        }
        else
        {
            $this->saldo -= $valor;
            echo "foi sacado o seguinte valor: " . $valor . " na conta ".
            $this->conta . "-" . $this->digito . "<br/>";
            
        }
    }
    
    public function verSaldo()
    {
        echo "Saldo total disponível: " . $this->saldo . " da conta ".
        $this->conta . "-" . $this->digito . "<br/>";
    }
    
    public function transferir()
    {
        
    }
    
}
