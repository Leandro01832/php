<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Banco</h1>
        <table width="100%" border="1">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Saldo</td>
                <td>Ação</td>
            </tr>
        <?php
        try{
        $conexao = new PDO('mysql:host=localhost;dbname=pdo', "root", "leandro");
        
        $sql = "select * from conta order by id asc";
        foreach ($conexao->query($sql) as $row)
        { ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["nome"] ?></td>
                <td><?php echo $row["saldo"] ?></td>
                <td><a href="transferir.php?id=<?php echo $row["id"] ?>">Transferir</a></td>
            </tr>             
 <?php  }
        
        }
        catch (PDOException $ex)
        {
            print "Error!: " . $ex->getMessage() . "<br/>";
            die();
        }
        ?>
        </table>
    </body>
</html>
