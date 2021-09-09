<?php 

function dbdeletar($tabela, $where = null, $insertId = false)
{
	$where = ($where) ? " where {$where}" : null;

	$query = "delete from {$tabela} {$where}";
	return dbexecute($query, $insertId);
}

function dbatualizar ($tabela, array $data, $where = null, $insertId = false)
{

	foreach ($data as $key => $value) {
		$fields[] = "{$key} = '{$value}'";
	}
	$fields = implode(', ', $fields);
	var_dump($fields);

	$where = ($where) ? " where {$where}" : null;


	$query = "update {$tabela} set {$fields} {$where}";
	return dbexecute($query, $insertId);
}

function dbler ($tabela, $params = null, $fields = '*'){

	$params = ($params) ? " where {$params}" : null;

	$query = "select {$fields} from {$tabela}{$params}";
	$result = dbexecute($query);

	if (!mysqli_num_rows($result))
		return false;
	else {
		while ($res = mysqli_fetch_assoc($result)) {
			$data[] = $res;
		}
		return $data;
	}
}


function dbcriar($tabela, array $data, $insertId = false){
	$data = dbescape($data);

	$fields = implode(', ', array_keys($data));
	$valores = "'".implode("', '", $data)."'";

	$query = "insert into {$tabela} ({$fields}) values ({$valores})";

	return dbexecute($query, $insertId);
}

function dbexecute($query, $insertId = false){
	$link = dbconectar();
	$result = @mysqli_query($link, $query) or die(mysqli_error()) ;
	if($insertId)
	$result = mysqli_insert_id($link);

	dbfechar($link);
	return $result;
}




 ?>