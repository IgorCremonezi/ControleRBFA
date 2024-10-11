<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subrotina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'rotina_id', 'mes_referencia', 'semana', 'ststaus', 'mes_fechado'];

    public function rotina()
    {
        return $this->belongsTo(Rotina::class, 'rotina_id');
    }
}
