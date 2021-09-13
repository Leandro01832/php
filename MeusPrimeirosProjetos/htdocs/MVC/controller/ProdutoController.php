<?php
include 'model/ProdutoModel.php';
include 'model/ProdutoVO.php';
include 'model/ProdutoDAO.php';
include 'model/db.php';

class ProdutoController
{
    
    
    public function ProdutoController()
    {
        
    }
    
    public function listar() {
        $model = new ProdutoModel();
        $_SESSION["data"] = $model->getAllModel();    

        include 'view/produto/list.php';
    }
    
    public function salvar() {
        $model = new ProdutoModel();
        $vo  = new ProdutoVO();
        $vo->setNome($_POST["txtNome"]);
        $vo->setMarca($_POST["txtMarca"]);
        $vo->setPreco($_POST["txtPreco"]);
        if ($model->insertModel($vo)) 
            $_SESSION["msg"] = "Produto cadastrado com sucesso";
        else 
            $_SESSION["msg"] = "Erro ao cadastrar produto";
        

        header("Location: ../view/produto/retorno.php");
    }
    
    public function update() {
        $model = new ProdutoModel();
        $vo  = new ProdutoVO();
        $vo->setNome($_POST["txtNome"]);
        $vo->setMarca($_POST["txtMarca"]);
        $vo->setPreco($_POST["txtPreco"]);
        $vo->setId($_GET["id"]);
        if ($model->updateModel($vo)) {
            $_SESSION["msg"] = "Produto atualizado com sucesso";
        } else {
            $_SESSION["msg"] = "Erro ao atualizar produto";
        }

        header("Location: ../../view/produto/retorno.php");
    }
    
    public function excluir()
    {
        $model = new ProdutoModel();
        $vo = $model->getbyidModel($_GET["id"]);
        if ($model->deleteModel($vo))
        {
            header("Location: ../../produto");
        } else
        {
            $_SESSION["msg"] = "Erro ao apagar o produto";
            header("Location: ../../view/produto/retorno.php");
        }        
    }
    
    public function novo() {
        include 'view/produto/insert.php';
       // header("Location: view/produto/insert.php");
       
    }
    
    public function editar() {
        $model = new ProdutoModel();
        $vo = $model->getbyidModel($_GET["id"]);
        $SESSION["id"] = $vo->getId();
        $SESSION["nome"] = $vo->getNome();
        $SESSION["marca"] = $vo->getMarca();
        $SESSION["preco"] = $vo->getPreco();
        
        include 'view/produto/edit.php';
    }
    
    
    
}

