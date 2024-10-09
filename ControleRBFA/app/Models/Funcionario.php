<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'senha', 'departamento_id', 'ativo'];

    protected $hidden = ['senha'];

    public function Relacionamento_departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function Relacionamento_controleObrigacoes()
    {
        return $this->hasMany(ControleObrigacao::class);
    }

    public function Relacionamento_controleRotinas()
    {
        return $this->hasMany(ControleRotina::class);
    }
}
