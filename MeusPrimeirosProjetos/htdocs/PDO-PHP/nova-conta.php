<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nova Conta</title>
    </head>
    <body>
        <h1>Nova conta</h1>
        <form action="nova-conta-ok.php" method="POST">
            <table width="50%" border="1">
            <tr>
                <td width="80%">Nome</td>
                <td width="20%"><input name="txtNome" type="text" /></td>
            </tr>
            <tr>
                <td width="80%">Saldo</td>
                <td width="20%"><input name="txtSaldo" type="text" /></td>
            </tr>
            <tr>
                <td width="80%"></td>
                <td width="20%"><input type="submit" value="cadastrar" /></td>
            </tr>
       
        </table>
        </form>
    </body>
</html>
