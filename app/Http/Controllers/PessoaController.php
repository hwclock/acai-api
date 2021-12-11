<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $pessoas = Pessoa::all();
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao consultar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $pessoas];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Pessoa();

        try {
            $obj->fill($request->json()->all());
            $obj->save();
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao salvar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $obj->id];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pessoa = Pessoa::findOrFail($id);
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao consultar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $pessoa];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $obj = Pessoa::findOrFail($id);
            $obj->fill($request->json()->all());
            $obj->save();
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao atualizar registro', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => 'Registro atualizado'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::findOrFail($id)->delete();
    }
}
