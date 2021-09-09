@extends('principal')
@section('title', "Editar");
@section('content')

	<h1>Editar cliente - <?php echo $id; ?></h1>

	<form>
		
		Nome:  <input type="text" name="nome" id="nome"> <br/>
		Email:  <input type="text" name="email" id="email"> <br/>
		DDD:  <input type="text" name="ddd" id="ddd"> <br/>
		Telefone:  <input type="text" name="telefone" id="telefone"> <br/>
		<input type="submit" value="Editar">
	</form>

	<!-- <a href="<?php echo action("App\Http\Controllers\ClienteController@listar"); ?>">Listar clientes</a> -->
	<a href="{{action('App\Http\Controllers\ClienteController@listar2')}}">Listar clientes</a>

 	<?php echo $url; ?>

 	@stop
