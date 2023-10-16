<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{

    use HasFactory;

    protected $table = 'carros';

    protected $fillable = ['proprietario_id', 'placa', 'modelo', 'muitas_portas', 'km_atual'];

    public function rules() {
    }

    public function feedback() {
    }

    //um proprietario
    public function pessoa()
    {
        return $this->belongsTo('App\Models\Pessoa', 'proprietario_id');
    }

    //varias revisoes
    public function revisoes()
    {
        return $this->hasMany('App\Models\Revisao', 'carro_id');
    }
}
