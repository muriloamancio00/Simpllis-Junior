<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Repositories\PessoaRepository;

class PessoaController extends Controller
{
    public function __construct(Pessoa $pessoa) {
        $this->pessoa = $pessoa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pessoas = Pessoa::with('carros');

        if ($request->has('filtro')) {
            $pessoas = $pessoas->filtro($request->filtro);
        }

        if ($request->has('atributos')) {
            $pessoas = $pessoas->selectAtributos($request->atributos);
        }

        // Adicione a contagem de carros como um novo campo
        $pessoas = $pessoas->get()->map(function($pessoa) {
            $pessoa->quantidade_de_carros = count($pessoa->carros);

            // Calcular e adicionar a quilometragem média
            $quilometragemTotal = $pessoa->carros->sum('km_atual');
            $numeroDeCarros = count($pessoa->carros);
            $pessoa->quilometragem_media = $numeroDeCarros > 0 ? $quilometragemTotal / $numeroDeCarros : 0;

            // Encontrar a marca mais repetida
            $marcas = $pessoa->carros->pluck('marca');
            $contagemMarcas = $marcas->countBy();
            $pessoa->marca_mais_repetida = $contagemMarcas->sortDesc()->keys()->first();
            $pessoa->quantidade_marca_mais_repetida = $contagemMarcas[$pessoa->marca_mais_repetida];

            // Contar carros com muitas_portas = true
            $pessoa->quantidade_carros_muitas_portas = $pessoa->carros->where('muitas_portas', true)->count();

            return $pessoa;
        });

        return response()->json($pessoas, 200);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ('show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return ('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ('destroy');
    }

}
