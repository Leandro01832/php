@extends('principal')
@section('title', "Novo");
@section('content')

	<h1>Novo cliente </h1>
	
	<form>
		
		Nome:  <input type="text" name="nome" id="nome"> <br/>
		Email:  <input type="text" name="email" id="email"> <br/>
		DDD:  <input type="text" name="ddd" id="ddd"> <br/>
		Telefone:  <input type="text" name="telefone" id="telefone"> <br/>
		<input type="submit" value="cadastrar">
	</form>
	<a href="{{action('App\Http\Controllers\ClienteController@listar2')}}">Listar clientes</a>

@stop