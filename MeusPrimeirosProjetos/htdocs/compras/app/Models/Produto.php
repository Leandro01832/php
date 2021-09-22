<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;


    public  function getPrecoAttribute($preco)
    {
    	return $this->attributes["preco"] = sprintf("R$ %s", number_format($preco, 2, ',', '.'));
    }
}
