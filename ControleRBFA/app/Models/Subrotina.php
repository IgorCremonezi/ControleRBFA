<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subrotina extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'rotina_id'];

    public function Relaciomanento_rotina()
    {
        return $this->belongsTo(Rotina::class, 'rotina_id');
    }

    public function Relacionamento_tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
