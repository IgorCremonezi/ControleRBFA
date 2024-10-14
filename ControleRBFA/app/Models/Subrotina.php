<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subrotina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'rotina_id', 'departamento_id'];

    public function rotina()
    {
        return $this->belongsTo(Rotina::class, 'rotina_id');
    }

    public function empresa()
    {
        return $this->belongsToMany(Empresa::class, 'controle_sub_rotinas')
                    ->withPivot('funcionario_id', 'mes_referencia', 'semana', 'status', 'mes_fechado');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function controleSubRotinas()
    {
        return $this->hasMany(ControleSubRotina::class);
    }
}
