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
        <h1>Transferir</h1>
        <form action="transferir-ok.php" method="POST">
            <table width="50%" border="1">
            <tr>
                <td width="80%">ID Remetente</td>
                <td width="20%"><input name="txtIDR" type="text" value="<?php echo $_GET["id"] ?>" readonly="readonly" /></td>
            </tr>
            <tr>
                <td width="80%">ID Destinatario</td>
                <td width="20%"><input name="txtIDD" type="text" /></td>
            </tr>
            <tr>
                <td width="80%">Valor da transferencia</td>
                <td width="20%"><input name="txtValor" type="text" /></td>
            </tr>
            <tr>
                <td width="80%"></td>
                <td width="20%"><input type="submit" value="transferir" /></td>
            </tr>
       
        </table>
        </form>
    </body>
</html>
