
 <?php
    include '../conexao.php';
    
    if(is_numeric($_GET["id"]))
    {
        $sql = "delete from pessoa where id=" . $_GET["id"];
    $query = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0)
        echo "<script>alert('Funcionario apagado com sucesso no banco de dados.');</script>";
    else
        echo "<script>alert('Erro ao apagar funcionario.');</script>";
    }
    
    echo "<script>window.location = 'listar.php';</script>";
        
 ?>
   
