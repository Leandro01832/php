<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasPagar extends Model
{
    protected $table = "contas_pagar";
    public $timestamps = true;


    use HasFactory;
}
