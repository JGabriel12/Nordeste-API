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
}
