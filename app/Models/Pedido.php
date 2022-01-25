<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function prato()
    {
        return $this->hasMany(Prato::class);
    }
}
