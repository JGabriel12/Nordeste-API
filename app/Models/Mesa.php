<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    public function estadia()
    {
        return $this->hasMany(Estadia::class);
    }

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }
}
