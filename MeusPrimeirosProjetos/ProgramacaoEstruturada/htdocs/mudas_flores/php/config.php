<?php 

 define('db_hostaname', 'localhost');
 define('db_username', 'root');
 define('db_password', 'leandroleanleo');
 define('db_database', 'flor_campo');
 header("Content-Type: text/html; charset=ISO-8859-1",true);


 function dbescape($dados){
 	$link = dbconectar();
 	if(! is_array($dados))
 		$dados = mysqli_real_escape_string($link, $dados);
 	else{
 		$arr = $dados;

 		foreach ($arr as $key => $value) {
 			$key = mysqli_real_escape_string($link, $key);
 			$value = mysqli_real_escape_string($link, $value);

 			$dados[$key] = $value;
 		}
 	}
 	dbfechar($link);
 	return $dados;
 }

 function dbfechar($link){
 	mysqli_close($link) or die(mysqli_error($link));

 	return $link;
 }

function dbconectar(){
	$link = @mysqli_connect(db_hostaname, db_username, db_password, db_database) or die(mysqli_connect_error());

	return $link;
}




 ?>