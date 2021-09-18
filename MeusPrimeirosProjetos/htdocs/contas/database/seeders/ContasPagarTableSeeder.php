<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContasPagarTableSeeder extends Seeder
{    
    public function run()
    {
         DB::insert("insert into contas_pagar (descricao, valor) values (?, ?)",
                 array("pagamento luz", "500.10"));
         DB::insert("insert into contas_pagar (descricao, valor) values (?, ?)",
                 array("pagamento telefone", "100.00"));
         DB::insert("insert into contas_pagar (descricao, valor) values (?, ?)",
                 array("pagamento TV assinatura", "250.50"));
    }
}

