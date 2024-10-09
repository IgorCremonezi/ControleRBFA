<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function Relacionamento_obrigacoes()
    {
        return $this->hasMany(Obrigacao::class);
    }

    public function Relacionamento_rotinas()
    {
        return $this->hasMany(Rotina::class);
    }
}
