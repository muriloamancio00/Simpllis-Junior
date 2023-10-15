<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{
    protected $fillable = ['carro_id', 'data_revisao', 'custo_revisao', 'oficina_responsavel'];

    public function carro()
    {
        return $this->belongsTo('App\Carro', 'carro_id');
    }
}
