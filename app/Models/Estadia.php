<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadia extends Model
{
    use HasFactory;

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function pedido()
    {
        return $this->hasMany(Pedido::class);
    }

    protected $fillable = [
        'horario_chegada',
        'horario_saida',
        'data_atual',
        'valor_total_estadia',
        'status_estadia',
        'id_pedido',
        'id_mesa'
    ];
}
