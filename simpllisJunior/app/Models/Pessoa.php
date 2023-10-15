<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'sexo', 'data_nascimento'];

    public function carros()
    {
        return $this->hasMany('App\Carro', 'proprietario_id');
    }
}
