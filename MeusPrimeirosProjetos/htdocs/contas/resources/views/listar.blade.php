@extends('principal');
@section('title', "Editar");
@section('content');

<script type="text/javascript">
function apagar(url, desc)
         {
             if(confirm("Deseja realmente apagar este registro " + desc + "?"))
             {
                 window.location = url;
             }
         }
</script>

<h1>Lista de contas a pagar</h1>
@if(old('insert'))
<div class="alert alert-success"> 
    <strong>Sucesso!!!</strong> {{old('descricao')}} Cadastrado com sucesso
</div>
@endif

@if(old('update'))
<div class="alert alert-success"> 
    <strong>Sucesso!!!</strong> {{old('descricao')}} atualizado com sucesso
</div>
@endif

<a href="{{action("App\Http\Controllers\ContasPagarController@cadastro")}}" class="btn btn-small btn-info" > Cadastrar <a/>

    <table border="1" width="60%" class="table-bordered table-dark table-hover">
    
    <tr>
        <td>Id</td>
        <td>Descrição</td>
        <td>Valor</td>
        <td>Ação</td>
    </tr>


@foreach ($lista as $value) 
    <tr>
    <td>
    {{ $value->id }}
    </td>
    <td>
    {{ $value->descricao }}
    </td>
    <td>
    {{ $value->valor }}
    </td>
    <td>
     <a href="{{action("App\Http\Controllers\ContasPagarController@editar", $value->id)}}" class="btn btn-small btn-info" > Editar <a/>
<a href="#" onclick="apagar('{{ action ("App\Http\Controllers\ContasPagarController@apagar", $value->id) }}', '<?php echo $value->descricao ?>');" class="btn btn-small btn-info" > Apagar <a/>
    </td>
    </tr>
 @endforeach
</table>

@stop