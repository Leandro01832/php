<?php

$conexao = new PDO('mysql:host=localhost;dbname=pdo', "root", "leandro");
        $sql = "update conta set nome=:Nome, saldo=:Saldo where id= :Id";
        
        $conexao->beginTransaction();
        
    $prepare = $conexao->prepare($sql);
    
    $nome = "Reinaldo";
    $saldo = "2910";
    $id = "5";
    
    $prepare->bindParam(":Nome", $nome, PDO::PARAM_STR);
    $prepare->bindParam(":Saldo", $saldo, PDO::PARAM_STR);
    $prepare->bindParam(":Id", $id, PDO::PARAM_INT);
    $prepare->execute();
    
    if($prepare->rowCount() > 0)
    {
        if( $conexao->commit())
        echo 'Transação realizada com sucesso.';
    }
    else
    $conexao->rollBack();
