<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrigacao extends Model
{
    use HasFactory;

    protected $table = 'obrigacoes';

    protected $fillable = ['nome', 'prazo'];

    public function controleObrigacoes()
    {
        return $this->hasMany(ControleObrigacao::class);
    }
}
