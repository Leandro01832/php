<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include '../conexao.php';
include '../funcoes.php';

if(isset($_POST["txt_nome"]))
{
    print_r($_POST);
    $nome = $_POST["txt_nome"];
    $email = $_POST["email"];
    $url = $_POST["txt_url"];
    $estado = $_POST["cbestados"];
    $endereco = $_POST["endereco"];
    $data = $_POST["txtData"];
    
      
    
        if(($nome == "") || ($data == "") || ($url == "")  || 
         ($email == "") || ($endereco == "0") || ($estado == ""))
        {
            echo 'Preencha os campos para validações';
            exit;
        }
        else
        {
            $data = datatoen($data);
            $sql = "update pessoa set nome='".$nome."', ";
            $sql .= " email='".$email."', ";
            $sql .= " url='".$url."', ";
            $sql .= " estado='".$estado."', ";
            $sql .= " endereco='".$endereco."', ";
            $sql .= " data='".$data."' where id=" . $_GET["id"];
            
            $insert = mysqli_query($conn, $sql);  
            
            if(mysqli_affected_rows($conn) > 0)
            {
                echo "<script>alert('atualização realizada com sucesso.');</script>";
                echo "<script>window.location = 'listar.php';</script>";
            }
            else
            {
                echo "<script>alert('Erro ao atualizar.".$sql."');</script>";
                echo "<script>window.location = 'listar.php';</script>";
            }
                
        }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <style>
            @import url("../css/main.css");
        </style>
        <script type="text/javascript">
        
         function validar()
         {
             var msg = "";
             if(document.getElementById("nome").value.length <= 0)
              msg += "Preencha o campo nome \n";                 
             if(document.getElementById("e-mail").value.length <= 0)
                 msg += "Preencha o campo e-mail \n";
             if(document.getElementById("url").value.length <= 0)
                 msg += "Preencha o campo url \n";
           //  if(document.getElementById("senha").value.length <= 0)
             //    msg += "Preencha o campo senha \n";
             if(document.getElementById("estado").value == "")
                 msg += "Preencha o campo estado ";
            // if(document.getElementById("estado2").value == "")
              //   msg += "Preencha o campo estado2 \n";
             if(document.getElementById("endereco").value.length <= 0)
                 msg += "Preencha o campo endereco \n";
             
             if(msg != ""){
                 alert(msg);
                 return false;
             }
         }
         
         function mask_date(field)
         {
            if(document.getElementById(field).value.length == 2) 
                document.getElementById(field).value += "/";
            if(document.getElementById(field).value.length == 5) 
                document.getElementById(field).value += "/";
         }
         
         function mask_url(field)
         {
             var valor = document.getElementById(field).value.replace("https://www.", "");
             document.getElementById(field).value = valor;
             if(document.getElementById(field).value.length > 0)
            document.getElementById(field).value = "https://www." + 
                    document.getElementById(field).value;
         }
        
        </script>
    </head>
    <body>
        
        <?php 
        if(isset($_GET["id"]))
        if(is_numeric($_GET["id"]))
        {
            $sql = "select * from pessoa where id=". $_GET["id"];
            $query = mysqli_query($conn, $sql);
            $resultado = mysqli_fetch_array($query);
        }
        ?>
        
        <div id="cadastro">
            <fieldset>
                <legend> Cadastro de funcionário </legend>    
                <form name="frm_cadastro" method="POST" action="editar.php?id=<?php echo $_GET['id'] ?>" onsubmit="return validar();">
            
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="txt_nome" value="<?php echo $resultado['nome'] ?>" placeholder="Digite seu nome..." maxlength="10" /><br><br>
                <label for="data">Data de inicio:</label>
                <input type="text" id="data" value="<?php echo datatobr($resultado['data']);  ?>" name="txtData" maxlength="10" onkeyup="mask_date('data');" /><br><br>
                <label for="url">URL:</label>
                <input type="url" id="url" value="<?php echo $resultado['url'] ?>" name="txt_url" required="required" placeholder="ex: https://domain.com" /><br><br>
                <label for="email">E-mail:</label>
                <input type="email" id="e-mail" value="<?php echo $resultado['email'] ?>" name="email" required="required" placeholder="ex: user@domain.com" /><br><br>
                <label for="estado">Estado:</label>
                <select name="cbestados" id="estado" >
                <option value="0">-- Selecione --</option>
                <option value="RS" <?php if($resultado["estado"] == "RS") echo "selected" ?> >Rio Grande do Sul</option>
                <option value="SP" <?php if($resultado["estado"] == "SP") echo "selected" ?> >São Paulo</option>
                <option value="RJ" <?php if($resultado["estado"] == "RJ") echo "selected" ?> >Rio de Janeiro</option>
                <option value="SC" <?php if($resultado["estado"] == "SC") echo "selected" ?> >Santa Catarina</option>
            </select><br><br>
           <!-- <label for="estado2">Estado:</label>
            <select  id="estado2" name="cbestados2" multiple="multipline">
                <option value="" selected>-- Selecione --</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="SP">São Paulo</option>
                <option value="RJ"  >Rio de Janeiro</option>
                <option value="SC">Santa Catarina</option>
            </select><br><br> -->
            <label for="endereco">Endereço:</label>
            <select  id="endereco" name="endereco" multiple="multipline">
                <option value="0">-- Selecione --</option>                
                <?php 
                    $sql = "select * from endereco";
                     $consulta = mysqli_query($conn, $sql);  
                     while ($exibir = mysqli_fetch_array($consulta)){
                    ?>
                <option value="<?php echo $exibir['id'] ?>" <?php echo ($resultado['endereco'] == $exibir['id']) ? "selected='selected'" : "" ?>  > <?php echo $exibir["Logradouro"] ?>  </option>
                     <?php } ?>
                    
            </select><br><br>           
            <input type="submit" value="Atualizar"  />
            <input type="reset" value="limpar"  />
                
            
        </form>
            </fieldset>
            
        </div>
    </body>
</html>
