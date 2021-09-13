<?php
class db{

private static $server = "localhost";
private static $user = "root";
private static $password = "leandro";
private static $database = "mvc";


private $conn;

 public function GetConnection()
 {     
   $this->conn = mysqli_connect(db::$server, db::$user, db::$password, db::$database);
 }

    public function execReader($sql)
    {
       return $this->conn->query($sql);
    }
    public function execQuery($sql)
    {
       return $this->conn->prepare($sql);
    }
    
    public function __destruct() {
        $this->conn->close();
    }
    
}

?>