
@extends('principal')
@section('title', "detalhes");
@section('content')

<h1>Detalhes do cliente</h1>


<a href="{{action('App\Http\Controllers\ClienteController@listar2')}}">Listar clientes</a>

@stop