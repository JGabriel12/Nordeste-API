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

    public function estadia()
    {
        return $this->belongsTo(Estadia::class);
    }

    protected $fillable = [
        'status_pedido',
        'id_mesa',
        'id_prato',
        'id_estadia'
    ];
}
