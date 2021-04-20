<?php

namespace App\Http\Controllers;

use App\Cliente;
use DateTime;
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
        $dadosCliente = new Cliente();

        $dadosCliente = DB::table('cliente')
            ->orderBy('cliente_id', 'DESC')
            ->paginate(5);

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

            list($ano, $mes, $dia) = explode('-', $request->data_nascimento);
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

            if ($idade < 18) {
                return redirect('/cliente/addedit')->with('msg', 'Cliente menor de idade');
            }
            $request->validate([
                'nome'              => 'required',
                'data_nascimento'   => 'required',
            ]);

            $cliente = new Cliente();


            if (!$request->input('cliente_id')) {
                $cliente->nome              = $request->input('nome');
                $cliente->data_nascimento   = $request->input('data_nascimento');
                $cliente->save();
            } else {
                $cliente->where('cliente_id', $request->input('cliente_id'))
                    ->update([
                        'nome'              => $request->input('nome'),
                        'data_nascimento'   => $request->input('data_nascimento'),
                    ]);
            }

            return redirect('/cliente');
        } catch (\Throwable $th) {
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
