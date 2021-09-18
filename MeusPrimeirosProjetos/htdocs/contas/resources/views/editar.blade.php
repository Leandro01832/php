@extends('principal');
@section('title', "Editar");
@section('content');

<h1>Editar conta</h1>

<form action="{{ action('App\Http\Controllers\ContasPagarController@atualizar', $conta->id) }}" method="POST">
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="update" value="update" />
    <div class="form-group">
        
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{ $conta->descricao }}" />
        
    </div>
    <div class="form-group">
        
        <label>Valor</label>
        <input type="text" name="valor" class="form-control" value="{{ $conta->valor }}" />
        
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
</form>

@stop

