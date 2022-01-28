<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PixKey;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $chaves = Pedido::all();
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao consultar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $chaves];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Pedido();
        
        try {
            $chaves = PixKey::where('proprietario', $request->json('criador'))->get();
            if (!$chaves->contains(PixKey::find($request->json('chave_pagamento')))) {
                throw new \Exception('Essa chave não pertence ao criador do pedido');
            }

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
            $pedido = Pedido::findOrFail($id);
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao consultar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $pedido];
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
            $obj = Pedido::findOrFail($id);
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
        Pedido::findOrFail($id)->delete();
    }
}
