<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carro_id');
            $table->foreign('carro_id')->references('id')->on('carros');
            $table->date('data_revisao');
            $table->string('tipo_revisao');
            $table->text('descricao_revisao');
            // ex 230,00
            $table->decimal('custo_revisao', 10, 2);
            $table->string('oficina_responsavel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisoes');
    }
}
