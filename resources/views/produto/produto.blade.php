@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Produtos</h6>
                        <div>
                            <a href="" class="btn btn-sm text-primary"><i class="fa fa-home" title="Home"></i></a>
                            <a href="{{ route('novo-produto') }}" class="btn btn-sm text-primary"><i class="fa fa-plus"
                                    title="Adicionar produto"></i></a>
                        </div>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <h1>Seja bem vindo,<h1>
                                    adicionar cliente
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
