<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{

    use HasFactory;

    protected $table = 'revisoes';

    protected $fillable = ['carro_id', 'data_revisao', 'custo_revisao', 'oficina_responsavel'];

    public function rules() {
    }

    public function feedback() {
    }

    //um carro
    public function carro()
    {
        return $this->belongsTo('App\Models\Carro', 'carro_id');
    }

}
