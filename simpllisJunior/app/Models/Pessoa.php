<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    use HasFactory;

    protected $fillable = ['nome', 'sexo', 'data_nascimento'];

    public function carros()
    {
        return $this->hasMany('App\Carro', 'proprietario_id');
    }
}
