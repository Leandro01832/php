<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Marca;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = Produto::all();
        $marcas = Marca::all();
        return view('home')->with("produtos", $produtos)->with("marcas", $marcas);
    }

    public function produto($id)
    {
        $produto = Produto::where(['id' => $id])->first();
        $marca = Marca::where(['id' => $produto->marca_id])->first();
        return view('produto')->with("produto", $produto)->with("marca", $marca);
    }
}
