<?php

namespace App\Http\Controllers;

use App\Models\Revisao;
use Illuminate\Http\Request;
use App\Repositories\RevisaoRepository;

class RevisaoController extends Controller
{
    public function __construct(Revisao $revisao) {
        $this->revisao = $revisao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $revisaoRepository = new RevisaoRepository($this->revisao);

        if($request->has('atributos_modelo')) {
            $atributos_modelo = 'carro:id,'.$request->atributos_modelo;
            $revisaoRepository->selectAtributosRegistrosRelacionados($atributos_modelo);
        } else {
            $revisaoRepository->selectAtributosRegistrosRelacionados('carro');
        }

        if($request->has('filtro')) {
            $revisaoRepository->filtro($request->filtro);
        }

        if($request->has('atributos')) {
            $revisaoRepository->selectAtributos($request->atributos);
        }

        return response()->json($revisaoRepository->getResultado(), 200);
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
     * @param  \App\Models\Revisao  $revisao
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
     * @param  \App\Models\Revisao  $revisao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return ('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Revisao  $revisao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ('destroy');
    }
}
