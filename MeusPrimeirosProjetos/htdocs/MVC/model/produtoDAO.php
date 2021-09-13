<?php
include 'IDAO.php';
class ProdutoDAO implements IDAO
{
    public function insert(modelocrud $value) {
        
        $sql = "Insert into produto (nome, marca, preco) values ";
        $sql .= "( ?, ?, ? ) ";
        
        $db = new db();
        $db->GetConnection();
        $pstm =  $db->execQuery($sql);
        
        $pstm->bind_param("sss", $value->getNome(), $value->getMarca(), $value->getPreco());
                
        if($pstm->execute())
            return true;
        else
            return false;
    }
    
    public function update(modelocrud $value) {
        
        $sql = "update produto set nome=?, marca=?, preco=? where id=? ";
        
        $db = new db();
        $db->GetConnection();
        $pstm =  $db->execQuery($sql);
        
        $pstm->bind_param("sssi", $value->getNome(), $value->getMarca(), $value->getPreco(), $value->getId());
                
        if($pstm->execute())
            return true;
        else
            return false;
    }
    
    public function delete(modelocrud $value) {
        
        $sql = "delete from produto where id=? ";
        
        $db = new db();
        $db->GetConnection();
        $pstm =  $db->execQuery($sql);
        
        $pstm->bind_param("i", $value->getId());
        
        if($pstm->execute())
            return true;
        else
            return false;
    }
    
    public function getbyid($id) {
        
        $sql = "select * from produto where id=" . addslashes($id);
        
        $db = new db();
        $db->GetConnection();
        $query =  $db->execReader($sql);
        
        $vo = new ProdutoVO();
        
        while($reg = $query->fetch_array(MYSQLI_ASSOC))
        {
            $vo->setId($reg["id"]);
            $vo->setNome($reg["nome"]);
            $vo->setMarca($reg["marca"]);
            $vo->setPreco($reg["preco"]);
        }
        
        return $vo;
        
    }
    
    public function getAll() {
        
        $sql = "select * from produto ";
        
        $db = new db();
        $db->GetConnection();
        $query =  $db->execReader($sql);
        
        $array = array();
        
        while ($row = $query->fetch_array())
        {
            $array[] = array($row["id"], $row["nome"], $row["marca"], $row["preco"]);
        }
        
        return $array;        
    }
}

