<?php

$conexao = PDO("sqlsrv:Server=localhost;Database=testdb", "UserName", "Password");

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Igreja</title>
        <script type="text/javascript">
        
         function apagar(id, desc)
         {
             if(confirm("Deseja realmente apagar este registro " + desc + "?"))
             {
                 window.location = "excluir.php?id=" + id;
             }
         }
        
        </script>
    </head>
    <body>
        <h1>Banco</h1>
        <a href="nova-conta.php">Nova Conta</a>
        <table width="100%" border="1">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Ação</td>
            </tr>
        <?php
        try{
        
        $sql = "select * from Pessoa order by id asc";
        $prepare = $conexao->prepare($sql);
        $prepare->execute();
         $arr = $prepare->fetchAll();
        
        
        foreach ($arr as $row)
        { $i = 0; ?>
            <tr>
                <td><?php echo $row["Id"] ?></td>
                <td><?php echo $row["NomePessoa"] ?></td>
                <td><?php echo $row["Enail"] ?></td>
                <td>
                   || <a href="transferir.php?id=<?php echo $row["id"] ?>">Transferir</a>
                   || <a href="editar.php?id=<?php echo $row["id"] ?>">Editar Conta</a>
                   || <a href="#" onclick="apagar('<?php echo $row['id'] ?>', '<?php echo $row['nome'] ?>');">Apagar</a>
                </td>
            </tr>             
 <?php $i++;  if($i > 100) exit; }
        
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