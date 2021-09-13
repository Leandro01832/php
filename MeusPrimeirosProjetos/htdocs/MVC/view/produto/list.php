<?php
       $arr = $_SESSION["data"];
  ?>

<script>
         function apagar(id, desc)
         {
             if(confirm("Deseja realmente apagar este registro " + desc + "?"))
             {
                 window.location = "Produto/excluir/" + id;
             }
         }
        
        </script>

<table border="1" width="100%">
    
    <tr>
        <td><b>Id</b></td>
        <td><b>Nome </b></td>
        <td><b>Marca</b></td>
        <td><b>Preço</b></td>
        <td><b>APAGAR</b></td>
        <td><b>ATUALIZAR</b></td>
    </tr>
    
    <?php  for($i = 0; $i < count($arr); $i++) { ?>
    <tr>
        <td><?php  echo $arr[$i][0] ?></td>
        <td><?php  echo $arr[$i][1] ?></td>
        <td><?php  echo $arr[$i][2] ?></td>
        <td><?php  echo $arr[$i][3] ?></td>
        <td><a href="#" onclick="apagar('<?php  echo $arr[$i][0] ?>', '<?php  echo $arr[$i][1] ?>');" >Apagar</a></td>
        <td><a href="Produto/editar/<?php  echo $arr[$i][0] ?>">Atualizar</a></td>
    </tr>
    <?php  } ?>
    
</table>
         