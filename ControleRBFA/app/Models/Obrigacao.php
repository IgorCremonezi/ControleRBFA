<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrigacao extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'prazo', 'empresa_id', 'departamento_id'];

    public function Relacionamento_empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function Relacionamento_departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function Relacionamento_controleObrigacoes()
    {
        return $this->hasMany(ControleObrigacao::class);
    }
}
