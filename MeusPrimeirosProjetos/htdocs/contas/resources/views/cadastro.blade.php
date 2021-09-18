@extends('principal');
@section('title', "Editar");
@section('content');

<h1>Cadastrar conta</h1>
@if (count($errors) > 0)
<div class="alert alert-danger"> 
    <strong>Cadastro não realizado!!! Erros:</strong> 
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ action('App\Http\Controllers\ContasPagarController@salvar') }}" method="POST">
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="insert" value="insert" />
    <div class="form-group">
        
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" value="{{old('descricao')}}" />
        
    </div>
    <div class="form-group">
        
        <label>Valor</label>
        <input type="text" name="valor" class="form-control" value="{{old('valor')}}" />
        
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

@stop

