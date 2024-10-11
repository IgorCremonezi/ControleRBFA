<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleObrigacao extends Model
{
    use HasFactory;

    protected $table = 'controle_obrigacoes';

    protected $fillable = ['obrigacao_id', 'funcionario_id', 'empresa_id', 'departamento_id', 'data_conclusao', 'mes_referencia'];

    public function obrigacao()
    {
        return $this->belongsTo(Obrigacao::class, 'obrigacao_id');
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
