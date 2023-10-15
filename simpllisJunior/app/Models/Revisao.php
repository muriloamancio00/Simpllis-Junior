<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{

    use HasFactory;

    protected $fillable = ['carro_id', 'data_revisao', 'custo_revisao', 'oficina_responsavel'];

    public function carro()
    {
        return $this->belongsTo('App\Carro', 'carro_id');
    }
}
