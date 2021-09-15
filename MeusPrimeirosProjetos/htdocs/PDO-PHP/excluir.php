
 <?php
        
    if(is_numeric($_GET["id"]))
    {
        $conexao = new PDO('mysql:host=localhost;dbname=pdo', "root", "leandro");
        $sql = "delete from conta where id= :Conta";
    $prepare = $conexao->prepare($sql);
    $prepare->bindParam(":Conta", $_GET["id"], PDO::PARAM_INT);
    $prepare->execute();
    if($prepare->rowCount() > 0)
        echo "<script>alert('Conta apagada com sucesso no banco de dados.');</script>";
    else
        echo "<script>alert('Erro ao apagar conta.');</script>";
    }
    
    echo "<script>window.location = 'index.php';</script>";
        
 ?>
   
