<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\ContasPagar;


class ContasPagarController extends Controller
{
    public function listar()
    {
        $contas_pagar = ContasPagar::all();     
        return view("listar")->with("lista", $contas_pagar);
    }
    public function cadastro()
    {    
        return view("cadastro");
    }
    public function editar($id)
    {    
        $contas_pagar = ContasPagar::find($id);
        
        if(empty($contas_pagar))
        return "Esta conta não existe!!!";
        else        
        return view("editar")->with("conta", $contas_pagar);
    }
    public function apagar($id)
    {    
        $contas_pagar = ContasPagar::find($id);
        $contas_pagar->delete();
               
        return redirect()->action("App\Http\Controllers\ContasPagarController@listar");
    }
    
    
    
    public function salvar()
    {   
        $descricao  = Request::input('descricao');
        $valor  = Request::input('valor');
        
        $validator = Validator::make(
                [
                    'descricao' => $descricao,
                    'valor' => $valor
                ],
                [
                   'descricao' => 'required|min:6',
                  'valor' => 'required|numeric'
                ],
                [
                    'required' => ':attribute é obrigatório.',
                    'numeric' => ':attribute deve ser um numero.'
                ]
                );
        
        if($validator->fails())
        return redirect()->action("App\Http\Controllers\ContasPagarController@cadastro")->withErrors($validator)->withInput();
            
        
       // DB::insert("insert into contas_pagar (descricao, valor) values (?, ?) ",
         //       array($descricao, $valor));
        
        $contas_pagar = new ContasPagar();
        $contas_pagar->descricao  = $descricao;
        $contas_pagar->valor  = $valor;
        $contas_pagar->save();
        
        return redirect()->action("App\Http\Controllers\ContasPagarController@listar")->withInput();
    }
    
    public function atualizar($id)
    {   
        $descricao  = Request::input('descricao');
        $valor  = Request::input('valor');
        
        $contas_pagar = ContasPagar::find($id);
        $contas_pagar->descricao  = $descricao;
        $contas_pagar->valor  = $valor;
        $contas_pagar->save();
        
        return redirect()->action("App\Http\Controllers\ContasPagarController@listar")->withInput();
    }
}
