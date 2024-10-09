<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleRotina extends Model
{
    use HasFactory;

    protected $fillable = ['subrotina_id', 'funcionario_id', 'empresa_id', 'departamento_id', 'mes_referencia', 'semana', 'status', 'data_conclusao', 'mes_fechado'];

    public function Relacionamento_subrotina()
    {
        return $this->belongsTo(Subrotina::class, 'subrotina_id');
    }

    public function Relacionamento_funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    public function Relacionamento_empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function Relacionamento_departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
}
