<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rotina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'departamento_id'];

    public function empresa()
    {
        return $this->belongsToMany(Empresa::class, 'controle_rotinas')
                    ->withPivot('funcionario_id', 'mes_referencia', 'semana', 'status', 'mes_fechado');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function subrotinas()
    {
        return $this->hasMany(Subrotina::class);
    }

    public function controleRotinas()
    {
        return $this->hasMany(ControleRotina::class);
    }
}
