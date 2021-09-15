<?php 
        if(isset($_GET["id"]))
        if(is_numeric($_GET["id"]))
        {
            $conexao = new PDO('mysql:host=localhost;dbname=pdo', "root", "leandro");
            $sql = "select * from conta where id= :Id";
            $prepare = $conexao->prepare($sql);
        $prepare->bindParam(":Id", $_GET["id"], PDO::PARAM_INT);
        $prepare->execute();
            if($row = $prepare->fetch(PDO::FETCH_ASSOC))
            {
                $linha = $row;
            }
        }
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
    </head>
    <body>
        <h1>Editar conta</h1>
        <form action="editar-conta-ok.php" method="POST">
            <table width="50%" border="1">
                <input name="txtId" type="hidden" value="<?php echo $_GET["id"] ?>" />   
            <tr>
                <td width="80%">Nome</td>
                <td width="20%"><input name="txtNome" type="text" value="<?php echo $linha["nome"] ?>" /></td>
            </tr>
            <tr>
                <td width="80%">Saldo</td>
                <td width="20%"><input name="txtSaldo" type="text" value="<?php echo $linha["saldo"] ?>" /></td>
            </tr>
            <tr>
                <td width="80%"></td>
                <td width="20%"><input type="submit" value="Atualizar" /></td>
            </tr>
       
        </table>
        </form>
    </body>
</html>
