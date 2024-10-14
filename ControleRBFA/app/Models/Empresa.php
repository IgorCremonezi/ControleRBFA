<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function obrigacoes()
    {
        return $this->hasMany(Obrigacao::class);
    }

    public function rotinas()
    {
        return $this->belongsToMany(Rotina::class, 'controle_rotinas')
                    ->withPivot('funcionario_id', 'mes_referencia', 'semana', 'status', 'mes_fechado');
    }

    public function subrotinas()
    {
        return $this->belongsToMany(Subrotina::class, 'controle_sub_rotinas')
                    ->withPivot('funcionario_id', 'mes_referencia', 'semana', 'status', 'mes_fechado');
    }
}
