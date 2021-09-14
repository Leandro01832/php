<?php

if(!isset($_POST["txtIDD"]) && !isset($_POST["txtValor"]) && !isset($_POST["txtIDR"]))
   exit;

if(isset($_POST["txtIDR"]))
{
    
     try{
        $conexao = new PDO('mysql:host=localhost;dbname=pdo', "root", "leandro");
        
        $sql = "select COUNT(*) from conta where id= :Destinatario";
        
        $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Destinatario", $_POST["txtIDD"], PDO::PARAM_INT);
        $prepare->execute();
                
        if($prepare->fetchColumn() == 0)
            exit;
        
        echo 'continuando'. "<br>";
        
        $sql = "select COUNT(*) from conta where id= :Remetente";
        
        $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
        $prepare->execute();
                
        if($prepare->fetchColumn() == 0)
            exit;
        
        echo 'continuando'. "<br>";
        
        $sql = "select saldo from conta where id= :Remetente";
        $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
        $prepare->execute();
            if($row = $prepare->fetch(PDO::FETCH_ASSOC))
            {
                if($row["saldo"] < $_POST["txtValor"])
                    exit;
                else
                {
                    echo 'continuando'. "<br>";
            
           $sql = "update conta set saldo=saldo -" . $_POST["txtValor"] .
           " where id= :Remetente";
           $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Remetente", $_POST["txtIDR"], PDO::PARAM_INT);
        $prepare->execute();
       
           
           if($query->rowCount() > 0)
           {
                echo 'continuando'. "<br>";
           
                $sql = "update conta set saldo=saldo +" . $_POST["txtValor"] .
                " where id=" . $_POST["txtIDD"]; 
                $query = $conexao->query($sql);
           
                if($query->rowCount() > 0)
                 echo 'Transferência realizada com sucesso'. "<br>"; 
                else
                 echo 'Aconteceu algum erro'. "<br>"; 
           } 
                }
            }
            else exit;
                
            
            
            
        }
 catch (Exception $ex){}
}