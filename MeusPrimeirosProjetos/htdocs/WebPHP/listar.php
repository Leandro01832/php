<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'conexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <style>
            @import url("css/main.css");
        </style>
        
    </head>
    <body>
        <div id="cadastro">
            <fieldset>
                <legend> Listar </legend>  
                
                <ul>
                    <?php 
                    $sql = "select * from pessoa";
                     $consulta = mysqli_query($conn, $sql);  
                     while ($exibir = mysqli_fetch_array($consulta)){
                    ?>
                    <li> <?php echo $exibir["data"] ?> - <?php echo $exibir["nome"] ?>
                     - <?php echo $exibir["estado"] ?> - <?php echo $exibir["email"] ?>
                    </li>
                     <?php } ?>
                </ul>
                
            </fieldset>
            
        </div>
    </body>
</html>
