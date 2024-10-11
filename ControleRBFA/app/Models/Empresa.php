<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function obrigacoes()
    {
        return $this->hasMany(Obrigacao::class);
    }

    public function rotinas()
    {
        return $this->hasMany(Rotina::class);
    }
}
