<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProdutosTableSeeder extends Seeder
{



	public function run()
    {
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Televisão", "1200", "descricao da Televisão", "televisao", 1));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Celular", "2200", "descricao do celular", "celular", 2));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Geladeira", "1900", "descricao da geladeira", "geladeira", 3));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Fogão", "1550", "descricao do fogão", "fogao", 4));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Notbook", "2900", "descricao do notbook", "notbook", 5));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Ventilador", "235", "descricao do ventilador", "ventilador", 6));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Tablet", "980", "descricao do tablet", "tablet", 7));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Computador", "1500", "descricao do computador", "computador", 8));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Oculos", "210", "descricao do oculos", "oculos", 9));
         DB::insert("insert into produtos (nome, preco, descricao, imagem, marca_id) values (?, ?, ?, ?, ?)",
         array("Camisa", "100", "descricao da camisa", "camisa", 10));
    }

}

?>