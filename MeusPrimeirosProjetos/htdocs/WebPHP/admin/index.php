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
            $sql = "insert into pessoa (nome, email, url, estado, endereco, data)";
            $sql .= " values ('".$nome."', '".$email."', '".$url."', '".$estado."', ".$endereco.", '".$data."') ";
            
            $insert = mysqli_query($conn, $sql);  
            
            if(mysqli_affected_rows($conn) > 0)
            {
                echo "<script>alert('cadastro realizado com sucesso.');</script>";
                echo "<script>window.location = 'listar.php';</script>";
            }
            else
            {
                echo "<script>alert('Erro ao cadastrar.".$sql."');</script>";
                echo "<script>window.location = 'listar.php';</script>";
            }
                
        }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
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
        <div id="cadastro">
            <fieldset>
                <legend> Cadastro de funcionário </legend>    
                <form name="frm_cadastro" method="POST" action="index.php" onsubmit="return validar();">
            
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="txt_nome"  placeholder="Digite seu nome..." maxlength="10" /><br><br>
                <label for="data">Data de inicio:</label>
                <input type="text" id="data" name="txtData" maxlength="10" onkeyup="mask_date('data');" /><br><br>
                <label for="url">URL:</label>
                <input type="url" id="url" name="txt_url" required="required" placeholder="ex: https://domain.com" /><br><br>
                <label for="email">E-mail:</label>
                <input type="email" id="e-mail" name="email" required="required" onfocus="mask_url('url');" placeholder="ex: user@domain.com" /><br><br>
                <label for="estado">Estado:</label>
                <select name="cbestados" id="estado">
                <option value="" selected>-- Selecione --</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="SP">São Paulo</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="SC">Santa Catarina</option>
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
                <option value="0" selected>-- Selecione --</option>                
                <?php 
                    $sql = "select * from endereco";
                     $consulta = mysqli_query($conn, $sql);  
                     while ($exibir = mysqli_fetch_array($consulta)){
                    ?>
                <option value="<?php echo $exibir['id'] ?>"> <?php echo $exibir["Logradouro"] ?>  </option>
                     <?php } ?>
                    
            </select><br><br>           
            <input type="submit" value="cadastrar"  />
            <input type="reset" value="limpar"  />
                
            
        </form>
            </fieldset>
            
        </div>
    </body>
</html>
