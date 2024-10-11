<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function obrigacoes()
    {
        return $this->hasMany(Obrigacao::class);
    }

    public function rotinas()
    {
        return $this->hasMany(Rotina::class);
    }
}
