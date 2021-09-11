<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../conexao.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listar</title>
        <style>
            @import url("../css/main.css");
        </style>
        <script>
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
        <div id="Listar">
            <fieldset>
                
                <form method="GET"  action="listar.php">
                <label for="endereco">Endereço:</label>
            <select  id="endereco" name="endereco" multiple="multipline">
                <option value="0">-- Selecione --</option>                
                <?php 
                
                if(isset($_GET["endereco"]))
                    $idendereco = $_GET["endereco"];
                else
                    $idendereco = "0";
                
                    $sql = "select * from endereco";
                     $consulta = mysqli_query($conn, $sql);  
                     while ($exibir = mysqli_fetch_array($consulta)){
                    ?>
                <option value="<?php echo $exibir['id'] ?>" <?php echo ($exibir['id'] == $idendereco) ? "selected='selected'" : "" ?> > <?php echo $exibir["Logradouro"] ?>  </option>
                     <?php } ?>
                    
            </select><br><br> 
            <input type="submit" value="filtrar"  />
                
                </form>
                
                <legend> Listar </legend>  
                
                <ul>
                    <?php 
                    $sql = "select * from pessoa order by nome asc";
                    
                    if(isset($_GET["endereco"]))
                        if(is_numeric($_GET["endereco"]))
                            $sql .= " where endereco=" . $_GET["endereco"];
                    
                     $consulta = mysqli_query($conn, $sql);  
                     while ($exibir = mysqli_fetch_array($consulta)){
                    ?>
                    <li> <?php echo $exibir["data"] ?> - <?php echo $exibir["nome"] ?>
                     - <?php echo $exibir["estado"] ?> - <?php echo $exibir["email"] ?>
                     -&nbsp; <a href="editar.php?id=<?php echo $exibir['id'] ?>"> Editar </a>
                     -&nbsp;<a href="#" onclick="apagar('<?php echo $exibir['id'] ?>', '<?php echo $exibir['nome'] ?>');" > Excluir </a>
                    </li>
                     <?php } ?>
                </ul>
                
            </fieldset>
            
        </div>
    </body>
</html>
