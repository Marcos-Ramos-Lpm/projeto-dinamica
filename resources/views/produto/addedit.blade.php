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
                                @if (count($errors) > 0)
                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-6 col-sm-6">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('addedit') }}">
                                    @csrf
                                    <input type="hidden" name="produto_id" value="{{ $produto->produto_id }}" />
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="categoria">Categoria do produto</label>
                                                <select class="form-control" name="categoria" id="categoria">
                                                    @foreach ($categoria as $rst)
                                                        {{ $selected = $rst->categoria_id == $produto->categoria_id ? 'selected' : '' }}
                                                        <option value="{{ $rst->categoria_id }}" {{ $selected }}>
                                                            {{ $rst->categoria }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="produto">Produto</label>
                                                <input type="text" class="form-control" name="produto" id="produto"
                                                    placeholder="Produto" value="{{ $produto->produto }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="valor">Valor</label>
                                                <input type="text" class="form-control" name="valor" id="valor"
                                                    placeholder="R$ 0,00" value="{{ $produto->valor_produto }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="descricao_produto">Descrição do produto</label>
                                                <textarea rows="3" class="form-control" name="descricao_produto"
                                                    id="descricao_produto">{{ $produto->descricao }}</textarea>
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
