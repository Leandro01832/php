<?php
require_once 'modelocrud.php';
class ProdutoVO extends modelocrud
{   

    private $nome;
   public  function getNome()
    {
        return $this->nome;
    }

   public  function setNome($value)
    {
        $this->nome = $value;
    }

    private $marca;
   public function getMarca()
    {
        return $this->marca;
    }

   public function setMarca($value)
    {
        $this->marca = $value;
    }

    private $preco;
   public  function getPreco()
    {
        return $this->preco;
    }

   public  function setPreco($value)
    {
        $this->preco = $value;
    }

}