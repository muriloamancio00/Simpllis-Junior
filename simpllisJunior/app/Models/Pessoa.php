<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    use HasFactory;

    protected $table = 'pessoas';

    protected $fillable = ['nome', 'sexo', 'data_nascimento'];

    public function rules() {
    }

    public function feedback() {
    }

    //varios carros
    public function carros()
    {
        return $this->hasMany('App\Models\Carro', 'proprietario_id');
    }

}
