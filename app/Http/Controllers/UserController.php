<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::all();
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao consultar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $users];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new User();
        
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
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return ['type' => 'error', 'data' => 'Erro ao consultar', 'details' => $e->getMessage()];
        }

        return ['type' => 'success', 'data' => $user];
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
            $obj = User::findOrFail($id);
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
        User::findOrFail($id)->delete();
    }
}
