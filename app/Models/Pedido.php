<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_pedido',
        'id_mesa',
        'id_prato',
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function prato()
    {
        return $this->hasMany(Prato::class);
    }
}
