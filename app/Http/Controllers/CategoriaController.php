<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{

    public function addedit($categoria_id = null)
    {

        $categoria = new Categoria();

        if ($categoria_id) {
            $categoria = $categoria->where('categoria_id', $categoria_id)->first();
        } else {
            $categoria->categoria_id      = '';
            $categoria->categoria         = '';
        }

        return view('categoria.addedit', ['categoria' => $categoria]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'categoria' => 'required'
        ]);

        $categoria = new Categoria();

        if (!$request->input('categoria_id')) {
            $categoria->categoria    = $request->input('categoria');
            $categoria->save();
        } else {
            $categoria->where('categoria_id', $request->input('categoria_id'))
                ->update([
                    'categoria'              => $request->input('categoria'),
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categoria = Categoria::all();

        return view('categoria.categoria', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            DB::table('categoria')->where('categoria_id', $id)->delete();

            return response()->json(['erro' => 0]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 1]);
        }
    }
}
