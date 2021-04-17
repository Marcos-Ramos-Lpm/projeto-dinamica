@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Novo produto</h6>
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
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="categoria">Categoria do produto</label>
                                                <select class="form-control" name="categoria" id="categoria">
                                                    @foreach ($categoria as $rst)
                                                        <option value="{{ $rst->id }}">{{ $rst->categoria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="produto">Produto</label>
                                                <input type="text" class="form-control" name="produto" id="produto"
                                                    placeholder="Produto">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="valor_produto">Valor</label>
                                                <input type="text" class="form-control" name="valor_produto"
                                                    id="valor_produto" placeholder="R$ 0,00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="descricao">Descrição do produto</label>
                                                <textarea rows="3" class="form-control" name="descricao"
                                                    id="descricao"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
