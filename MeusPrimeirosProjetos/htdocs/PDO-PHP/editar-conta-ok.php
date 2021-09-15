<?php

print_r($_POST);

if(isset($_POST["txtNome"]) && isset($_POST["txtSaldo"]))
    {
        $conexao = new PDO('mysql:host=localhost;dbname=pdo', "root", "leandro");
        $sql = "update conta set nome=:Nome, saldo=:Saldo where id= :Id";
    $prepare = $conexao->prepare($sql);
    $prepare->bindParam(":Nome", $_POST["txtNome"], PDO::PARAM_STR);
    $prepare->bindParam(":Saldo", $_POST["txtSaldo"], PDO::PARAM_STR);
    $prepare->bindParam(":Id", $_POST["txtId"], PDO::PARAM_INT);
    $prepare->execute();
    if($prepare->rowCount() > 0)
        echo "<script>alert('Conta atualizada com sucesso no banco de dados.');</script>";
    else
        echo "<script>alert('Erro ao atualizar conta.');</script>";
    }
    
    echo "<script>window.location = 'index.php';</script>";

