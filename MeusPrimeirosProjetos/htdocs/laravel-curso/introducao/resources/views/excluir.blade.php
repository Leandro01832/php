@extends('principal')
@section('title', "Excluir");
@section('content')

<h1>Excluir cliente</h1>


<a href="{{action('App\Http\Controllers\ClienteController@listar2')}}">Listar clientes</a>

@stop