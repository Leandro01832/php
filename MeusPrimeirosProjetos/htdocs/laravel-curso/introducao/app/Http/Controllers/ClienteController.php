<?php

namespace App\Http\Controllers;
use Request;

class ClienteController extends Controller
{
	
	public function listar(){
		$data = date("Y-m-d");

		if($data > '2022-09-05')
			$msg = "Inscrição finalizada!!!";
		else
			$msg = "Inscrição em aberto!!!";


		return view("listar")->with("msg", $msg);
	}

	public function listar2()
	{
		$nomes  = array(1 =>"João", 2 =>"Maria", 3 =>"Pedro");
		return view("listar2")->with("nomes", $nomes);
	}

	public function novo(){

		if(view()->exists('novo'))
		return view("novo");
	    else
	    return view("welcome");
	}

	public function editar($id){
		//if(Request::has('id'))
		//{$id = Request::input("id");}
		//else
		//{
		//	$nomes  = array(1 =>"João", 2 =>"Maria", 3 =>"Pedro");
		//	return view("listar2")->with("nomes", $nomes);
		//}

		//$id = Request::input('id', 0);

		//Url
		$url = Request::path();
		$url = Request::url();

		//$id = Request::route('id');

	    return view("editar")->with("id", $id)->with("url", $url);
	}

	public function excluir(){

	    return view("excluir");
	}

	public function detalhes(){

	    return view("detalhes");
	}



}

?>