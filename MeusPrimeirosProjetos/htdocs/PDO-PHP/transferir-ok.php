<?php

if(!isset($_POST["txtIDD"]) && !isset($_POST["txtValor"]) && !isset($_POST["txtIDR"]))
   exit;

if(isset($_POST["txtIDR"]))
{    
        $conexao = new PDO('mysql:host=localhost;dbname=pdo', "root", "leandro");
        $conexao->beginTransaction();
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try{
        $sql = "select COUNT(*) from conta where id= :Destinatario";
        
        $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Destinatario", $_POST["txtIDD"], PDO::PARAM_INT);
        $prepare->execute();
                
        if($prepare->fetchColumn() == 0)
            exit;
        
        $prepare->closeCursor();
        echo 'continuando'. "<br>";
        
        $sql = "select COUNT(*) from conta where id= :Remetente";
        
        $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
        $prepare->execute();
                
        if($prepare->fetchColumn() == 0)
            exit;
        $prepare->closeCursor();
        echo 'continuando'. "<br>";
        
        $sql = "select saldo from conta where id= :Remetente";
        $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
        $prepare->execute();
            if($row = $prepare->fetch(PDO::FETCH_ASSOC))
            {
                
                if($row["saldo"] < $_POST["txtValor"])
                { echo 'Saldo insuficiente';  exit;}
                else
                {
                    $prepare->closeCursor();
                    echo 'continuando'. "<br>";
            
           $sql = "update conta set saldo=saldo - :Valor where id= :Remetente";
           $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Valor", $_POST["txtValor"], PDO::PARAM_STR);
        $prepare->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
        $prepare->execute();
       
           
           if($prepare->rowCount() > 0)
           {
               $prepare->closeCursor();
                echo 'continuando'. "<br>";
           
                $sql = "update contas set saldo=saldo + :Valor where id= :Destinatario"; 
                $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Valor", $_POST["txtValor"], PDO::PARAM_STR);
        $prepare->bindParam(":Destinatario", $_POST["txtIDD"], PDO::PARAM_INT);
        $prepare->execute();
           
                if($prepare->rowCount() > 0)
                if($conexao->commit())
                 echo 'Transferência realizada com sucesso'. "<br>"; 
                else
                 echo 'Aconteceu algum erro'. "<br>"; 
                
                $prepare->closeCursor();
           } 
                }
            }
            else exit;      
            $prepare->closeCursor();
        }
 catch (Exception $ex)
 {
     $conexao->rollBack();
     echo 'ROLLBACK!!!';
 }
}