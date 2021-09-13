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
        <form  method="POST" action="/MVC/Produto/update/<?php echo $SESSION['id'] ?>">
            <label>Nome</label>
            <input type="text" name="txtNome" value="<?php echo $SESSION["nome"] ?>" /><br>
            <label>Marca</label>
            <input type="text" name="txtMarca" value="<?php echo $SESSION["marca"] ?>" /><br>
            <label>Preço</label>
            <input type="text" name="txtPreco" value="<?php echo $SESSION["preco"] ?>" /><br>
            <input type="submit" value="Salvar" /><br>
        </form>
    </body>
</html>
