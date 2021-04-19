<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $dadosCliente = Cliente::all();

        return view('cliente.cliente', ['dadosClient' => $dadosCliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addedit($cliente_id = null)
    {
        $cliente = new Cliente();

        if ($cliente_id) {
            $cliente = $cliente->where('cliente_id', $cliente_id)->first();
        } else {
            $cliente->cliente_id      = '';
            $cliente->nome            = '';
            $cliente->data_nascimento = '';
        }

        $retorno = view('cliente.addedit', ['cliente' => $cliente]);

        return $retorno;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'nome'              => 'required',
                'data_nascimento'   => 'required',
            ]);

            $cliente = new Cliente();


            if (!$request->input('cliente_id')) {
                $cliente->nome              = $request->input('nome');
                $cliente->data_nascimento   = $request->input('data_nascimento');
                $cliente->save();

                return redirect('/addedit')->with('msg', 'Adicionado com sucesso');
            } else {
                $cliente->where('cliente_id', $request->input('cliente_id'))
                    ->update([
                        'nome'              => $request->input('nome'),
                        'data_nascimento'   => $request->input('data_nascimento'),
                    ]);
                return redirect('/cliente')->with('msg', 'Editado com sucesso');
            }

            return response()->json(['erro' => 0]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 1]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('cliente')->where('cliente_id', $id)->delete();

            return response()->json(['erro' => 0]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 1]);
        }
    }
}
