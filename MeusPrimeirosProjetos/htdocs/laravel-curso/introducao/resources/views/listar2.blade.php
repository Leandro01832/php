@extends('principal')
@section('title', "Listar");
@section('content')
	<table class="table table-striped table-bordered table-hover">	
	<tr>
		<td>Id</td>
		<td>Nome</td>
		<td>Ação</td>
	</tr>

	<h1>Listar clientes </h1>
	<?php
		foreach($nomes as $key => $value)
		{
			echo "<tr>";

			echo "<td>".$key."</td>";
			
			echo "<td>";
			echo $value;
			echo "</td>";

		echo "<td>[".
		"<a href='".action("App\Http\Controllers\ClienteController@editar", $key)."'> Editar </a>]".
		" - [<a href='".action("App\Http\Controllers\ClienteController@excluir", $key)."'> Excluir </a>]".
		" - [<a href='".action("App\Http\Controllers\ClienteController@detalhes", $key)."'> Detalhes </a>]</td>";		

			echo "</tr>";
		}
	?>
</table>
@stop