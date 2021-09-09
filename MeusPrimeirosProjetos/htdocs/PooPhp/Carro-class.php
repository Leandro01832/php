<?php

class Carro {
    
//atributos
public $cor;
public $ligado =  false;
public $marcha = 0;
public $velocidade = 0;

//metodos

public function ligar()
{
    if ( $this->ligado == false)
    {
     $this->ligado = true;
     $this->acenderPainel();
     echo "carro ligado. ";
    }
    else
    {
    echo "você não pode ligar o carrro!";
    }

}

    private function acenderPainel(){
        echo "Painel ligado. ";
    }

    public function desligar()
    {
        if($this->ligado == true)
        {
        $this->ligado = false;
        echo "carro desligado";
        }
        else
        {
        echo "você não pode desligar o carrro!";
        }

    }
    
    
    public function acelerar($acelerar)
    {
    if($this->ligado == true)
        {
            if($this->marcha == 1)
            {
                if($acelerar <= 20)
                {
                    $this->velocidade += $acelerar;
                    echo "você está acelerando ". $this->velocidade . " KM/H " . "<br/>";                     
                }   
                else echo "Passe a marcha para acelerar.";
            }
            else if($this->marcha == 2)
            {
                if($acelerar <= 40)
                {
                    $this->velocidade += $acelerar;
                    echo "você está acelerando ". $this->velocidade . " KM/H " . "<br/>";                    
                }      
                else echo "Passe a marcha para acelerar.";
            }
            else if($this->marcha == 3)
            {
                if($acelerar <= 50)
                {
                    $this->velocidade += $acelerar;
                    echo "você está acelerando ". $this->velocidade . " KM/H " . "<br/>";                    
                }    
                else echo "Passe a marcha para acelerar.";
            }
            else if($this->marcha == 4)
            {
                if($acelerar <= 80)
                {
                    $this->velocidade += $acelerar;
                    echo "você está acelerando ". $this->velocidade . " KM/H " . "<br/>";                    
                }   
                else echo "Passe a marcha para acelerar.";
            }
            else if($this->marcha == 5)
            {
                if($acelerar <= 120)
                {
                    $this->velocidade += $acelerar;
                    echo "você está acelerando ". $this->velocidade . " KM/H " . "<br/>";                    
                }     
                else echo "Passe a marcha para acelerar.";  
            }
            else echo "Passe a marcha para acelerar.";
        }
        else
        {
            echo "você não está acelerando. Carro desligado!";
        }
    }
}
