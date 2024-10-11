<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rotina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'empresa_id', 'departamento_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
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
