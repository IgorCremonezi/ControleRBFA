<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleSubRotina extends Model
{
    use HasFactory;

    protected $fillable = ['subrotina_id', 'rotina_id', 'funcionario_id', 'empresa_id', 'departamento_id', 'mes_referencia', 'semana', 'status', 'mes_fechado'];

    public function subrotina()
    {
        return $this->belongsTo(Subrotina::class, 'subrotina_id');
    }

    public function rotina()
    {
        return $this->belongsTo(Rotina::class, 'rotina_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'funcionario_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
}
