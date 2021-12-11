<?php

namespace App\Http\Controllers;

use App\Models\PixKey;
use Illuminate\Http\Request;

class PixKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $chaves = PixKey::all();
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
        $obj = new PixKey();
        
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
            $chave = PixKey::findOrFail($id);
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao consultar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $chave];
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
            $obj = PixKey::findOrFail($id);
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
        PixKey::findOrFail($id)->delete();
    }
}
