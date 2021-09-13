<?php

class ProdutoModel 
{
    public function insertModel(ProdutoVO $value) {
        
        $prod = new ProdutoDAO();
        if($value->getPreco() == "0")
            $value->setPreco("10.90");
        
       return  $prod->insert($value);
    }
    
    public function getbyidModel($id)
    {        
        $prod = new ProdutoDAO();
        $vo = $prod->getbyid($id);    
        if($_GET["Action"] != "editar")
        $vo->setPreco("R$ ". number_format($vo->getPreco(), 2, ".", ","));        
       return  $vo;
        
    }
    
    public function getAllModel()
    {        
        $prod = new ProdutoDAO();
               
       return  $prod->getAll();        
    }
    
    public function updateModel(ProdutoVO $value)
    {
        
        $prod = new ProdutoDAO();
      return  $prod->update($value);
    }
    
    public function deleteModel(ProdutoVO $value) {
        
        $prod = new ProdutoDAO();
       return $prod->delete($value);
    }
}

