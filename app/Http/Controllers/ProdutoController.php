<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{

    public function addedit($produto_id = null)
    {
        try {
            $produto = new Produto();

            if ($produto_id) {
                $produto = $produto->where('produto_id', $produto_id)->first();
            } else {
                $produto->produto_id    = "";
                $produto->categoria_id  = "";
                $produto->produto       = "";
                $produto->valor_produto = "";
                $produto->descricao     = "";
            }

            $categoria = new Categoria();

            return view('produto.addedit', [
                'categoria'     => $categoria->get(),
                'produto'       => $produto
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
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
                'categoria'         => 'required',
                'produto'           => 'required',
                'valor'             => 'required',
                'descricao_produto' => 'required'
            ]);

            $model  = new Produto();

            if (!$request->input('produto_id')) {

                $model->categoria_id           = $request->input('categoria');
                $model->produto                = $request->input('produto');
                $model->valor_produto          = $request->input('valor');
                $model->descricao              = $request->input('descricao_produto');

                $model->save();
            } else {
                $model->where('produto_id', $request->input('produto_id'))
                    ->update([
                        'categoria_id'  => $request->input('categoria'),
                        'produto'       => $request->input('produto'),
                        'valor_produto' => $request->input('valor'),
                        'descricao'     => $request->input('descricao_produto'),
                    ]);
            }
            return redirect('/produto');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        try {
            $produto = DB::table('produto')
                ->leftJoin('categoria', 'produto.categoria_id', '=', 'categoria.categoria_id')
                ->orderBy('produto_id', 'DESC')
                ->paginate(5);
            // dd($produto);
            return view('produto.produto', ['produtos' => $produto]);
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
            DB::table('produto')->where('produto_id', $id)->delete();

            return response()->json(['erro' => 0]);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 1]);
        }
    }
}
