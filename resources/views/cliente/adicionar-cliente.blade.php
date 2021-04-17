@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Novo cliente</h6>
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
                                                <label for="nome">Nome Completo</label>
                                                <input type="text" class="form-control" @error('nome') is-invalid @enderror
                                                    name="nome" id="nome" placeholder="Nome Completo">
                                                @error('nome')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="data_nascimento">Data nascimento</label>
                                                <input type="date" class="form-control" @error('data_nascimento') is-invalid
                                                    @enderror name="data_nascimento" id="data_nascimento"
                                                    placeholder="Nome Completo">
                                                @error('nome')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
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
