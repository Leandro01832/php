<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcasTableSeeder extends Seeder
{
	public function run()
    {
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Dell", "dell"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Microsoft", "microsoft"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Lenovo", "lenovo"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Samsung", "samsung"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Semp Toshiba", "semp-toshiba"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("LG", "lg"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Nokia", "nokia"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Brastemp", "brastemp"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("HP", "hp"));
         DB::insert("insert into marcas (nome, imagem) values (?, ?)",
                 array("Arno", "arno"));
    }

}



?>