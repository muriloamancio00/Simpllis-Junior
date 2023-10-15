<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = ['proprietario_id', 'placa', 'modelo', 'muitas_portas', 'km_atual'];

    public function proprietario()
    {
        return $this->belongsTo('App\Pessoa', 'proprietario_id');
    }

    public function revisoes()
    {
        return $this->hasMany('App\Revisao', 'carro_id');
    }
}
