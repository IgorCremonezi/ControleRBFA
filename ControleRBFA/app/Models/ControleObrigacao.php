<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleObrigacao extends Model
{
    use HasFactory;

    protected $fillable = ['obrigacao_id', 'funcionario_id', 'empresa_id', 'departamento_id', 'data_conclusao', 'mes_referencia'];

    public function Relacionamento_obrigacao()
    {
        return $this->belongsTo(Obrigacao::class, 'obrigacao_id');
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
