@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Nova venda</h6>
                        <div>
                            <a href="" class="btn btn-sm text-primary"><i class="fa fa-home" title="Home"></i></a>
                        </div>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="cliente_id">Cliente</label>
                                                <select class="form-control" name="cliente_id" id="cliente_id" required>
                                                    <option value="" disabled="true" selected="true"> Selecione o Cliente
                                                    </option>
                                                    @foreach ($cliente as $rst)
                                                        <option value="{{ $rst->cliente_id }}">{{ $rst->nome }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="produto">Produto</label>
                                                <select class="form-control" name="produto" id="produto" required>
                                                    <option value="" disabled="true" selected="true"> Selecione o produto
                                                    </option>
                                                    @foreach ($produto as $result)
                                                        <option value="{{ $result->produto_id }}">
                                                            {{ $result->produto }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="btn-group">
                                                <a id="adiciona-itens-ao-carrinho" class="btn btn-sm btn-primary mt-4"><i
                                                        class="fa fa-plus"></i>
                                                    Adicionar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <h4>Resumo da venda</h4>
                                            <table class="table table-striped" id="table-outras-contas">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Produto</th>
                                                        <th scope="col">Quantidade</th>
                                                        <th scope="col">Valor/uni</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="lista"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="valortotal">Valor total</label>
                                                <input type="text" readonly class="form-control" name="valortotal"
                                                    id="valortotal"></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="desconto">Desconto</label>
                                                <input class="form-control" name="desconto" id="desconto"></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="valor-pagar">Valor a pagar</label>
                                                <input class="form-control" readonly name="valor-pagar"
                                                    id="valor-pagar"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js-pages/venda/venda.js') }}"></script>
