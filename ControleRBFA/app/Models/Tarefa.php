<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'subrotina_id'];

    public function Relacionamento_subrotina()
    {
        return $this->belongsTo(Subrotina::class, 'subrotina_id');
    }
}
