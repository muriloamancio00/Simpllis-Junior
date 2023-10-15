<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{

    use HasFactory;

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
